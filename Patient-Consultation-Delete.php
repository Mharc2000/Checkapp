<?php    
                 
         
  include ('config.php');

  $result = $connect->query("SELECT * FROM consultation_record") or die ($mysqli->error);


    if (isset($_GET['delete'])) {

      $id = $_GET['delete'];
      $connect->query("DELETE FROM consultation_record WHERE Consultation_ID=$id");
      header ("Location:Patient-Consultations.php");
         
    }
?>