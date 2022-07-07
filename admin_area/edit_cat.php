<?php 
include ('includes/db.php');
if(!isset($_SESSION['admin_email']))
{
    echo"<script> window.open('login.php','_self') </script>";
}else{

?>

<?php 
    if(isset($_GET['edit_cat'])){
    $edit_cat_id= $_GET['edit_cat'];
    $edit_cat_query ="select * from categories where cat_id='$edit_cat_id'";
    $run_edit=mysqli_query($con, $edit_cat_query );
    $row_edit=mysqli_fetch_array($run_edit);

    $cat_id=$row_edit['cat_id'];
    $cat_title=$row_edit['cat_title'];
    $cat_desc=$row_edit['cat_desc'];
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
    <title>EDIT-CATEGORIES</title>
    <script>
        tinymce.init({ selector: '#mytextarea'});
    </script> 
   
    
</head>
<body>
<div class="row"> <!--breadcrumb row start -->
    <div class="col-lg-12">
        <div class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i>
                Dashboard / Edit Categories
            </li>
        </div>
    </div>
</div> <!--breadcrumb row end -->

<div class="row"> 
    
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading"><!-- panel heading start -->
                <h3 style="color:black;" class="panel-title"> <i class="fa fa-money fa-w"></i> Edit Categories </h3>
            </div><!-- panel heading end -->
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Category Title</label>
                        <div class="col-md-6">
                        <input type="text" name="cat_title" class="form-control" required value="<?php echo $cat_title?>" pattern="^^[A-Za-z].*" title="Begin with a words" >
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label class="col-md-3 control-label">Category Description</label>
                        <div class="col-md-6">
                        <textarea id="mytextarea" name="cat_desc" class="form-control" rows="6" cols="19" minlength="20" required>
                        <?php echo $cat_desc ?>
                        </textarea>
                        </div>
                    </div>
                   
                    </div>

                    <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                        <input type="submit" name="update" value="Update Category" class="btn btn-primary form-control" required>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>





  <!-- Latest compiled JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

<?php
if(isset($_POST['update'])){
    $cat_title = $_POST['cat_title'];
    $cat_desc = $_POST['cat_desc'];
    

    $update_cat= "update categories set cat_title='$cat_title',cat_desc='$cat_desc' where cat_id='$cat_id'";
    $run_cat=mysqli_query($con,$update_cat);

    if($run_cat){
        echo "<script>alert('Your category has been updated successfully');</script>";
        echo "<script>window.open('index.php?view_categories','_self')</script>";
    }
  
}
?>

<?php } ?>

