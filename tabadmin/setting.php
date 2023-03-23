<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>System Setting || Admin Dashboard</title>
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
                    <li class="breadcrumb-item active">System Setting</li>
                </ol>
            </div>
            <!-- Page header end -->
            <!-- Main container start -->
            <div class="main-container">
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Admin information</div>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Old
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="colFormLabelSm" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label col-form-label-sm">New
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="colFormLabel" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label col-form-label-sm">Confirm
                                        New Password</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="colFormLabelLg" value="">
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
                                <div class="card-title">Website information</div>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Site
                                        Title</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control form-control-sm" id="colFormLabelSm"
                                            value="example">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label col-form-label-sm">Site
                                        Url</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="colFormLabel" value="example.com">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label col-form-label-sm">Meta
                                        Keywords</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control " id="colFormLabelLg" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label col-form-label-sm"> Meta
                                        Description </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control " id="colFormLabelLg" id="colFormLabelLg"
                                            value="">
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
                                <div class="card-title">Create Investment Plan</div>
                            </div>
                            <div class="card-body">
                                <form action="" id="add-investment">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Plane
                                            Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control form-control-sm add-plan-name" id="colFormLabelSm"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="colFormLabel"
                                            class="col-sm-2 col-form-label col-form-label-sm">Percentage
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control add-percentage" id="colFormLabel" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="colFormLabel" class="col-sm-2 col-form-label col-form-label-sm">Plan
                                            Duration</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control add-duration" id="colFormLabelLg" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="colFormLabel" class="col-sm-2 col-form-label col-form-label-sm"> Minimum
                                            value </label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control add-minimum-value" id="colFormLabelLg"
                                                id="colFormLabelLg" value="">
                                        </div>
                                    </div>
    
                                    <div class="form-group row">
                                        <label for="colFormLabel" class="col-sm-2 col-form-label col-form-label-sm"> Maximum
                                            value </label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control add-maximum-value" id="colFormLabelLg"
                                                id="colFormLabelLg" value="">
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <!-- Buttons -->
                                        <input class="btn btn-primary" type="submit" value="update changes" id="add-investment-btn">
                                    </div>
                                </form>
                                <div class="table-container">
                                    <!--     <div class="t-header">No Search Field</div> -->
                                    <div class="table-responsive">
                                        <table id="copy-print-csv" class="table custom-table investment_data">
                                            <thead>
                                                <tr>
                                                    <th>S/n</th>
                                                    <th>Plan Name</th>
                                                    <th>Percentage</th>
                                                    <th>Plan Duration</th>
                                                    <th>Min Value</th>
                                                    <th>Max Value</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Starter Plan</td>
                                                    <td>2%</td>
                                                    <td>10 Days</td>
                                                    <td>$100</td>
                                                    <td>$99999</td>
                                                    <td>
                                                        <div>
                                                            <a href=""><span title="Delete Plan from system"
                                                                    class="btn btn-danger icon-delete"></span></a>
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

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Create Company Wallet</div>
                            </div>
                            <div class="card-body">
                                <form action="" id="add-wallet" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Wallet name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control form-control-sm add-wallet-name" id="colFormLabelSm"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="colFormLabel"
                                            class="col-sm-2 col-form-label col-form-label-sm">Wallet Avater
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control add-wallet-avatar" id="colFormLabel" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="colFormLabel" class="col-sm-2 col-form-label col-form-label-sm">Wallet Address</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control add-wallet-address" id="colFormLabelLg" value="">
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <!-- Buttons -->
                                        <input class="btn btn-primary add-wallet-btn" type="submit" value="update changes" />
                                    </div>
                                </form>
                                <div class="table-container">
                                    <!--     <div class="t-header">No Search Field</div> -->
                                    <div class="table-responsive">
                                        <table id="copy-print-csv" class="table custom-table wallet_data">
                                            <thead>
                                                <tr>
                                                    <th>S/n</th>
                                                    <th>Wallet Name</th>
                                                    <th>Wallet Avater</th>
                                                    <th>Wallet Address</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Ethereum</td>
                                                    <td><img src="" width="50"/></td>
                                                    <td>hdslfhdhfuewaejifeueiohfehfeu</td>
                                                    <td>
                                                        <div>
                                                            <a href=""><span title="Delete Wallet from system"
                                                                    class="btn btn-danger icon-delete"></span></a>
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


                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title"
                                                    title="Active Gmail Account Email Address (require for SMTP)">Active
                                                    Mailer information</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-2 col-form-label col-form-label-sm">Active Gmail
                                                        Address</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control form-control-sm"
                                                            id="colFormLabelSm" value="example@gmail.com">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabel"
                                                        class="col-sm-2 col-form-label col-form-label-sm">Active Gmail
                                                        Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control" id="colFormLabel"
                                                            value="example.com">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabel"
                                                        class="col-sm-2 col-form-label col-form-label-sm">System
                                                        auto-send from email address</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control " id="colFormLabelLg"
                                                            value="system@example.com">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabel" class="col-sm-2 col-form-label-sm"> System
                                                        Reply-Email Address</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="colFormLabelLg" value="info@example.com">
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <!-- Buttons -->
                                                    <button class="btn btn-primary" type="submit">update
                                                        changes</button>
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
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Mailers</div>
                            </div>
                            <div class="card-body">
                                <div class=" p-10">
                                    <p>Auto-example shortcodes: use this key to auto generate required value</p>
                                    <span>[__SITE_TITLE__]</span> <span>[__SITE_URL__]</span>
                                    <span>[__USER_FULLNAME__]</span> <span>[__USER_LASTNAME__]</span>
                                    <span>[__USER_FIRSTNAME__] </span> <span>[__USER_EMAIL__]</span>
                                </div>
                                <!-- use this div below to create space in between two element -->
                                <div class="spacer"></div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Welcome Mailer</label>
                                    <textarea class="form-control is-valid" rows="2"
                                        placeholder="Valid state">Dear [__USER_LASTNAME__] Welcome to example, thanks...... Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque molestiae illo ipsa alias tenetur in accusamus perspiciatis asperiores assumenda ut molestias, mollitia neque, atque incidunt quia ipsum veritatis officia quibusdam maiores. Culpa harum quasi labore possimus eveniet nulla voluptate voluptates, voluptas natus consequatur ex quam. Dolorum maiores repudiandae ad nemo laborum ipsum tempore. Nobis nesciunt ad cupiditate laudantium recusandae iure iusto quaerat veniam? Illo quasi ab sed, natus delectus dignissimos rem nostrum fugit impedit praesentium laborum eum? Dolorem tempora voluptatibus autem quasi quis, ducimus pariatur sit, praesentium mollitia molestiae maiores nemo commodi obcaecati omnis incidunt, repudiandae nisi nam? Ducimus, delectus! </textarea>
                                    <span class="colorred">Email to be sent to a user upon successful
                                        registration.</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Chnage default password Mailer</label>
                                    <textarea class="form-control is-valid" rows="2"
                                        placeholder="Valid state">click the link to verify your email [__CONFIRMATION_LINK__] </textarea>
                                    <span class="colorred">Email to be sent to a user upon successful registration to
                                        change thier default account password.</span>
                                </div>
                                <div class=" p-10">
                                    <p>Auto-example shortcodes: use this key to auto generate required value</p>
                                    <span>[__CONFIRMATION_LINK__]</span>
                                </div>
                                <!-- use this div below to create space in between two element -->
                                <div class="spacer"></div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Forgot Password Mailer</label>
                                    <textarea class="form-control is-valid" rows="2"
                                        placeholder="Valid state">click the link to verify your email [__CONFIRMATION_LINK__] </textarea>
                                    <span class="colorred">Email to be sent to a user for password recovery</span>
                                </div>
                                <div class=" p-10">
                                    <p>Auto-example shortcodes: use this key to auto generate required value</p>
                                    <span>[__RECOVERY_LINK__]</span>
                                </div>
                                <!-- use this div below to create space in between two element -->
                                <div class="spacer"></div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Payment Recieved Mailer</label>
                                    <textarea class="form-control is-valid" rows="2"
                                        placeholder="Valid state">click the link to verify your email [__USER_NAME__] </textarea>
                                    <span class="colorred">Email to be sent to a user after successful payment</span>
                                </div>
                                <div class=" p-10">
                                    <p>Auto-example shortcodes: use this key to auto generate required value</p>
                                    <span>[__RECOVERY_LINK__]</span>
                                </div>
                                <div class="text-right">
                                    <!-- Buttons -->
                                    <button class="btn btn-primary" type="submit">update changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page content end -->
            </div>
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.bundle.min.js"></script>
            <script src="js/moment.js"></script>
            <!-- Main JS -->
            <script src="js/main.js"></script>
            <script src="js/custom/functions.js"></script>
            <script src="js/custom/settings.js"></script>

</body>

</html>