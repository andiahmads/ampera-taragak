<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id'=>'1',
            'name'=>'andi ahmad',
            'username'=>'endiahmad',
            'email' => 'andi.fivesco@gmail.com',
            'password'=>bcrypt('admin1234'),

        ]);
         DB::table('users')->insert([
            'role_id'=>'1',
            'name'=>'ramadhan sinaga',
            'username'=>'sinagalovers',
             'email' => 'sinagalovers@gmail.com',
            'password'=>bcrypt('admin123'),
        ]);

          DB::table('users')->insert([
            'role_id'=>'2',
            'name'=>'rey manchester',
            'username'=>'cintabule',
             'email' => 'cintabules@gmail.com',
            'password'=>bcrypt('admin123'),
        ]);

    }
}
