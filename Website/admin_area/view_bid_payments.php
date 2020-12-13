<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Your Bid Payments
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Your Bid Payments
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> Bid No: </th>
                                <th> Bid Invoice No: </th>
                                <th> Bid Amount Paid: </th>
                                <th> Bid Method: </th>
                                <th> Bid Reference No: </th>
                                <th> Bid Payment Code: </th>
                                <th> Bid Payment Date: </th>
                                <th> Delete Bid Payment: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_payments = "select * from payments";
                                
                                $run_payments = mysqli_query($con,$get_payments);
          
                                while($row_payments=mysqli_fetch_array($run_payments)){
                                    
                                    $payment_id = $row_payments['payment_id'];
                                    
                                    $bid_invoice_no = $row_payments['bid_invoice_no'];
                                    
                                    $amount = $row_payments['amount'];
                                    
                                    $bid_payment_mode = $row_payments['bid_payment_mode'];
                                    
                                    $bid_ref_no = $row_payments['bid_ref_no'];
                                    
                                    $bid_code = $row_payments['bid_code'];
                                    
                                    $bid_payment_date = $row_payments['bid_payment_date'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $bid_invoice_no; ?> </td>
                                <td> <?php echo $amount; ?></td>
                                <td> <?php echo $bid_payment_mode; ?> </td>
                                <td> <?php echo $bid_ref_no; ?></td>
                                <td> <?php echo $bid_code; ?> </td>
                                <td> <?php echo $bid_payment_date; ?> </td>
                                <td> 
                                     
                                     <a href="index.php?delete_bid_payment=<?php echo $payment_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a> 
                                     
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>