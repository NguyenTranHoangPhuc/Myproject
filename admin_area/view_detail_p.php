<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script> window.open('login.php','_self') </script>";
} else {
?>

    <div class="row">
        <!-- row 1 start -->
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i>Dashboard / View Product Detail
                </li>
            </ol>
        </div>
    </div> <!-- row 1 end -->

    <div class="row">
        <!-- row 2 start -->
        <div class="col-lg-12   ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> View Products Detail
                    </h3>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped"    >
                            <thead >
                                <tr>
                                    <th>Product Title</th>
                                    <th>Product Image1</th>
                                    <th>Product Image2</th>
                                    <th>Product Image3</th>
                                    <th>Product Price</th>
                                    <th>Product Keyword</th>
                                    <th>Product Date</th>
                                    <th>Product Desc</th>
                                    <th>Product Desc1</th>
                                    
                                    
                                </tr>
                            </thead>

                            <tbody>
                                
                                <?php 
                                if(isset($_GET['view_detail_p'])){
                                    $view_id= $_GET['view_detail_p'];
                                    $get_p ="select * from products where product_id='$view_id'";
                                    $run_edit=mysqli_query($con,$get_p);
                                    $row_edit=mysqli_fetch_array($run_edit);
                                
                                    $p_id=$row_edit['product_id'];
                                    $p_title=$row_edit['product_title'];
                                    $date=$row_edit['date'];

                                    $p_image1=$row_edit['product_img1'];
                                    $p_image2=$row_edit['product_img2'];
                                    $p_image3=$row_edit['product_img3'];
                            
                                    $p_keywords=$row_edit['product_keywords'];
                                    $p_price=number_format($row_edit['product_price'], 0, ",", ","); 
                                    $p_desc=$row_edit['product_desc'];
                                    $p_desc1=$row_edit['product_desc1'];
                                }
                                ?>


            
                                <tr>
                                   
                                    <td><?php echo $p_title ?></td>
                                    <td><img src="product_images/<?php echo $p_image1?>" width="100" height="150"></td>
                                    <td><img src="product_images/<?php echo $p_image2?>" width="100" height="150"></td>
                                    <td><img src="product_images/<?php echo $p_image3?>" width="100" height="150"></td>
                                    <td ><?php echo $p_price ?>đ</td>
                                    <td><?php echo $p_keywords ?></td>
                                    <td><?php echo $date ?></td>
                                    <td><?php echo $p_desc?></td>
                                    <td><?php echo $p_desc1?></td>
                                 
                                    
                                </tr>
                               
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




<?php } ?>