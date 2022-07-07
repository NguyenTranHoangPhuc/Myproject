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
                <li>
                    <i class="fa fa-dashboard"></i> Dashboard/ Insert Categories
                </li>
            </ol>
        </div>
    </div> <!-- row 1 end -->

    <div class="row">
        <!-- row 2 start -->
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> Insert Categories
                    </h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <!-- form group start -->
                            <label class="col-md-3 control-label">
                                Category Title
                            </label>
                            <div class="col-md-6">
                                <input type="text" name="cat_title" class="form-control" pattern="^^[A-Za-z].*" title="Begin with a words" required>
                            </div>
                        </div><!-- form group end -->
                        <div class="form-group">
                            <!-- form group start -->
                            <label class="col-md-3 control-label">
                                Product Category Description
                            </label>
                            <div class="col-md-6">
                                <textarea name="cat_desc" type="text" class="form-control" cols="6" rows="10" minlength="20" required>
                            </textarea>
                            </div>
                        </div><!-- form group end -->
                        <div class="form-group">
                            <!-- form group start -->
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="submit" value="Insert Category" class="btn btn-danger form-control">
                            </div>

                        </div><!-- form group end -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['submit'])){
        $cat_title = $_POST['cat_title'];
        $cat_desc = $_POST['cat_desc'];
        $insert_cat= "insert into categories (cat_title,cat_desc) values('$cat_title','$cat_desc')";
        $run_cat=mysqli_query($con,$insert_cat);
        if($run_cat){
            echo "<script> alert('New Category Has Been Inserted')</script>";
            echo "<script> window.open('index.php?view_categories','_self')</script>";
        }
    }

    ?>





<?php } ?>