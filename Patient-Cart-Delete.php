<?php    
         

    include ('config.php');


    if (isset($_POST['delete_product_btn'])) {

    $Cart_ID = mysqli_real_escape_string($connect, $_POST['Cart_ID']);
    $Cart_Query = "SELECT * FROM cart_record WHERE Cart_ID ='$Cart_ID'";


    $query = ("DELETE FROM cart_record WHERE Cart_ID = $Cart_ID");
    $Delete_Query = mysqli_query($connect, $query);

        if($Delete_Query)
        {
            //redirect("Patient-Cart.php", "Cart Deleted Successfuly!")
            echo 200;
        }
        else
        {
            //redirect("Patient-Cart.php", "Something Went Wrong!")
            echo 500;
        }   

         
    }

?>