<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Withdrawal - Admin Dashboard</title>
	<!-- Bootstrap css -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Icomoon Font Icons css -->
	<link rel="stylesheet" href="fonts/style.css">
	<!-- Main css -->
	<link rel="stylesheet" href="css/main.css">
	<!-- DateRange css -->
	<link rel="stylesheet" href="vendor/daterange/daterange.css" />

	<!-- Data Tables -->
	<link rel="stylesheet" href="vendor/datatables/dataTables.bs4.css" />
	<link rel="stylesheet" href="vendor/datatables/dataTables.bs4-custom.css" />
	<link href="vendor/datatables/buttons.bs.css" rel="stylesheet" />

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

		<!-- Sidebar wrapper start -->
		<?php include 'control/nav.php';?>
		<!-- Sidebar wrapper end -->

		<!-- Page content start  -->
		<div class="page-content">

			<!-- Header start -->
			<header class="header">
				<div class="toggle-btns">
					<a id="toggle-sidebar" href="#">
						<i class="icon-list"></i>
					</a>
					<a id="pin-sidebar" href="#">
						<i class="icon-list"></i>
					</a>
				</div>
				<div class="header-items">


					<!-- Header actions start -->
					<ul class="header-actions">
						<li class="dropdown" style="display:none;">
							<a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
								<i class="icon-box"></i>
							</a>

						</li>
					</ul>
					<!-- Header actions end -->
				</div>
			</header>
			<!-- Header end -->

			<!-- Page header start -->
			<div class="page-header">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">Home</li>
					<li class="breadcrumb-item active">withdrawal Section</li>
				</ol>

				<ul class="app-actions">

				</ul>
			</div>
			<!-- Page header end -->

			<!-- Main container start -->
			<div class="main-container">
				<!-- Row start -->
				<!-- Row start -->
				<div class="row gutters">

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="alert alert-info alert-dismissible fade show" role="alert">
							Admin to view all withdrawal on the system
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="__notification alert"></div>
					</div>

				</div>
				<!-- Row end -->
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="table-container">
							<!--     <div class="t-header">No Search Field</div> -->
							<div class="table-responsive">
							<select id="filter">
									<option value="approved">Succesful</option>
									<option value="pending" selected>Pending</option>
									<option value="declined">Declined</option>
									<option value="all">All</option>
								</select>
								<table id="copy-print-csv" class="table custom-table">
									<thead>
										<tr>
                                            <th>S/n</th>
											<th>Full Name</th>
											<th>Email</th>
											<th>Amount</th>
											<th>Date</th>
											<th>Wallet Address</th>
											<th>withdrawal Options</th>
											<th>Status</th>
											<th>Action</th>

										</tr>
									</thead>
									<tbody id="withdrawal_data">
										<!-- <tr>
                                            <td>1</td>
											<td>Tiger Nixon</td>
											<td>text@gmail.com</td>
											<td>$320,800</td>
											<td>2011/07/25</td>
											<td>hfhhdgssfefpoewekfhdshal</td>
											<td>Bitcoin</td>
											<td>Processed</td>
											<td>
												<div>
													<span title="" class=" btn btn-danger icon-delete"></span>
													<a href=""><span title="Decline withdrawal"class="btn btn-warning icon-cancel"></span></a>
													<a href=""><span title="Approved withdrawal"class="btn btn-success icon-check2"></span></a>
												</div>
											</td>
										</tr> -->
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- Row end -->
				</div>
				<!-- Main container end -->
			</div>
			<!-- Page content end -->

		</div>
		<!-- Page content end -->

	</div>
	<!-- Page wrapper end -->
	
	<!-- Required jQuery first, then Bootstrap Bundle JS -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/moment.js"></script>


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
	<script src="js/custom/withdrawal.js"></script>


</body>

</html>