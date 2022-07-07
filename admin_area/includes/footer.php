<div id="footer"> <!-- footer section start -->
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6" >
                <h4 >Pages</h4>
                <ul>
                    <li><a href="cart.php">Shopping Cart</a> </li>
                    <li><a href="contact.php">Contact</a> </li>
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
                    <strong>Teehosting.com</strong>
                    <br>Minh Hieu
                    <br>Lan Huong
                    <br>dinhngocminhhieu@gmail.com
                    <br>+84 329156861
                </p>
                <a href="contact.php">Goto contact us page</a>
                <hr class="hidden-md hidden-lg ">
            </div> 

            <div class="col-md-3 col-sm-6">
                <h4>Get the news</h4>
                <p class="text-muted">
                    Subcribe here for getting news of icsrlab ayodhya
                </p>
                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" name="email" class="form-control">
                        <span class="input-group-btn">
                            <input type="submit" class="btn btn-success" value="Subcribe">
                        </span>
                    </div>
                </form>
                <hr >
                <h4>Stay In Touch</h4>
                <p class="social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
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
                   &copy; 2021 DNMHSKILL

                </p>
            </div>
            <div class="col-md-6">
                <p class="pull-right">
                    Tamplete By: Dinh Ngoc Minh Hieu
                </p>
            </div>
        </div>
    </div>
    
<!-- coppy right end -->