@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h3>Notes List</h3>
        <a href="{{ route('notes.create') }}" class="btn btn-primary">+ Create Note</a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th width="180">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($notes as $key => $note)
                        <tr>
                            <td>{{ $notes->firstItem() + $key }}</td>
                            <td>{{ $note->title }}</td>
                            <td>{{ Str::limit($note->content, 50) }}</td>
                            <td>
                                <a href="{{ route('notes.show', $note->id) }}" class="btn btn-primary btn-sm">Show</a>
                                <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('notes.destroy', $note->id) }}"
                                      method="POST"
                                      style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No notes found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="d-flex justify-content-end mt-3">
                {{ $notes->links() }}
            </div>

        </div>
    </div>
</div>
@endsection
