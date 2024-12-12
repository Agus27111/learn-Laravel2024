

@extends('template.layout')

@section('content')
<main class="container px-3">
    <h1>{{ $blog->title }}</h1>
    <p class="lead">{{ $blog->content }}</p>
    <p class="lead d-flex gap-2 align-items-center">
      <a href="/blogs/{{ $blog->id }}/edit" class="btn btn-primary">edit</a>
      <form action="/blogs/{{ $blog->id }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this blog?')">
            Remove
        </button>
    </form>
    </p>
  </main>
@endsection
