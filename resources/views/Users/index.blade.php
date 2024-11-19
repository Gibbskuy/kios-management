@extends('layouts.app')

@section('content')
<div class="container mt-10">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-900">Users Management</h2>
        <a href="{{ route('users.create') }}" class="bg-green-500 text-white px-5 py-2 rounded-md text-sm shadow-md hover:bg-green-600 transition-colors duration-200">
            <i class="fa fa-plus"></i> Create New User
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white border border-gray-300 rounded-lg shadow-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Roles</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase" width="280px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $user)
                    <tr class="hover:bg-gray-100 transition-colors duration-200">
                        <td class="px-6 py-4 border-b border-gray-200 text-sm text-gray-700">{{ ++$i }}</td>
                        <td class="px-6 py-4 border-b border-gray-200 text-sm text-gray-700">{{ $user->name }}</td>
                        <td class="px-6 py-4 border-b border-gray-200 text-sm text-gray-700">{{ $user->email }}</td>
                        <td class="px-6 py-4 border-b border-gray-200">
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <span class="inline-block bg-green-200 text-green-800 text-xs font-semibold px-2 py-1 rounded-full">{{ $v }}</span>
                                @endforeach
                            @endif
                        </td>
                        <td class="px-6 py-4 border-b border-gray-200 flex space-x-2">
                            <a href="{{ route('users.show', $user->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded-md text-sm hover:bg-blue-600 transition-colors duration-200">
                                <i class="fa-solid fa-list"></i> Show
                            </a>
                            <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-md text-sm hover:bg-yellow-600 transition-colors duration-200">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                            <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md text-sm hover:bg-red-600 transition-colors duration-200">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {!! $data->links('pagination::tailwind') !!}
    </div>
</div>
@endsection
