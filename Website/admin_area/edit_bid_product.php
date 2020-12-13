<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_bid_product'])){
        
        $edit_id = $_GET['edit_bid_product'];
        
        $get_p = "select * from bid_products where bid_product_id='$edit_id'";
        
        $run_edit = mysqli_query($con,$get_p);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $p_id = $row_edit['bid_product_id'];
        
        $p_title = $row_edit['bid_product_title'];
        
        $p_cat = $row_edit['bid_p_cat_id'];
        
        $cat = $row_edit['bid_cat_id'];
        
        $p_image1 = $row_edit['bid_product_img1'];
        
        $p_image2 = $row_edit['bid_product_img2'];
        
        $p_image3 = $row_edit['bid_product_img3'];
        
        $p_price = $row_edit['bid_product_price'];
        
        $p_keywords = $row_edit['bid_product_keywords'];
        
        $p_desc = $row_edit['bid_product_desc'];
        
    }
        
        $get_p_cat = "select * from bid_product_categories where bid_p_cat_id='$p_cat'";
        
        $run_p_cat = mysqli_query($con,$get_p_cat);
        
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        
        $p_cat_title = $row_p_cat['bid_p_cat_title'];
        
        $get_cat = "select * from bid_categories where bid_cat_id='$cat'";
        
        $run_cat = mysqli_query($con,$get_cat);
        
        $row_cat = mysqli_fetch_array($run_cat);
        
        $bid_cat_title = $row_cat['bid_cat_title'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert A Products Bid </title>
</head>
<body>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit A Products Bid
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Insert A Product Bid
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Bid Product Title </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="bid_product_title" type="text" class="form-control" required value="<?php echo $p_title; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label">Bid Product Category </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="bid_product_cat" class="form-control"><!-- form-control Begin -->
                              
                              <option value="<?php echo $p_cat; ?>"> <?php echo $p_cat_title; ?> </option>
                              
                              <?php 
                              
                              $get_p_cats = "select * from bid_product_categories";
                              $run_p_cats = mysqli_query($con,$get_p_cats);
                              
                              while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                  
                                  $bid_p_cat_id = $row_p_cats['bid_p_cat_id'];
                                  $bid_p_cat_title = $row_p_cats['bid_p_cat_title'];
                                  
                                  echo "
                                  
                                  <option value='$bid_p_cat_id'> $bid_p_cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label">Bid Category </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="bid_cat" class="form-control"><!-- form-control Begin -->
                              
                              <option value="<?php echo $cat; ?>"> <?php echo $bid_cat_title; ?> </option>
                              
                              <?php 
                              
                              $get_cat = "select * from categories";
                              $run_cat = mysqli_query($con,$get_cat);
                              
                              while ($row_cat=mysqli_fetch_array($run_cat)){
                                  
                                  $bid_cat_id = $row_cat['bid_cat_id'];
                                  $bid_cat_title = $row_cat['bid_cat_title'];
                                  
                                  echo "
                                  
                                  <option value='$bid_cat_id'> $bid_cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label">Bid Product Image 1 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="bid_product_img1" type="file" class="form-control" required>
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image1; ?>" alt="<?php echo $p_image1; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label">Bid Product Image 2 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="bid_product_img2" type="file" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image2; ?>" alt="<?php echo $p_image2; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label">Bid Product Image 3 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="bid_product_img3" type="file" class="form-control form-height-custom">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image3; ?>" alt="<?php echo $p_image3; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Bid Product Price </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_price" type="text" class="form-control" required value="<?php echo $p_price; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Bid Product Keywords </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="bid_product_keywords" type="text" class="form-control" required value="<?php echo $p_keywords; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label">Bid Product Desc </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="bid_product_desc" cols="19" rows="6" class="form-control">
                              
                              <?php echo $p_desc; ?>
                              
                          </textarea>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Update Product Bid" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
   
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>


<?php 

if(isset($_POST['update'])){
    
    $bid_product_title = $_POST['bid_product_title'];
    $bid_product_cat = $_POST['bid_product_cat'];
    $cat = $_POST['cat'];
    $bid_product_price = $_POST['bid_product_price'];
    $bid_product_keywords = $_POST['bid_product_keywords'];
    $bid_product_desc = $_POST['bid_product_desc'];
    
    $bid_product_img1 = $_FILES['bid_product_img1']['name'];
    $bid_product_img2 = $_FILES['bid_product_img2']['name'];
    $bid_product_img3 = $_FILES['bid_product_img3']['name'];
    
    $temp_name1 = $_FILES['bid_product_img1']['tmp_name'];
    $temp_name2 = $_FILES['bid_product_img2']['tmp_name'];
    $temp_name3 = $_FILES['bid_product_img3']['tmp_name'];
    
    move_uploaded_file($temp_name1,"product_images/$bid_product_img1");
    move_uploaded_file($temp_name2,"product_images/$bid_product_img2");
    move_uploaded_file($temp_name3,"product_images/$bid_product_img3");
    
    $update_product = "update bid_products set bid_p_cat_id='$bid_product_cat',bid_cat_id='$cat',date=NOW(),bid_product_title='$bid_product_title',bid_product_img1='$bid_product_img1',bid_product_img2='$bid_product_img2',bid_product_img3='$bid_product_img3',bid_product_keywords='$bid_product_keywords',bid_product_desc='$bid_product_desc',bid_product_price='$bid_product_price' where bid_product_id='$p_id'";
    
    $run_product = mysqli_query($con,$update_product);
    
    if($run_product){
        
       echo "<script>alert('Your bid product has been updated Successfully')</script>"; 
        
       echo "<script>window.open('index.php?view_bid_products','_self')</script>"; 
        
    }
    
}

?>


<?php } ?>