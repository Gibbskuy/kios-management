@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold text-gray-900">Role Management</h2>
    @can('produk-create')
        <a href="{{ route('roles.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md text-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
            <i class="fa fa-plus"></i> Create New Role
        </a>
    @endcan
</div>

@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4 shadow-md">
        {{ session('success') }}
    </div>
@endif

<div class="overflow-x-auto bg-white rounded-lg shadow-md">
    <table class="min-w-full table-auto">
        <thead>
            <tr>
                <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">No</th>
                <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $key => $role)
                <tr class="hover:bg-gray-100">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ ++$i }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $role->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('roles.show', $role->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded-md text-xs font-medium hover:bg-blue-600 transition duration-200">
                                <i class="fa-solid fa-list"></i> Show
                            </a>
                            <a href="{{ route('roles.edit', $role->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-md text-xs font-medium hover:bg-yellow-600 transition duration-200">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                            <form method="POST" action="{{ route('roles.destroy', $role->id) }}" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md text-xs font-medium hover:bg-red-600 transition duration-200" onclick="return confirm('Are you sure you want to delete this role?')">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-6">
    {!! $roles->links('pagination::tailwind') !!}
</div>

</div>
@endsection
