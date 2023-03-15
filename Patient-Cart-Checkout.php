
<?php
include ('Patient-session.php');
include ('config.php');
$Patient_ID = $_SESSION['Patient_ID'];


if (isset($_POST['Update_Quantity'])) {
    $Quantity = $_POST['quantity'];
    $Cart_ID = $_POST['Cart_ID'];
    $Product_Price = $_POST['Price'];
    $total_Price = $Product_Price * $Quantity; 
    $query = mysqli_query($connect, "UPDATE cart_record SET quantity = '$Quantity', Total_Price = '$total_Price' WHERE Cart_ID = '$Cart_ID'");
    if ($query) {
        header('location:Patient-Cart.php');
    }
}



if (isset($_POST['submit'])) {
    $Patient_ID = $_SESSION['Patient_ID'];
    $Pharmacy_ID = mysqli_real_escape_string($connect, $_POST['Pharmacy_ID']);
    $Product_ID = mysqli_real_escape_string($connect, $_POST['Product_ID']);
    $Product_Name = mysqli_real_escape_string($connect, $_POST['Product_Name']);
    $Product_Photo = mysqli_real_escape_string($connect, $_POST['Product_Photo']);
    $Product_Price = mysqli_real_escape_string($connect, $_POST['Product_Price']);
    $Quantity = mysqli_real_escape_string($connect, $_POST['quantity']);
    $total_Price = $Product_Price * $Quantity; 
    $Prescription = rand(1000,100000)."-".$_FILES['Prescription']['name'];
      $file_loc = $_FILES['Prescription']['tmp_name'];
      $folder="Patient_uploads/";
    
       // new file size in KB
       //$new_size = $file_size/1024;  
       // new file size in KB
       
       // make file name in lower case
      $new_file_name = strtolower($Prescription);
       // make file name in lower case
       
      $final_file=str_replace(' ','-',$new_file_name);
       
      if(move_uploaded_file($file_loc,$folder.$final_file))
      {
  
        $query = "INSERT INTO cart_record (Patient_ID, Pharmacy_ID, Product_ID, Product_Name, Product_Photo, Product_Price, quantity, Prescription) 
        VALUES('$Patient_ID','$Pharmacy_ID', '$Product_ID', '$Product_Name', '$Product_Photo', '$total_Price', '$Quantity', '$final_file')";
      
      $result = $connect->query($query);
      ?>
      <script>
        alert('Added Successfully');
              window.location.href='Patient-Pharmacy.php';
              </script>
          <?php
      }
      else{
          ?>
          <script>
        alert('Error adding product');
            window.location.href='Patient-Pharmacy.php';
              </script>
          <?php
      
  } 
  } 


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Checkapp - Checkout</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <style>
    
        </style>
    </head>
    <body class="sb-nav-fixed" style="font-family: 'Poppins', sans-serif;">
        <div class="spinner" id="preloader"></div>
        <?php include('includes/Patient-nav-cart.php');?>
        <?php include('includes/Patient-Sidenav.php');?>
            <div id="layoutSidenav_content">
                <main class="main">
                    <div class="container-fluid">
                        <div class="row"> 
                            <div class="col-md-4">
                                <div class="card mt-3" id="shadow" style="border-radius: 30px;">
                                    <h4 class="card-header fw-bold d-flex justify-content-center">My Cart</h4>
                                </div>
                            </div>
                        </div>
 
                        
                                      
                    
                          
                        
                    </div>     

                </main>
                <?php include('includes/App-footer.php');?>
            </div>
        </div>
        <script src="js/quantity.js" crossorigin="anonymous"></script>                                             
        <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function(){
            loader.style.display="none";
        })

        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
