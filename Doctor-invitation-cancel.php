<?php    
         

    include ('config.php');

    $result = $connect->query("SELECT * FROM invitation_record") or die ($mysqli->error);

    if (isset($_GET['delete'])) {

    $id = $_GET['delete'];
    $connect->query("DELETE FROM invitation_record WHERE Invitation_ID=$id");
    header ("Location:Doctor-MyInvitations.php");
         
    }


?>