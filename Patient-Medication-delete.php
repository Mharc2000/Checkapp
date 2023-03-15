<?php    
         

    include ('config.php');

    $result = $connect->query("SELECT * FROM medication_record") or die ($mysqli->error);

    if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $connect->query("DELETE FROM medication_record WHERE Med_ID=$id");
    header ("Location:Patient-Medication-table.php");
         
    }


?>