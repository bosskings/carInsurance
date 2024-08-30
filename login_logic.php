<?php
    session_start();
    require('conn.php');



    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        if(!empty($_POST['email']) && !empty($_POST['password']) ){

            if( $_POST['email'] == "Admin01@treasurebase.com" && $_POST['password'] == "Admin001_#"){

                $_SESSION['ID'] = "01";
                header('Location:index.php');

            }elseif ($_POST['email'] == "Admin02@treasurebase.com" && $_POST['password'] == "Admin002_#") {
                
                $_SESSION['ID'] = "02";
                header('Location:index.php');
            
            }else{
    
                $GLOBALS['error'] = 'Incorrect Email and password combination!';

            }
            
        }else{
            $GLOBALS['error'] = 'Email and password must be provided!';
        }
    }



?>