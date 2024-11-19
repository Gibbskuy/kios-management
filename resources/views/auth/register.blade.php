@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10">
        <div class="flex justify-center">
            <div class="w-full max-w-md">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-4 text-center">
                        <h4 class="font-semibold text-xl">{{ __('Register') }}</h4>
                    </div>

                    <div class="p-8">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-5">
                                <label for="name" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('Name') }}</label>
                                <div class="relative">
                                    <input id="name" type="text"
                                        class="shadow appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Masukkan nama lengkap">
                                    @error('name')
                                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-5">
                                <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('Email Address') }}</label>
                                <div class="relative">
                                    <input id="email" type="email"
                                        class="shadow appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="Masukkan email">
                                    @error('email')
                                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-5">
                                <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('Password') }}</label>
                                <div class="relative">
                                    <input id="password" type="password"
                                        class="shadow appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror"
                                        name="password" required autocomplete="new-password" placeholder="Masukkan password">
                                    @error('password')
                                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-6">
                                <label for="password-confirm" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('Confirm Password') }}</label>
                                <div class="relative">
                                    <input id="password-confirm" type="password"
                                        class="shadow appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Konfirmasi password">
                                </div>
                            </div>

                            <div class="flex items-center justify-center">
                                <button type="submit"
                                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-4 rounded-lg transition duration-200 ease-in-out focus:outline-none focus:shadow-outline">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
