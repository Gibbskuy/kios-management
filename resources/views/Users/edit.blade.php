@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-900">Edit User</h2>
        <a href="{{ route('users.index') }}" class="bg-blue-500 text-white px-5 py-2 rounded-md text-sm shadow-md hover:bg-blue-600 transition-colors duration-200">
            <i class="fa fa-arrow-left"></i> Back
        </a>
    </div>

    @if (count($errors) > 0)
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-md mb-6">
            <strong>Whoops!</strong> There were some problems with your input.
            <ul class="list-disc list-inside mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="bg-white shadow-lg rounded-lg p-8 max-w-3xl mx-auto">
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                <input type="text" name="name" id="name" placeholder="Enter name" value="{{ old('name', $user->name) }}" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300 focus:border-blue-500">
            </div>

            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" name="email" id="email" placeholder="Enter email" value="{{ old('email', $user->email) }}" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300 focus:border-blue-500">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                <input type="password" name="password" id="password" placeholder="Leave empty to keep current password" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300 focus:border-blue-500">
            </div>

            <div class="mb-6">
                <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm Password:</label>
                <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm new password" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300 focus:border-blue-500">
            </div>

            <div class="mb-6">
                <label for="roles" class="block text-sm font-medium text-gray-700">Role:</label>
                <select name="roles[]" id="roles" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300 focus:border-blue-500" multiple>
                    @foreach ($roles as $value => $label)
                        <option value="{{ $value }}" {{ in_array($value, old('roles', $userRole)) ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-center mt-8">
                <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md text-sm shadow-md hover:bg-blue-600 focus:outline-none transition-colors duration-200">
                    <i class="fa-solid fa-floppy-disk"></i> Update User
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
