<?php
            include ('config.php');
            include ('Doctor-session.php');
            $Doctor_ID = $_SESSION['Doctor_ID'];
            $query = "SELECT * FROM consultation_record WHERE Consultation_Status = 0 AND  Doctor_ID = '$Doctor_ID'";  
            $result = mysqli_query($connect, $query);  
            while($row = mysqli_fetch_assoc($result)):?>
                            
            <li><hr class="dropdown-divider" /></li>
            <li>
            <a class="dropdown-item" href="Doctor-patients.php"><img src="Patient_uploads/<?php echo $row['Patient_Photo'];?>" alt="" class="rounded-circle py-2 px-2 " width="50" height="50"><?php echo $row['FirstName'];?> <?php echo $row['LastName'];?>: 
            <br>
                Requested a consultation !!</a>
            </li>


            <?php endwhile; ?>
                       


<?php
            include ('config.php');
            $Doctor_ID = $_SESSION['Doctor_ID'];
            $sql = "SELECT * FROM consultation_record WHERE Consultation_Status = 0 AND Doctor_ID='$Doctor_ID'";
            $result = mysqli_query($connect, $sql); 
            $notify = mysqli_num_rows($result);
                    
    

            $total_result = $notify;
                                
                        
        ?>   
       
       <li><hr class="dropdown-divider" /></li>
                <li>
                    <a class="dropdown-item d-flex justify-content-center" href=""><?php echo $total_result; ?> Notification</a>
                </li>
        <li><hr class="dropdown-divider" /></li 