<?php 
session_start();
include ('includes/db.php');
if(!isset($_SESSION['admin_email']))
{
    echo"<script> window.open('login.php','_self') </script>";
}else{


?>
<?php 
    $admin_session=$_SESSION['admin_email'];
    $get_admin="select * from admins where admin_email='$admin_session'";
    $run_admin=mysqli_query($con,$get_admin);
    $row_admin= mysqli_fetch_array($run_admin);
    $admin_id=$row_admin['admin_id'];
    $admin_name=$row_admin['admin_name'];
    $admin_email=$row_admin['admin_email'];
    $admin_image=$row_admin['admin_image'];
    $admin_country=$row_admin['admin_country'];
    $admin_job=$row_admin['admin_job'];
    $admin_contact=$row_admin['admin_contact'];
    $admin_about=$row_admin['admin_about'];

    $get_pro="select * from products";
    $run_pro=mysqli_query($con,$get_pro);
    $count_pro=mysqli_num_rows($run_pro);

    $get_cust="select * from customers";
    $run_cust=mysqli_query($con,$get_cust);
    $count_cust=mysqli_num_rows($run_cust);

    $get_p_cat="select * from product_category";
    $run_p_cat=mysqli_query($con, $get_p_cat);
    $count_p_cat=mysqli_num_rows($run_p_cat);

    $get_order="select * from customer_order";
    $run_order=mysqli_query($con, $get_order);
    $count_order=mysqli_num_rows($run_order);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PANEL</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/style.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Tiny Cloud -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- tableDATA -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css">

    
</head>

<body>
   <div id="wrapper">
    <?php
        include('includes/sidebar.php')
        ?>
        <div id="page-wrapper">
            <div class="container-fluid">
            <?php
                if (isset($_GET['dashboard'])) {
                    include_once 'dashboard.php';
                }
                if (isset($_GET['insert_product'])) {
                    include_once 'insert_product.php';
                }
                if (isset($_GET['view_product'])) {
                    include_once 'view_product.php';
                }
                if (isset($_GET['delete_product'])) {
                    include_once 'delete_product.php';
                }
                if (isset($_GET['edit_product'])) {
                    include_once 'edit_product.php';
                }
                if (isset($_GET['insert_product_cat'])) {
                    include_once 'insert_p_cat.php';
                }
                if (isset($_GET['view_product_cat'])) {
                    include_once 'view_p_cat.php';
                }
                if (isset($_GET['delete_p_cat'])) {
                    include_once 'delete_p_cat.php';
                }
                if (isset($_GET['edit_p_cat'])) {
                    include_once 'edit_p_cat.php';
                }
                if (isset($_GET['insert_categories'])) {
                    include_once 'insert_cat.php';
                }
                if (isset($_GET['view_categories'])) {
                    include_once 'view_cat.php';
                }
                if (isset($_GET['delete_cat'])) {
                    include_once 'delete_cat.php';
                }
                if (isset($_GET['edit_cat'])) {
                    include_once 'edit_cat.php';
                }
                if (isset($_GET['insert_slider'])) {
                    include_once 'insert_slider.php';
                }
                if (isset($_GET['view_slider'])) {
                    include_once 'view_slider.php';
                }
                if (isset($_GET['delete_slider'])) {
                    include_once 'delete_slider.php';
                }
                if (isset($_GET['edit_slider'])) {
                    include_once 'edit_slider.php';
                }
                if (isset($_GET['view_customer'])) {
                    include_once 'view_customer.php';
                }
                if (isset($_GET['customer_delete'])) {
                    include_once 'customer_delete.php';
                }
                if (isset($_GET['view_order'])) {
                    include_once 'view_order.php';
                }
                if (isset($_GET['delete_order'])) {
                    include_once 'delete_order.php';
                }
                if (isset($_GET['view_payments'])) {
                    include_once 'view_payments.php';
                }
                if (isset($_GET['delete_payment'])) {
                    include_once 'delete_payment.php';
                }
                if (isset($_GET['insert_user'])) {
                    include_once 'insert_user.php';
                }
                if (isset($_GET['view_user'])) {
                    include_once 'view_user.php';
                }
                if (isset($_GET['delete_user'])) {
                    include_once 'delete_user.php';
                }
                if (isset($_GET['user_profile'])) {
                    include_once 'user_profile.php';
                }
                if (isset($_GET['view_detail_p'])) {
                    include_once 'view_detail_p.php';
                }
               


                ?>
            </div>
        </div>
    </div>





<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src=" https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src=" https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>

<?php } ?>