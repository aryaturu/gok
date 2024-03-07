<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            background-image: url('/images/kk.avif'); /* Ganti 'background-image.jpg' dengan URL gambar yang ingin Anda gunakan */
            background-size: cover;
            background-repeat: no-repeat;
        }

        .navbar div{
            background-color: #00f7ff; /* Warna Navbar */
            border-radius: 0;
        }

        .navbar-brand,
        .navbar-nav li a {
            color: #000000 !important; /* Warna teks Navbar */
        }

        .navbar-toggle {
            background-color: #337ab7; /* Warna icon toggle */
        }

        .navbar-toggle .icon-bar {
            background-color: #ffffff; /* Warna icon toggle */
        }

        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 20px;
            background-color: rgb(255, 255, 255);
        }
        
        th {
            background-color: #ffffff
        }

        tr {
            background-color: #ffffff;
        }


        .dropdown-menu {
            background-color: #337ab7; /* Warna dropdown */
        }

        .dropdown-menu a {
            color: #ffffff !important; /* Warna teks dropdown */
        }

        .dropdown-menu a:hover {        
            background-color: #135995; /* Warna hover dropdown */
        }

        .container {
            margin-top: 20px;
        }

        .container-fluid {
            padding-right: 0;
            padding-left: 0;
        }

        .navbar-collapse {
            padding-right: 15px;
            padding-left: 15px;
        }

        .navbar-right li {
            margin-left: 10px;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Classroom</title>
    <!-- Favicons -->
    <link href="/images/ss.png" rel="icon">
    <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">  
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobiledisplay -->

                    <div class="navbar-header">
                        <button type="button" class="navbar-togglecollapsed" data-toggle="collapse" data-
                            target="#bs-example-navbar-collapse-1" aria-expanded="false">

                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span> <span class="icon-bar"></span>

                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ route('dashboard') }}">G-Clasroom</a>

                    </div>
                    <!-- Collect the nav links, forms, and other contentfor toggling -->

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-left">
                            @if (Auth::user()->role == 'admin')
                                <li class="nav-item"><a class="nav-link" href="/user">User</a></li>
                            @endif
                            <li class="nav-item"><a class="nav-link" href="/soal">Task</a></li>

                            <li class="nav-item"><a class="nav-link"href="/nilai">Mark</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-
                                    haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>
                                    {{ Auth::user()->email }}

                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a>Level: {{ Auth::user()->role }}</a>

                                    </li>
                                    <li role="separator" class="divider"></li>

                                    <li><a href="{{ route('actionlogout') }}"><i class="fa fa-power-off"></i> Log Out</a></li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
            @yield('konten')
        </div>
    </div>
    </div>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</html>