@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Upload File</h1>
<form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    <div>
        <label>Task ID</label>
        <input type="number" name="task_id" class="w-full border rounded p-2" required>
    </div>
    <div>
        <label>File</label>
        <input type="file" name="file" class="w-full border rounded p-2" required>
    </div>
    <button class="bg-blue-500 text-white px-4 py-2 rounded">Upload</button>
</form>
@endsection
