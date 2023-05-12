<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="shortcut icon" href="img/image2vector.svg" type="image/svg+xml">

    <title>Coba</title>
</head>
<body>



<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/home') }}">Home</a>
        </li>

        @auth
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('/category') }}">Category</a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dashboard
            </a>
            <ul class="dropdown-menu p-3 bg-dark">
                <li class="w-100">
                    <a href="{{ url('/my_post') }}" class="nav-link px-0"> <span class="d-none d-sm-inline">My Post</span></a>
                </li>
                <li class="w-100">
                    <a href="{{ url('/create') }}" class="nav-link px-0"> <span class="d-none d-sm-inline">Post</span></a>
                </li>
                @if(Auth::user()->role == 'admin')
                <li class="w-100">
                    <a href="{{ url('/all_post') }}" class="nav-link px-0"> <span class="d-none d-sm-inline">Users Posts</span></a>
                </li>
                <li>
                    <a href="{{ url('/users') }}" class="nav-link px-0"> <span class="d-none d-sm-inline">Users</span></a>
                </li>
                @endif

            </ul>
          </li>

        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('/logout') }}">Logout</a>
        </li>
        @endauth

@guest
<li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{ url('/register') }}">Register</a>
</li>
<li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{ url('/login') }}">Login</a>
</li>
@endguest

    </div>
  </div>
</nav>

            <div class="col py-3">

                @if (session('status_create'))
                <div class="alert alert-success">
                    {{ session('status_create') }}
                </div>
                @elseif(session('status_update'))
                    <div class="alert alert-primary">
                        {{ session('status_update') }}
                    </div>
                @elseif(session('status_delete'))
                    <div class="alert alert-danger">
                        {{ session('status_delete') }}
                    </div>
                @endif

                @yield('content')

            </div>
        </div>
    </div>


    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>

</body>
</html>
