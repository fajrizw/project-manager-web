@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Role</h1>
<form action="{{ route('roles.update', $role) }}" method="POST" class="space-y-4">
    @csrf @method('PUT')
    <div>
        <label>Name</label>
        <input type="text" name="name" value="{{ $role->name }}" class="w-full border rounded p-2" required>
    </div>
    <div>
        <label>Description</label>
        <textarea name="description" class="w-full border rounded p-2">{{ $role->description }}</textarea>
    </div>
    <button class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection
