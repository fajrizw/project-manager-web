@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Files</h1>
    <a href="{{ route('files.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Upload File</a>
</div>

<table class="w-full border bg-white rounded shadow">
    <thead>
        <tr class="bg-gray-100">
            <th class="p-2 border">#</th>
            <th class="p-2 border">Task ID</th>
            <th class="p-2 border">Path</th>
            <th class="p-2 border">Type</th>
            <th class="p-2 border">Uploader</th>
            <th class="p-2 border">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($files as $file)
            <tr>
                <td class="border p-2">{{ $file->id }}</td>
                <td class="border p-2">{{ $file->task_id }}</td>
                <td class="border p-2">
                    <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank" class="text-blue-500 underline">
                        {{ $file->file_path }}
                    </a>
                </td>
                <td class="border p-2">{{ $file->file_type }}</td>
                <td class="border p-2">{{ $file->uploader?->name }}</td>
                <td class="border p-2">
                    <form method="POST" action="{{ route('files.destroy', $file) }}">
                        @csrf @method('DELETE')
                        <button class="bg-red-500 text-white px-2 py-1 rounded"
                            onclick="return confirm('Delete this file?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
