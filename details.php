<?php
session_start();

include('includes/db.php');
include('functions/functions.php')
?>
<?php
if (isset($_GET['pro_id'])) {
    $pro_id = $_GET['pro_id'];
    $get_product = "select *from products where product_id = '$pro_id'";
    $run_product = mysqli_query($con, $get_product);
    $row_product = mysqli_fetch_array($run_product);

    $p_cat_id = $row_product['p_cat_id'];
    $p_title = $row_product['product_title'];
    $p_price = number_format($row_product['product_price'], 0, ",",",");
    $p_img1 = $row_product['product_img1'];
    $p_img2 = $row_product['product_img2'];
    $p_img3 = $row_product['product_img3'];
    $p_desc = $row_product['product_desc'];
    $p_desc1 = $row_product['product_desc1'];
    $get_p_cat = "select * from product_category where p_cat_id='$p_cat_id'";
    $run_p_cat = mysqli_query($con, $get_p_cat);
    $row_p_cat = mysqli_fetch_array($run_p_cat);

     $p_cat_id = $row_p_cat['p_cat_id'];
     $p_cat_title = $row_p_cat['p_cat_title'];
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
                    WELCOME GUEST
                </a>
                <a href="#">Shopping Cart Total Price:  <?php totalPrice();?> đ, Total Items  <?php item(); ?> </a>
            </div>

            <div class="col-md-6">
                <ul class="menu">
                    <li>
                        <a href="customer_registration.php">Register</a>
                    </li>
                    <li>
                        <a href="checkout.php">Checkout</a>
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
                        ?>                         </li>
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
                    <li><a href="shop.php?p_cat= <?php echo $p_cat_id; ?>"> <?php echo $p_cat_title; ?></a></li>
                    <li style="color: black;"> <?php echo $p_title; ?></li>
                </ul>
            </div>
            <div class="col-md-3">
                <?php
                include("includes/sidebar.php");
                ?>
            </div>
            <div class="col-md-9">
                <div class="row" id="productmain">
                    <div class="col-sm-6">
                        <div id="mainimage">
                            <div id="mycarousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#mycarousel" data-slide-to="1"></li>
                                    <li data-target="#mycarousel" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <center>
                                            <img src="admin_area/product_images/<?php echo $p_img1 ?>" class="img-responsive">
                                        </center>
                                    </div>
                                    <div class="item ">
                                        <center>
                                            <img src="admin_area/product_images/<?php echo $p_img2 ?>" class="img-responsive">
                                        </center>
                                    </div>
                                    <div class="item ">
                                        <center>
                                            <img src="admin_area/product_images/<?php echo $p_img3 ?>" class="img-responsive">
                                        </center>
                                    </div>

                                </div>
                                <a href="#mycarousel" class="left carousel-control" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a href="#mycarousel" class="right carousel-control" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="box">
                            <h1 class="text-center" style="color:black"><?php echo $p_title ?></h1>
                            <?php 
                                addCart();
                        
                            ?>
                            <form action="details.php?add_cart= <?php echo $pro_id ?> " method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" style="color:black">Product Quantity</label>
                                    <div class="col-md-7">
                                        <select name="product_qty" class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label" style="color:black"> Product Size</label>
                                    <div class="col-md-7">
                                        <select name="product_size" class="form-control" required >
                                            <option value="">Select a size:</option>
                                            <option>S</option>
                                            <option>M</option>
                                            <option>L</option>
                                            <option>XL</option>
                                            <option>XXL</option>
                                        </select>
                                    </div>
                                </div>
                                <p class="prices" style="color:red;">PRICES: <?php echo $p_price ?> đ</p>
                                <p class="text-center buttons">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </p>
                            </form>
                        </div>
                        <div class="col-xs-4">
                            <a href="#" class="thumb">
                                <img src="admin_area/product_images/<?php echo $p_img1 ?>" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="#" class="thumb">
                                <img src="admin_area/product_images/<?php echo $p_img2 ?>" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="#" class="thumb">
                                <img src="admin_area/product_images/<?php echo $p_img3 ?>" class="img-responsive">
                            </a>
                        </div>

                    </div>
                </div>

                <!-- test -->
                <div class="product-content-right-bottom">
                    <div class="product-content-right-bottom-top">
                        &#8744;
                    </div>
                    <div class="product-content-right-bottom-content-big">
                        <div class="product-content-right-bottom-content-title row1">
                            <div class="product-content-right-bottom-content-title-item chitiet" >
                                <button style="color: black; background-color: yellow;" >DETAILS</button>
                            </div>
                            <div class="product-content-right-bottom-content-title-item baoquan">
                                <button style="color: black;background-color: orange">PRESERVE</button>
                            </div>
                           
                            
                        </div>
                        <div class="product-content-right-bottom-content">
                            <div class="product-content-right-bottom-content-chitiet">
                                <p style="color: black; font-size:15px"> <?php echo $p_desc ?></p>
                            </div>
                            <div class="product-content-right-bottom-content-baoquan">
                                <p style="color: black;font-size:15px"> <?php echo $p_desc1 ?></p>
                            </div>
                           
                            
                        </div>
                    </div>

                </div>
                <!-- end test -->


                <div id="row same-height-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height headline">
                            <h3 class="text-center" style="color: black; ">You Also Like These Products</h3>
                        </div>
                    </div>
                   
                    <?php 
                    $get_product ="select *from products order by 1 desc LIMIT 0,3";
                    $run_product= mysqli_query($con,$get_product);
                    while($row =mysqli_fetch_array($run_product)){
                        $pro_id =$row['product_id'];
                        $product_title =$row['product_title'];
                        $product_price = number_format($row['product_price'], 0, ",",",");
                        $product_img1 =$row['product_img1'];
                        echo"
                            <div class='center-responsive col-md-3 col-sm-6'>
                                <div class='product same-height'>
                                    <a href='details.php?pro_id= $pro_id'>
                                        <img src='admin_area/product_images/$product_img1' class='img-responsive'>
                                    </a>
                                    <div class='text'>
                                     <h3> <a href='details.php?pro_id= $pro_id'> $product_title</a></h3>
                                     <br>
                                    <p class='prices'> GIÁ: $product_price đ</p>
                                     </div>

                                </div>
                            </div>
                        ";
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