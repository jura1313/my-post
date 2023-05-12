@extends('template4')


@section('content')

<div class="container">

@foreach ( $post as $post)
<div class="container border-bottom border-end rounded-bottom  shadow p-3 mb-5 bg-body rounded m-3" style="margin: 2px; width: 22%; float: left; padding: 2px;">
    <a href="view_post/{{ $post->slug }}">
        <h3>{{ $post->title }}</h3> </a>
        <p>by : <a href="/author/{{ $post->user->username }}">{{ $post->user->username }}</a> || kategori : <a href="/categories/{{ $post->category->slug }}">{{ $post->category->category }}</a></p>
        <p>{{ $post->excerpt }}</p>
        <hr class="dropdown-divider">

        <div class="btn-group" role="group" aria-label="Basic outlined example">
            <a href="/update/{{ $post->id }}"><button type="button" class="btn btn-outline-primary">Ubah</button></a>
            <a href="/delete_content/{{ $post->id }}"><button type="button" class="btn btn-outline-primary">Hapus</button></a>
            <a href=""><button type="button" class="btn btn-outline-primary">Left</button></a>
        </div>
</div>
@endforeach

</div>

{{-- <a href="{{ url("/create") }}"><button type="button" class="btn btn-primary">create</button></a> --}}
@endsection
