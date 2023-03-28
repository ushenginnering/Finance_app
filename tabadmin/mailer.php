<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Send Mails || Admin Dashboard</title>
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
                    <li class="breadcrumb-item active">Mailer</li>
                </ol>
            </div>
            <!-- Page header end -->
            <!-- Main container start -->
            <div class="main-container">
                <!-- Row end -->
                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="__notification alert" role="alert"></div>
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Send Mail</div>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Send to:</label>
                                    <select class="form-control form-control">
                                        <option>All Users </option>
                                        <option>Active Users</option>
                                        <option>Suspended Users </option>
                                        <option>Individual user </option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-form-label">User email</label>
                                    <input type="email" class="form-control" id="colFormLabel" placeholder="Specific user">
                                </div>
                                
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-form-label">Subject</label>
                                    <input type="email" class="form-control" id="colFormLabel" placeholder="Enter your Subject">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Type your Message</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <button style="float: right;" class="btn btn-primary" type="submit">Send Mail</button>
                            </div>
                            <div class="table-container">
                                <!--     <div class="t-header">No Search Field</div> -->
                                <!-- <div class="table-responsive">
                                    <table id="copy-print-csv" class="table custom-table">
                                        <thead>
                                            <tr>
                                                <th>S/n</th>
                                                <th>User email</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Ethereum</td>
                                                <td>We</td>
                                                <td>hdslfhdhfuewaejifeueiohfehfeu</td>
                                                <td>
                                                    <div>
                                                        <a href=""><span title=""
                                                                class="btn btn-danger icon-delete"></span></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> -->
                            </div>
                        </div>
                    </div>
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
        <!-- Main JS -->
        <script src="js/main.js"></script>
</body>

</html>