<?php 

include_once 'conn.php';

if (isset($_REQUEST['renew_pol_btn'])) {
    fetch_policy();
}
// function to fetch policy starts here
function fetch_policy() {
    global $conn;

    $renew_pol_no = $_REQUEST['renew_pol_no'];
    $renew_pol_contact = $_REQUEST['renew_pol_contact'];

    $select_pol_no = "SELECT * FROM obtain_policy WHERE policy_no = '$renew_pol_no' AND contact = '$renew_pol_contact' ";
    $select_pol_no = mysqli_query($conn, $select_pol_no);

    if (mysqli_num_rows($select_pol_no) > 0) {
        $fetch_no = mysqli_fetch_assoc($select_pol_no);


        ?>

            <p style="color: red;"><b>Expiration Date: <?php echo $fetch_no['renew_date']; ?></b></p>

            <tr>
                <td> First Name </td>
                <td> <?php echo $fetch_no['first_name']; ?> </td>
            </tr>
            <tr>
                <td> Last Name </td>
                <td> <?php echo $fetch_no['last_name']; ?> </td>
            </tr>
            <tr>
                <td> Email </td>
                <td> <?php echo $fetch_no['email']; ?> </td>
            </tr>

            <tr>
                <td> Contact </td>
                <td> <?php echo $fetch_no['contact']; ?> </td>
            </tr>

            <tr>
                <td> Policy Number </td>
                <td> <?php echo $fetch_no['policy_no']; ?> </td>
            </tr>

            <tr>
                <td> Policy Type </td>
                <td> <?php echo $fetch_no['policy_type']; ?> </td>
            </tr>

            <tr>
                <td> Engine Number </td>
                <td> <?php echo $fetch_no['engine_no']; ?> </td>
            </tr>

            <tr>
                <td> Chasis Number </td>
                <td> <?php echo $fetch_no['chasis_no']; ?> </td>
            </tr>

            <tr>
                <td> Registration Number </td>
                <td> <?php echo $fetch_no['reg_no']; ?> </td>
            </tr>

            <tr>
                <td> Vehicle Make </td>
                <td> <?php echo $fetch_no['vehicle_make']; ?> </td>
            </tr>

            <tr>
                <td> Vehicle Model </td>
                <td> <?php echo $fetch_no['vehicle_model']; ?> </td>
            </tr>

            <tr>
                <td> Color </td>
                <td> <?php echo $fetch_no['color']; ?> </td>
            </tr>

            <tr>
                <td> Model Year </td>
                <td> <?php echo $fetch_no['model_year']; ?> </td>
            </tr>

            <tr>
                <td> Vehicle Type </td>
                <td> <?php echo $fetch_no['vehicle_type']; ?> </td>
            </tr>

            <tr>
                <td> Address </td>
                <td> <?php echo $fetch_no['sel_address']; ?> </td>
            </tr>
        <?php 
    }

    
    
}


if(isset($_REQUEST['renew'])){
    renew_policy();
}

// function to renew policy
function renew_policy(){
    global $conn;
    
    $renew_pol_no = $_REQUEST['renew_pol_no'];
    $renew_pol_contact = $_REQUEST['renew_pol_contact'];

    //// renew policy
    $date = date('Y-m-d');
    $prev = date('Y-m-d', strtotime('last year'));

    $conf_pol_no = "SELECT * FROM obtain_policy WHERE policy_no = '$renew_pol_no' AND contact = '$renew_pol_contact' ";
    $conf_pol_no = mysqli_query($conn, $conf_pol_no);

    if (mysqli_num_rows($conf_pol_no) > 0) {
        $conf_fetch_date = mysqli_fetch_assoc($conf_pol_no);
        $id = $conf_fetch_date['id'];
    // update date
    $update = "UPDATE obtain_policy SET exp_date = '$prev', renew_date = '$date' WHERE id = '$id' ";

    $sql = mysqli_query($conn, $update);

    if($sql){
        echo "updated";
    }else{
        echo "not updated";
    }
    
}



}





// verify and select details into renew policy
// insert into renew policy table

// global $renew_pol_messg;
// global $coll_no;
// global $coll_nob;
// global $fetch_fname;
// global $fetch_lname;
// global $fetch_email;
// global $fetch_contact;
// global $fetch_policy_no;
// global $fetch_policy_type;
// global $fetch_engine_no;
// global $fetch_chasis_no;
// global $fetch_reg_no;
// global $fetch_vehicle_make;
// global $fetch_vehicle_model;
// global $fetch_color;
// global $fetch_model_year;
// global $fetch_vehicle_type;
// global $fetch_sel_address;
// global $desired_date;
// global $renew_error;

// if (isset($_REQUEST['renew_pol_btn'])) {

//     $renew_pol_no = $_REQUEST['renew_pol_no'];
//     $renew_pol_contact = $_REQUEST['renew_pol_contact'];   

//     $select_pol_no = "SELECT * FROM obtain_policy WHERE policy_no = '$renew_pol_no' AND contact = '$renew_pol_contact' ";
//     $select_pol_no = mysqli_query($conn, $select_pol_no);

//     if (mysqli_num_rows($select_pol_no) > 0) {
//         $fetch_no = mysqli_fetch_assoc($select_pol_no);
//         $fetch_fname = $fetch_no['first_name'];
//         $fetch_lname = $fetch_no['last_name'];
//         $fetch_email = $fetch_no['email'];
//         $fetch_contact = $fetch_no['contact'];
//         $fetch_policy_no = $fetch_no['policy_no'];
//         $fetch_policy_type = $fetch_no['policy_type'];
//         $fetch_engine_no = $fetch_no['engine_no'];
//         $fetch_chasis_no = $fetch_no['chasis_no'];
//         $fetch_reg_no = $fetch_no['reg_no'];
//         $fetch_vehicle_make = $fetch_no['vehicle_make'];
//         $fetch_vehicle_model = $fetch_no['vehicle_model'];
//         $fetch_color = $fetch_no['color'];
//         $fetch_model_year = $fetch_no['model_year'];
//         $fetch_vehicle_type = $fetch_no['vehicle_type'];
//         $fetch_sel_address = $fetch_no['sel_address'];
//     }else{
//         $renew_error = "<p style='color:red; text-align:center;'><b>No Matches Found!!</b></p>";
//     }


//     // renew policy
//     $desired_date = date('d-m-Y');
//     list($day, $month, $year) = explode('-', $desired_date);

//     if (isset($_POST['renew'])) {

//     // Get the current year
//     $current_year = date('Y');
            
//     if ($current_year == $year) {
//     $new_year = $year + 1;
//     } else {
//     $new_year = $year;
//     }
            
//     $desired_date = $day . '-' . $month . '-' . $new_year;

//     }


// }























?>