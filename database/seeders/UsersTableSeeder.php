<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Admin
            [
            
                'name'=>'Admin',
                'username' => 'admin',
                'email'=> 'admin@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'admin',
                'status' => 'active',
                
            
            ],
            [
                'name'=>'Youness',
                'username' => 'youness',
                'email'=> 'youness@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'admin',
                'status' => 'active',
            ],
            [
                'name'=>'Test',
                'username' => 'test',
                'email'=> 'test@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'admin',
                'status' => 'active',
            ],
             // Agent
            [
                'name'=>'Responsable',
                'username' => 'responsable',
                'email'=> 'responsable@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'responsable',
                'status' => 'active',
            ],
             
            [
                'name'=>'Responsable2',
                'username' => 'responsable2',
                'email'=> 'responsable2@gmail.com',
                'password' => Hash::make('111'),
                'role_id' => 'responsable',
                'status_id' => 'active',
            ],
             
             
            
        ]);
    }
    
}
