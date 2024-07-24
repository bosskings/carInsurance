<?php 

include_once 'conn.php';

if (isset($_POST['verify_policy'])) {
    verify_policy();
}

function verify_policy() {

    global $conn;

    $verify_policy = $_POST['pol_verify_method'];
    $verify_no = $_POST['pol_ver_no'];

    if ($verify_policy === 'policy_no') {
        $select_pol = "SELECT * FROM obtain_policy WHERE policy_no = '$verify_no' ";
        $select_pol = mysqli_query($conn, $select_pol);
    }elseif ($verify_policy === 'cert_no') {
        $select_pol = "SELECT * FROM obtain_policy WHERE id = '$verify_no' ";
        $select_pol = mysqli_query($conn, $select_pol);
    }elseif ($verify_policy === 'reg_no') {
        $select_pol = "SELECT * FROM obtain_policy WHERE reg_no = '$verify_no' ";
        $select_pol = mysqli_query($conn, $select_pol);
    }elseif ($verify_policy === 'chasis_no') {
        $select_pol = "SELECT * FROM obtain_policy WHERE chasis_no = '$verify_no' ";
        $select_pol = mysqli_query($conn, $select_pol);
    }elseif ($verify_policy === 'engine_no') {
        $select_pol = "SELECT * FROM obtain_policy WHERE engine_no = '$verify_no' ";
        $select_pol = mysqli_query($conn, $select_pol);
    }

    if (mysqli_num_rows($select_pol) > 0) {
        $fetch = mysqli_fetch_assoc($select_pol);

        $date = $fetch['renew_date'];
        $current_Date = date('Y-m-d');

        if ($date >= $current_Date) {
            $new_date = '<b style="color:#33cc33;">' . $date . '</b>';
        }else{
            $new_date = '<b style="color:red;">' . $date . '</b>';
        }

?>

    <tr>
        <td> First Name </td>
        <td> <?php echo $fetch['first_name']; ?> </td>
    </tr>
    
    <tr>
        <td> Last Name </td>
        <td> <?php echo $fetch['last_name']; ?> </td>
    </tr>
    
    <tr>
        <td> Email </td>
        <td> <?php echo $fetch['email']; ?> </td>
    </tr>

    <tr>
        <td> Contact </td>
        <td> <?php echo $fetch['contact']; ?> </td>
    </tr>

    <tr>
        <td> Policy Number </td>
        <td> <?php echo $fetch['policy_no']; ?> </td>
    </tr>

    <tr>
        <td> Policy Type </td>
        <td> <?php echo $fetch['policy_type']; ?> </td>
    </tr>

    <tr>
        <td> Engine Number </td>
        <td> <?php echo $fetch['engine_no']; ?> </td>
    </tr>

    <tr>
        <td> Chasis Number </td>
        <td> <?php echo $fetch['chasis_no']; ?> </td>
    </tr>

    <tr>
        <td> Registration Number </td>
        <td> <?php echo $fetch['reg_no']; ?> </td>
    </tr>

    <tr>
        <td> Certificate Number </td>
        <td> <?php echo $fetch['id']; ?> </td>
    </tr>

    <tr>
        <td> Vehicle Make </td>
        <td> <?php echo $fetch['vehicle_make']; ?> </td>
    </tr>

    <tr>
        <td> Vehicle Model </td>
        <td> <?php echo $fetch['vehicle_model']; ?> </td>
    </tr>

    <tr>
        <td> Vehicle Color </td>
        <td> <?php echo $fetch['color']; ?> </td>
    </tr>

    <tr>
        <td> Model Year </td>
        <td> <?php echo $fetch['model_year']; ?> </td>
    </tr>

    <tr>
        <td> Vehicle Type </td>
        <td> <?php echo $fetch['vehicle_type']; ?> </td>
    </tr>

    <tr>
        <td> Address </td>
        <td> <?php echo $fetch['sel_address']; ?> </td>
    </tr>

    <tr>
        <td> Expiry Date </td>
        <td> <?php echo $new_date; ?> </td>
    </tr>


<?php

    }else{
        $GLOBALS['policy_error'] = "<p style='color:red; text-align:center;'><b>Invalid User Details</b></p>";
    }

}
























?>