<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_bid_order'])){
        
        $delete_id = $_GET['delete_bid_order'];
        
        $delete_bid_order = "delete from bid_pending_orders where order_id='$delete_id'";
        
        $run_bid_delete = mysqli_query($con,$delete_bid_order);
        
        if($run_bid_delete){
            
            echo "<script>alert('One of your bider order has been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_bid_orders','_self')</script>";
            
        }
        
    }

?>

<?php } ?>