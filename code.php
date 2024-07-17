<?php

include 'conn.php';

global $insert_succ_messg;


// insert into policy table

if(isset($_POST['submit_pol'])) {

$pol_fname = $_POST['fname'];   
$pol_lname = $_POST['lname'];   
$pol_email = $_POST['email'];   
$pol_contact = $_POST['contact'];
$pol_sel_type = $_POST['sel_type'];
$pol_engine_no = $_POST['engine_no'];
$pol_chasis_no = $_POST['chasis_no'];
$pol_reg_no = $_POST['reg_no'];
$pol_vehicle_brand = $_POST['vehicle_brand'];
$pol_vehicle_model = $_POST['vehicle_model'];
$pol_vehicle_color = $_POST['vehicle_color'];
$pol_model_year = $_POST['model_year'];
$pol_veh_type = $_POST['veh_type'];
$pol_address = $_POST['address'];

$insert_form_data = "INSERT INTO policy (first_name, last_name, email, contact, policy_type, engine_no, chasis_no, reg_no,
vehicle_make, vehicle_model, color, model_year, vehicle_type, sel_address) VALUES ('$pol_fname', '$pol_lname', '$pol_email',
'$pol_contact', '$pol_sel_type', '$pol_engine_no', '$pol_chasis_no', '$pol_reg_no', '$pol_vehicle_brand', '$pol_vehicle_model',
'$pol_vehicle_color', '$pol_model_year', '$pol_veh_type', '$pol_address' ) ";

$insert_form_data = mysqli_query($conn, $insert_form_data);

$insert_succ_messg = "<p style='text-align:center;'><b style='color:#00e600;'><i class='fa fa-check-circle' aria-hidden='true'></i>Your Request Has Been Submitted</b></p>";

}



// insert into mail policy table

global $mail_policy_messg;

if (isset($_POST['mail_policy_btn'])) {

$mail_policy_name = $_POST['mail_policy_name'];
$mail_policy_email = $_POST['mail_policy_email'];

$insert_mail_policy = "INSERT INTO mail_policy (mail_policy, email) VALUES ('$mail_policy_name', '$mail_policy_email') ";
$insert_mail_policy = mysqli_query($conn, $insert_mail_policy);

$mail_policy_messg = "<p style='text-align:center; color:#00e600;'><b><i class='fa fa-check-circle' aria-hidden='true'></i>Certificate Has Been Sent</b></p>";

}




// insert into print policy

global $print_policy_messg;

if (isset($_POST['print_pol_btn'])) {

$print_policy_type = $_POST['print_policy_type'];
$print_policy_no = $_POST['print_policy_no'];
$checkbox = "print";

$insert_print_policy = "INSERT INTO print_policy (policy_type, policy_value, checkbox)
VALUES ('$print_policy_type', '$print_policy_no', '$checkbox') ";
$insert_print_policy = mysqli_query($conn, $insert_print_policy);

$print_policy_messg = "<p style='text-align:center; color:#00e600;'><b><i class='fa fa-check-circle' aria-hidden='true'></i>Your Request Has Been Sent</b></p>";
    
}



// insert into renew policy table

global $renew_pol_messg;

if (isset($_POST['renew_pol_btn'])) {

$renew_pol_no = $_POST['renew_pol_no'];
$renew_pol_contact = $_POST['renew_pol_contact'];

$insert_renew_policy = "INSERT INTO renew_policy (policy_no, mobile_no) VALUES ('$renew_pol_no', '$renew_pol_contact') ";
$insert_renew_policy = mysqli_query($conn, $insert_renew_policy);

$renew_pol_messg = "<p style='text-align:center; color:#00e600;'><b><i class='fa fa-check-circle' aria-hidden='true'></i>Policy Fetched</b></p>";

}




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