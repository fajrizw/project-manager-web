{{-- resources/views/files/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow rounded-lg p-6">
    <h2 class="text-xl font-bold mb-4">Edit File</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('files.update', $file->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Task --}}
        <div class="mb-4">
            <label for="task_id" class="block text-sm font-medium text-gray-700">Task</label>
            <select name="task_id" id="task_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @foreach(\App\Models\Task::all() as $task)
                    <option value="{{ $task->id }}" {{ $file->task_id == $task->id ? 'selected' : '' }}>
                        {{ $task->title }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- File --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Current File</label>
            <p class="text-sm text-gray-600 mb-2">
                <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank" class="text-blue-500 underline">
                    {{ basename($file->file_path) }}
                </a>
                ({{ $file->file_type }})
            </p>

            <label for="file" class="block text-sm font-medium text-gray-700">Upload New File (Optional)</label>
            <input type="file" name="file" id="file" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="flex justify-end">
            <a href="{{ route('files.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded mr-2">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
        </div>
    </form>
</div>
@endsection
