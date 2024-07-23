<?php 



// insert into policy verification table

global $pol_verf_messg;

if (isset($_POST['verify_policy'])) {

$pol_verify_method = $_POST['pol_verify_method'];
$pol_ver_no = $_POST['pol_ver_no'];

$insert_pol_verf = "INSERT INTO policy_verify (method, ver_no) VALUES ('$pol_verify_method', '$pol_ver_no') ";
$insert_pol_verf = mysqli_query($conn, $insert_pol_verf);

$pol_verf_messg = "<p style='text-align:center; color:#00e600;'><b><i class='fa fa-check-circle' aria-hidden='true'></i>Verified</b></p>";

}























?>