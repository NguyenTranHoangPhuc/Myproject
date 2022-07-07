<?php
session_start();

include('includes/db.php');
include('functions/functions.php')
?>
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
                        echo "Welcome : ".$_SESSION['customer_email']. "";
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
                        <li class="active">
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
                    <li class="text-muted">Cart</li>
                </ul>
            </div>
            <div class="col-md-9" id="cart">
                <div class="box">
                    <form action="cart.php" method="post" enctype="multipart-form-data">

                        <h1 style="color:black;">Shopping Cart</h1>

                        <?php
                        $ip_add = getUserIP();
                        $select_cart = "select * from cart where ip_add='$ip_add'";
                        $run_cart = mysqli_query($con, $select_cart);
                        $count = mysqli_num_rows($run_cart);
                        ?>

                        <p class="text-muted"> Currently You have <?php echo $count ?> item(s) in your cart</p>
                        <div class="table-responsive">
                            <table class="table"> >
                                <thead class="text-info">
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Sizes</th>
                                        <th colspan="1">Delete</th>
                                        <th colspan="1">Sub-Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    while ($row = mysqli_fetch_array($run_cart)) {
                                        $pro_id = $row['p_id'];
                                        $pro_size = $row['size'];
                                        $pro_qty = $row['qty'];
                                        $get_product = "select * from products where product_id='$pro_id'";
                                        $run_pro = mysqli_query($con, $get_product);
                                        while ($row = mysqli_fetch_array($run_pro)) {
                                            $p_title = $row['product_title'];
                                            $p_img1 = $row['product_img1'];
                                            $p_price = number_format($row['product_price'], 0, ",", ",");
                                            $sub_total = $row['product_price'] * $pro_qty;
                                            /* test */
                                            $_SESSION['pro_qty']= $pro_qty;
                                            /* test end */
                                            $total += $sub_total;

                                         


                                    ?>
                                            <tr style="color: black;">
                                                <td><img src="admin_area/product_images/<?php echo $p_img1;  ?>"></td>
                                                <td><?php echo $p_title ?></td>
                                                <td>
                                                    <!-- test -->
                                                    <input type="text" name="quantity" data-product_id="<?php echo $pro_id;?>" value="<?php echo $_SESSION['pro_qty']?>" class="quantity form-control" >
                                                </td>
                                                <td><?php echo $p_price  ?> đ</td>
                                                <td><?php echo $pro_size ?></td>
                                                <td> <input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>"></td>
                                                <td><?php echo number_format($sub_total, 0, ",", ",") ?> đ</td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>

                                    </tfoot>
                            </table>
                        </div>

                        <div class="total">
                            <div class="pull-left">
                                <h4 style="color:black; font-weight: 800;">TOTAL PRICE:</h4>
                            </div>
                            <div class="pull-right">
                                <h4 style="color:black;"><?php echo number_format($total, 0, ",", ",") ?> đ</h4>
                            </div>
                        </div>


                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="index.php" class="btn btn-default">
                                    <i class="fa fa-chevron-left"></i> Continue Shopping
                                </a>
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-primary" type="submit" name="update" value="Update Cart">
                                    <i class="fa fa-refresh"> Update Cart </i>
                                </button>
                                <a href="checkout.php" class="btn btn-primary">
                                    Proceed to checkout <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>


                <?php 
                    function update_cart(){
                        global $con;
                        if(isset($_POST['update']))
                        {
                            foreach($_POST['remove'] as $remove_id)
                            {
                                $delete_product ="delete from cart where p_id='$remove_id'";
                                $run_del = mysqli_query($con,$delete_product);
                                if($run_del){
                                    echo "<script> window.open('cart.php','_self')</script>";
                                }
                            }
                        }
                    }
                    echo $up_cart = update_cart();
                
                ?> 
                
            </div>
            <div class="col-md-3">
                <div class="box" id="order-summary">
                    <div class="box-header">
                        <h3 style="color: black;">Order Summary</h3>
                    </div>
                    <p class="text-muted">
                        Shipping and additional coasts are calculated based on the values you have entered
                    </p>
                    <div class="table-responsive">
                        <table class="table">
                            <tr style="color: blue">
                                <td>Order Subtotal</td>
                                <th><?php echo number_format($total, 0, ",", ",") ?>đ</th>
                            </tr>
                             <tr style="color: blue;">
                                <td>Shipping and handling</td>
                                <th>0đ</th>
                            </tr>

                            <tr style="color: blue;">
                                <td>Tax</td>
                                <th>0đ</th>
                            </tr> 
                            <tr class="total" style="color:red;">
                                <td>Total</td>
                                <th><?php echo number_format($total, 0, ",", ",") ?>đ</th>
                            </tr>
                        </table>
                    </div>
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

    <!-- test -->
    <script>
        $(document).ready(function(data){
            $(document).on('keyup','.quantity',function(){
                var id= $(this).data("product_id");
                var quantity = $(this).val();
                
                if(quantity !=''){
                    $.ajax({
                        url :"change.php",
                        method : "POST",
                        data:{id:id,quantity:quantity},

                        success:function(){
                            $("body").load("cart_body.php");
                        }
                    });
                }
            });
        });
    </script>


</body>