<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_bid_user'])){
        
        $delete_user_id = $_GET['delete_bid_user'];
        
        $delete_bid_user = "delete from admins where admin_id='$delete_user_id'";
        
        $run_bid_delete = mysqli_query($con,$delete_bid_user);
        
        if($run_bid_delete){
            
            echo "<script>alert('One of your Admins User has been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_bid_users','_self')</script>";
            
        }
        
    }

?>

<?php } ?>