<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

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
        DB::beginTransaction(); 
        try {
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
    
            $role_superAdmin = Role::create(['name' => 'superAdmin']);
            $role_admin = Role::create(['name' => 'admin']);
            $role_pegawai = Role::create(['name' => 'pegawai']);
            $role_mahasiswa = Role::create(['name' => 'mahasiswa']);
    
            $permission =  Permission::create(['name' => 'read role']);
            $permission =  Permission::create(['name' =>'create role']);
            $permission =  Permission::create(['name' =>'update role']);
            $permission =  Permission::create(['name' =>'delete role']);
    
            $superAdmin->assignRole('superAdmin');
            $admin->assignRole('admin');
            $pegawai->assignRole('pegawai');
            $mahasiswa->assignRole('mahasiswa');
            
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }

        

    }
}
