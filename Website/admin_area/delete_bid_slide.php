<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_bid_slide'])){
        
        $delete_slide_id = $_GET['delete_bid_slide'];
        
        $delete_bid_slide = "delete from bid_slider where bid_slide_id='$delete_slide_id'";
        
        $run_bid_delete = mysqli_query($con,$delete_bid_slide);
        
        if($run_bid_delete){
            
            echo "<script>alert('One of Your Bid Slide Has Been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_bid_slides','_self')</script>";
            
        }
        
    }

?>




<?php } ?>