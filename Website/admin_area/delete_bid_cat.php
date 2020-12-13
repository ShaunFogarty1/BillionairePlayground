<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_bid_cat'])){
        
        $delete_cat_id = $_GET['delete_bid_cat'];
        
        $delete_cat = "delete from bid_categories where bid_cat_id='$delete_cat_id'";
        
        $run_delete = mysqli_query($con,$delete_cat);
        
        if($run_delete){
            
            echo "<script>alert('One of Your Bid Category Has Been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_bid_cats','_self')</script>";
            
        }
        
    }

?>




<?php } ?>