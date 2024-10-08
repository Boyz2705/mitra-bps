<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Menampilkan semua user
        return view('admin.user', [
            'users' => User::all()
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string',
        ]);

        // Menyimpan user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect('/admin/user')->with('status', 'User berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|string',
        ]);

        // Mengupdate user
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->role = $request->role;
        $user->save();

        return redirect('/admin/user')->with('status', 'User berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Menghapus user
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/admin/user')->with('statusdel', 'User berhasil dihapus');
    }

    public function edit($id)
    {
        // Mengedit user
        $user = User::findOrFail($id);
        return view('admin.useredit', ['user' => $user]);
    }
}
