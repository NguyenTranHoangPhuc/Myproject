<?php
include('includes/db.php');
if (!isset($_SESSION['admin_email'])) {
    echo "<script> window.open('login.php','_self') </script>";
} else {

?>
<?php 
    if(isset($_GET['edit_slider']))
    {
        $edit_slide_id=$_GET['edit_slider'];
        $edit_slide="select * from slider where id =$edit_slide_id";
        $run_edit_slide = mysqli_query($con,$edit_slide);
        $row_edit_slide=mysqli_fetch_array($run_edit_slide);

        $slide_id=$row_edit_slide['id'];
        $slide_name=$row_edit_slide['slider_name'];
        $slide_image=$row_edit_slide['slider_image'];
    }
?>
    <div class="row">
        <!-- row 1 start -->
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> Dashboard/ Edit Slider
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
                        <i class="fa fa-money"></i> Edit Slider
                    </h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <!-- form group start -->
                            <label class="col-md-3 control-label">
                                Slide Name:
                            </label>
                            <div class="col-md-6">
                                <input type="text" name="slide_name" class="form-control" value="<?php echo $slide_name ?>" pattern="^^[A-Za-z0-9].*" title="Begin with a words or a number" required>
                            </div>
                        </div><!-- form group end -->
                        <div class="form-group">
                            <!-- form group start -->
                            <label class="col-md-3 control-label">
                               Slide Image:
                            </label>
                            <div class="col-md-6">
                                <input type="file" name="slide_image" class="form-control" required>
                            </div>
                            <br><br>
                            
                            <center>
                            <img src="slider_images/<?php echo $slide_image ?>" width="500px" height="310px">
                            </center>
                        </div><!-- form group end -->
                        <div class="form-group">
                            <!-- form group start -->
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="update" value="Edit Slider Now" class="btn btn-danger form-control">
                            </div>

                        </div><!-- form group end -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['update'])){
        $slide_name = $_POST['slide_name'];
        $slide_image = $_FILES['slide_image']['name'];
        $temp_name = $_FILES['slide_image']['tmp_name'];

        move_uploaded_file($temp_name,"slider_images/$slide_image");
        $update_slide="update slider set slider_name='$slide_name',slider_image='$slide_image' where id='$slide_id'";
        $run_update=mysqli_query($con,$update_slide);
        if($run_update)
        {
            echo "<script>alert('Your slide has been updated successfully');</script>";
            echo "<script>window.open('index.php?view_slider','_self')</script>";
        }
        

       
    }

    ?>  





<?php } ?>