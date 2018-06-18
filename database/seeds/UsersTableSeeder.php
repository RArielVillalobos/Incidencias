<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin
        User::create([
            'name'=>'Juan',
            'email'=>'juan@gmail.com',
            'password'=>bcrypt('ar1el123'),
            'role'=>0
        ]);

        //Support
        User::create([
            'name'=>'Maria',
            'email'=>'maria@gmail.com',
            'password'=>bcrypt('ar1el123'),
            'role'=>1
        ]);

        //Client
        User::create([
            'name'=>'Enelso',
            'email'=>'ruben@gmail.com',
            'password'=>bcrypt('ar1el123'),
            'role'=>2
        ]);

    }
}
