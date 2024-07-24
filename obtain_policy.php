<?php 

include 'conn.php';

global $insert_succ_messg;
global $email_err;


$time = time();
$currentDate = date("s");
$gen_rand_num = mt_rand(1000, 9999);
$exp = substr($time, 0, 4);
$pol_no = $currentDate . $gen_rand_num . $exp;


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


$insert_form_data = "INSERT INTO obtain_policy (first_name, last_name, email, contact, policy_no, policy_type, engine_no, chasis_no, reg_no,
vehicle_make, vehicle_model, color, model_year, vehicle_type, sel_address) VALUES ('$pol_fname', '$pol_lname', '$pol_email',
'$pol_contact', '$pol_no', '$pol_sel_type', '$pol_engine_no', '$pol_chasis_no', '$pol_reg_no', '$pol_vehicle_brand', '$pol_vehicle_model',
'$pol_vehicle_color', '$pol_model_year', '$pol_veh_type', '$pol_address' ) ";

$insert_form_data = mysqli_query($conn, $insert_form_data);

$insert_succ_messg = "<p style='text-align:center;'><b style='color:#00e600;'><i class='fa fa-check-circle' aria-hidden='true'></i>Your Request Has Been Submitted</b></p>";



}























?>