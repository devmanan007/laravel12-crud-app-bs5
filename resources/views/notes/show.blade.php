@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>View Note</h4>
        </div>

        <div class="card-body">

            <div class="mb-3">
                <label class="fw-bold">Title:</label>
                <p class="form-control">{{ $note->title }}</p>
            </div>

            <div class="mb-3">
                <label class="fw-bold">Content:</label>
                <div class="form-control" style="min-height:150px;">
                    {{ $note->content }}
                </div>
            </div>

            <a href="{{ route('notes.index') }}" class="btn btn-secondary">
                ← Back
            </a>

            <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-warning">
                Edit
            </a>

        </div>
    </div>

</div>
@endsection
