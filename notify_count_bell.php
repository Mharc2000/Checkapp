<?php
    include ('Patient-session.php');
    include ('config.php');
    $Patient_ID = $_SESSION['Patient_ID'];
    $sql = "SELECT * FROM invitation_record WHERE Invitation_Status = 0 AND Patient_ID='$Patient_ID'";
    $result = mysqli_query($connect, $sql); 
    $notify = mysqli_num_rows($result);
            
    $sql2 = "SELECT * FROM medication_record WHERE Notify_Status = 0 AND Patient_ID='$Patient_ID'";
    $result2 = mysqli_query($connect, $sql2); 
    $notify2 = mysqli_num_rows($result2);

    echo $total_result = $notify+$notify2;
                        
                     
$connect->close();
?>

