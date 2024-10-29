@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-md p-6 bg-indigo-300 rounded-lg shadow-lg">
        <div class="justify-between">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Ganti Password</h2>
        </div>
    @if (session('status'))
        <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Password Lama</label>
            <input type="password" name="current_password" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('current_password')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Password Baru</label>
            <input type="password" name="password" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('password')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 rounded-lg ">
            Update Password
        </button>
    </form>
</div>
@endsection
