<?php 

include_once 'conn.php';

global $insert_succ_messg;
global $email_err;


$time = time();
$currentDate = date("s");
$gen_rand_num = mt_rand(1000, 9999);
$exp = substr($time, 0, 4);
$pol_no = "P/TBICSL/PMI/".date('s')."/ABA".$currentDate . $gen_rand_num . $exp;


if(isset($_POST['submit_pol'])) { 
    
    $pol_fname = $_POST['fname'];
    $uppercase_fname = strtoupper($pol_fname);

    $pol_lname = $_POST['lname'];   
    $uppercase_lname = strtoupper($pol_lname);

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
    $date = date('Y-m-d');
    $next = date('Y-m-d', strtotime('next year'));

$check_det = "SELECT * FROM obtain_policy ";
$check_det = mysqli_query($conn, $check_det);
if(mysqli_num_rows($check_det) > 0) {
while($fetch_det = mysqli_fetch_assoc($check_det)) {
    $fetch_mail = $fetch_det['email'];
    $fetch_policy_no = $fetch_det['policy_no'];
    $fetch_engine_no = $fetch_det['engine_no'];
    $fetch_chasis_no = $fetch_det['chasis_no'];
    $fetch_reg_no = $fetch_det['reg_no'];

    if ($fetch_mail == $pol_email) {
        $GLOBALS['insert_err_messg'] = "<p style='text-align:center;color:red;'><b>Email Already Used!</b></p>";
        $errorFound = true;
    }elseif($fetch_policy_no == $pol_no) {
        $GLOBALS['insert_err_messg'] = "<p style='text-align:center;color:red;'><b>Policy Number is Already Taken!</b></p>";
        $errorFound = true;
    }elseif($fetch_engine_no == $pol_engine_no) {
        $GLOBALS['insert_err_messg'] = "<p style='text-align:center;color:red;'><b>Engine Number is Already Taken!</b></p>";
        $errorFound = true;
    }elseif($fetch_chasis_no == $pol_chasis_no) {
        $GLOBALS['insert_err_messg'] = "<p style='text-align:center;color:red;'><b>Chasis Number is Already Taken!</b></p>";
        $errorFound = true;
    }elseif($fetch_reg_no == $pol_reg_no) {
        $GLOBALS['insert_err_messg'] = "<p style='text-align:center;color:red;'><b>Registeration Number is Already Taken!</b></p>";
        $errorFound = true;
        break;
    }
}

}

if(!$errorFound){    
    $insert_form_data = "INSERT INTO obtain_policy (first_name, last_name, email, contact, policy_no, policy_type, engine_no, chasis_no, reg_no,
    vehicle_make, vehicle_model, color, model_year, vehicle_type, sel_address, exp_date, renew_date) VALUES ('$uppercase_fname', '$uppercase_lname', '$pol_email',
    '$pol_contact', '$pol_no', '$pol_sel_type', '$pol_engine_no', '$pol_chasis_no', '$pol_reg_no', '$pol_vehicle_brand', '$pol_vehicle_model',
    '$pol_vehicle_color', '$pol_model_year', '$pol_veh_type', '$pol_address', '$next', '$date' ) ";

    $insert_form_data = mysqli_query($conn, $insert_form_data);

    $select = "SELECT * FROM obtain_policy WHERE email = '$pol_email' ";
    $select = mysqli_query($conn, $select);
    if (mysqli_num_rows($select) > 0) {
        $fetch_pol = mysqli_fetch_assoc($select);
        $GLOBALS['pol_id'] = $fetch_pol['id'];
        
        $sensitiveData = $pol_id;
        $encodedData = base64_encode($sensitiveData);
        $url = urlencode($encodedData);

        
        header("Location:policy_page.php?id=$url");

}else{
    $GLOBALS['insert_err_messg'] = "<p style='text-align:center;color:red;'><b>Failure Generating Policy Number!</b></p>";  
}

$insert_succ_messg = "<p style='text-align:center;'><b style='color:#00e600;'><i class='fa fa-check-circle' aria-hidden='true'></i>Your Request Has Been Submitted</b></p>";
}


}























?>