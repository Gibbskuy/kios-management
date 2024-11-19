@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-blue-700">Role Details</h2>
        <a href="{{ route('roles.index') }}" class="flex items-center bg-gradient-to-r from-blue-500 to-blue-600 text-white px-5 py-2 rounded-lg text-sm shadow-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300">
            <i class="fa fa-arrow-left mr-2"></i> Back
        </a>
    </div>

    <div class="bg-gradient-to-b from-white to-gray-50 shadow-2xl rounded-lg p-10 max-w-3xl mx-auto border-t-4 border-blue-500">
        <div class="mb-8">
            <h3 class="text-xl font-semibold text-gray-800">Role Name:</h3>
            <p class="text-2xl font-bold text-gray-900 mt-2">{{ $role->name }}</p>
        </div>

        <div class="mb-8">
            <h3 class="text-xl font-semibold text-gray-800">Permissions:</h3>
            @if(!empty($rolePermissions))
                <div class="flex flex-wrap gap-3 mt-4">
                    @foreach($rolePermissions as $v)
                        <span class="inline-block bg-gradient-to-r from-green-400 to-green-600 text-white text-xs font-semibold px-4 py-2 rounded-full shadow-lg">
                            {{ $v->name }}
                        </span>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 mt-4 italic">No permissions assigned to this role.</p>
            @endif
        </div>
    </div>
</div>
@endsection
