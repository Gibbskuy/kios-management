@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-semibold text-blue-700">Edit Role</h2>
        <a href="{{ route('roles.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
            <i class="fa fa-arrow-left"></i> Back
        </a>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-6 shadow-md">
            <strong class="font-semibold">Whoops!</strong> There were some problems with your input.<br><br>
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('roles.update', $role->id) }}">
        @csrf
        @method('PUT')

        <div class="bg-white shadow-lg rounded-lg p-8">
            <div class="mb-6">
                <label for="name" class="block text-gray-700 text-sm font-semibold mb-2">Role Name:</label>
                <input type="text" name="name" id="name" placeholder="Enter role name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ $role->name }}">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-semibold mb-2">Assign Permissions:</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($permission as $value)
                        <label class="inline-flex items-center space-x-3">
                            <input type="checkbox" name="permission[{{$value->id}}]" value="{{$value->id}}" class="form-checkbox h-4 w-4 text-blue-600" {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
                            <span class="text-gray-700">{{ $value->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-center mt-6">
                <button type="submit" class="bg-blue-500 text-white px-5 py-2 rounded-md text-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    <i c
