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
                    <i class="fa fa-dashboard"></i>Dashboard / View USER
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
                        <i class="fa fa-money fa-fw"></i> View USER
                    </h3>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped"  id="example" >
                            <thead >
                                <tr>
                                    <th>No</th>
                                    <th>User Name</th>
                                    <th>User Image </th>
                                    <th>User Email</th>
                                    <th>User Country</th>
                                    <th>User Job</th>
                                    <th>User Contact</th>
                                    <th>User About</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                    
                                    
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                $i=0;
                                $get_users="select * from admins";
                                $run_users=mysqli_query($con,$get_users);
                                while($row_users=mysqli_fetch_array($run_users)){
                                    $user_id=$row_users['admin_id'];
                                    $user_name=$row_users['admin_name'];
                                    $user_img=$row_users['admin_image'];
                                    $user_email=$row_users['admin_email'];
                                    $user_country=$row_users['admin_country'];
                                    $user_job=$row_users['admin_job'];
                                    $user_contact=$row_users['admin_contact'];
                                    $user_about=$row_users['admin_about'];
                                    $i++;
                                ?>

                                
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $user_name ?></td>
                                    <td><img src="../admin_area/admin_images/<?php echo $user_img?>" width="60" height="100"></td>
                                    <td ><?php echo $user_email ?> đ</td>
                                    <td><?php echo  $user_country ?></td>
                                    <td><?php echo $user_job ?></td>
                                    <td><?php echo $user_contact?></td>
                                    <td><?php echo $user_about?></td>
                                    
                                    <td>
                                        <a onclick="return Del('<?php echo $user_name ;?>')" href="index.php?delete_user=<?php echo $user_id ?>">
                                                <i class="fa fa-trash-o"></i> DELETE
                                        </a>
                                    </td>
                                    <td>
                                        <a href="index.php?user_profile=<?php echo $user_id?>">
                                                <i class="fa fa-pencil"></i> EDIT
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