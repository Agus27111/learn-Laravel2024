@extends('template.layout')

@section('content')
<div class="container px-4 py-5">
    <h1>Create New Blog</h1>

    <form action="/blogs" method="POST">
        @csrf
        <!-- Title Field -->
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input
                name="title"
                type="text"
                class="form-control"
                id="exampleFormControlInput1"
                placeholder="Enter blog title">
        </div>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- Content Field -->
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Content</label>
            <textarea
                name="content"
                class="form-control"
                id="exampleFormControlTextarea1"
                rows="5"
                placeholder="Write your content here"></textarea>
        </div>
        @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Create Blog</button>
    </form>
</div>
@endsection
