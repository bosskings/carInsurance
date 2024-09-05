<!DOCTYPE html>
<html lang="en">
<title>Certificate</title>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Result Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: "nunito-regular", sans-serif;
             font-size: 12px;
        }

        .item-details {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .item-name {
            font-weight: bold;
        }

        .subpart {
            padding-left: 15px;
        }

        .supersubpart {
            padding-left: 40px;
        }
        .insurers{
            background-color: green; 
            text-align: center; 
            color: white; 
            border-radius: 40px;
            padding: 5px 5px;
            margin: 25px 25px;
        }
    </style>
</head>

<body>


    <div class="container mt-5">

    
        <?php 

            include 'print_pol_code.php';
            include_once 'createQRcode.php';

            if(isset($_GET['id'])) {
                $id = $_GET['id'];
            } else {
                echo "ID not found in the URL";
            }
            
            
            $select = "SELECT * FROM obtain_policy WHERE id = '$id' ";
            $select = mysqli_query($conn, $select);

            if (mysqli_num_rows($select) > 0) {
                $fetch_det = mysqli_fetch_assoc($select);
            }

        ?>
        
        <div class="col-md-8 offset-md-2 item-details">
            <p style="text-align: center; color: green;"><u><b>Certifcate of Insurance</b></u></p>
            
            <p>Certificate Number: <b>2233447</b> Policy Number: <b><?php echo $coll_policy_no = $fetch_det['policy_no']; ?></b></p>
            
            <p>1. Index Mark and Registration Number No. of Vehicle: <span class="item-name"><?php echo $coll_reg_no = $fetch_det['reg_no']; ?></span></p>
            
            <p>Chasis Number : <span class="item-name"><?php echo $coll_chasis_no = $fetch_det['chasis_no']; ?></span></p><br>
            
            <P>2. Name of Policy Holder: <span class="item-name"><?php echo $coll_fname = $fetch_det['first_name'] . ' ' . $coll_lname = $fetch_det['last_name']; ?></span></P>
            
            <p>3. Effective Date of Commencement of Insurance: <span class="item-name"><?php echo $coll_date = $fetch_det['renew_date']; ?></span></p>
            
            <p>4. Date of Expiry of Insurance: <span class="item-name"><?php echo $coll_date = $fetch_det['exp_date']; ?></span></p>
            
            <p>5. Type of Cover: <span class="item-name"><?php echo $coll_vehicle_type = $fetch_det['vehicle_type']; ?></span></p>
            
            <p>6. Make of Vehicle: <span class="item-name"><?php echo $coll_vehicle_make = $fetch_det['vehicle_make']; ?></span></p>

            <p>7. Persons or classes of persons entitled to drive</p>
            <p class="subpart">(i) Whilst the vehicle is been used in connection with the policy holder's business
            </p>
            <p class="supersubpart">(a) The Policy Holder</p>
            <p class="supersubpart">(b) Any other person provided he is in the policy holder's employ and is driving
                on his or with his permission </p>
            <p class="subpart">(ii) Whilst the vehicle is being used for social domestic or pleasure purpose</p>
            <p class="supersubpart">(a) The Policy Holder</p>
            <p class="supersubpart">(b) Any other person who is driving on the policy holder's order or with his
                permission.</p>
            <p>Provided that the person driving is permitted in accordance with licensing or other laws or
                regulations to drive the Motor Vehicle or has been so
                permitted and is not disqualified by order of Courts of Law or by reason of enactment or regulation
                in that behalf from driving such Motor Use
                in connection with the policy holder's business; Whilst the vehicle is being so used the carriage of
                passengers is permitted Use
            </p>
            <p>8. Limitation of Use: <span class="item-name">&#8358;15,000 NAIRA</span></p>
            <p>Use in connection with the policy holder's business; whilst the vehicle is being so used the carriage
                of passengers
                is permitted Use for social domestic and pleasure purposes. The Policy does not Cover
            </p>
            <p class="supersubpart">(a) <b>Note: TRUCKS ARE EXCLUDED</b></p>
            <p class="supersubpart">(b)Use for racing pace-making reliability trial or speed - testing</p>
            <p class="supersubpart">(c) Use whilst drawing a trailer except the towing (other than for reward) of
                any one disabled mechanically - propelled vehicle</p>
            <p>I/WE HEREBY CERTIFY THAT the policy to which this certificate relates is issued<br> in accordance with
                the provisions of Motor Vehicle's (Third Party Insurance) Ordinance Act 1993</p>
            
            <!-- <p style="color: red; text-align: right; padding-right: 50px; font-weight: 700;">TREASURE BASE INSURANCE CO-OPERATIVE SOCIETY LIMITED</p> -->
            <div class="row">
                <div class="col-md-4">
                    <p>
                        <?php 
                            //function to display QR-code
                            echo displayQRcode("https://treasurebaseicsl.com/result.php?id=".$id)
                        ?>
                    </p>
                </div>
                <!-- <div class="col-md-8">
                    <p class="insurers">Insurers of Cooperators and their Dependents</p>
                </div> -->
            </div>
        </div>
    
    </div>
    <center>

        <a href='index.php' class="btn btn-info mt-4">home</a>
    </center>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>