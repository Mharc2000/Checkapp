
<?php
            include ('config.php');
            include ('Pharmacy-session.php');
            $Pharmacy_ID = $_SESSION['Pharmacy_ID'];
            $query = "SELECT * FROM order_record WHERE Notify_Status = 0 AND  Pharmacy_ID = '$Pharmacy_ID' ORDER BY Order_ID DESC LIMIT 5";  
            $result = mysqli_query($connect, $query);  
            while($row = mysqli_fetch_assoc($result)):?>
                            
            <li><hr class="dropdown-divider" /></li>

            <li>
            
            <a class="dropdown-item" href="Pharmacy-Orders.php">
            <h5 class="mx-3 my-2"> New Order</h5>
            <div class="row">
                <div class="col-md-4">
                 <img src="Pharmacy-upload/<?php echo $row['Product_Photo'];?>" alt="" class="py-2 px-2 " width="100" height="50">
                </div>  
                <div class="col-md-3">

                    <p> Transaction ID: <?php echo $row['Transaction_ID'];?></p>
                </div>
            </div>  
            
          

            </a>
            </li>


            <?php endwhile; ?>
                       


<?php
            include ('config.php');
            $Pharmacy_ID = $_SESSION['Pharmacy_ID'];
            $sql = "SELECT * FROM order_record WHERE Notify_Status = 0 AND Pharmacy_ID = '$Pharmacy_ID'";
            $result = mysqli_query($connect, $sql); 
            $notify = mysqli_num_rows($result);
                    
    

            $total_result = $notify;
                                
                        
        ?>   
       
       <li><hr class="dropdown-divider" /></li>
                <li>
                    <a class="dropdown-item d-flex justify-content-center" href=""><?php echo $total_result; ?> Notification</a>
                </li>
        <li><hr class="dropdown-divider" /></li 

    