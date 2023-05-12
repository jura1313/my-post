@extends('template4')


@section('content')

<div class="container">

<h1>Post Category : {{ $title }}</h1>

 @foreach ( $post as $pos)

    <a href="{{ url("view_post/$pos->slug") }}">
        <h3>{{ $pos->title }}</h3> </a>
        <p>by : <a href="/author/{{ $pos->user->username }}">{{ $pos->user->username }}</a> || kategori : <a href="/categories/{{ $pos->category->slug }}">{{ $pos->category->category }}</a></p>
        <p>{{ $pos->excerpt }}</p>
        <hr class="dropdown-divider">

@endforeach
</div>






{{-- <a href="{{ url("/create") }}"><button type="button" class="btn btn-primary">create</button></a> --}}
@endsection
