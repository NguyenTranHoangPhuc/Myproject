<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script> window.open('login.php','_self') </script>";
} else {

?>

    <div class="row">
        <!-- start row 1  -->
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>
            </ol>
        </div>
    </div> <!-- end row 1  -->


    <div class="row">
        <!-- start row 2 -->
        <div class="col-md-3 col-md-6">
            <div class="panel panel-primary">
                <!-- panenl primary start -->
                <div class="panel-heading">
                    <!-- panel heading start -->
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>

                        <div class="col-xs-9 text-right">
                            <div class="huge"> <?php echo $count_pro ?></div>
                            <div>Products</div>
                        </div>
                    </div>
                </div><!-- panel heading end -->
                <a href="index.php?view_product">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div><!-- panel primary ends -->
        </div>

        <div class="col-md-3 col-md-6">
            <div class="panel panel-green">
                <!-- panenl primary start -->
                <div class="panel-heading">
                    <!-- panel heading start -->
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>

                        <div class="col-xs-9 text-right">
                            <div class="huge"> <?php echo $count_cust ?></div>
                            <div>Customers</div>

                        </div>
                    </div>
                </div><!-- panel heading end -->
                <a href="index.php?view_customer">
                    <div class="panel-footer">
                        <span class="pull-left">Customer</span>
                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div><!-- panel primary ends -->
        </div>

        <div class="col-md-3 col-md-6">
            <div class="panel panel-yellow">
                <!-- panen; primary start -->
                <div class="panel-heading">
                    <!-- panel heading start -->
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>

                        <div class="col-xs-9 text-right">
                            <div class="huge"> <?php echo $count_p_cat ?></div>
                            <div>Products Categories</div>

                        </div>
                    </div>
                </div><!-- panel heading end -->
                <a href="index.php?view_product_cat">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div><!-- panel primary ends -->
        </div>

        <div class="col-md-3 col-md-6">
            <div class="panel panel-red">
                <!-- panenl primary start -->
                <div class="panel-heading">
                    <!-- panel heading start -->
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-support fa-5x"></i>
                        </div>

                        <div class="col-xs-9 text-right">
                            <div class="huge"> <?php echo $count_order ?></div>
                            <div>Order</div>
                        </div>
                    </div>
                </div><!-- panel heading end -->
                <a href="index.php?view_order">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div><!-- panel primary ends -->
        </div>
    </div> <!-- end row 2  -->


    <div class="row"> <!-- start row 3 -->
        <div class="col-lg-9">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> New Orders
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Order No</th>
                                    <th>Customer Email:</th>
                                    <th>Invoice No</th>
                                    <th>Product ID</th>
                                    <th>Total</th>
                                    <th>Size</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=0;
                                    $get_order="select * from customer_order order by 1 DESC LIMIT 0,5";
                                    $run_order=mysqli_query($con,$get_order);
                                    while($row_order=mysqli_fetch_array($run_order)){
                                        $order_id=$row_order['order_id'];
                                        $customer_id=$row_order['customer_id'];
                                        $product_id=$row_order['product_id'];
                                        $invoice_no=$row_order['invoice_no'];
                                        $qty=$row_order['qty'];
                                        $size=$row_order['size'];
                                        $order_date=$row_order['order_date'];
                                        $status=$row_order['order_status'];
                                        $i++;
                                
                                ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td>
                                        <?php  
                                            $get_cust="select * from customers where customer_id='$customer_id'";
                                            $run_cust=mysqli_query($con,$get_cust);
                                            $row_customer=mysqli_fetch_array($run_cust);
                                            $customer_email=$row_customer['customer_email'];
                                            echo $customer_email;
                                        ?>
                                    </td>
                                    <td><?php echo $invoice_no ?></td>
                                    <td><?php echo $product_id ?></td>
                                    <td><?php echo $qty ?></td>
                                    <td><?php echo $size?></td>
                                    <td><?php echo $order_date?></td>
                                    <td><?php echo $status?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        <a href="index.php?view_order">
                            View All Orders <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel">
                <div class="panel-body">
                    <div class="mb-md thumb-info">
                        <img src="admin_images/<?php echo $admin_image ?>" alt="admin-thumb-info" class="rounded img-responsive">
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner"> <?php echo $admin_name ?> </span> 
                            <span class="thumb-info-type"><?php echo $admin_job?> </span>
                        </div>
                    </div>
                    <div class="mb-md">
                        <div class="widget-content-expanded">
                            <i class="fa fa-user" style="color:red"></i> <span style="font-weight: bold;">Email: </span> <?php echo $admin_email ?> <br>
                            <i class="fa fa-flag" style="color:chocolate"></i> <span style="font-weight: bold;">Country: </span> <?php echo $admin_country ?> <br>
                            <i class="fa fa-envelope" style="color:blue"></i> <span style="font-weight: bold;">Contact: </span> <?php echo $admin_contact ?><br>
                        </div>
                        <hr class="dotted short" style="margin: 10px 0 10px 0;">
                        <h5 class="text-muted">ABOUT ME</h5>
                        <p><?php echo $admin_about ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end row 3 -->
</div> <!-- end container-fluid -->
<?php } ?>