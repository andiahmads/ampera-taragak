<style>
    .spiner{
        display: none;
    }
</style>
<div class="modal fade" id="addUser"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content bg-gradient-light">
        <div class="modal-header bg-primary">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <div class="modal-body"  style="max-height: 800px">
          <form class="form-prevent-multiple-submits" action="{{route('admin.user.store')}}" name="myForm" id="Myform"  novalidate method="post" enctype="multipart/form-data">
         @csrf

         <div class="form-group" >
             <label><b>Name</b></label>
              <input type="text"
                     class="form-control form-control-user"
                     id="Name"
                     oninput="validateFirstName()"
                     name="name" placeholder="Name">
             <span class="text-danger"></span>
         </div>

            <div class="form-group">
                <label><b>Select Role</b></label>
                <select class="js-example-responsive" id="roleName" name="role_id" onfocusout="validateRoleName()" style="width: 100%">
                    <option></option>
                    @foreach($roles as $role)
                        @if($role->slug == 'admin')
                    <option value="1">{{$role->slug}}</option>
                      @else
                    <option value="2">{{$role->slug}}</option>
                        @endif
                     @endforeach
                </select>
                <span class="text-danger"></span>
            </div>

            <div class="form-group">
             <label><b>UserName</b></label>
              <input type="text" class="form-control form-control-user"
                     name="username"
                     id="UserName"
                     oninput="validateLastName()"
                     placeholder="UserName">
               <span class="text-danger"></span>
            </div>

            <div class="form-group">
             <label><b>Email</b></label>
              <input type="email"
                     class="form-control form-control-user"
                     name="email"
                     placeholder="Input Email"
                     id="Email"
                     oninput="validateEmail()"
                     >
                <span class="text-danger" ></span>
            </div>



            <div class="form-group">
             <label><b>Paasword</b></label>
              <input type="password"
                     class="form-control form-control-user"
                     name="password"
                     id="Password"
                     oninput="validatePassword()"
                     placeholder="Password">
                <span class="text-danger" ></span>
            </div>

           <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary button-prevent-multiple-submits" name="buttonDisabled" id="snbutton" type="submit">
              <i class="spiner fa fa-spinner fa-spin">
              </i>save</button>
        </div>
     </form>

  </div>
      </div>

    </div>
  </div>
 </div>
@push('js')
<script type="text/javascript">
    $(".js-example-responsive").select2({
    width: 'resolve' // jquery setting select2
    });
 </script>
<script>
   $('.form-prevent-multiple-submits').on('submit',function () {
       $('.spiner').show();
   })
</script>

<script>
    // Input fields
const Name = document.getElementById('Name');
const UserName = document.getElementById('UserName');
const Password = document.getElementById('Password');
const Email = document.getElementById('Email');
const snbutton = document.getElementById('snbutton');
const buttonDisabled = document.myForm.buttonDisabled.disabled=true;


function validateFirstName() {
  // check if is empty
  if (checkIfEmpty(Name)) return;
  // is if it has only letters
  if (!checkIfOnlyLetters(Name)) return;
    if (!meetLength(Name, 4, 100)) return;


  return true;
}
function validateLastName() {
  // check if is empty
  if (checkIfEmpty(UserName)) return;
  // is if it has only letters
  if (!checkIfOnlyLetters(UserName)) return;
  if (!meetLength(UserName, 4, 100)) return;

  return true;
}
function validatePassword() {
  // Empty check
  if (checkIfEmpty(Password)) return;
  // Must of in certain length
  if (!meetLength(Password, 4, 100)) return;
  // check Password against our character set
  // 1- a
  // 2- a 1
  // 3- A a 1
  // 4- A a 1 @
  //   if (!containsCharacters(password, 4)) return;
  return true;
}
function validateEmail() {
  if (checkIfEmpty(Email)) return;
  if (!containsCharacters(Email, 5)) return;
  return true;
}
// Utility functions
function checkIfEmpty(field) {
  if (isEmpty(field.value.trim())) {
    // set field invalid
    setInvalid(field, `${field.name} must not be empty`);
    return true;
  } else {
    // set field valid
    setValid(field);
    return false;
  }
}
function isEmpty(value) {
  if (value === '') return true;
  return false;
}
function setInvalid(field, message) {
    $('').ready(function () {
    SNButton.init("snbutton",{
        fields: ["Name","UserName","Email","Password"],
    });
});
  field.nextElementSibling.innerHTML = message;
}
function setValid(field) {
  field.nextElementSibling.innerHTML = '<html><i class="fa fa-check text-primary"></i></html>';
  //field.nextElementSibling.style.color = green;
}
function checkIfOnlyLetters(field) {
  if (/^[a-zA-Z ]+$/.test(field.value)) {
    setValid(field);
    return true;
  } else {
    setInvalid(field, `${field.name} must contain only letters`);
    return false;
  }
}
function meetLength(field, minLength, maxLength) {
  if (field.value.length >= minLength && field.value.length < maxLength) {
    setValid(field);
    return true;
  } else if (field.value.length < minLength) {
    setInvalid(
      field,
      `${field.name} must be at least ${minLength} characters long`
    );
    return false;
  } else {
    setInvalid(
      field,
      `${field.name} must be shorter than ${maxLength} characters`
    );
    return false;
  }
}
function containsCharacters(field, code) {
  let regEx;
  switch (code) {
    case 1:
      // letters
      regEx = /(?=.*[a-zA-Z])/;
      return matchWithRegEx(regEx, field, 'Must contain at least one letter');
    case 2:
      // letter and numbers
      regEx = /(?=.*\d)(?=.*[a-zA-Z])/;
      return matchWithRegEx(
        regEx,
        field,
        'Must contain at least one letter and one number'
      );
    case 3:
      // uppercase, lowercase and number
      regEx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/;
      return matchWithRegEx(
        regEx,
        field,
        'Must contain at least one uppercase, one lowercase letter and one number'
      );
    case 4:
      // uppercase, lowercase, number and special char
      regEx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W)/;
      return matchWithRegEx(
        regEx,
        field,
        'Must contain at least one uppercase, one lowercase letter, one number and one special character'
      );
    case 5:
      // Email pattern
      regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return matchWithRegEx(regEx, field, 'Must be a valid email address');
    default:
      return false;
  }
}
function matchWithRegEx(regEx, field, message) {
  if (field.value.match(regEx)) {
    setValid(field);
    return true;
  } else {
    setInvalid(field, message);
    return false;
  }
}

</script>


@endpush
