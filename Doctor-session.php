<?php
session_start();
if(!isset($_SESSION['Doctor_ID'])){
	header("location:Doctor-login.php");
	
	}

?>