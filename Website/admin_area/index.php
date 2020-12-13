<?php 

    session_start();
    include("includes/db.php");
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
		
		 $admin_session = $_SESSION['admin_email'];
        
        $get_admin = "select * from admins where admin_email='$admin_session'";
        
        $run_admin = mysqli_query($con,$get_admin);
        
        $row_admin = mysqli_fetch_array($run_admin);
        
        $admin_id = $row_admin['admin_id'];
        
        $admin_name = $row_admin['admin_name'];
        
        $admin_email = $row_admin['admin_email'];
        
        $admin_image = $row_admin['admin_image'];
        
        $admin_country = $row_admin['admin_country'];
        
        $admin_about = $row_admin['admin_about'];
        
        $admin_contact = $row_admin['admin_contact'];
        
        $admin_job = $row_admin['admin_job'];
        
        $get_products = "select * from bid_products";
        
        $run_products = mysqli_query($con,$get_products);
        
        $count_products = mysqli_num_rows($run_products);
        
        $get_biders = "select * from biders";
        
        $run_biders = mysqli_query($con,$get_biders);
        
        $count_biders = mysqli_num_rows($run_biders);
        
        $get_p_categories = "select * from bid_product_categories";
        
        $run_p_categories = mysqli_query($con,$get_p_categories);
        
        $count_p_categories = mysqli_num_rows($run_p_categories);
        
        $get_pending_orders = "select * from bid_pending_orders";
        
        $run_pending_orders = mysqli_query($con,$get_pending_orders);
        
        $count_pending_orders = mysqli_num_rows($run_pending_orders);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Bid Admin Area</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="wrapper"><!-- #wrapper begin -->
       
       <?php include("includes/sidebar.php"); ?>
       
        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->
                
                 <?php
                
                    if(isset($_GET['bid_dashboard'])){
                        
                        include("bid_dashboard.php");
                        
                } if(isset($_GET['insert_bid_product'])){
                        
                        include("insert_bid_product.php");
                        
                    } if(isset($_GET['view_bid_products'])){
                        
                        include("view_bid_products.php");
                        
                }   if(isset($_GET['delete_bid_product'])){
                        
                        include("delete_bid_product.php");
                        
                }   if(isset($_GET['edit_bid_product'])){
                        
                        include("edit_bid_product.php");
                        
                }if(isset($_GET['insert_bid_p_cat'])){
                        
                        include("insert_bid_p_cat.php");
                        
                }   if(isset($_GET['view_bid_p_cats'])){
                        
                        include("view_bid_p_cats.php");
                        
                }   if(isset($_GET['delete_bid_p_cat'])){
                        
                        include("delete_bid_p_cat.php");
                        
                }   if(isset($_GET['edit_bid_p_cat'])){
                        
                        include("edit_bid_p_cat.php");
                        
                }  if(isset($_GET['insert_bid_cat'])){
                        
                        include("insert_bid_cat.php");
                        
                }   if(isset($_GET['view_bid_cats'])){
                        
                        include("view_bid_cats.php");
                        
                }   if(isset($_GET['edit_bid_cat'])){
                        
                        include("edit_bid_cat.php");
                        
                }   if(isset($_GET['delete_bid_cat'])){
                        
                        include("delete_bid_cat.php");
                        
                }   if(isset($_GET['insert_bid_slide'])){
                        
                        include("insert_bid_slide.php");
                        
                }   if(isset($_GET['view_bid_slides'])){
                        
                        include("view_bid_slides.php");
                        
                }   if(isset($_GET['delete_bid_slide'])){
                        
                        include("delete_bid_slide.php");
                        
                }   if(isset($_GET['edit_bid_slide'])){
                        
                        include("edit_bid_slide.php");
                        
                }  if(isset($_GET['view_bid_customers'])){
                        
                        include("view_bid_customers.php");
                        
                }   if(isset($_GET['delete_bid_customer'])){
                        
                        include("delete_bid_customer.php");
                        
                }   if(isset($_GET['view_bid_orders'])){
                        
                        include("view_bid_orders.php");
                        
                }   if(isset($_GET['delete_bid_order'])){
                        
                        include("delete_bid_order.php");
                        
                }   if(isset($_GET['view_bid_payments'])){
                        
                        include("view_bid_payments.php");
                        
                }   if(isset($_GET['delete_bid_payment'])){
                        
                        include("delete_bid_payment.php");
                        
                }   if(isset($_GET['view_bid_users'])){
                        
                        include("view_bid_users.php");
                        
                }   if(isset($_GET['delete_bid_user'])){
                        
                        include("delete_bid_user.php");
                        
                }   if(isset($_GET['insert_bid_user'])){
                        
                        include("insert_bid_user.php");
                        
                }   if(isset($_GET['user_profile'])){
                        
                        include("user_profile.php");
                        
                }
        
                ?>
                
                
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->

<script src="js/jquery-331.min.js"></script>     
<script src="js/bootstrap-337.min.js"></script>           
</body>
</html>

	<?php } ?>