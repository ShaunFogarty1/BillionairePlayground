<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_bid_product'])){
        
        $delete_id = $_GET['delete_bid_product'];
        
        $delete_pro = "delete from bid_products where bid_product_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_pro);
        
        if($run_delete){
            
            echo "<script>alert('One of your bid product has been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_bid_products','_self')</script>";
            
        }
        
    }

?>

<?php } ?>