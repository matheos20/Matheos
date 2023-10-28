<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $adminRole = Role::where('name', 'ADMIN')->first();
        $userRole = Role::where('name', 'user')->first();
    
        $admin = User::Create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('12345678'),
        ]);

        $user = User::Create([
            'name' => 'user',
            'email' => 'user@test.com',
            'password' => Hash::make('123456'),
        ]);

        $admin->roles()->attach($adminRole); 
        $user->roles()->attach($userRole);
    }
}
