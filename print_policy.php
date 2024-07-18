<!DOCTYPE html>
<html lang="en">
<title>Print Policy</title>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Treasure Base insurance</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/vertical-light-layout/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>


<?php 

include 'conn.php';
include 'code.php';

?>



  <!-- partial:partials/_navbar.html -->
  <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo" href="index.html"><img src="../../../assets/images/logo.svg" alt="logo" /></a>
      <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../../assets/images/logo-mini.svg"
          alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-menu"></span>
      </button>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item d-none d-md-block">
          <a class="nav-link" href="#"> Master Portal </a>
        </li>
        <li class="nav-item d-none d-md-block">
          <a class="nav-link" href="#"> Anonymous User </a>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
        data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <span class="icon-bg"><i class="mdi mdi-account-star menu-icon"></i></span>
            <span class="menu-title">Obtain Policy</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="renew_policy.php">
            <span class="icon-bg"><i class="mdi mdi-account-search menu-icon"></i></span>
            <span class="menu-title">Renew Policy</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="print_policy.php">
            <span class="icon-bg"><i class="mdi mdi-printer menu-icon"></i></span>
            <span class="menu-title">Print Policy</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="verify_policy.php">
            <span class="icon-bg"><i class="mdi mdi-account-check menu-icon"></i></span>
            <span class="menu-title">Verify Policy Data</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="mail_policy.php">
            <span class="icon-bg"><i class="mdi mdi-email menu-icon"></i></span>
            <span class="menu-title">Policy Via Mail</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <span class="icon-bg"><i class="mdi mdi-logout menu-icon"></i></span>
            <span class="menu-title">Exit</span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- partial -->
    <style>
      .col-form-label {
        color: #0062ff;
        font-weight: 700;
      }
    </style>
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="d-xl-flex justify-content-between align-items-start">
          <h2 class="text-white p-2 font-weight-bold mb-2 bg-secondary"> Print Policy </h2>
        </div>
        <div class="row">
          <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <form method="POST" class="form-sample">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Select Option</label>
                        <div class="col-sm-9">
                          <select name="print_policy_type" Required class="form-select form-select">
                            <option value="">Select Type</option>
                            <option value="Print by Policy Number">Print by Policy Number</option>
                            <option value="Print by Certificate Number">Print by Certificate Number</option>
                            <option value="Print by Registration Number">Print by Registration Number</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Enter Value</label>
                        <div class="col-sm-9">
                          <input name="print_policy_no" type="text" class="form-control" placeholder="Policy, reg or cert No" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-check">
                        <label class="form-check-label" style="color: black;">
                          <input name="checkbox" type="checkbox" class="form-check-input" id="policycheckbox1">Print
                          Advance Renewal Copy? (If Exists). If you check this box, the system will print the copy of
                          the certificate of an advance renewal policy whose advance renewal Effective Cover Date is to
                          yet come to maturity. If there is no advance renewal details, system simply ignores the
                          command and prints the existing Policy Certificate</label>
                      </div>
                    </div>
                  </div>
                  <?php echo $print_policy_messg; ?>
                  <div class="row">
                    <div class="col-md-6">
                      <button name="print_pol_btn" class="btn btn-primary mt-4">Soft Copy</button>
                    </div>
                    <div class="col-md-6">
                      <button name="print_btn" class="btn btn-danger mt-4">Print Now</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="footer-inner-wraper">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 <a
                  href="#">Treasure Base Insurance</a>. All rights reserved.</span>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/chart.js/chart.umd.js"></script>
  <script src="assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
  <script src="assets/js/jquery.cookie.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page -->
</body>

</html>