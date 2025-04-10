@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-14 px-4">
        <div class="flex justify-center">
            <div class="w-full max-w-lg">
                <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
                    <!-- Header -->
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white px-8 py-6 text-center">
                        <h2 class="font-bold text-2xl tracking-wide">{{ __('Register') }}</h2>
                        <p class="text-sm text-blue-100 mt-1">Buat akun baru dan mulai menjelajah</p>
                    </div>

                    <!-- Form Body -->
                    <div class="p-8">
                        <form method="POST" action="{{ route('register') }}" novalidate>
                            @csrf

                            <!-- Name -->
                            <div class="mb-6">
                                <label for="name" class="block text-gray-700 text-sm font-medium mb-2">
                                    {{ __('Name') }}
                                </label>
                                <input id="name" type="text"
                                    class="w-full border @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg px-4 py-3 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:outline-none transition"
                                    name="name" value="{{ old('name') }}" required autofocus
                                    placeholder="Masukkan nama lengkap">
                                @error('name')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-6">
                                <label for="email" class="block text-gray-700 text-sm font-medium mb-2">
                                    {{ __('Email Address') }}
                                </label>
                                <input id="email" type="email"
                                    class="w-full border @error('email') border-red-500 @else border-gray-300 @enderror rounded-lg px-4 py-3 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:outline-none transition"
                                    name="email" value="{{ old('email') }}" required
                                    placeholder="Masukkan email">
                                @error('email')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-6">
                                <label for="password" class="block text-gray-700 text-sm font-medium mb-2">
                                    {{ __('Password') }}
                                </label>
                                <input id="password" type="password"
                                    class="w-full border @error('password') border-red-500 @else border-gray-300 @enderror rounded-lg px-4 py-3 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:outline-none transition"
                                    name="password" required
                                    placeholder="Masukkan password">
                                @error('password')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-8">
                                <label for="password-confirm" class="block text-gray-700 text-sm font-medium mb-2">
                                    {{ __('Confirm Password') }}
                                </label>
                                <input id="password-confirm" type="password"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:outline-none transition"
                                    name="password_confirmation" required
                                    placeholder="Konfirmasi password">
                            </div>

                            <!-- Submit -->
                            <div class="flex justify-center">
                                <button type="submit"
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white text-lg font-semibold py-3 rounded-lg shadow transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-400">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Footer -->
                    <div class="bg-gray-100 text-gray-600 text-sm text-center px-6 py-4">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-blue-600 hover:underline ml-1">Masuk di sini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
