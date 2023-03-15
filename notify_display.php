
        <?php

            include ('Patient-session.php');
            include ('config.php'); 
            $Patient_ID = $_SESSION['Patient_ID'];
            $query = "SELECT * FROM invitation_record WHERE Invitation_Status = 0 AND Patient_ID = '$Patient_ID' ORDER BY Invitation_ID DESC LIMIT 1";  
            $result = mysqli_query($connect, $query);
            while($row = mysqli_fetch_array($result)):?>

                
                <li><hr class="dropdown-divider" /></li>
                <h5 class="mx-3"> Meet Invitation</h5>
                <li><hr class="dropdown-divider" /></li>
                <li>
                <a class="dropdown-item"  href="Patient-MyInvitation.php"><img src="Doctor_uploads/<?php echo $row['Doctor_photo']; ?> " alt="" class="rounded-circle py-2 px-2 " width="50" height="50"> Dr. <?php echo $row['Doctor_Name'];?>
              

                    invited you to a video consultation. !!</a>
                    <input type="hidden" value="<?php echo $row['Invitation_ID'];?>">
                </li>  

                <li><hr class="dropdown-divider" /></li>
              

               

            <?php endwhile; ?>

            

        <?php
            include ('config.php'); 
            $Patient_ID = $_SESSION['Patient_ID'];
            $query = "SELECT * FROM medication_record WHERE Notify_Status = 0 AND Patient_ID = '$Patient_ID' ORDER BY Med_ID DESC LIMIT 1";  
            $result = mysqli_query($connect, $query);
            while($row = mysqli_fetch_array($result)):?>
                <li><hr class="dropdown-divider" /></li>
                <h5 class="mx-3">E-prescription</h5>
                <li><hr class="dropdown-divider" /></li>
                <li>
                <a class="dropdown-item"  href="Patient-Medication-table.php"><img src="Doctor_uploads/<?php echo $row['Doctor_Photo']; ?> " alt="" class="rounded-circle py-2 px-2 " width="50" height="50"> Dr. <?php echo $row['Doctor_Name']?>
                sent you a prescription.  </a>
                <input type="hidden" value="<?php echo $row['Med_ID'];?>">
                </li>
                <li><hr class="dropdown-divider" /></li>
  
           
         <?php endwhile; 
            
        ?>

        <?php
            include ('config.php');
            $Patient_ID = $_SESSION['Patient_ID'];
            $sql = "SELECT * FROM invitation_record WHERE Invitation_Status = 0 AND Patient_ID='$Patient_ID'";
            $result = mysqli_query($connect, $sql); 
            $notify = mysqli_num_rows($result);
                    
            $sql2 = "SELECT * FROM medication_record WHERE Notify_Status = 0 AND Patient_ID='$Patient_ID'";
            $result2 = mysqli_query($connect, $sql2); 
            $notify2 = mysqli_num_rows($result2);

            $total_result = $notify+$notify2;
                                
                        
        ?>   
       
       <li><hr class="dropdown-divider" /></li>
                <li>
                    <a class="dropdown-item d-flex justify-content-center" href=""><?php echo $total_result; ?> Notification</a>
                </li>
        <li><hr class="dropdown-divider" /></li          





    