<?php
include("config.php");
$sql = "UPDATE invitation_record SET Invitation_Status='1' WHERE Invitation_Status='0'";
$res = mysqli_query($connect, $sql);
if ($res) {
  echo "Success";
} else {
  echo "Failed";
}
?>

<?php
include("config.php");
$sql = "UPDATE medication_record SET Notify_Status='1' WHERE Notify_Status='0'";
$res = mysqli_query($connect, $sql);
if ($res) {
  echo "Success";
} else {
  echo "Failed";
}
?>



