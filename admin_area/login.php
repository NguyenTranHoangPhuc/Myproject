<?php
session_start();
include 'includes/db.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <div class="main_div">
        <div class="title">Login Form</div>

        <form action="#" method="POST" >
            <div class="input_box">
                <input type="text" placeholder="Email or Phone" class="form_control" name="admin_email" required>
                <div class="icon"><i class="fa fa-user"></i></div>
            </div>
            <div class="input_box">
                <input type="password" placeholder="Password" class="form_control" name="admin_pass" required>
                <div class="icon"><i class="fa fa-lock"></i></div>
            </div>
           

            <button type="submit" name="admin_login" class="btn btn-lg  btn-block"> LOGIN</button>
        </form>
    </div>



    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>
<?php 
    if(isset($_POST['admin_login']))
    {
        $admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);
        $admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);
        $get_admin="select * from admins where admin_email = '$admin_email' and admin_pass= '$admin_pass'";
        $run_admin=mysqli_query($con,$get_admin);
        $count=mysqli_num_rows($run_admin);
        if($count==1){
            $_SESSION['admin_email']=$admin_email;
            echo "<script> alert('You are Logged)</script>";
            echo "<script> window.open('index.php?dashboard','_self')</script>";
        }else{
            echo "<script> alert('Email/Password wrong...!! PLEASE TRY AGAIN')</script>";
        }
    }
?>