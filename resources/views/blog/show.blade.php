

@extends('template.layout')

@section('content')
<main class="container px-3">
    <h1>{{ $blog->title }}</h1>
    <p class="lead">{{ $blog->content }}</p>
    <p class="lead">
      <a href="/blogs/{{ $blog->id }}/edit" class="btn btn-lg btn-light fw-bold border-white bg-white">edit</a>
    </p>
  </main>
@endsection
