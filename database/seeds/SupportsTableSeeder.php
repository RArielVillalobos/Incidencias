<?php

use Illuminate\Database\Seeder;
use App\User;

class SupportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //Supports
        //id 3
        User::create([
            'name'=>'Maria support1',
            'email'=>'maria@gmail.com',
            'password'=>bcrypt('ar1el123'),
            'role'=>1
        ]);


        //id 4
        User::create([
            'name'=>'Hernan support2',
            'email'=>'hernan@gmail.com',
            'password'=>bcrypt('ar1el123'),
            'role'=>1
        ]);
    }
}
