<?php
include("config.php");
$sql = "UPDATE order_record SET Notify_Status='1' WHERE Notify_Status='0'";
$res = mysqli_query($connect, $sql);
if ($res) {
  echo "Success";
} else {
  echo "Failed";
}
?>



