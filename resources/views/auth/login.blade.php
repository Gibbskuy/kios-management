@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 via-white to-gray-200 py-12 px-4">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-2xl rounded-3xl overflow-hidden">
            {{-- Header --}}
            <div class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white px-8 py-8 text-center">
                <h2 class="text-2xl font-bold tracking-wide">{{ __('Login') }}</h2>
                <p class="text-sm text-white/80 mt-2">Welcome back! Please sign in to your account</p>
            </div>

            {{-- Form --}}
            <div class="px-8 py-10 space-y-8">
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            {{ __('Email Address') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M21.75 7.5l-9.75 6-9.75-6m19.5 0v9a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 16.5v-9m19.5 0L12 13.5 2.25 7.5" />
                                </svg>
                            </div>
                            <input id="email" type="email" name="email"
                                value="{{ old('email') }}"
                                class="w-full pl-10 pr-4 py-3 border rounded-lg shadow-sm text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none @error('email') border-red-500 @enderror"
                                placeholder="you@example.com" required autofocus autocomplete="email">
                        </div>
                        @error('email')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                            {{ __('Password') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 15v2m-6 0v-6a6 6 0 1112 0v6m-6 0h.01" />
                                </svg>
                            </div>
                            <input id="password" type="password" name="password"
                                class="w-full pl-10 pr-4 py-3 border rounded-lg shadow-sm text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none @error('password') border-red-500 @enderror"
                                placeholder="••••••••" required autocomplete="current-password">
                        </div>
                        @error('password')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Remember Me & Forgot Password --}}
                    <div class="flex items-center justify-between pt-2">
                        <label class="inline-flex items-center text-sm text-gray-700">
                            <input type="checkbox" name="remember" class="form-checkbox h-4 w-4 text-indigo-600 rounded">
                            <span class="ml-2 font-medium">{{ __('Remember Me') }}</span>
                        </label>
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">
                            {{ __('Forgot Password?') }}
                        </a>
                    </div>

                    {{-- Submit Button --}}
                    <div class="pt-4">
                        <button type="submit"
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                            {{ __('Login') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
