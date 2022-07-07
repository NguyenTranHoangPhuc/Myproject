<?php 
session_start();
    include ('includes/db.php');
    include ('functions/functions.php')
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
                    if(!isset($_SESSION['customer_email']))
                    {
                        echo "Welcome Guest";
                    }
                    else{
                        echo "  Welcome : ".$_SESSION['customer_email']. "</a>" ;
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
                    <img src="images/logo2.png" alt="logo" class="hidden-xs" >
                </a>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-align-justify" style="color: black;"></i>
                </button>
<!-- 
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only"></span>
                    <i class="fa fa-search" style="color: black;"> </i>
                </button> -->
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
                        <!-- <li>
                            <a href="services.php">Services</a>
                        </li> --> 
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
   

    <div class="container" id="slider">
        <div class="col-md-12">
            <div class="carousel slide" id="myCarousel" data-ride="carousel">
                <!-- carousel slide start -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="action"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <!-- carousel-inner start -->
                    <?php 
                    $get_slider ="select *from slider LIMIT 0,1";
                    $run_slider = mysqli_query($con, $get_slider);
                    while($row = mysqli_fetch_array($run_slider))
                    {
                        $slider_name = $row['slider_name'];
                        $slider_image = $row['slider_image'];
                        echo "<div class='item active'>
                            <img src='admin_area/slider_images/$slider_image'>
                            </div> ";
                    }
                    ?>

                    <?php 
                    $get_slider ="select *from slider LIMIT 1,3";
                    $run_slider = mysqli_query($con, $get_slider);
                    while($row = mysqli_fetch_array($run_slider))
                    {
                        $slider_name = $row['slider_name'];
                        $slider_image = $row['slider_image'];
                        echo "<div class='item'>
                            <img src='admin_area/slider_images/$slider_image'>
                            </div> ";
                    }
                   ?>

                </div> <!-- carousel-inner end-->
                <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>

                </a>
                <a href="#myCarousel" class="right carousel-control" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div><!-- carousel slide end -->
        </div>
    </div>

    <!-- Featured Box -->
    <div id="advantage">
        <!-- advatage start -->
        <div class="container">
            <div class="same-height-row">
                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-heart" ></i>
                        </div>
                        <h3><a href="#"> BEST PRICES</a></h3>
                        <p>You can check on all others sites about the prices and than compare with us</p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-heart" ></i>
                        </div>
                        <h3><a href="#">100% SATISFACTION GURANTEED FROM US</a></h3>
                        <p>Free returns on everything for 3 months</p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-heart" > </i>
                        </div>
                        <h3><a href="#"> WE LOVE OUR CUSTOMERS</a></h3>
                        <p>We are known to provide best possible service</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- advatage end -->

    <div id="hot"> <!-- Hot-Start -->
        <div class="box">
            <div class="container">
                <div class="col-md-12">
                    <h2>Latest this week</h2>
                </div>
            </div>
        </div>
    </div> <!-- Hot-End -->

    <!-- Products VIP- start -->
    <div id="content" class="container">
        <div class="row">
                    <?php 
                        getPro();
                    ?>
            
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