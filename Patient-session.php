<?php
session_start();
   
if(!isset($_SESSION['Patient_ID'])){
	header("location:Patient-login.php");
	}
?>