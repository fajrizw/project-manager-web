@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto bg-white shadow p-6 rounded">
    <h2 class="text-xl font-bold mb-4">Projects</h2>

    <a href="{{ route('projects.create') }}"
       class="px-4 py-2 bg-blue-600 text-white rounded">+ New Project</a>

    <table class="w-full border mt-4">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">ID</th>
                <th class="p-2 border">Title</th>
                <th class="p-2 border">Owner</th>
                <th class="p-2 border">Start Date</th>
                <th class="p-2 border">End Date</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td class="p-2 border">{{ $project->id }}</td>
                    <td class="p-2 border">{{ $project->title }}</td>
                    <td class="p-2 border">{{ $project->owner->name ?? '-' }}</td>
                    <td class="p-2 border">{{ $project->start_date ?? '-' }}</td>
                    <td class="p-2 border">{{ $project->end_date ?? '-' }}</td>
                    <td class="p-2 border">
                        <a href="{{ route('projects.show', $project) }}" class="text-blue-600">View</a> |
                        <a href="{{ route('projects.edit', $project) }}" class="text-green-600">Edit</a> |
                        <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    onclick="return confirm('Delete this project?')"
                                    class="text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $projects->links() }}
    </div>
</div>
@endsection
