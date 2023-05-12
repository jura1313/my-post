@extends('template4')


@section('content')

<div class="container" style="width: 70%">

    <form method="POST" action="{{ url("/register") }}">
        @csrf

        <div class="input-group mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <input type="text" name="fullname" class="form-control" placeholder="Your Full Name" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <input type="text" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon2">
        </div>

        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Password Again" aria-label="Password" aria-describedby="basic-addon1">
        </div>

        <input type="hidden" name="role" value="user">

      <button type="submit" class="btn btn-primary">Register</button>

    </form>

</div>

@endsection
