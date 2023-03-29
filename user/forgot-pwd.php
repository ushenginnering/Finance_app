<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Meta -->
	<meta name="description"
		content="Stogies International was founded with the goal to address any gaps in the value chain for any project management activity, in both oil and gas and non-oil and gas sector projects Our interest cut across oil and gas, medical, and construction services. The Directors and managers are qualified in Project Management, Engineering and, Consulting, Financial and Marketing Management, which allow us to Manage all facets of a project.">
	<meta name="author" content="">
	<link rel="shortcut icon" href="img/fav.png" />

	<!-- Title -->
	<title>Stogies International| User forget Password</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Main CSS -->
	<link rel="stylesheet" href="css/main.css" />

</head>

<body class="authentication">

	<!-- Container start -->
	<div class="container">

		<form action="">
			<div class="row justify-content-md-center">
				<div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
					<div class="login-screen">
                    <div class="__notification alert" role="alert"></div>
						<form action="">

						</form>
						<div class="login-box new-pas-show">
							<center>
								<img src="img/logo-dark.png" alt="" width="200"  class="m-3"/>
							</center>
						   <form action="" id="forgot-pass">
							<h5>In order to access your dashboard, please enter the email id you provided during the
								registration process.</h5>
							<div class="form-group">
								<input type="email" class="form-control email" placeholder="Enter Email Address" />
							</div>
							<div class="actions">
							<a href="../index.php">Login</a>
								<input type="submit" class="btn btn-dark forgot-pass-btn" value="Validate Email" />
							</div>
							</form>
						</div>
						<div class="login-box new-pas-hide" style="display:none">
								<center>
									<img src="img/logo-dark.png" alt="" width="200"  class="m-3"/>
							   </center>
							   <form action="" id="new-pas">
	
								   <h5>In order to access your dashboard, please create a new password.</h5>
								   <div class="form-group">
									   <label>Enter OTP</label>
									   <input type="number" class="form-control OTP" placeholder="" />
								   </div>
								   <div class="form-group">
									   <label>New Password</label>
									   <input type="text" class="form-control new-password" placeholder="" />
								   </div>
								   <div class="form-group">    
									   <label>Confirm Password</label>
									   <input type="text" class="form-control confirm-password" placeholder="" />
								   </div>
								   <div class="actions">
									<a href="../index.php">Login</a>
									   <input type="submit" class="btn btn-dark new-pas-btn" value="Reset Password" />
								   </div>
							   </form>
							</div>
					</div>
					</div>
			</div>
		</form>

	</div>
	<!-- Container end -->
	<script src="./js/jquery.min.js"></script>
<script src="./js/custom/functions.js"></script>
<script src="./js/custom/forgot-pas.js"></script>

</body>
</html>