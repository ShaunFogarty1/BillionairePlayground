<?php 

include("includes/db.php");
include("functions/functions.php");

?>
<?php 

if(isset($_GET['c_id'])){
    
    $bider_id = $_GET['c_id'];
    
}

$ip_add = getRealIpUser();

$status = "pending";

$invoice_no = mt_rand();

$select_cart = "select * from bid_cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);

while($row_cart = mysqli_fetch_array($run_cart)){
    
    $pro_id = $row_cart['p_id'];
    
    $pro_qty = $row_cart['qty'];
    
    $pro_size = $row_cart['size'];
    
    $get_products = "select * from bid_products where bid_product_id='$pro_id'";
    
    $run_products = mysqli_query($con,$get_products);
    
    while($row_products = mysqli_fetch_array($run_products)){
        
        $sub_total = $row_products['bid_product_price']*$pro_qty;
        
        $insert_bider_order = "insert into bider_orders (bider_id,due_amount,invoice_no,qty,size,order_date,order_status) values ('$bider_id','$sub_total','$invoice_no','$pro_qty','$pro_size',NOW(),'$status')";
        
        $run_bider_order = mysqli_query($con,$insert_bider_order);
        
        $insert_pending_order = "insert into pending_orders (bider_id,invoice_no,product_id,qty,size,order_status) values ('$bider_id','$invoice_no','$pro_id','$pro_qty','$pro_size','$status')";
        
        $run_pending_order = mysqli_query($con,$insert_pending_order);
        
        $delete_cart = "delete from bid_cart where ip_add='$ip_add'";
        
        $run_delete = mysqli_query($con,$delete_cart);
        
        echo "<script>alert('Your orders has been submitted, Thanks')</script>";
        
        echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
        
    }
    
}

?>