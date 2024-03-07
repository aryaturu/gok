<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Register User</title>

     <!-- Favicons -->
	 <link href="images/ss.png" rel="icon">
	 <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

    <!-- Custom CSS -->
    <style>



        .form-control {
            width: 100%;
            height: 25px;
            border-radius: 25px;
            padding: 0 20px;
            font-size: 16px;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease;
        }

        h2{
            color: #000000
        }


        .login-link {
            color: #51ff00333;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .login-link:hover {
            color: #00ff3c;
        }

        .alert-success {
            color: #000000;
            background-color: #00ff3c;
            border-color: #00ff3c;
        }
    </style>
</head>

<body style="background-image: url('/images/ph.jpg'); background-size: cover; background-position: center;>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
      <br><br><br><br><br><br><br><br><br>
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2>FORM REGISTER USER</h2>
                    <hr>
                    @if(session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    <form action="{{ route('actionregister') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label><i class="fa fa-envelope"></i> Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" required="">
                        </div>
                        <div class="form-group">
                            <label><i class="fa fa-user"></i> Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" required="">
                        </div>
                        <div class="form-group">
                            <label><i class="fa fa-key"></i> Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required="">
                        </div>
                        <div class="form-group">
                            <label><i class="fa fa-address-book"></i> Role</label>
                            <select name="role" class="form-control">
                                <option value="siswa">siswa</option>
                                <option value="admin">admin</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn--pill btn--green"><i class="fa fa-user"></i> Register</button>
                        <hr>
                        <p>Sudah punya akun? Silahkan <a href="/" class="login-link">Login Disini!</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->