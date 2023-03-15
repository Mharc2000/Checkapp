<?php
        include ('Patient-session.php');
        include ('config.php');
        $Patient_ID = $_SESSION['Patient_ID'];

        if (isset($_POST['submit'])) {
            $Patient_ID = $_SESSION['Patient_ID'];
            $Pharmacy_ID = mysqli_real_escape_string($connect, $_POST['Pharmacy_ID']);
            $Product_ID = mysqli_real_escape_string($connect, $_POST['Product_ID']);
            $Product_Name = mysqli_real_escape_string($connect, $_POST['Product_Name']);
            $Product_Photo = mysqli_real_escape_string($connect, $_POST['Product_Photo']);
            $Product_Price = mysqli_real_escape_string($connect, $_POST['Product_Price']);
            $Product_Stocks = mysqli_real_escape_string($connect, $_POST['Product_Quantity']);
            $Quantity = mysqli_real_escape_string($connect, $_POST['quantity']);
            $total_Price = $Product_Price * $Quantity; 

            if($Product_Stocks == 0  ){
                ?>
                <script>
                    swal({
                    title: "Out of Stock",
                    icon: "error"
                    });
                </script>
                <?php
            }elseif($Quantity == 0){
                ?>
                <script>
                    swal({
                    title: "Add Quantity",
                    icon: "error"
                    });
                </script>
                <?php

            }elseif($Product_Stocks < $Quantity){
                ?>
                <script>
                    swal({
                    title: "Not enough Stock",
                    icon: "error"
                    });
                </script>
                <?php

            }
            else{


                $sql = "INSERT INTO cart_record (Patient_ID, Pharmacy_ID, Product_ID, Product_Name, Product_Photo, Product_Price, Total_Price,Product_Stocks, quantity) 
                VALUES('$Patient_ID','$Pharmacy_ID', '$Product_ID', '$Product_Name', '$Product_Photo','$Product_Price', '$total_Price','$Product_Stocks','$Quantity')";
    
                $result = $connect->query($sql);
                ?>
                <script>
                    swal({
                    title: "Added to Cart Successfully!",
                    icon: "success"
                    });
                </script>
                <?php

            }

        }


?>