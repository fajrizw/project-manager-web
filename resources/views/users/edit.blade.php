@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit User</h1>
<form action="{{ route('users.update', $user) }}" method="POST" class="space-y-4">
    @csrf @method('PUT')
    <div>
        <label>Name</label>
        <input type="text" name="name" value="{{ $user->name }}" class="w-full border rounded p-2" required>
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ $user->email }}" class="w-full border rounded p-2" required>
    </div>
    <div>
        <label>Password (leave blank if not changing)</label>
        <input type="password" name="password" class="w-full border rounded p-2">
    </div>
    <div>
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" class="w-full border rounded p-2">
    </div>
    <div>
        <label>Role</label>
        <select name="role_id" class="w-full border rounded p-2">
            @foreach($roles as $role)
                <option value="{{ $role->id }}" @if($user->role_id == $role->id) selected @endif>
                    {{ $role->name }}
                </option>
            @endforeach
        </select>
    </div>
    <button class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection
