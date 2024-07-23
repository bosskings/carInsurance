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
        header("Location: result.php?id=$id");
     
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

        $fetch_det = mysqli_fetch_assoc($select_user_reg);
        
        $id = $fetch_det['id'];
        header("Location: result.php?id=$id");

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










?>