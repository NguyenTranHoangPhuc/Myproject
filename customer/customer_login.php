<div class="box">
    <div class="box-header">
        <center>
            <h2 style="color: black">LOGIN</h2>
            <p class="lead" style="color: black">Already our Customer</p>
        </center>
    </div>
    <form action="checkout.php" method="post">
        <div class="form-group">
            <label style="color: black">Email</label>
            <input type="text" class="form-control" name="c_email" required placeholder="Example@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="example@ex.com">
        </div>

        <div class="form-group">
            <label style="color: black">Password</label>
            <input type="password" class="form-control" name="c_password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
        </div>

        <div class="text-center">
            <button name="login" value="Login" class="btn btn-primary">
                <i class="fa fa-sign-in"></i>Login
            </button>

        </div>
    </form>
    <center>
        <a href="customer_registration.php">
            <h3>New? Register Now</h3>
        </a>
    
        <a href="forgot_password.php">
            <h3>Forget Password?</h3>
        </a>
    </center> 

</div>

<?php
if (isset($_POST['login'])) {
    $customer_email = $_POST['c_email'];
    $customer_pass = $_POST['c_password'];
    $select_customers = "select * from customers where customer_email = '$customer_email' and customer_pass ='$customer_pass'";
    $run_cust = mysqli_query($con, $select_customers);
    $get_ip = getUserIP();
    $check_customer = mysqli_num_rows($run_cust);
    $select_cart = "select * from cart where ip_add = '$get_ip'";
    $run_cart = mysqli_query($con, $select_cart);
    $check_cart = mysqli_num_rows($run_cart);
    if ($check_customer == 0) {
        echo "<script>alert('PASSWORD/EMAIL wrong')</script>";
        exit();
    }
    if ($check_customer == 1 and $check_cart == 0) {
        $_SESSION['customer_email'] = $customer_email;
        echo "<script>alert('You are logged in')</script>";
        echo "<script>window.open('customer/my_account.php','_self')</script>";
    } else {
        $_SESSION['customer_email'] = $customer_email;
        echo "<script>alert('You are logged in')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }
}

?>