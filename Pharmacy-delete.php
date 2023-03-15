<?php    
         

    include ('config.php');

    $result = $connect->query("SELECT * FROM product_record") or die ($mysqli->error);

    if (isset($_GET['delete'])) {

    $id = $_GET['delete'];
    $connect->query("DELETE FROM product_record WHERE Product_ID=$id");
    
  

    header ("Location:Pharmacy-Product.php");
         
    }
    

?>