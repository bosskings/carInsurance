<?php 

include_once 'conn.php';

// print policy


if (isset($_REQUEST['print_pol_btn'])) {
    print_policy();
}


function print_policy() {

global $conn;

$print_choice = $_REQUEST['print_policy_type'];
$print_choice_no = $_REQUEST['print_policy_no'];

if ($print_choice === 'policy_no') {
    $select_print_choice = "SELECT * FROM obtain_policy WHERE policy_no = '$print_choice_no' ";
    $select_print_choice = mysqli_query($conn, $select_print_choice);

    if (mysqli_num_rows($select_print_choice) > 0) {
        $select_user_to_print = "SELECT * FROM obtain_policy WHERE policy_no = '$print_choice_no' ";
        $select_user_to_print = mysqli_query($conn, $select_user_to_print);
        $fetch_det = mysqli_fetch_assoc($select_user_to_print);
        
        $id = $fetch_det['id'];
        header("Location: result.php?$id");
     
    }else{
        $print_error = "<p style='text-align:center; color:red;'><b>Unmatched Policy Number!!</b></p>";
        if(isset($print_error)) {
            echo $print_error;
          } 
    }

    }elseif ($print_choice === 'reg_no') {
    $select_print_reg = "SELECT * FROM obtain_policy WHERE reg_no = '$print_choice_no' ";
    $select_print_reg = mysqli_query($conn, $select_print_reg);

    if (mysqli_num_rows($select_print_reg) > 0) {
        
        $select_user_reg = "SELECT * FROM obtain_policy WHERE reg_no = '$print_choice_no' ";
        $select_user_reg = mysqli_query($conn, $select_user_reg);

        $fetch_no = mysqli_fetch_assoc($select_print_reg);
        

    }else{
        $print_error = "<p style='text-align:center; color:red;'><b>Unmatched Registration Number!!</b></p>";
        if(isset($print_error)) {
            echo $print_error;
          } 
    }

}else{
    $print_error = "ERROR";
    if(isset($print_error)) {
        echo $print_error;
      } 
}

}








        // $coll_fname = $fetch_det['first_name'];
        // $coll_lname = $fetch_det['last_name'];
        // $coll_email = $fetch_det['email'];
        // $coll_contact = $fetch_det['contact'];
        // $coll_policy_no = $fetch_det['policy_no'];
        // $coll_policy_type =$fetch_det['policy_type'];
        // $coll_engine_no = $fetch_det['engine_no'];
        // $coll_chasis_no = $fetch_det['chasis_no'];
        // $coll_reg_no = $fetch_det['reg_no'];
        // $coll_vehicle_make = $fetch_det['vehicle_make'];
        // $coll_vehicle_model = $fetch_det['vehicle_model'];
        // $coll_color = $fetch_det['color'];
        // $coll_model_year = $fetch_det['model_year'];
        // $coll_vehicle_type = $fetch_det['vehicle_type'];
        // $coll_sel_address = $fetch_det['sel_address'];











        // $coll_fname = $fetch_no['first_name'];
        // $coll_lname = $fetch_no['last_name'];
        // $coll_email = $fetch_no['email'];
        // $coll_contact = $fetch_no['contact'];
        // $coll_policy_no = $fetch_no['policy_no'];
        // $coll_policy_type = $fetch_no['policy_type'];
        // $coll_engine_no = $fetch_no['engine_no'];
        // $coll_chasis_no = $fetch_no['chasis_no'];
        // $coll_reg_no = $fetch_no['reg_no'];
        // $coll_vehicle_make = $fetch_no['vehicle_make'];
        // $coll_vehicle_model = $fetch_no['vehicle_model'];
        // $coll_color = $fetch_no['color'];
        // $coll_model_year = $fetch_no['model_year'];
        // $coll_vehicle_type = $fetch_no['vehicle_type'];
        // $coll_sel_address = $fetch_no['sel_address'];


?>