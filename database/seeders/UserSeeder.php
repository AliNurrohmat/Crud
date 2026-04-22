<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //buat role: posisi di dalam sistem yang dimiliki oleh user
        $pustakawan = Role::create(['name' => 'pustakawan']);
        $mahasiswa = Role::create(['name' => 'mahasiswa']);

        //buat permission: apa yang bisa dilakukan oleh user
        $show = Permission::create(['name' => 'show book']);
        $create = Permission::create(['name' => 'create book']);
        $update = Permission::create(['name' => 'update book']);
        $delete = Permission::create(['name' => 'delete book']);

        //berikan permission ke role
        $mahasiswa->givePermissionTo($show);
        $pustakawan->givePermissionTo([$show, $create, $update, $delete]);

        // menambah data user memakai Model
        User::create([
            'npm' => 001,
            'username' => 'Pustakawan 1',
            'first_name' => 'Pustakawan',
            'last_name' => '1',
            'email' => 'pustakawan1@gmail.com',
            'password' => Hash::make('password123'),
        ])->assignRole($pustakawan);

        User::create([
            'npm' => 5520122,
            'username' => 'Mahasiswa 1',
            'first_name' => 'Mahasiswa',
            'last_name' => '1',
            'email' => 'mahasiswa1@gmail.com',
            'password' => Hash::make('password123'),
        ])->assignRole($mahasiswa);
    }
}
