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
                'name'=>'Agent',
                'username' => 'agent',
                'email'=> 'agent@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'agent',
                'status' => 'active',
            ],
             
            [
                'name'=>'Agent2',
                'username' => 'agent2',
                'email'=> 'agent2@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'agent',
                'status' => 'active',
            ],
             
             
            
        ]);
    }
    
}
