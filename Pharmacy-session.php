<?php
session_start();
   
if(!isset($_SESSION['Pharmacy_ID'])){
	header("location:Pharmacy-dashboard.php");
	}
?>