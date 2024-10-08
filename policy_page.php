<!DOCTYPE html>
<html lang="en">
<title>Car Insurance</title>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title></title>
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



session_start();


if(!isset($_SESSION['ID'])){
  header('Location:login.php');
} 

include 'obtain_policy.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $decoded_id = base64_decode($id);
    preg_match_all('/[0-9]+/', $decoded_id, $matches);
    $new_id = implode('', $matches[0]); 
    $GLOBALS['new_id'] = $new_id;   
} else {
    // error message
}

function policy_num($page_id) {

    global $conn;

    $select = "SELECT * FROM obtain_policy WHERE id = '$page_id' ";
    $select = mysqli_query($conn, $select);
    if(mysqli_num_rows($select) > 0) {
        $fetch_no = mysqli_fetch_assoc($select);
        $GLOBALS['pol_no'] = $fetch_no['policy_no'];
        $GLOBALS['engine_no'] = $fetch_no['engine_no'];
        $GLOBALS['chasis_no'] = $fetch_no['chasis_no'];
        $GLOBALS['reg_no'] = $fetch_no['reg_no'];
        $GLOBALS['cert_no'] = $fetch_no['id'];
    }else{
        $GLOBALS['pol_no'] = "0";
    }

}
policy_num($new_id);


?>





  <!-- partial:partials/_navbar.html -->
  <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo" href="index.html"><img src="assets/images/treasure base logo.png" alt="logo" /></a>
      <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/treasure base logo.png"
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
          <a class="nav-link" href="logout.php">
            <span class="icon-bg"><i class="mdi mdi-logout menu-icon"></i></span>
            <span class="menu-title">Exit</span>
          </a>
        </li>
      </ul>
    </nav>

<div class="pol-box">
    <h5>YOUR POLICY NUMBER IS: </h5><b></b>
    <input type="text" value="<?php if(isset($pol_no)) echo $pol_no; ?>" id="myInput"><br>
    <button id="copy" onclick="myFunction()">Copy policy Number</button>

    <h5>YOUR ENGINE NUMBER IS: </h5><b></b>
    <input type="text" value="<?php if(isset($engine_no)) echo $engine_no; ?>" id="engineNum"><br>
    <button id="copy" onclick="engineNum()">Copy engine Number</button>

    <h5>YOUR CHASIS NUMBER IS: </h5><b></b>
    <input type="text" value="<?php if(isset($chasis_no)) echo $chasis_no; ?>" id="chasisNum"><br>
    <button id="copy" onclick="chasisNum()">Copy chasis Number</button>

    <h5>YOUR REGISTERATION NUMBER IS: </h5><b></b>
    <input type="text" value="<?php if(isset($reg_no)) echo $reg_no; ?>" id="regNum"><br>
    <button id="copy" onclick="regNum()">Copy registeration Number</button>

    <h5>YOUR CERTIFICATE NUMBER IS: </h5><b></b>
    <input type="text" value="<?php if(isset($cert_no)) echo $cert_no; ?>" id="certNum"><br>
    <button id="copy" onclick="certNum()">Copy certificate Number</button>

    <p style="text-align:center"><b id="demo"></b></p>
</div>

<script>

function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  document.getElementById('demo').innerHTML = "Copied ✅";
}

function engineNum() {
  var copyText = document.getElementById("engineNum");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  document.getElementById('demo').innerHTML = "Copied ✅";
}

function chasisNum() {
  var copyText = document.getElementById("chasisNum");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  document.getElementById('demo').innerHTML = "Copied ✅";
}

function regNum() {
  var copyText = document.getElementById("regNum");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  document.getElementById('demo').innerHTML = "Copied ✅";
}

function certNum() {
  var copyText = document.getElementById("certNum");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  document.getElementById('demo').innerHTML = "Copied ✅";
}

</script>

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




<style>
    .pol-box{
        /* border:2px solid black; */
        border-radius:7px;
        height:530px;
        width: 600px;
        box-shadow:0px 5px 10px rgba(0,0,0,0.15);
        margin: auto;
        text-align:center;
        padding:70px;
        font-family:segoe ui;
    }
     b{
        color: #00cc00;
    }
    #copy{
      border:none;
      border-radius:4px;
      padding:5px 20px;
      background: #d9d9d9;
      font-family:cambria;
    }
    input{
      border:none;
      width: 50%;
    }
</style>