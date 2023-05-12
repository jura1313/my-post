@extends('template4')


@section('content')

<div class="container">

@foreach ( $post as $pos)
<div class="container">
<h3>{{ $pos->fullname }} {{ $pos->id }}</h3>

    {{-- @if( $pos->user_id  ==  $pos->user->id ) --}}
        {{-- {{ $pos->user->id }} --}}
    {{-- @endif --}}

    @foreach ($pos->content as $pot)
        <p><a href="view_post/{{ $pot->slug }}" style="text-decoration: none;">{{ $pot->title }}</a></p>
    @endforeach

</div>
@endforeach
</div>



{{-- <a href="{{ url("/create") }}"><button type="button" class="btn btn-primary">create</button></a> --}}
@endsection
