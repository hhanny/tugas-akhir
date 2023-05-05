<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
        // DB::beginTransaction(); 
        // try {
            $superAdmin = User::create(array_merge([
                'email' => 'superAdmin@gmail.com',
                'username' => 'superAdmin',
            ], $default_user_value));
    
            $admin = User::create(array_merge([
                'email' => 'admin@gmail.com',
                'username' => 'admin',
            ], $default_user_value));
    
            $pegawai = User::create(array_merge([
                'email' => 'pegawai@gmail.com',
                'username' => 'pegawai',
            ], $default_user_value));
    
            $mahasiswa = User::create(array_merge([
                'email' => 'mahasiswa@gmail.com',
                'username' => 'mahasiswa',
            ], $default_user_value));
    
            $role_superAdmin = Role::updateOrCreate(['name' => 'superAdmin']);
            $role_admin = Role::updateOrCreate(['name' => 'admin']);
            $role_pegawai = Role::updateOrCreate(['name' => 'pegawai']);
            $role_mahasiswa = Role::updateOrCreate(['name' => 'mahasiswa']);
    
            $permission =  Permission::updateOrCreate(['name' => 'read role']);
            $permission =  Permission::updateOrCreate(['name' =>'create role']);
            $permission =  Permission::updateOrCreate(['name' =>'update role']);
            $permission =  Permission::updateOrCreate(['name' =>'delete role']);
    
            $superAdmin->assignRole('superAdmin');
            $admin->assignRole('admin');
            $pegawai->assignRole('pegawai');
            $mahasiswa->assignRole('mahasiswa');
            
        //     DB::commit();
        // } catch (\Throwable $th) {
        //     DB::rollBack();
        // }

        

    }
}
