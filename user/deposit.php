<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Meta -->
	<meta name="author" content="">
	<link rel="shortcut icon" href="img/fav.png" />

	<!-- Title -->
	<title>User Dashboard || Deposit</title>
	<!-- Bootstrap css -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Icomoon Font Icons css -->
	<link rel="stylesheet" href="fonts/style.css">
	<!-- Main css -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="vendor/lobipanel/css/lobipanel.css" />
</head>

<body>

	<!-- Loading starts -->
	<div id="loading-wrapper">
		<div class="spinner-border" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
	<!-- Loading ends -->


	<!-- Page wrapper start -->
	<div class="page-wrapper">

	<?php include 'control/nav.php';?>

		<!-- Page content start  -->
		<div class="page-content">

		

			<!-- Page header start -->
			<div class="page-header">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">Home</li>
					<li class="breadcrumb-item active">Deposit Section</li>
				</ol>
			</div>
			<!-- Page header end -->

			<!-- Main container start -->
			<div class="main-container">


				<div class="spacer"></div>
				<!-- Row start -->
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card lobipanel-close">
							<div class="card-header">
								<span id="greating"></span> <?php echo isset($_SESSION['fullname']) ? ucfirst(explode(" ", $_SESSION['fullname'])[0]) : ""?> 👋
								<!-- <span id="">and Welcome to Acumen Global! </span>--><br> 
								<small>Welcome to Deposit section make sure all payment are to the company wallet address</small>

							</div>
						</div>
						<div class="__notification alert"></div>
					</div>
				</div>
				<!-- Row end -->
				<!-- Row start -->
				<div class="row gutters wallet-info-container">
					<!-- <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
						<div class="pricing-plan">
							<div class="pricing-header">
								<h4 class="pricing-title">Bitcoin wallet Address</h4>
							</div>
							<img src="" width="100"/>
							<P class="font-weight-700 text-center" style="overflow-wrap: break-word;" id="p1">address here</P>
							<div class="pricing-footer">
								<a href="#" onclick="copyToClipboard('#p1')" class="btn btn-primary btn-lg">Copy Address</a>
							</div>
						</div>
					</div>

					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
						<div class="pricing-plan">
							<div class="pricing-header">
								<h4 class="pricing-title">Ethereum wallet Address</h4>
							</div>
							<img src="" width="100"/>
							<P class="font-weight-700 text-center" style="overflow-wrap: break-word;" id="p1">address here</P>
							<div class="pricing-footer">
								<a href="#" onclick="copyToClipboard('#p1')" class="btn btn-primary btn-lg">Copy Address</a>
							</div>
						</div>
					</div>

					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
						<div class="pricing-plan">
							<div class="pricing-header">
								<h4 class="pricing-title">Perfect Money</h4>
							</div>
							<img src="" width="100"/>
							<P class="font-weight-700 text-center" style="overflow-wrap: break-word;" id="p1">address here</P>
							<div class="pricing-footer">
								<a href="#" onclick="copyToClipboard('#p1')" class="btn btn-primary btn-lg">Copy Address</a>
							</div>
							
						</div>
					</div> -->
				
				</div>
				<!-- Row end -->
			
				<div class="row gutters">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
						<div class="card">
							<div class="card-header">
								<div class="card-title text-danger">Proof of payment</div>
							</div>
							<form action="" id="deposit-form" enctype="multipart/form-data">
								<div class="card-body">
									<div class="form-group">
										<label>Amount Deposited</label>
										<input type="number" class="form-control" id="amount-deposited" 
										name="amount_deposited"
										placeholder="Amount Deposited" />
									</div>
	
									<div class="form-group">
										<label>Payment Type</label>
										 <select class="form-control" id="payment-type" name="deposit_type">
											<!-- <option value="bitcoin wallet">Bitcoin wallet</option>
											<option value="ethereum wallet">Ethereum wallet</option>
											<option value="perfect money">Perfect Money</option> -->
										 </select>
									</div>
	
									<div class="form-group">
										<input type="file" class="form-control" placeholder="Email Address" id="proof" name="deposit_proof"/>
									</div>
									<input type="submit" class="btn btn-dark" value="Complete Deposit" id="upload-proof" />
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Row end -->

			</div>
			<!-- Main container end -->

		</div>
		<!-- Page content end -->

	</div>
	<!-- Page wrapper end -->
	<!-- Required jQuery first, then Bootstrap Bundle JS -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/moment.js"></script>
	<!-- Slimscroll JS -->
	<script src="vendor/slimscroll/slimscroll.min.js"></script>
	<script src="vendor/slimscroll/custom-scrollbar.js"></script>
	<script src="vendor/lobipanel/js/lobipanel.js"></script>
	<script src="vendor/lobipanel/js/lobipanel-custom.js"></script>
	<!-- Main JS -->
	<script src="js/main.js"></script>
	<script src="js/custom/functions.js"></script>
	<script src="js/custom/deposit.js"></script>
	<script>
		const time = new Date().getHours();
		let greeting;
		if (time < 10) {
			greeting = "Good morning";
		} else if (time < 20) {
			greeting = "Good day";
		} else {
			greeting = "Good evening";
		}
		document.getElementById("greating").innerHTML = greeting;
	</script>

<script>
	function copyToClipboard(element) {
		var $temp = $("<input>");
		$("body").append($temp);
		$temp.val($(element).text()).select();
		document.execCommand("copy");
		$temp.remove();
	}
</script>
</body>

</html>