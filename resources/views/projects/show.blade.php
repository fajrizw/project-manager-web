@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow p-6 rounded">
    <h2 class="text-xl font-bold mb-4">{{ $project->title }}</h2>

    <p><strong>Description:</strong> {{ $project->description ?? '-' }}</p>
    <p><strong>Owner:</strong> {{ $project->owner->name ?? '-' }}</p>
    <p><strong>Start Date:</strong> {{ $project->start_date ?? '-' }}</p>
    <p><strong>End Date:</strong> {{ $project->end_date ?? '-' }}</p>

    <div class="mt-4">
        <a href="{{ route('projects.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded">← Back</a>
    </div>
</div>
@endsection
