@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Create Post</h4>

            </div>
            <div>
                @session('success')
                    <div class="alert alert-success mt-2">
                        {{ session('success') }}
                    </div>
                @endsession
            </div>
            <div class="card-body">
                <form action="{{ route('notes.store') }}" method="POST">
                    @csrf
                    <!-- Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input
                            type="text"
                            class="form-control @error('title') is-invalid @enderror"
                            id="title"
                            name="title"
                            placeholder="Enter title"
                            value="{{old('title')}}"
                            required>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div>

                    <!-- Content -->
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea
                            class="form-control @error('content') is-invalid @enderror"
                            id="content"
                            name="content"
                            rows="5"
                            placeholder="Enter content"
                            required>{{old('content')}}</textarea>
                            @error('content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div>

                    <!-- Submit -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">
                            Submit
                        </button>
                    </div>

                </form>
            </div>

        </div>

    </div>
</div>
