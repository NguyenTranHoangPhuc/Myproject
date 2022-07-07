<?php 
    if(isset($_GET['code'])){
        $code=$_GET['code'];

        $conn = new mySqli("localhost", "root","","ecom");

        if($conn->connect_error){
            die('Could not connect to the database');
        }

        $verifyQuery = $conn->query("SELECT * FROM customers WHERE code='$code' and updated_time >= NOW()- Interval 1 DAY");

        if($verifyQuery->num_rows == 0) {
            header("Location:checkout.php");
            exit();
        }

        if(isset($_POST['change'])){
            $email = $_POST['email'];
            $new_password = $_POST['new_password'];

            $changeQuery = $conn->query("UPDATE customers SET customer_pass = '$new_password' WHERE customer_email = '$email' and code='$code' and updated_time >= NOW() - INTERVAL 1 DAY");

            if($changeQuery) {
                header("Location:success.php");
            }
        }
        $conn->close();
        
    }
    else{
        header("Location:checkout.php");
        exit();
    }

?>