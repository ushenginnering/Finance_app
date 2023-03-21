<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Meta -->
    <!-- Title -->
    <title> Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Master CSS -->
    <link rel="stylesheet" href="css/main.css" />
</head>

<body class="authentication">
    <!-- Container start -->
    <div class="container">
        <form action="#" id="login_form">
            <div class="row justify-content-md-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="__notification alert"></div>
                    <div class="login-screen">
                        <div class="login-box">
                            <a href="#" class="login-logo">
                                <img src="img/logo-dark.png" alt="#ADMIN" />
                            </a>
                            <h5>Welcome back Admin,<br />Please Login to your Account.</h5>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email Address" id="email-address"/>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" id="password"/>
                            </div>
                            <div class="actions mb-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="remember_pwd">
                                    <label class="custom-control-label" for="remember_pwd">Remember me</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Login here</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Container end -->

    <script src= "./js/jquery.min.js"></script>
    <script src= "./js/custom/functions.js"></script>
    <script src= "./js/custom/login.js"></script>
    <script>
    </script>
</body>

</html>