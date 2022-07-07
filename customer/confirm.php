<?php 
session_start();
if(!isset($_SESSION['customer_email']))
{
    echo "<script>window.open('../checkout.php','_self')</script>";
}else{
    include ('includes/db.php');
    include ('functions/functions.php');
    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="styles/style.css">
    <title>E Commerce Shop</title>
</head>

<body>
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer">
                <a href="customer/my_account.php" class="btn btn-success btn-sm">
                <?php 
                    if(!isset($_SESSION['customer_name']))
                    {
                        echo "Welcome Guest";
                    }
                    else{
                        echo "Welcome : ".$_SESSION['customer_name']. "";
                    }
                    
                    ?>
                </a>
                <a href="#">Shopping Cart Total Price: INR 100, Total Items 2</a>
            </div>

            <div class="col-md-6">
                <ul class="menu">
                    <li>
                        <a href="customer_registration.php">Register</a>
                    </li>
                    <li>
                        <a href="my_account.php">My Account</a>
                    </li>
                    <li>
                        <a href="../cart.php">Go to Cart</a>
                    </li>
                    <li>
                    <?php
                         if(!isset($_SESSION['customer_email'])){
                             echo '<a href="checkout.php">Login</a>';
                         }else{
                             echo '<a href="logout.php">Logout</a>';
                         }
                        ?>                    
                        </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- navbar start -->
    <div class="navbar navbar-default" id="navbar">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand home" href="../index.php">
                    <img src="images/logo2.png" alt="logo" class="hidden-xs" style="width: 100px;">
                   
                </a>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-align-justify" style="color: black;"></i>
                </button>

                <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only"></span>
                    <i class="fa fa-search" style="color: black;"> </i>
                </button> -->
            </div>

            <div class="navbar-collapse collapse" id="navigation">
                <div class="padding-nav">
                    <ul class="nav navbar-nav navbar-left">
                        <li >
                            <a href="../index.php">Home</a>
                        </li>
                        <li >
                            <a href="../shop.php">Shop</a>
                        </li>
                        <li class="active">
                            <a href="my_account.php">My Acount</a>
                        </li>
                        <li>
                            <a href="../cart.php">Shopping Cart</a>
                        </li>
                        <li>
                            <a href="../about.php">About Us</a>
                        </li>
                        
                        <li>
                            <a href="../contactus.php">Contact Us</a>
                        </li>

                    </ul>
                </div>
                <a href="cart.php" class="btn navbar-btn btn-primary right">
                    <i class="fa fa-shopping-cart"></i>
                    <span>  <?php item(); ?> items In Cart </span>
                </a>

                <div class="navbar-collapse collapse-right">
                    <button class="btn navbar-btn btn-primary search" type="button" data-toggle="collapse" data-target="#search">
                        <span class="sr-only"> Toggle Search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

                <div class="collapse clearfix" id="search">
                    <form method="get" action="result.php" class="navbar-form">
                        <div class="input-group">
                            <input type="text" name="user_query" placeholder="Search" class="form-control" required>
                            <span class="input-group-btn">
                                <button type="submit" value="Search" class="btn btn-primary" name="Search">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>  <!-- navbar end -->

    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="home.php">Home</a></li>
                    <li class="text-muted">My Account</li>
                </ul>
            </div>
            <div class="col-md-3">
                <?php 
                    include("includes/sidebar.php");
                ?>
            </div>
            <div class="col-md-9">
               <div class="box">
                   <h1 style="color: black; text-align:center;"> Please confirm your payment </h1>
                    <form action="confirm.php?update_id=<?php echo $order_id ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label style="color: black;">Invoice Number</label>
                            <input type="text" name="invoice_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Ammount</label>
                            <input type="text" name="amount" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Select Payment Mode</label>
                               <select class="form-control" name="payment_mode">
                                   <option>Bank Account </option>
                                
                               </select>
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Transection Number</label>
                            <input type="text" name="trfr_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Payment Date</label>
                            <input type="date" name="date" class="form-control" required="">
                        </div>
                        <div class="text-center">
                            <div>
                                <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">
                                    Confirm Payment
                                </button>
                            </div>
                        </div>
                    </form>
<?php 
    if(isset($_POST['confirm_payment'])){
        $update_id=$_GET['update_id'];
        $invoice_number=$_POST['invoice_number'];
        $amount=$_POST['amount'];
        $payment_mode=$_POST['payment_mode'];
        $trfr_number=$_POST['trfr_number'];
        $date=$_POST['date'];
        $complete="COMPLETE";
        $insert="insert into payments (invoice_id,amount,payment_mode,ref_no,payment_date) values ('$invoice_number','$amount','$payment_mode','$trfr_number',$date) ";
        $run_insert = mysqli_query($con,$insert);

        $update_q="update customer_order set order_status = '$complete' where order_id='$update_id'";
        $run_insert=mysqli_query($con,$update_q);

      /*   $update_p="update pending_order set order_status = '$complete' where order_id='$update_id'";
        $run_insert=mysqli_query($con,$update_p); */

        echo"<script>alert('Your order has been received');</script>";
        echo"<script> window.open ('my_account.php?order','_self');</script>";

    }
?>

                </div>
            </div>
           
                

        </div>
    </div>
   






    <!-- footer start -->
    <?php 
        include("includes/footer.php");
    ?>
        <!-- footer end -->
        <a href="#" class="to-top">
    <i class="fa fa-chevron-circle-up"></i>
  </a>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php } ?>