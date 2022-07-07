<?php
include('includes/db.php');
if (!isset($_SESSION['admin_email'])) {
    echo "<script> window.open('login.php','_self') </script>";
} else {

?>

    <?php
    if (isset($_GET['user_profile'])) {
        $edit_id = $_GET['user_profile'];
        $get_user = "select * from admins where admin_id='$edit_id'";
        $run_edit = mysqli_query($con, $get_user);
        $row_edit = mysqli_fetch_array($run_edit);

        $user_id = $row_edit['admin_id'];
        $user_name = $row_edit['admin_name'];
        $user_email = $row_edit['admin_email'];
        $user_pass = $row_edit['admin_pass'];
        $user_image = $row_edit['admin_image'];
        $user_country = $row_edit['admin_country'];
        $user_job = $row_edit['admin_job'];
        $user_contact = $row_edit['admin_contact'];
        $user_about = $row_edit['admin_about'];
    }

    ?>

    <div class="row">
        <!--breadcrumb row start -->
        <div class="col-lg-12">
            <div class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i>
                    Dashboard / Edit ADMIN
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
                    <h3 style="color:black;" class="panel-title"> <i class="fa fa-money fa-w"></i> Edit ADMIN</h3>
                </div><!-- panel heading end -->
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Admin Name</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_name" class="form-control" required value="<?php echo $user_name ?>" pattern="^[A-Za-z].*" title="Begin with a words">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"> Email</label>

                            <div class="col-md-6">
                                <input type="email" name="admin_email" class="form-control" required value="<?php echo $user_email?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="example@ex.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Password</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_pass" class="form-control" required value="<?php echo $user_pass?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Country</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_country" class="form-control" required value="<?php echo $user_country?>" pattern="^[A-Za-z].*" title="Begin with a words">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Job</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_job" class="form-control" required value="<?php echo $user_job?>" pattern="^[A-Za-z].*" title="Begin with a words">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Contact</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_contact" class="form-control" required value="<?php echo $user_contact?>"  maxlength="10" pattern="(\+84|0)\d{9,10}" title="Only number !" placeholder="012345678">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Image</label>
                            <div class="col-md-6">
                                <input type="file" name="admin_image" class="form-control" required>
                                <br>
                                <img src="admin_images/<?php echo $admin_image; ?>" width="70" height="70" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">About</label>
                            <div class="col-md-6">
                                <textarea type="text" name="admin_about" class="form-control" required rows="3" value="<?php echo $user_about?>" minlength="20">
                            </textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="update" value="Update User" class="btn btn-warning form-control" required>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>





    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    </body>

    </html>

    <?php
    if (isset($_POST['update'])) {
        $user_name = $_POST['admin_name'];
        $user_email = $_POST['admin_email'];
        $user_pass = $_POST['admin_pass'];
        $user_country = $_POST['admin_country'];
        $user_job = $_POST['admin_job'];
        $user_contact = $_POST['admin_contact'];
        $user_about = $_POST['admin_about'];
        

        $user_image = $_FILES['admin_image']['name'];
        $temp_name = $_FILES['admin_image']['tmp_name'];
        move_uploaded_file($temp_name, "admin_images/$user_image");
        


        $update_admin = "update admins set admin_name='$user_name',admin_email='$user_email',admin_pass='$user_pass',admin_image='$user_image',admin_contact='$user_contact',admin_country='$user_country',admin_job='$user_job',admin_about='$user_about' where admin_id='$user_id'";
        $run_admin = mysqli_query($con, $update_admin);

        if ($run_admin) {
            echo "<script>alert('USER has been updated successfully');</script>";
            echo "<script>window.open('login.php','_self')</script>";
            session_destroy();
        }
    }

    ?>
<?php } ?>