<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Meta -->
    <meta name="author" content="" />
    <link rel="shortcut icon" href="img/fav.png" />

    <!-- Title -->
    <title>User Dashboard || User details</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Icomoon Font Icons css -->
    <link rel="stylesheet" href="fonts/style.css" />
    <!-- Main css -->
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="vendor/lobipanel/css/lobipanel.css" />
    <!-- Data Tables -->
    <link rel="stylesheet" href="vendor/datatables/dataTables.bs4.css" />
    <link rel="stylesheet" href="vendor/datatables/dataTables.bs4-custom.css" />
    <link href="vendor/datatables/buttons.bs.css" rel="stylesheet" />
</head>

<body>
    <!-- Page wrapper start -->
    <div class="page-wrapper">
        <!-- Sidebar wrapper start -->
        <nav id="sidebar" class="sidebar-wrapper">
            <!-- Sidebar brand start  -->
            <div class="sidebar-brand">
                <a href="index.html" class="logo">
                    <!-- <img src="img/logo.png" alt="" /> -->
                </a>
            </div>
            <!-- Sidebar brand end  -->

            <!-- Sidebar content start -->
            <div class="sidebar-content">
                <!-- sidebar menu start -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="">
                            <a href="index.html">
                                <i class="icon-devices_other"></i>
                                <span class="menu-text">Overview</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="users.html">
                                <i class="icon-folder"></i>
                                <span class="menu-text">Users Section</span>
                            </a>
                        </li>
                        <li>
                            <a href="deposit.php">
                                <i class="icon-credit"></i>
                                <span class="menu-text">Deposit section</span>
                            </a>
                        </li>

                        <li>
                            <a href="settlement.html">
                                <i class="icon-check-circle"></i>
                                <span class="menu-text">Withdrawal sections</span>
                            </a>
                        </li>

                        <li>
                            <a href="settlement.html">
                                <i class="icon-check-circle"></i>
                                <span class="menu-text">Investment sections</span>
                            </a>
                        </li>

                        <li>
                            <a href="mailer.html">
                                <i class="icon-message-circle"></i>
                                <span class="menu-text">Mailer</span>
                            </a>
                        </li>
                        <li>
                            <a href="setting.html">
                                <i class="icon-settings1"></i>
                                <span class="menu-text">Setting</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar menu end -->
            </div>
            <!-- Sidebar content end -->
        </nav>
        <!-- Sidebar wrapper end -->

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
                    <li class="dropdown" style="display: none">
                        <a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
                            <i class="icon-box"></i>
                        </a>
                    </li>
                </ul>
                <!-- Header actions end -->
            </div>
        </header>
        <!-- Header end -->

        <!-- Page content start  -->
        <div class="page-content">
            <!-- Page header start -->
            <div class="page-header">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">User section</li>
                    <li class="breadcrumb-item active" id="active-user"></li>
                </ol>
            </div>
            <!-- Page header end -->

            <!-- Main container start -->
            <div class="main-container">
                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            Welcome to User details, You can see all details about a
                            particular user and can manually update the user informations
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
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
                                        Personal informations
                                    </a>
                                </div>
                                <div id="toggleIconsCollapseOne" class="collapse show" aria-labelledby="toggleIconsOne"
                                    data-parent="#toggleIcons">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <table id="basicExample" class="table custom-table">
                                                <thead>
                                                    <tr>
                                                        <th>Full Name</th>
                                                        <th>Email</th>
                                                        <th>Avater</th>
                                                        <th>Phone number</th>
                                                        <th>Country</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td id="full-name"></td>
                                                        <td id="email"></td>
                                                        <td id="avatar"></td>
                                                        <td id="phone-number"></td>
                                                        <td id="country"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <br />
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#personalinfo">
                                            Update Personal Information
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-container">
                                <div class="accordion-header" id="toggleIconsTwo">
                                    <a href="#" class="collapsed" data-toggle="collapse"
                                        data-target="#toggleIconsCollapseTwo" aria-expanded="false"
                                        aria-controls="toggleIconsCollapseTwo">
                                        Wallet informations
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
                                                            <th>Total Deposit</th>
                                                            <th>Account Balance</th>
                                                            <th>Total Profit Earned</th>
                                                            <th>Total Withdrawal</th>
                                                            <th>Active Investment</th>
                                                            <th>Last Deposited</th>
                                                            <th>Last Withdrawal</th>
                                                            <th>Referal Bonus</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td id="total-deposit"></td>
                                                            <td id="account-balance"></td>
                                                            <td id="total-profit-earned"></td>
                                                            <td id="total-withdrawal"></td>
                                                            <td id="active-investment"></td>
                                                            <td id="last-deposit"></td>
                                                            <td id="last-withdrawal"></td>
                                                            <td id="referral-bonus"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#wallet">
                                            Manually Update Wallet
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-container">
                                <div class="accordion-header" id="toggleIconsThree">
                                    <a href="#" class="collapsed" data-toggle="collapse"
                                        data-target="#toggleIconsCollapseThree" aria-expanded="false"
                                        aria-controls="toggleIconsCollapseThree">
                                        Investment informations
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
                                                            <th>S/N</th>
                                                            <th>Investment Plan</th>
                                                            <th>Percentage %</th>
                                                            <th>Amount</th>
                                                            <th>Duration</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="investment-data">
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Starter Plan</td>
                                                            <td>2%</td>
                                                            <td>100</td>
                                                            <td>10 Days</td>
                                                            <td>1/1/2020</td>
                                                            <td>10/1/2023</td>
                                                            <td>Pending</td>
                                                            <td>
                                                                <div>
                                                                    <a href="#">
                                                                        <span
                                                                            class="btn btn-success">Activate</span></a>
                                                                </div>
                                                            </td>
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
                                                        <tr >
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

    <!-- Personal Information Modal -->
    <div class="modal fade" id="personalinfo" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="customModalTwoLabel">
                        Personal Information
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form enctype="multipart/form-data" id="update-personal-info">
                <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="" class="col-form-label">Fullname:</label>
                                <input type="text" class="form-control" id="update-fullname" />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="" class="col-form-label">Phone Number:</label>
                                <input type="tel" class="form-control" id="update-phone" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="col-form-label">Country:</label>
                                <input type="text" class="form-control" id="update-country" />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="" class="col-form-label">Avater:</label>
                                <input type="file" class="form-control" id="update-img" />
                            </div>
                        </div>
                    </div>
                <div class="modal-footer custom">
                    <div class="left-side">
                        <button type="button" class="btn btn-link danger" data-dismiss="modal">
                            Cancel
                        </button>
                    </div>
                    <div class="divider"></div>
                    <div class="right-side">
                        <input type="submit" class="btn btn-link success" value="SAVE INFORMATION"/>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--End Personal Information Modal -->

    <!-- Personal Information Modal -->
    <div class="modal fade" id="wallet" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="customModalTwoLabel">
                        Personal Information
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form enctype="multipart/form-data" id="update-wallet-info">
                <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="" class="col-form-label">Total Deposit</label>
                                <input type="text" class="form-control" id="" />
                            </div>

                            <div class="form-group col-md-4">
                                <label for="" class="col-form-label">Account Balance</label>
                                <input type="text" class="form-control" id="" />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="" class="col-form-label">Total Profit Earned:</label>
                                <input type="text" class="form-control" id="" />
                            </div>

                            <div class="form-group col-md-4">
                                <label for="" class="col-form-label">Total Withdrawal:</label>
                                <input type="text" class="form-control" id="" />
                            </div>

                            <div class="form-group col-md-4">
                                <label for="" class="col-form-label">Total Withdrawal:</label>
                                <input type="text" class="form-control" id="" />
                            </div>

                            <div class="form-group col-md-4">
                                <label for="" class="col-form-label">Last Deposited</label>
                                <input type="text" class="form-control" id="" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="col-form-label">Last Withdrawal</label>
                                <input type="text" class="form-control" id="" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="col-form-label">Referal Bonus</label>
                                <input type="text" class="form-control" id="" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer custom">
                    <div class="left-side">
                        <button type="button" class="btn btn-link danger" data-dismiss="modal">
                            Cancel
                        </button>
                    </div>
                    <div class="divider"></div>
                    <div class="right-side">
                        <input type="submit" class="btn btn-link success" value="Update Wallet">  
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!--End Personal Information Modal -->

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
    <script src="js/custom/user-details.js"></script>
</body>

</html>