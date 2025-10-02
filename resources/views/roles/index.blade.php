@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Roles</h1>
        <a href="{{ route('roles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Add Role</a>
    </div>

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">#</th>
                <th class="p-2 border">Name</th>
                <th class="p-2 border">Description</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td class="border p-2">{{ $role->id }}</td>
                    <td class="border p-2">{{ $role->name }}</td>
                    <td class="border p-2">{{ $role->description }}</td>
                    <td class="border p-2 flex gap-2">
                        <a href="{{ route('roles.edit', $role) }}" class="bg-yellow-400 px-2 py-1 rounded">Edit</a>
                        <form method="POST" action="{{ route('roles.destroy', $role) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded"
                                onclick="return confirm('Delete this role?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
