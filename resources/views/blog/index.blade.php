

@extends('template.layout')

@section('content')
<div class="container px-4 py-5" id="featured-3">

 <!-- Tombol Create Blog -->
 <div class="mb-4 text-end">
        <a href="/blogs/create" class="btn btn-primary">
            Create Blog
        </a>
    </div>


    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
@foreach ($blogs as $blog)
      <div class="feature col">
        <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
          <svg class="bi" width="1em" height="1em"><use xlink:href="#collection"></use></svg>
        </div>
        <h3 class="fs-2 text-body-emphasis">{{$blog->title}} </h3>
        <p>{{ Str::limit($blog->content, 150) }}</p>
        <a href="/blogs/{{$blog->id}}" class="icon-link">
          Read
          <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
        </a>
      </div>
        @endforeach
    </div>
  </div>
@endsection
