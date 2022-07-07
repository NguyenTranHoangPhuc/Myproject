<?php
include('includes/db.php');
if (!isset($_SESSION['admin_email'])) {
    echo "<script> window.open('login.php','_self') </script>";
} else {
?>
  
    <div class="row">
        <!--breadcrumb row start -->
        <div class="col-lg-12">
            <div class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i>
                    Dashboard / Insert User
                </li>
            </div>
        </div>
    </div>
    <!--breadcrumb row end -->

    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <!-- panel heading start -->
                    <h3 style="color:black;" class="panel-title"> <i class="fa fa-money fa-w"></i> Insert User</h3>
                </div><!-- panel heading end -->
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">User Name</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_name" class="form-control" required pattern="^[A-Za-z].*" title="Begin with a words">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"> Email</label>

                            <div class="col-md-6">
                                <input type="email" name="admin_email" class="form-control" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="example@ex.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Password</label>
                            <div class="col-md-6">
                                <input type="password" name="admin_pass" class="form-control" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Country</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_country" class="form-control" required pattern="^[A-Za-z].*" title="Begin with a words">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Job</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_job" class="form-control" required pattern="^[A-Za-z].*" title="Begin with a words">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Contact</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_contact" class="form-control" required maxlength="10" pattern="(\+84|0)\d{9,10}" title="Only number !" placeholder="012345678">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Image</label>
                            <div class="col-md-6">
                                <input type="file" name="admin_image" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">About</label>
                            <div class="col-md-6">
                                <textarea type="text" name="admin_about" class="form-control" required rows="3" minlength="20">
                            </textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="submit" value="Insert User" class="btn btn-warning form-control" required>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>





    <?php
    if (isset($_POST['submit'])) {
        $user_name = $_POST['admin_name'];
        $user_email = $_POST['admin_email'];
        $user_pass = $_POST['admin_pass'];
        $user_country = $_POST['admin_country'];
        $user_contact = $_POST['admin_contact'];
        $user_job = $_POST['admin_job'];
        $user_about = $_POST['admin_about'];


        $user_image = $_FILES['admin_image']['name']; 
        $temp_name = $_FILES['admin_image']['tmp_name'];
        move_uploaded_file($temp_name, "admin_images/$user_image");



        $insert_user = "insert into admins (admin_name,admin_email,admin_pass,admin_country,admin_contact,admin_job,admin_image,admin_about) values('$user_name','$user_email','$user_pass','$user_country','$user_contact','$user_job','$user_image','$user_about')";

        $run_user = mysqli_query($con, $insert_user);
        if ($run_user) {
            echo "<script> alert('User Inserted Successfully');</script>";
            echo "<script> window.open('index.php?view_user','_self')</script>";
        }
    }

    ?>
<?php } ?>