<?php 
    if(!isset($_SESSION['admin_email'])){
        echo"<script>window.open('login.php','_self')</script>";
    }
    else{

    

?>
<?php 
    if(isset($_GET['delete_order'])){
        $delete_order_id=$_GET['delete_order'];
        $delete_order="delete from customer_order where order_id = '$delete_order_id'";
        $run_delete_order=mysqli_query($con,$delete_order);
        if($run_delete_order) {
            echo "<script>alert('Your order has been deleted ')</script>";
            echo "<script>window.open('index.php?view_order','_self')</script>";
        }

    }

?>
<?php }?>