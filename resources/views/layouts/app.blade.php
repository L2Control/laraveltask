<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Quickstart - Basic</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }
        .fa-btn {
            margin-right: 6px;
        }
        .no-border{
            border: none;
        }
        .con-nav{
            display: flex;
            justify-content: space-between;
        }
        ul {
            list-style-type: none;
        }
        .nav-item{
            margin-left: 20px;
        }
        a:hover{
            text-decoration: none;
        }
        .container-fluid{
            max-width: 500px;
        }
        .inputError{
            border-color: red;
        }
        button.nav-link{
            border: none;
            background: none;
            
        }
        button.nav-link:hover{
            color: black;
        }
        
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container con-nav">
            <div class="navbar-header">

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Task List
                </a>
                
            </div>
            <div class="navbar-text">
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item">
                        <button disabled class="nav-link">{{auth()->user()->username}}</button>
                    </li>
                    <li class="nav-item">
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button class="nav-link">Logout</button>
                        </form>
                      
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" {{ route('register') }} ">Register</a>
                    </li>

                @endguest
            </ul>
            </div>

        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
   
</body>
</html>