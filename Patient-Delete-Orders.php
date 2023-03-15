<?php
include ('Patient-session.php');
include ('config.php');
$Patient_ID = $_SESSION['Patient_ID'];


$result = $connect->query("SELECT * FROM order_record") or die ($mysqli->error);

if (isset($_GET['delete'])) {

$id = $_GET['delete'];
$connect->query("DELETE FROM order_record WHERE Order_ID=$id");
header ("Location:Patient-Orders.php");
     
}






?>