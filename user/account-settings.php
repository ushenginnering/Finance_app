<!doctype html>
<html lang="en">

<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
		<!-- Meta -->
		<meta name="description"
			content="Acumen global was founded with the goal to address any gaps in the value chain for any project management activity, in both oil and gas and non-oil and gas sector projects Our interest cut across oil and gas, medical, and construction services. The Directors and managers are qualified in Project Management, Engineering and, Consulting, Financial and Marketing Management, which allow us to Manage all facets of a project.">
		<meta name="author" content="">
		<link rel="shortcut icon" href="img/fav.png" />
	
		<!-- Title -->
		<title>User Dashboard || Settings</title>
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
                    <li class="breadcrumb-item active">Edit Profile</li>
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
                                <div class="card-title">Personal Information</div>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Fullname</label><br />
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control" id="colFormLabelSm" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="colFormLabel" value="" placeholder="alex@gmail.com" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Phone Number</label>
                                    <div class="col-sm-10">
                                        <input type="tel" class="form-control form-control-lg" id="colFormLabelLg" value="">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Account Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control form-control-lg" id="colFormLabelLg" value="">
                                    </div>
                                </div>
                                <div class="text-right">
                                    <!-- Buttons -->
                                    <button class="btn btn-primary" type="submit">update changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Change Password</div>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Old Password</label><br />
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control form-control" id="colFormLabelSm" value="enter old Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="colFormLabel" value="Enter New Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control form-control-lg" id="colFormLabelLg" value="Comfirm Password">
                                    </div>
                                </div>
                                <div class="text-right">
                                    <!-- Buttons -->
                                    <button class="btn btn-primary" type="submit">update changes</button>
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
		<!-- Main JS -->
    <script src="js/main.js"></script>
</body>
</html>