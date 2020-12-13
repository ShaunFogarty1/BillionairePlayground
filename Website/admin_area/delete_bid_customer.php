<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_bid_customer'])){
        
        $delete_id = $_GET['delete_bid_customer'];
        
        $delete_bidder = "delete from bidders where bidder_id='$delete_id'";
        
        $run_bidder_delete = mysqli_query($con,$delete_bidder);
        
        if($run_bidder_delete){
            
            echo "<script>alert('One of your bidder costumer has been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_bid_customers','_self')</script>";
            
        }
        
    }

?>

<?php } ?>