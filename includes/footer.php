<div id="footer"> <!-- footer section start -->
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6" >
                <h4 >Pages</h4>
                <ul>
                    <li><a href="cart.php">Shopping Cart</a> </li>
                    <li><a href="contactus.php">Contact</a> </li>
                    <li><a href="shop.php">Shop</a> </li>
                    <li><a href="checkout.php">My Account</a> </li>
                </ul>
                <hr>
                <h4>User Section</h4>
                <ul>
                    <li><a href="checkout.php">Login</a></li>
                    <li><a href="customer_registration.php">Register</a></li>
                </ul>
                <hr class="hidden-md hidden-lg hidden-sm">
            </div>

            <div class="col-md-3 col-sm-6">
                <h4>Top Product Categories</h4>

                <ul>
                    <?php 
                        $get_p_cats="select * from product_category";
                        $run_p_cats=mysqli_query($con,$get_p_cats);
                        while($row_p_cat=mysqli_fetch_array($run_p_cats)){
                            $p_cat_id= $row_p_cat['p_cat_id'];
                            $p_cat_title= $row_p_cat['p_cat_title'];

                            echo"
                            <li> <a href='shop.php'?p_cat=$p_cat_id> $p_cat_title</a> </li>";
                        }
                    ?>
                    
                </ul>
                <hr class="hidden-md hidden-lg ">
            </div>  

            <div class="col-md-3 col-sm-6">
                <h4>Where to find us</h4>
                <p class="text-muted">
                    <p style="color: black">dinhngocminhhieu@gmail.com</p> 
                     <p style="color: black"> +84 329156861</p>
                </p>
                <a href="contactus.php">Goto contact us page</a>
                <hr class="hidden-md hidden-lg ">
            </div> 

            <div class="col-md-3 col-sm-6">
                <h4>Stay In Touch</h4>
                <p class="social">
                    <a href="https://www.facebook.com/profile.php?id=100051206900189"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.youtube.com/channel/UCNopOMhK9JmKrIQhF7d0mPA"><i class="fa fa-youtube"></i></a>
                    <a href="https://www.instagram.com/dinh.ngocminhhieu/"><i class="fa fa-instagram"></i></a>
                   
                </p>
            </div> 
        </div>
    </div>
</div> <!-- footer section end -->

<!-- coppy right start -->
    <div id="copyright">
        <div class="container">
            <div class="col-md-6">
                <p class="pull-left">
                   &copy; 2021 

                </p>
            </div>
            <div class="col-md-6">
                <p class="pull-right">
                    Tamplete By: GROUP 2
                </p>
            </div>
        </div>
    </div>
    
<!-- coppy right end -->