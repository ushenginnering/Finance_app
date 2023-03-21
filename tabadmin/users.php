<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Meta -->
    <link rel="shortcut icon" href="img/fav.png" />
    <!-- Title -->
    <title>Users || Admin Dashboard</title>
    <!-- *************
			************ Common Css Files *************
		************ -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Icomoon Font Icons css -->
    <link rel="stylesheet" href="fonts/style.css">
    <!-- Main css -->
    <link rel="stylesheet" href="css/main.css">
    <!-- *************
			************ Vendor Css Files *************
		************ -->
    <!-- DateRange css -->
    <link rel="stylesheet" href="vendor/daterange/daterange.css" />
    <!-- Data Tables -->
    <link rel="stylesheet" href="vendor/datatables/dataTables.bs4.css" />
    <link rel="stylesheet" href="vendor/datatables/dataTables.bs4-custom.css" />
    <link href="vendor/datatables/buttons.bs.css" rel="stylesheet" />
    <!-- Steps Wizard CSS -->
    <link rel="stylesheet" href="vendor/wizard/jquery.steps.css" />
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
                    <li class="breadcrumb-item active">registered User section</li>
                </ol>
            </div>
            <!-- Page header end -->
            <!-- Main container start -->
            <div class="main-container">
                <!-- Row end -->
                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-container">
                            <div class="t-header"> Investments</div>
                            
                            <div class="table-responsive">
                            <select id="filter">
									<option value="active" selected>Active</option>
									<option value="suspended">Suspended</option>
									<option value="all">All</option>
								</select>
                                <table id="basicExample" class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone number</th>
                                            <th>Country</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="user-data">
                                        <tr>
                                            <td>1</td>
                                            <td>samuel alex</td>
                                            <td>titi@gmail.com</td>
                                            <td>12345678929</td>
                                            <td>Ghana</td>
                                            <td>Active</td>
                                            <td>
                                                <div>
                                                    <span title="delete user investment at your own risk"
                                                        class=" btn btn-danger icon-delete"></span>
                                                        <a href="user_details.php"><span title="delete user investment at your own risk"
                                                            class=" btn btn-info icon-eye"></span></a>
                                                </div>
                                            </td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
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
    <script src="js/custom/users.js"></script>
    <!-- Steps wizard JS -->
    <script src="vendor/wizard/jquery.steps.min.js"></script>
    <script src="vendor/wizard/jquery.steps.custom.js"></script>
</body>

</html>