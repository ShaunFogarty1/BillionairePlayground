<?php 

$bider_session = $_SESSION['bider_email'];

$get_bider = "select * from biders where bider_email='$bider_session'";

$run_bider = mysqli_query($con,$get_bider);

$row_bider = mysqli_fetch_array($run_bider);

$bider_id = $row_bider['bider_id'];

$bider_name = $row_bider['bider_name'];

$bider_email = $row_bider['bider_email'];

$bider_country = $row_bider['bider_country'];

$bider_city = $row_bider['bider_city'];

$bider_contact = $row_bider['bider_contact'];

$bider_address = $row_bider['bider_address'];

$bider_image = $row_bider['bider_image'];

?>

<h1 align="center"> Edit Your Bid Account </h1>

<form action="" method="post" enctype="multipart/form-data"><!-- form Begin -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Bider Name: </label>
        
        <input type="text" name="bid_name" class="form-control" value="<?php echo $bider_name; ?>" required>
        
    </div><!-- form-group Finish -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Bider Email: </label>
        
        <input type="text" name="bid_email" class="form-control" value="<?php echo $bider_email; ?>" required>
        
    </div><!-- form-group Finish -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Bider Country: </label>
        
        <input type="text" name="bid_country" class="form-control" value="<?php echo $bider_country; ?>" required>
        
    </div><!-- form-group Finish -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Bider City: </label>
        
        <input type="text" name="bid_city" class="form-control" value="<?php echo $bider_city; ?>" required>
        
    </div><!-- form-group Finish -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Bider Contact: </label>
        
        <input type="text" name="bid_contact" class="form-control" value="<?php echo $bider_contact; ?>" required>
        
    </div><!-- form-group Finish -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Bider Address: </label>
        
        <input type="text" name="bid_address" class="form-control" value="<?php echo $bider_address; ?>" required>
        
    </div><!-- form-group Finish -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Bider Image: </label>
        
        <input type="file" name="bid_image" class="form-control form-height-custom">
        
        <img class="img-responsive" src="customer_images/<?php echo $bider_image; ?>" alt="Bider Image">
        
    </div><!-- form-group Finish -->
    
    <div class="text-center"><!-- text-center Begin -->
        
        <button name="update" class="btn btn-primary"><!-- btn btn-primary Begin -->
            
            <i class="fa fa-user-md"></i> Update Your Bid Now
            
        </button><!-- btn btn-primary inish -->
        
    </div><!-- text-center Finish -->
    
</form><!-- form Finish -->

<?php 

if(isset($_POST['update'])){
    
    $update_id = $customer_id;
    
    $bider_name = $_POST['bider_name'];
    
    $bider_email = $_POST['bider_email'];
    
    $bider_country = $_POST['bider_country'];
    
    $bider_city = $_POST['bider_city'];
    
    $bider_address = $_POST['bider_address'];
    
    $bider_contact = $_POST['bider_contact'];
    
    $bider_image = $_FILES['bider_image']['name'];
    
    $bider_image_tmp = $_FILES['bider_image']['tmp_name'];
    
    move_uploaded_file ($bider_image_tmp,"customer_images/$bider_image");
    
    $update_bider = "update biders set bider_name='$bid_name',bider_email='$bid_email',bider_country='$bid_country',bider_city='$bid_city',bider_address='$bid_address',bider_contact='$bid_contact',bider_image='$bid_image' where bider_id='$update_id' ";
    
    $run_bider = mysqli_query($con,$update_bider);
    
    if($run_customer){
        
        echo "<script>alert('Your Bid account has been edited, to complete the process, please Relogin')</script>";
        
        echo "<script>window.open('logout.php','_self')</script>";
        
    }
    
}

?>