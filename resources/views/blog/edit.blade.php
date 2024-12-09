

@extends('template.layout')

@section('content')
<main class="container px-3">
    <h1>Edit Blogs</h1>

    <form action="/blogs/{{$blog->id}}" method="POST">
        @method('PUT')
        @csrf
        <!-- Title Field -->
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input
                name="title"
                type="text"
                class="form-control"
                id="exampleFormControlInput1"
                placeholder="Title"
                value="{{$blog->title}}">
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
                placeholder="Write your content here">{{$blog->content}}</textarea>
        </div>
        @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Blog</button>
    </form>
</main>
@endsection

@endsection
