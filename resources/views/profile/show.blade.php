@extends('layouts.app')

@section('title', 'Profil Pengguna')

@section('content')
    <h1>Profil Pengguna</h1>

    <table>
        <tr>
            <th>Nama</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Role</th>
            <td>{{ ucfirst($user->role) }}</td>
        </tr>
    </table>

    <h2>Ganti Password</h2>

    <form action="{{ route('profile.password.change') }}" method="POST">
        @csrf

        <label for="current_password">Password Lama</label>
        <input type="password" name="current_password" id="current_password">
        @error('current_password')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="new_password">Password Baru</label>
        <input type="password" name="new_password" id="new_password">
        @error('new_password')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="new_password_confirmation">Konfirmasi Password Baru</label>
        <input type="password" name="new_password_confirmation" id="new_password_confirmation">

        <button type="submit" class="btn">Simpan Password</button>
    </form>
@endsection
