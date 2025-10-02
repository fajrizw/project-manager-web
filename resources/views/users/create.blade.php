@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Create User</h1>
<form action="{{ route('users.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label>Name</label>
        <input type="text" name="name" class="w-full border rounded p-2" required>
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="email" class="w-full border rounded p-2" required>
    </div>
    <div>
        <label>Password</label>
        <input type="password" name="password" class="w-full border rounded p-2" required>
    </div>
    <div>
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" class="w-full border rounded p-2" required>
    </div>
    <div>
        <label>Role</label>
        <select name="role_id" class="w-full border rounded p-2">
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
    <button class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>
@endsection
