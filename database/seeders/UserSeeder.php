<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menghapus semua pengguna yang ada
        User::truncate();

        // Membuat pengguna baru
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'), // Ganti dengan password yang aman
            'role' => 'admin', // Pastikan ada kolom 'role' di tabel users
        ]);

        User::create([
            'name' => 'Regular User',
            'email' => 'user@user.com',
            'password' => Hash::make('user123'),
            'role' => 'pegawai',
        ]);

        // Anda bisa menambahkan lebih banyak pengguna sesuai kebutuhan
    }
}
