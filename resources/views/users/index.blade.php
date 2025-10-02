@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Users</h1>
    <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Add User</a>
</div>

<table class="w-full border bg-white rounded shadow">
    <thead>
        <tr class="bg-gray-100">
            <th class="p-2 border">#</th>
            <th class="p-2 border">Name</th>
            <th class="p-2 border">Email</th>
            <th class="p-2 border">Role</th>
            <th class="p-2 border">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td class="border p-2">{{ $user->id }}</td>
                <td class="border p-2">{{ $user->name }}</td>
                <td class="border p-2">{{ $user->email }}</td>
                <td class="border p-2">{{ $user->role?->name }}</td>
                <td class="border p-2 flex gap-2">
                    <a href="{{ route('users.edit', $user) }}" class="bg-yellow-400 px-2 py-1 rounded">Edit</a>
                    <form method="POST" action="{{ route('users.destroy', $user) }}">
                        @csrf @method('DELETE')
                        <button class="bg-red-500 text-white px-2 py-1 rounded"
                            onclick="return confirm('Delete this user?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
