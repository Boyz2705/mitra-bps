<!-- resources/views/admin/useredit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit User</h1>

        <!-- Tampilkan status sukses -->
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <!-- Form edit user -->
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password (Opsional)</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <input type="text" name="role" id="role" class="form-control" value="{{ $user->role }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Perbarui User</button>
        </form>
    </div>
@endsection
