<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>

    @yield('head')
</head>
    <body>
        <nav class="navbar bg-dark navbar-expand-sm navbar-dark shadow">
            <ul class="navbar-nav">
                {{-- If $page_name is home, set this item to be 'active' --}}
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/questions" class="nav-link">
                        Pertanyaan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/questions/create" class="nav-link">
                        Tanya
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                @if (Auth::check())
                    <a href="/logout" class="navbar-brand">
                        {{$user_name}}
                    </a>
                @else
                    <a href="/login" class="navbar-brand">Login</a>
                @endif
                </li>
            </ul>
        </nav>    

        @yield('content')
    </body>
</html>
