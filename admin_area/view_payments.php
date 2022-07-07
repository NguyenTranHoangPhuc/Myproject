<?php
include('includes/db.php');
if (!isset($_SESSION['admin_email'])) {
    echo "<script> window.open('login.php','_self') </script>";
} else {

?>

<div class="row">
        <!-- row 1 start -->
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i>Dashboard / View Payments
                </li>
            </ol>
        </div>
    </div> <!-- row 1 end -->

    <div class="row">
        <!-- row 2 start -->
        <div class="col-lg-12">
            <div class="panel panel default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> View Payments
                    </h3>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="example">
                            <thead>
                                <tr>
                                    <th>Payment ID</th>
                                    <th>Invoice No</th>
                                    <th>Amount Paid</th>
                                    <th>Payment Method</th>
                                    <th>Reference No</th>
                                    <th>Payment Date</th>
                                    <th>Delete</th>
                                  
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                $i=0;
                                $get_payments="select * from payments";
                                $run_payments=mysqli_query($con,$get_payments);
                                while($row_payments=mysqli_fetch_array($run_payments)){
                                    $payment_id = $row_payments['payment_id'];
                                    $invoice_no = $row_payments['invoice_id'];
                                    $amount = number_format($row_payments['amount'], 0, ",",","); 
                                    $payment_mode = $row_payments['payment_mode'];
                                    $ref_no = $row_payments['ref_no'];
                                    $payment_date =$row_payments['payment_date'];
                                    $i++;
                                ?>

                                
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td bgcolor="yellow"><?php echo $invoice_no  ?></td>
                                    <td><?php echo $amount  ?> đ</td>
                                    <td><?php echo $payment_mode  ?></td>
                                    <td><?php echo $ref_no  ?></td>
                                    <td><?php echo $payment_date ?></td>

                                    <td>
                                        <a onclick="return Del('<?php echo $invoice_no ;?>')" href="index.php?delete_payment=<?php echo $payment_id ?>">
                                                <i class="fa fa-trash-o"></i> DELETE
                                        </a>
                                    </td>
                                    
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




<?php } ?>