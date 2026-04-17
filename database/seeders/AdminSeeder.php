<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminRole=Role::firstOrCreate([
            'name'=>'Super Admin',
            'guard_name'=>'web',
        ]);
        $adminRole=Role::firstOrCreate([
            'name'=>'admin',
            'guard_name'=>'web',
        ]);

        $superAdmin=User::firstOrCreate([
            'name'=>"super admin",
            'email'=>'superadmin@gmail.com',
            'password'=>Hash::make('superadmin123')
        ]);

        $superAdmin->assignRole($superAdminRole);

    }
}
