<div class="box"><!-- box Begin -->
   
   <?php 
    
    $session_email = $_SESSION['bider_email'];
    
    $select_bider = "select * from biders where bider_email='$session_email'";
    
    $run_bider = mysqli_query($con,$select_bider);
    
    $row_bider = mysqli_fetch_array($run_bider);
    
    $bider_id = $row_bider	['bider_id'];
    
    ?>
    
    <h1 class="text-center">Payment Options For You</h1>  
    
     <p class="lead text-center"><!-- lead text-center Begin -->
         
         <a href="order.php?c_id=<?php echo $bider_id ?>"> Offline Payment </a>
         
     </p><!-- lead text-center Finish -->
     
     <center><!-- center Begin -->
         
        <p class="lead"><!-- lead Begin -->
            
            <a href="#">
                
                Paypall Payment
                
                <img class="img-responsive" src="images/paypall_img.png" alt="img-paypall">
                
            </a>
            
        </p> <!-- lead Finish -->
         
     </center><!-- center Finish -->
    
</div><!-- box Finish -->