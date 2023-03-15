<?php
    include ('Doctor-session.php');
    include ('config.php');
    $Doctor_ID = $_SESSION['Doctor_ID'];
    $sql = "SELECT * FROM consultation_record WHERE Consultation_Status = 0 AND Doctor_ID='$Doctor_ID'";
    $result = mysqli_query($connect, $sql); 
    $notify = mysqli_num_rows($result);
            


    echo $total_result = $notify;
                        
                     
$connect->close();
?>