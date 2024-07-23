<?php 


// insert into mail policy table

global $mail_policy_messg;

if (isset($_POST['mail_policy_btn'])) {

$mail_policy_name = $_POST['mail_policy_name'];
$mail_policy_email = $_POST['mail_policy_email'];

$insert_mail_policy = "INSERT INTO mail_policy (mail_policy, email) VALUES ('$mail_policy_name', '$mail_policy_email') ";
$insert_mail_policy = mysqli_query($conn, $insert_mail_policy);

$mail_policy_messg = "<p style='text-align:center; color:#00e600;'><b><i class='fa fa-check-circle' aria-hidden='true'></i>Certificate Has Been Sent</b></p>";

}






















?>