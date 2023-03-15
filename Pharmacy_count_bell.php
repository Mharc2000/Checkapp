<?php
    include ('Pharmacy-session.php');
    include ('config.php');
    $Pharmacy_ID = $_SESSION['Pharmacy_ID'];
    $sql = "SELECT * FROM order_record WHERE Notify_Status = 0 AND Pharmacy_ID='$Pharmacy_ID'";
    $result = mysqli_query($connect, $sql); 
    $notify = mysqli_num_rows($result);
            
  
    echo $total_result = $notify;
                        
                     
$connect->close();
?>

