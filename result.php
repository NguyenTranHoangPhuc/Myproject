<?php
session_start();
include('includes/db.php');
include('functions/functions.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>E Commerce Shop</title>
</head>

<body>
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer">
                <a href="customer/my_account.php" class="btn btn-success btn-sm">
                    <?php
                    if (!isset($_SESSION['customer_email'])) {
                        echo "Welcome Guest";
                    } else {
                        echo "Welcome : " . $_SESSION['customer_email'] . "";
                    }

                    ?>
                </a>
                <a href="#">Shopping Cart Total Price: <?php totalPrice(); ?> đ, Total Items <?php item(); ?></a>
            </div>

            <div class="col-md-6">
                <ul class="menu">
                    <li>
                        <a href="customer_registration.php">Register</a>
                    </li>
                    <li>
                        <?php
                        if (!isset($_SESSION['customer_email'])) {
                            echo "<a href='checkout.php'>My Account</a>";
                        } else {
                            echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                        }
                        ?>
                    </li>
                    <li>
                        <a href="cart.php">Go to Cart</a>
                    </li>
                    <li>
                        <?php
                        if (!isset($_SESSION['customer_email'])) {
                            echo '<a href="checkout.php">Login</a>';
                        } else {
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
                <a class="navbar-brand home" href="index.php">
                    <img src="images/logo2.png" alt="logo" class="hidden-xs">

                </a>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-align-justify" style="color: black;"></i>
                </button>
                
               <!--  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only"></span>
                    <i class="fa fa-search" style="color: black;"> </i>
                </button>  -->
            </div>

            <div class="navbar-collapse collapse" id="navigation">
                <div class="padding-nav">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="active">
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="shop.php">Shop</a>
                        </li>
                        <li>
                            <?php
                            if (!isset($_SESSION['customer_email'])) {
                                echo "<a href='checkout.php'>My Account</a>";
                            } else {
                                echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                            }
                            ?>
                        </li>
                        <li>
                            <a href="cart.php">Shopping Cart</a>
                        </li>
                        <li>
                            <a href="about.php">About Us</a>
                        </li>
                     
                        <li>
                            <a href="contactus.php">Contact Us</a>
                        </li>

                    </ul>
                </div>

                <a href="cart.php" class="btn navbar-btn btn-primary right">
                    <i class="fa fa-shopping-cart"></i>
                    <span> <?php item(); ?> items In Cart </span>
                </a>


                <div class="navbar-collapse collapse-right right">
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
    </div>
    <!-- navber-end -->
<div id="content">
    <div class="container">
    <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="text-muted">Search Result</li>
                </ul>
            </div>
    <div class="col-md-12">
    <div class="row">
    

        <?php

        if (isset($_GET['Search'])) {
            $items = $_GET['user_query'];
            $get_pro = "select*from products where product_keywords like'%$items%'";
            $run_pro = mysqli_query($con, $get_pro);
            

            while ($row_pro = mysqli_fetch_array($run_pro)) {
                $pro_id = $row_pro['product_id'];
                $p_cat_id = $row_pro['p_cat_id'];
                $cat_id = $row_pro['cat_id'];
                $pro_title = $row_pro['product_title'];
                $pro_price = number_format($row_pro['product_price'], 0, ",", ",");
                $pro_image1 = $row_pro['product_img1'];


                echo " <div class='col-md-3 col-sm-6'center-responsive>
                <div class='product'>
                    <a href='details.php?pro_id=$pro_id'>
                    <img src='admin_area/product_images/$pro_image1' class='img-responsive'  >
                    </a>
                    <div class='text'>
                        <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                        <p class='prices'>Giá: $pro_price đ </p> 
                        <p class='buttons'> 
                        <a href='details.php?pro_id=$pro_id' class='btn btn-success'>View Details</a>
                        <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
                            <i class='fa fa-shopping-cart'></i> Add to cart
                        </a>
                        
                    </p>
                   
                    </div>
                </div>
            </div> 
            ";
            
            }
        }
        ?>


    </div>
    </div>
    </div>
    </div>
     







    <!-- Products VIP- end -->

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