<?php 

    include_once "conn.php";
    include_once "createQRcode.php";


    // insert into mail policy table

    if (isset($_POST['mail_policy_btn'])) {

        sendEmail($_POST['mail_policy_email']);
        
    }
    
    
    // create function to send email to user
    
    function sendEmail($to){

        global $conn;
        
        $mail_policy_no = $_POST['mail_policy_no'];


        $select = "SELECT * FROM obtain_policy WHERE policy_no = '$mail_policy_no' ";
        $qry = mysqli_query($conn, $select);

        if (mysqli_num_rows($qry) > 0) {
            $fetch_det = mysqli_fetch_assoc($qry);

            $message = 
            "

                <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>
                <style>
                    body {
                        background-color: #f8f9fa;
                        font-family: 'nunito-regular', sans-serif;
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
                <div class='col-md-8 offset-md-2 item-details'>
                    <p style='text-align: center; color: green;'><u><b>Certifcate of Insurance</b></u></p>
                    
                    <p>Certificate Number: <b>". $fetch_det['id'] ."</b> Policy Number: <b>". $fetch_det['policy_no'] ."</b></p>
                    
                    <p>1. Index Mark and Registration Number No. of Vehicle: <span class='item-name'>". $fetch_det['reg_no'] ."</span></p>
                    
                    <p>Chasis Number : <span class='item-name'>". $fetch_det['chasis_no'] ."</span></p><br>
                    
                    <P>2. Name of Policy Holder: <span class='item-name'>". $fetch_det['first_name'] . ' ' . $fetch_det['last_name'] ."</span></P>
                    
                    <p>3. Effective Date of Commencement of Insurance: <span class='item-name'>". $fetch_det['exp_date'] ."</span></p>
                    
                    <p>4. Date of Expiry of Insurance: <span class='item-name'>". $fetch_det['renew_date'] ."</span></p>
                    
                    <p>5. Type of Cover: <span class='item-name'>". $fetch_det['vehicle_type'] ."</span></p>
                    
                    <p>6. Make of Vehicle: <span class='item-name'>". $fetch_det['vehicle_make'] ."</span></p>

                    <p>7. Persons or classes of persons entitled to drive</p>
                    <p class='subpart'>(i) Whilst the vehicle is been used in connection with the policy holder's business
                    </p>
                    <p class='supersubpart'>(a) The Policy Holder</p>
                    <p class='supersubpart'>(b) Any other person provided he is in the policy holder's employ and is driving
                        on his or with his permission </p>
                    <p class='subpart'>(ii) Whilst the vehicle is being used for social domestic or pleasure purpose</p>
                    <p class='supersubpart'>(a) The Policy Holder</p>
                    <p class='supersubpart'>(b) Any other person who is driving on the policy holder's order or with his
                        permission.</p>
                    <p>Provided that the person driving is permitted in accordance with licensing or other laws or
                        regulations to drive the Motor Vehicle or has been so
                        permitted and is not disqualified by order of Courts of Law or by reason of enactment or regulation
                        in that behalf from driving such Motor Use
                        in connection with the policy holder's business; Whilst the vehicle is being so used the carriage of
                        passengers is permitted Use
                    </p>
                    <p>8. Limitation of Use: <span class='item-name'>&#8358;15,000 NAIRA</span></p>
                    <p>Use in connection with the policy holder's business; whilst the vehicle is being so used the carriage
                        of passengers
                        is permitted Use for social domestic and pleasure purposes. The Policy does not Cover
                    </p>
                    <p class='supersubpart'>(a) <b>Note: TRUCKS ARE EXCLUDED</b></p>
                    <p class='supersubpart'>(b)Use for racing pace-making reliability trial or speed - testing</p>
                    <p class='supersubpart'>(c) Use whilst drawing a trailer except the towing (other than for reward) of
                        any one disabled mechanically - propelled vehicle</p>
                    <p>I/WE HEREBY CERTIFY THAT the policy to which this certificate relates is issued<br> in accordance with
                        the provisions of Motor Vehicle's (Third Party Insurance) Ordinance Act 1993</p>
                    
                    <div class='row'>
                        <div class='col-md-4'>
                            <p>
                                ".
                                   displayQRcode('https://treasurebaseicsl.com/result.php?id='.$fetch_det['id'])
                                ."
                            </p>
                        </div>
                    
                    </div>
                </div>
            ";

            $subject =" YOUR POLICY IS SET";
    
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
            $headers .= "From: contact@treasurebaseicsl.com" . "\r\n";
    
            $mailSent = mail($to, $subject, $message, $headers);
    
            if ($mailSent) {
                $GLOBALS['mail_policy_messg'] =  "<span style='color:green'> Email successfully sent. </span>";
            } else {
                $GLOBALS['mail_policy_messg'] = "<span style='color:red'>  Email failed to send. </span>";
            }
        }else{
            $GLOBALS['mail_policy_messg'] = "<span style='color:red'> Policy not found </span>";
        }

    }

?>