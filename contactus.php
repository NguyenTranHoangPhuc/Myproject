<?php
session_start();

include('includes/db.php');
include('functions/functions.php');
include('sendmail.php');
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
    <?php echo $alert; ?>
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
                <a href="#">Shopping Cart Total Price: <?php totalPrice() ?> đ, Total Items <?php item(); ?></a>
            </div>

            <div class="col-md-6">
                <ul class="menu">
                    <li>
                        <a href="customer_registration.php">Register</a>
                    </li>
                    <li>
                    <?php 
                            if(!isset($_SESSION['customer_email'])){
                                echo "<a href='checkout.php'>My Account</a>";
                            }else{
                                echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                            }
                        ?>                     
                        </li>
                    <li>
                        <a href="cart.php">Go to Cart</a>
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
                <a class="navbar-brand home" href="index.php">
                    <img src="images/logo2.png" alt="logo" class="hidden-xs">
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
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="shop.php">Shop</a>
                        </li>
                        <li>
                        <?php 
                            if(!isset($_SESSION['customer_email'])){
                                echo "<a href='checkout.php'>My Account</a>";
                            }else{
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
                        
                        <li class="active">
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
    </div> <!-- navbar end -->

    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="text-muted">Contact-Us</li>
                </ul>
            </div>
            <div class="col-md-3">
                <?php
                include("includes/sidebar.php");
                ?>
            </div>
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">
                        <center>
                            <h2 style="color:black; font-weight: bold;">Contact To Us</h2>
                            <p style="color: black; font-size:15px;">If you have any questions,please feel free to contact us,our customer service center is working for you 24/7</p>
                        </center>
                    </div> <br>
                    <form action="contactus.php" method="post">
                        <div class="form-group">
                            <label class="text-muted">Name</label>
                            <input type="text" name="name" required class="form-control"  pattern="^[A-Za-z].*" title="Begin with a words">
                        </div>
                        <div class="form-group">
                            <label class="text-muted">Email</label>
                            <input type="email" name="email" required class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="example@ex.com">
                        </div>
                        <div class="form-group">
                            <label class="text-muted">Subject</label>
                            <input type="text" name="subject" required class="form-control" pattern="^[A-Za-z].*" title="Begin with a words">
                        </div>
                        <div class="form-group">
                            <label class="text-muted">Massage</label>
                            <textarea  name="message" class="form-control" maxlength="1000" minlength="20" placeholder="Min 20 words"></textarea>
                        </div>
                        <div class="text-center">
                            <button  type="submit" name="submit_send" class="btn btn-primary"> Send
                                <i class="fa fa-user-md"></i> 
                            </button>
                        </div>


                    </form>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
   

 

</body>

</html>
