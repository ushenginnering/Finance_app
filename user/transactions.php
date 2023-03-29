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
	<title>User Dashboard || Withdrawal</title>
	<!-- Bootstrap css -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Icomoon Font Icons css -->
	<link rel="stylesheet" href="fonts/style.css">
	<!-- Main css -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="vendor/lobipanel/css/lobipanel.css" />
	<!-- Data Tables -->
	<link rel="stylesheet" href="vendor/datatables/dataTables.bs4.css" />
	<link rel="stylesheet" href="vendor/datatables/dataTables.bs4-custom.css" />
	<link href="vendor/datatables/buttons.bs.css" rel="stylesheet" />
</head>

<body>

	<!-- Page wrapper start -->
	<div class="page-wrapper">

	<?php include 'control/nav.php';?>

		<!-- Page content start  -->
		<div class="page-content">

			<!-- Page header start -->
			<div class="page-header">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">Home</li>
					<li class="breadcrumb-item active">Transactions History</li>
				</ol>
			</div>
			<!-- Page header end -->


			<!-- Main container start -->
			<div class="main-container">
				<!-- Row start -->
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card lobipanel-close">
							<div class="card-header">
								<span id="greating"></span> <?php echo isset($_SESSION['fullname']) ? ucfirst(explode(" ", $_SESSION['fullname'])[0]) : ""?> 👋
								<!-- <span id="">and Welcome to Acumen Global! </span>--><br>
								<small>Welcome to Transaction History, this page shows total all transactions carried
									out on this platform</small>
							</div>
						</div>
						<div class="__notification alert" role="alert"></div>
					</div>

				</div>
				<!-- Row end -->
				<!-- Row start -->
				<div class="row gutters">

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="accordion toggle-icons" id="toggleIcons">
							<div class="accordion-container">
								<div class="accordion-header" id="toggleIconsOne">
									<a href="#" class="" data-toggle="collapse" data-target="#toggleIconsCollapseOne"
										aria-expanded="true" aria-controls="toggleIconsCollapseOne">
										Deposit section History
									</a>
								</div>
								<div id="toggleIconsCollapseOne" class="collapse show" aria-labelledby="toggleIconsOne"
									data-parent="#toggleIcons">
									<div class="accordion-body">
										<div class="table-responsive">
											<table id="basicExample" class="table custom-table">
												<thead>
													<tr>
														<th>Amount</th>
														<th>Payment Type</th>
														<th>Date</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody id="deposit-data">
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="accordion-container">
								<div class="accordion-header" id="toggleIconsTwo">
									<a href="#" class="collapsed" data-toggle="collapse"
										data-target="#toggleIconsCollapseTwo" aria-expanded="false"
										aria-controls="toggleIconsCollapseTwo">
										Investment section History
									</a>
								</div>
								<div id="toggleIconsCollapseTwo" class="collapse" aria-labelledby="toggleIconsTwo"
									data-parent="#toggleIcons">
									<div class="accordion-body">
										<div class="table-container">
											<div class="table-responsive">
												<table id="basicExample" class="table custom-table">
													<thead>
														<tr>
															<th>Start Date</th>
															<th>Day(s) Left</th>
															<th>Due Date</th>
															<th>Invested Amount</th>
															<th>Profit</th>
															<th>Status</th>
														</tr>
													</thead>
													<tbody id="investment-data">
														<tr>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="accordion-container">
								<div class="accordion-header" id="toggleIconsThree">
									<a href="#" class="collapsed" data-toggle="collapse"
										data-target="#toggleIconsCollapseThree" aria-expanded="false"
										aria-controls="toggleIconsCollapseThree">
										Withdrawal Section History
									</a>
								</div>
								<div id="toggleIconsCollapseThree" class="collapse" aria-labelledby="toggleIconsThree"
									data-parent="#toggleIcons">
									<div class="accordion-body">
										<div class="table-container">
											<div class="table-responsive">
												<table id="basicExample" class="table custom-table">
													<thead>
														<tr>
															<th>Amount</th>
															<th>Payment Options</th>
															<th>Wallet address</th>
															<th>Date</th>
															<th>Status</th>
														</tr>
													</thead>
													<tbody id="withdrawal-data">
														<tr>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="accordion-container">
								<div class="accordion-header" id="toggleIconsThree">
									<a href="#" class="collapsed" data-toggle="collapse"
										data-target="#toggleIconsCollapsefour" aria-expanded="false"
										aria-controls="toggleIconsCollapsefour">
										Referral History
									</a>
								</div>
								<div id="toggleIconsCollapsefour" class="collapse" aria-labelledby="toggleIconsThree"
									data-parent="#toggleIcons">
									<div class="accordion-body">
										<div class="table-container">
											<div class="table-responsive">
												<table id="basicExample" class="table custom-table">
													<thead>
														<tr>
															<th>Full Name</th>
															<th>Bonus</th>
															<!-- <th>Payment Options</th>
															<th>Wallet address</th>
															<th>Date</th>
															<th>Status</th> -->
														</tr>
													</thead>
													<tbody id="referral-data">
														<tr>
															<td></td>
															<td></td>
															<!-- <td></td>
															<td></td>
															<td></td>
															<td></td> -->
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
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

	<!-- Daterange -->
	<script src="vendor/daterange/daterange.js"></script>
	<script src="vendor/daterange/custom-daterange.js"></script>
	<!-- Data Tables -->
	<script src="vendor/datatables/dataTables.min.js"></script>
	<script src="vendor/datatables/dataTables.bootstrap.min.js"></script>

	<!-- Custom Data tables -->
	<script src="vendor/datatables/custom/custom-datatables.js"></script>
	<script src="vendor/datatables/custom/fixedHeader.js"></script>

	<!-- Download / CSV / Copy / Print -->
	<script src="vendor/datatables/buttons.min.js"></script>
	<script src="vendor/datatables/jszip.min.js"></script>
	<script src="vendor/datatables/pdfmake.min.js"></script>
	<script src="vendor/datatables/vfs_fonts.js"></script>
	<script src="vendor/datatables/html5.min.js"></script>
	<script src="vendor/datatables/buttons.print.min.js"></script>


	<!-- Main JS -->
	<script src="js/main.js"></script>
	<script src="js/custom/functions.js"></script>
	<script src="js/custom/transactions_history.js"></script>
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

</body>

</html>