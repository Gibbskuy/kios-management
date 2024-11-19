@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-900">Show User</h2>
        <a href="{{ route('users.index') }}" class="bg-blue-500 text-white px-5 py-2 rounded-md text-sm shadow-md hover:bg-blue-600 transition-colors duration-200">
            <i class="fa fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-8 max-w-3xl mx-auto">
        <div class="mb-6">
            <h3 class="text-xl font-semibold text-gray-800">Name:</h3>
            <p class="text-gray-900 mt-1">{{ $user->name }}</p>
        </div>

        <div class="mb-6">
            <h3 class="text-xl font-semibold text-gray-800">Email:</h3>
            <p class="text-gray-900 mt-1">{{ $user->email }}</p>
        </div>

        <div>
            <h3 class="text-xl font-semibold text-gray-800">Roles:</h3>
            @if(!empty($user->getRoleNames()))
                <div class="mt-2">
                    @foreach($user->getRoleNames() as $role)
                        <span class="inline-block bg-green-200 text-green-800 text-xs font-semibold px-3 py-1 rounded-full mb-2 mr-2">
                            {{ $role }}
                        </span>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">No roles assigned.</p>
            @endif
        </div>
    </div>
</div>
@endsection
