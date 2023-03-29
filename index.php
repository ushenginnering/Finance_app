<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Meta -->
	<link rel="shortcut icon" href="user/img/fav.png" />

	<!-- Title -->
	<title>Stoutgies international | User Login</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="user/css/bootstrap.min.css" />

	<!-- Main CSS -->
	<link rel="stylesheet" href="user/css/main.css" />

</head>

<body class="authentication">

	<!-- Container start -->
	<div class="container">

		<form action="" id="login-form">
			<div class="row justify-content-md-center">
				<div class="col-xl-6 col-lg-5 col-md-6 col-sm-12">
					<div class="login-screen">
						<div class="__notification alert"></div>
						<div class="login-box">
							<center>
								<img src="img/logo-dark.png" alt="" width="200" class="m-3" />
								<h5>Welcome back, Please Login to your Account.</h5>
							</center>

							<div class="form-group">
								<input type="text" class="form-control" placeholder="Email Address" id="email-address"/>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" placeholder="Password" id="password"/>
							</div>
							<div class="custom-control custom-switch mb-3">
								<input type="checkbox" class="custom-control-input" id="customSwitch1">
								<label class="custom-control-label" for="customSwitch1">Remember me</label> |
								<a class="link" href="./user/forgot-pwd.php">Forgot password?</a>

							</div>
							<!-- <button type="submit" class="btn btn-primary">Login here</button> -->
							<input type="submit" class="btn btn-dark" value="Login here" id="login-btn"/>
							<hr>
							<div class="actions align-left">
								<span class="additional-link">New here?</span>
								<a href="user/signup.php" class="btn btn-dark">Create an Account</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>

	</div>
	<!-- Container end -->

</body>
<script src="//code.tidio.co/t6hgilkrcdxropb6neap8rsn9gq6hhbz.js" async></script>
<script src="user/js/jquery.min.js"></script>
<script src="user/js/custom/functions.js"></script>
<script src="user/js/custom/login.js"></script>
</html>