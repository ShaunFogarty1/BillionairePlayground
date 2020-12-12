<center><!--  center Begin  -->
    
    <h1> My Bid Orders </h1>
    
    <p class="lead"> Your Bid orders on one place</p>
    
    <p class="text-muted">
        
        If you have any questions, feel free to <a href="../contact.php">Contact Us</a>. Our Customer Bid Service work <strong>24/7</strong>
        
    </p>
    
</center><!--  center Finish  -->


<hr>


<div class="table-responsive"><!--  table-responsive Begin  -->
    
    <table class="table table-bordered table-hover"><!--  table table-bordered table-hover Begin  -->
        
        <thead><!--  thead Begin  -->
            
            <tr><!--  tr Begin  -->
                
                <th> ON: </th>
                <th> Bid Due Amount: </th>
                <th> Invoice No: </th>
                <th> Qty: </th>
            
                <th> Order Date:</th>
                <th> Paid / Unpaid: </th>
                <th> Status: </th>
                
            </tr><!--  tr Finish  -->
            
        </thead><!--  thead Finish  -->
        
        <tbody><!--  tbody Begin  -->
           
           <?php 
            
            $bider_session = $_SESSION['bider_email'];
            
            $get_bider = "select * from biders where bider_email='$bider_session'";
            
            $run_bider = mysqli_query($con,$get_bider);
            
            $row_bider = mysqli_fetch_array($run_bider);
            
            $bider_id = $row_bider['bider_id'];
            
            $get_orders = "select * from bider_orders where bider_id='$bider_id'";
            
            $run_orders = mysqli_query($con,$get_orders);
            
            $i = 0;
            
            while($row_orders = mysqli_fetch_array($run_orders)){
                
                $order_id = $row_orders['order_id'];
                
                $due_amount = $row_orders['due_amount'];
                
                $invoice_no = $row_orders['invoice_no'];
                
                $qty = $row_orders['qty'];
                
                $size = $row_orders['size'];
                
                $order_date = substr($row_orders['order_date'],0,11);
                
                $order_status = $row_orders['order_status'];
                
                $i++;
                
                if($order_status=='pending'){
                    
                    $order_status = 'Unpaid';
                    
                }else{
                    
                    $order_status = 'Paid';
                    
                }
            
            ?>
            
            <tr><!--  tr Begin  -->
                
                <th> <?php echo $i; ?> </th>
                <td> €<?php echo $due_amount; ?> </td>
                <td> <?php echo $invoice_no; ?> </td>
                <td> <?php echo $qty; ?> </td>
               
                <td> <?php echo $order_date; ?> </td>
                <td> <?php echo $order_status; ?> </td>
                
                <td>
                    
                    <a href="confirm.php?order_id=<?php echo $order_id; ?>" target="_blank" class="btn btn-primary btn-sm"> Confirm Paid </a>
                    
                </td>
                
            </tr><!--  tr Finish  -->
            
            <?php } ?>
            
        </tbody><!--  tbody Finish  -->
        
    </table><!--  table table-bordered table-hover Finish  -->
    
</div><!--  table-responsive Finish  -->