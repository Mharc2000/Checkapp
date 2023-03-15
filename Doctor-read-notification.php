<?php
include("config.php");
$sql = "UPDATE consultation_record SET Consultation_Status='1' WHERE Consultation_Status='0'";
$res = mysqli_query($connect, $sql);
if ($res) {
  echo "Success";
} else {
  echo "Failed";
}
?>
