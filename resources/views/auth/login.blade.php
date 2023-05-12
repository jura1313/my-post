@extends('template4')


@section('content')

<div class="container" style="width: 70%">

    <form method="POST" action="{{ url("/login") }}">
        @csrf


        <div class="input-group mb-3">
            <input type="text" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon2" required>
        </div>

        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
        </div>

      <button type="submit" class="btn btn-primary">Login</button>

    </form>

</div>

@endsection
