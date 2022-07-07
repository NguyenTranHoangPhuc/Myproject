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
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="styles/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
                <a href="#">Shopping Cart Total Price:<?php totalPrice() ?> đ, Total Items <?php item(); ?></a>
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

                <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only"></span>
                    <i class="fa fa-search" style="color: black;"> </i>
                </button> -->
            </div>

            <div class="navbar-collapse collapse" id="navigation">
                <div class="padding-nav">
                    <ul class="nav navbar-nav navbar-left">
                        <li >
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
                         <li class="active">
                            <a href="about.php">About Us</a>
                        </li>
                        
                        <li>
                            <a href="contactus.php">Contact Us</a>
                        </li>

                    </ul>
                </div>
                <a href="cart.php" class="btn navbar-btn btn-primary right">
                    <i class="fa fa-shopping-cart"></i>
                    <span><?php item(); ?> items In Cart </span>
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
    <div class="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="home.php">Home</a></li>
                    <li class="text-muted">About-Us</li>
                </ul>
            </div>
        </div>
        <br>

        <section class="about">
            <div class="content">
                <h2>About us</h2>
                <p>Aiming at fashion products with youthful, sophisticated design, high quality and reasonable price, HARMONIC is a fashion brand suitable for all ages.<br> <br>

TRENDY - GOOD PRICE - MUST HAVE is the motto that we set for the direction of the brand from the early days of its establishment, to bring users unique and always on-trend outfits.
After a period of constantly creating and perfecting, HARMONIC is increasingly being received with positive feedback, this is the source of energy for us to continue to develop.
Thank you for always trusting!</p>
            </div>

            <div class="container-fluid">
                <div class="aboutInfo">
                    <div class="box">
                        <div class="icon"> <i class="fa fa-map"></i> </div>
                        <div class="text">
                            <h3>Address</h3>
                            <p>580 Cach Mang Thang Tam, District 10, HCM City </p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fa fa-phone"></i></div>
                        <div class="text">
                            <h3>Phone</h3>
                            <p>0329156861</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fa fa-envelope"></i></div>
                        <div class="text">
                            <h3>Email</h3>
                            <p>dinhngocminhhieu@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1959.6627235957249!2d106.66558081290123!3d10.78636694601006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f39e5fa506f%3A0xe9b82409cff3ad0d!2zNTgwIEPDoWNoIE3huqFuZyBUaMOhbmcgVMOhbSwgUGjGsOG7nW5nIDExLCBRdeG6rW4gMywgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1634013541455!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <hr>

            <div class="member">
                <div class="container1">
                   
                    <div class="card">
                        <div class="content-member">
                            <div class="imgBx">
                                <img src="images/phat.jpg">
                            </div>
                            <div class="contentBx">
                                <h3>Khanh Phat <br> <span></span> </h3>
                            </div>
                        </div>
                        <ul class="sci">
                            <li style="--i:1">
                                <a href="https://www.facebook.com/vankhanhphat"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li style="--i:2">
                                <a href="https://www.instagram.com/_vkphat/"><i class="fa fa-instagram"></i></a>
                            </li>

                        </ul>
                    </div>
                    <div class="card">
                        <div class="content-member">
                            <div class="imgBx">
                                <img src="images/phuc.jpg">
                            </div>
                            <div class="contentBx">
                                <h3>Hoang Phuc <br> <span></span> </h3>
                            </div>
                        </div>
                        <ul class="sci">
                            <li style="--i:1">
                                <a href="https://www.facebook.com/pdhflwpg"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li style="--i:2">
                                <a href="https://instagram.com/ph_uc_?utm_medium=copy_link"><i class="fa fa-instagram"></i></a>
                            </li>

                        </ul>
                    </div>
                    <div class="card">
                        <div class="content-member">
                            <div class="imgBx">
                                <img src="images/anh.jpg">
                            </div>
                            <div class="contentBx">
                                <h3>Hoang Anh<br> <span></span> </h3>
                            </div>
                        </div>
                        <ul class="sci">
                            <li style="--i:1">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li style="--i:2">
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>

                        </ul>
                    </div>
                    <div class="card">
                        <div class="content-member">
                            <div class="imgBx">
                                <img src="images/hieu.jpg">
                            </div>
                            <div class="contentBx">
                                <h3>Minh Hieu<br> <span></span> </h3>
                            </div>
                        </div>
                        <ul class="sci">
                            <li style="--i:1">
                                <a href="https://www.facebook.com/profile.php?id=100051206900189"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li style="--i:2">
                                <a href="https://www.instagram.com/dinh.ngocminhhieu/"><i class="fa fa-instagram"></i></a>
                            </li>

                        </ul>
                    </div>
                </div>
            
            </div>
        </section>


















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