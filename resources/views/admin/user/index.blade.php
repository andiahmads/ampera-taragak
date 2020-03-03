@extends('layouts.backend.app')

@section('title','user')

    @push('css')
         <link href="{{asset('assets/backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @endpush

@section('content')
 <div id="app">
 <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
              <h6 class="m-0 font-weight-bold text-white">User All system {{$users->count()}}</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                  <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addUser">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text-light">Add User</span>
                  </a>
                  <br></br>
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                  <thead >
                    <tr>
                      <th class="text-black-100">No</th>
                      <th>Name</th>
                      <th>Lavel</th>
                      <th>Email</th>
                      <th>Image</th>
                      <th>created_at</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Lavel</th>
                      <th>Email</th>
                      <th>Image</th>
                      <th>created_at</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($users as $key=>$user)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->role->slug}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->image}}</td>
                      <td>{{$user->created_at}}</td>
                      <td>
                         <a href="#" class="btn btn-primary btn-circle">
                            <i class="fa fa-eye"></i>
                         </a>
                          <a href="#" class="btn btn-success btn-circle">
                            <i class="fa fa-pencil-ruler"></i>
                         </a>
                      </td>
                 @endforeach
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
     <!---modal add user-->
        @include('admin.user.modal')
     <!---end modal add user-->
</div>

@endsection

@push('js')

 <script>
    @if($errors->any())
        @foreach($errors->all() as $error)
            toastr.error('{{ $error }}','Error',{
                closeButton:true,
                progressBar:true,
            });
        @endforeach
    @endif
</script>


 <script src="{{asset('assets/backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('assets/backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
 <script src="{{asset('assets/backend/js/demo/datatables-demo.js')}}"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



@endpush
