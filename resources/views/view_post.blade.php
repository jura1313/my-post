@extends('template4')



@section('content')




<div class="container">

        <h2>{{ $post->title }}</h2>
        <h6>Oleh : {{ $post->user->fullname }}</h6>
        <h6>Kategori : {{ $post->category->category }}</h6>

        <br><br>
        {{-- <p style="text-align: justify;">{{ $post->content }}</p> --}}
        {!! $post->content !!}



</div>

@endsection

