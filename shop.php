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
                        ?>                     </li>
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
                        <li class="active">
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
    </div> <!-- navbar end -->

    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="text-muted">Shop</li>
                </ul>
            </div>
            <div class="col-md-3">
                <?php
                include("includes/sidebar.php");
                ?>
            </div>

            <div class="col-md-9">
                <?php
                if (!isset($_GET['p_cat'])) {
                    if (!isset($_GET['cat_id'])) {
                        echo "<div class='box'>
                                <h1 style='color: black;text-align:center;'>SHOP</h1>
                                <p style='color: black; text-align:center; '> If you want domain name and shared hosting plan in low price then please visit myWEBSITE....</p>
                            </div>";
                    }
                }
                ?>
                <div class="row">
                    
                    <!--GET PRODUCT ALL  START -->
                    <!-- row start -->
                    <?php
                    if (!isset($_GET['p_cat'])) {
                        if (!isset($_GET['cat_id'])) {
                            $per_page =12 ;
                            if (isset($_GET['page'])) {
                                $page = $_GET['page'];
                            } else {
                                $page = 1;
                            }
                            $start_from = ($page - 1) * $per_page;
                            $get_product = "select*from products order by 1 desc limit $start_from ,$per_page ";
                            $run_pro = mysqli_query($con, $get_product);
                            while ($row = mysqli_fetch_array($run_pro)) {
                                $pro_id = $row['product_id'];
                                $pro_title = $row['product_title'];
                                $pro_img1 = $row['product_img1'];
                                $pro_price = number_format($row['product_price'], 0, ",", ",");


                                echo " 
                                <div class='col-md-3 col-sm-6 'center-responsive>
                                            <div class='product'>
                                                <a href='details.php?pro_id= $pro_id'>
                                                    <img src='admin_area/product_images/$pro_img1' class='img-responsive'>
                                                </a>
                                            <div class='text'>
                                                <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>    
                                                <p class=prices> Giá: $pro_price đ </p>
                                                <p class = buttons> 
                                                    <a href='details.php?pro_id=$pro_id' class='btn btn-success'> View Details</a>
                                                    <a href='details.php?pro_id=$pro_id' class='btn btn-primary'> <i class='fa fa-shopping-cart'></i> Add to Cart</a>
                                                </p>
                                            </div>
                                            </div>
                                        </div> 
                                       
                                        ";     
                            }
                    ?>            
                           
                               <center>
                                <ul class="pagination">
                            <?php
                            $query = "select * from products";
                            $result = mysqli_query($con, $query);
                            $total_record = mysqli_num_rows($result);
                            $total_pages = ceil($total_record / $per_page);
                            echo "<li> <a href='shop.php?page=1'> " . 'First Page' . " </a> </li>";
                                                                                        
                            for ($i = 1; $i <= $total_pages; $i++) 
                                {
                                  
                                   
                                echo " <li > <a href='shop.php?page= " . $i . "'> " . $i . "</a> </li>";
                                }

                                echo " <li > <a href='shop.php?page=$total_pages'> " . 'Last Page' . " </a> </li>  ";
                                
                            }
                        
                    }
                            ?>
                                </ul>
                                </center>
                                
                            
                                
                               
                           
                               
                            <!-- GET PRODUCT ALL END -->



                            <!-- GET PRODUCT CATEGORY START-->

                            <?php
                            if (isset($_GET['p_cat'])) {
                                $per_page = 4;
                                if (isset($_GET['page'])) {
                                    $page = $_GET['page'];
                                } else {
                                    $page = 1;
                                }

                                $p_cat_id = $_GET['p_cat'];
                                $get_p_cat = "select * from product_category where p_cat_id = '$p_cat_id'";
                                $run_p_cat = mysqli_query($con, $get_p_cat);
                                $row_p_cat = mysqli_fetch_array($run_p_cat);
                                $p_cat_title = $row_p_cat['p_cat_title'];
                                $p_cat_desc = $row_p_cat['p_cat_desc'];

                                $start_from = ($page - 1) * $per_page;
                                $get_products = "select * from products where p_cat_id = '$p_cat_id' order by 1 desc  limit $start_from ,$per_page ";
                                $run_products = mysqli_query($con, $get_products);
                                $count = mysqli_num_rows($run_products);
                                if ($count == 0) {
                                    echo "
                                        <div class='box'>
                                        <h1>No Product Found In This Product Categories</h1>
                                         </div> ";
                                } else {
                                    echo "
                                         <div class='box'> 
                                            <h1 class='text-muted'>$p_cat_title</h1>
                                             <p class='text-muted' >$p_cat_desc</p>
                                        </div>";
                                }
                                while ($row_products = mysqli_fetch_array($run_products)) {
                                    $pro_id = $row_products['product_id'];
                                    $pro_title = $row_products['product_title'];
                                    $pro_price = number_format($row_products['product_price'], 0, ",", ",");
                                    $pro_img1 = $row_products['product_img1'];

                                    echo "
                                        <div class='col-md-3 col-sm-6' center-responsive>
                                            <div class='product'>
                                                <a href='details.php?pro_id=$pro_id'>
                                                <img src='admin_area/product_images/$pro_img1' class='img-responsive'>
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
                                        </div> ";
                                }
                            ?>
                                <div class="col-md-12">
                                    <center>
                                    <ul class="pagination">
                                    <?php
                                    $query = "select * from products where p_cat_id = '$p_cat_id'";
                                    $result = mysqli_query($con, $query);
                                    $total_record = mysqli_num_rows($result);
                                    $total_pages = ceil($total_record / $per_page);
                                    echo "
                            <li> <a href='shop.php?p_cat=$p_cat_id&page=1'> " . 'First Page' . " </a> </li>
                        ";
                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        echo " <li> <a href='shop.php?p_cat=$p_cat_id&page= " . $i . "'> " . $i . "</a> </li>";
                                    };

                                    echo " <li> <a href='shop.php?p_cat=$p_cat_id&page=$total_pages'> " . 'Last Page' . " </a> </li>   ";
                                }

                                    ?>
                                    </ul>
                                </center>
                                </div>

                                <!-- GET PRODUCT CATEGORY END-->

                                <!-- GET CATEGORIES START-->
                                <?php
                                if (isset($_GET['cat_id'])) {
                                    $per_page = 4;
                                    if (isset($_GET['page'])) {
                                        $page = $_GET['page'];
                                    } else {
                                        $page = 1;
                                    }

                                    $cat_id = $_GET['cat_id'];
                                    $get_cat = "select * from categories where cat_id= $cat_id";
                                    $run_cats = mysqli_query($con, $get_cat);
                                    $row_p_cat = mysqli_fetch_array($run_cats);
                                    $cat_title = $row_p_cat['cat_title'];
                                    $cat_desc = $row_p_cat['cat_desc'];

                                    $start_from = ($page - 1) * $per_page;
                                    $get_products = "select * from products where cat_id = '$cat_id' order by 1 desc  limit $start_from ,$per_page ";
                                    $run_products = mysqli_query($con, $get_products);
                                    $count = mysqli_num_rows($run_products);
                                    if ($count == 0) {
                                        echo "
                                        <div class='box'>
                                            <h1>No Product Found In This Category</h1>
                                        </div> ";
                                    } else {
                                        echo "
                                            <div class='box'> 
                                                <h1 class='text-muted'>$cat_title</h1>
                                                <p class='text-muted' >$cat_desc</p>
                                        </div>";
                                    }
                                    while ($row_products = mysqli_fetch_array($run_products)) {
                                        $pro_id = $row_products['product_id'];
                                        $pro_title = $row_products['product_title'];
                                        $pro_price = number_format($row_products['product_price'], 0, ",", ",");
                                        $pro_img1 = $row_products['product_img1'];

                                        echo "
                                            <div class='col-md-3 col-sm-6' center-responsive>
                                                <div class='product'>
                                                    <a href='details.php?pro_id=$pro_id'>
                                                    <img src='admin_area/product_images/$pro_img1' class='img-responsive'>
                                                    </a>
                                                    <div class='text'>
                                                        <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                                                        <p class='prices'>Giá: $pro_price đ </p> 
                                                        <p class='buttons'> 
                                                        <a href='details.php?pro_id=$pro_id'' class='btn btn-success'>View Details</a>
                                                        <a href='details.php?pro_id=$pro_id'' class='btn btn-primary'>
                                                            <i class='fa fa-shopping-cart'></i> Add to cart
                                                        </a>
                                                    </p>
                                                    </div>
                                                </div>
                                            </div>  ";
                                    }
                                ?>

                                    <div class="col-md-12">
                                    <center>
                                        <ul class="pagination">
                                        <?php
                                        $query = "select * from products where cat_id = '$cat_id'";
                                        $result = mysqli_query($con, $query);
                                        $total_record = mysqli_num_rows($result);
                                        $total_pages = ceil($total_record / $per_page);
                                        echo "
                            <li> <a href='shop.php?cat_id=$cat_id&page=1'> " .'First Page'. " </a> </li>";

                                        for ($i = 1; $i <= $total_pages; $i++) {
                                            echo " <li > <a href='shop.php?cat_id=$cat_id&page= " . $i . "'> " . $i . "</a> </li>";
                                        };
            

                                        echo " <li> <a href='shop.php?cat_id=$cat_id&page=$total_pages'> " .'Last Page' . " </a> </li>   ";
                                    }

                                        ?>
                                        </ul>
                                    </center>
                                    </div>
                                    <!-- GET PRODUCT CATEGORIES END-->

                                    <!-- dùng function cũng được nhưng chưa biết phân trang ntn cần hỏi????? -->
                </div><!-- row end -->
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