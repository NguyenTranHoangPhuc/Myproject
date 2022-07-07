<?php
// khoong cho vao bang duong dan
if(!isset($_SESSION['admin_email']))
{
    echo"<script> window.open('login.php','_self') </script>";
}else{

?>
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:black">
    <div class="navbar-header">
        <button type="button" class="navbar-toogle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toogle Navigaton</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span> 
            <i class="fa fa-bars"></i>
            

        </button>
        <a href="index.php?dashboard" class="navbar-brand home " >ADMIN PANNEL</a>
    </div>
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i> <?php echo $admin_name ?> <b class="caret"></b >
            </a>
            <ul class="dropdown-menu">
                <!-- <li>
                    <a href="index.php?user_profile?id=<?php echo $admin_id ?>">
                        <i class="fa fa-user"></i> Profile
                    </a>
                </li> -->
                <li>
                    <a href="index.php?view_product">
                        <i class="fa fa-envelope"></i> Product
                        <span class="badge"><?php echo $count_pro ?></span>

                    </a>
                </li>
                <li>
                    <a href="index.php?view_customer">
                        <i class="fa fa-users"></i> Customer
                        <span class="badge"><?php echo $count_cust ?></span>

                    </a>
                </li>
                <li>
                    <a href="index.php?view_product_cat">
                        <i class="fa fa-gear"></i> Product Categories
                        <span class="badge"><?php echo $count_p_cat ?></span>

                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="logout.php">Logout
                        <i class="fa fa-fw fa-power-off"></i>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php?dashboard">
                    <i class="fa fa-fw fa-dashboard"></i>Dashboard
                </a>
            </li>
            <li> <!-- start here -->
                <a href="#" data-toggle="collapse" data-target="#products"> <i class="fa fa-fw fa-tag"></i>Product<i class="fa fa-fw fa-caret-down"></i></a>

                <ul id="products" class="collapse">
                    <li>
                        <a href="index.php?insert_product">Insert Product</a>
                    </li>
                    <li>
                        <a href="index.php?view_product">View Product</a>
                    </li>
                </ul>
            </li> <!-- end here -->

            <li> <!-- start here -->
                <a href="#" data-toggle="collapse" data-target="#product_cat"> <i class="fa fa-fw fa-table"></i>Product Categories<i class="fa fa-fw fa-caret-down"></i></a>

                <ul id="product_cat" class="collapse">
                    <li>
                        <a href="index.php?insert_product_cat">Insert Prodcut Categories</a>
                    </li>
                    <li>
                        <a href="index.php?view_product_cat">View Product Categories</a>
                    </li>
                </ul>
            </li> <!-- end here -->
            <li> <!-- start here -->
                <a href="#" data-toggle="collapse" data-target="#category"> <i class="fa fa-fw fa-table"></i>Categories<i class="fa fa-fw fa-caret-down"></i></a>

                <ul id="category" class="collapse">
                    <li>
                        <a href="index.php?insert_categories">Insert Categories</a>
                    </li>
                    <li>
                        <a href="index.php?view_categories">View Categories</a>
                    </li>
                </ul>
            </li> <!-- end here -->
            <li> <!-- start here -->
                <a href="#" data-toggle="collapse" data-target="#slider"> <i class="fa fa-fw fa-table"></i>Slider<i class="fa fa-fw fa-caret-down"></i></a>

                <ul id="slider" class="collapse">
                    <li>
                        <a href="index.php?insert_slider">Insert Slider</a>
                    </li>
                    <li>
                        <a href="index.php?view_slider">View Slider</a>
                    </li>
                </ul>
            </li> <!-- end here -->
            <li>
                <a href="index.php?view_customer">
                    <i class="fa fa-fw fa-edit"></i>View Customer
                </a>
            </li>
            <li>
                <a href="index.php?view_order">
                    <i class="fa fa-fw fa-list"></i>View Order
                </a>
            </li>
            <li>
                <a href="index.php?view_payments">
                    <i class="fa fa-fw fa-money"></i>View Payment
                </a>
            </li>
            <li> <!-- start here -->
                <a href="#" data-toggle="collapse" data-target="#user"> <i class="fa fa-fw fa-table"></i>ADMIN<i class="fa fa-fw fa-caret-down"></i></a>

                <ul id="user" class="collapse">
                    <li>
                        <a href="index.php?insert_user">Insert Admin</a>
                    </li>
                    <li>
                        <a href="index.php?view_user">View Admin</a>
                    </li>
                  
                </ul>
            </li> <!-- end here -->
        </ul>
    </div>
</nav>
<?php } ?>