
<?php
include ('Patient-session.php');
include ('config.php');
$Patient_ID = $_SESSION['Patient_ID'];



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Checkapp - My Cart</title>
        <link rel="icon" href="img/logo.png">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="js/sweetalert.js"></script>
        
    </head>
    <body class="sb-nav-fixed" style="font-family: 'Poppins', sans-serif;">
    <?php
  

    if (isset($_POST['submit'])) { 

        $randomInt = mt_rand();
        
        $id = sprintf("%02d-%09d", mt_rand(0, 999999), $randomInt);

        $Patient_ID = $_POST['Patient_ID'];
        $Customer_Name = $_POST['Customer_Name'];
        $Street_Address = $_POST['Street_Address'];
        $Location = $_POST['Location'];
        $Contact = $_POST['Contact'];
        $Product_ID = $_POST['Product_ID'];
        $Pharmacy_ID = $_POST['Pharmacy_ID'];
        $Product_Photo = $_POST['Product_Photo'];
        $Product_Name = $_POST['Product_Name'];
        $Quantity = $_POST['Quantity'];
        $Total_Price = $_POST['Total_Price'];
        $Payment_Method = $_POST['Payment_Method'];
        $Order_Status = $_POST['Status'];
        $Pickup_Datetime = $_POST['Pickup_Datetime'];

        $sql = "INSERT INTO order_record (Transaction_ID, Patient_ID, Customer_Name, Street_Address, Location ,Contact, Product_ID, Pharmacy_ID, Product_Photo, Product_Name, Quantity, Total_Price, Payment_Method, Order_Status, Pickup_Datetime) 
        VALUES('$id','$Patient_ID', '$Customer_Name', '$Street_Address', '$Location', '$Contact', '$Product_ID', '$Pharmacy_ID', '$Product_Photo', '$Product_Name', '$Quantity', '$Total_Price', '$Payment_Method', '$Order_Status' , '$Pickup_Datetime')";
        $result = $connect->query($sql);
        ?>
        <script>
            swal({
            title: "Order Successfull!",
            icon: "success"
            }).then(function() {
            // Redirect the user
            window.location.href='Patient-After-Order.php';
            console.log('The Ok Button was clicked.');
                        });
        </script>

        <?php

    }     

  

    if (isset($_POST['submit'])) {
        
        $Product_ID = $_POST['Product_ID'];
        $Cart_Quantity = $_POST['Quantity'];
        $Product_Stocks = $_POST['Product_Stocks'];
        $Updated_Quantity = $Product_Stocks - $Cart_Quantity; 
        $query = mysqli_query($connect, "UPDATE product_record SET Product_Quantity = '$Updated_Quantity' WHERE Product_ID = '$Product_ID'");
      
    }

    if (isset($_POST['submit'])) {

        $result = $connect->query("SELECT * FROM cart_record") or die ($mysqli->error);
        
        $Cart_ID = $_POST['Cart_ID'];
        $connect->query("DELETE FROM cart_record WHERE Cart_ID=$Cart_ID");
      
    }

    ?>
      
        <?php include('includes/Patient-nav-cart.php');?>
        <?php include('includes/Patient-Sidenav.php');?>
            <div id="layoutSidenav_content">
                <main class="main">
                    <div class="container-fluid">
                        <form action="" method="POST">
                            <div class="row"> 
                                <div class="col-md-4">
                                    <div class="card mt-3"  id="shadow" style="border-radius: 30px;">
                                        <h4 class="card-header fw-bold d-flex justify-content-center">Purchase Order</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-3 mb-1" >  
                                <div class="card-header">
                                    <h4>Customer Information</h4>

                                </div>
                                <div class="card-body"> 

                                        

                                        <?php
                                
                                            
                                            $query = "SELECT * FROM patient_record WHERE Patient_ID = '$Patient_ID' ORDER BY Patient_ID DESC ";  
                                            $result = mysqli_query($connect, $query);
                                            while($row = mysqli_fetch_array($result)):?> 
                                                <div class="row">
                                                        <input type="hidden" value="<?php echo $row['Patient_ID']; ?>" name="Patient_ID">
                                                        <div class="form-group col-md-4 pt-2">
                                                            <label  class="form-label"><h5>Customer Name</h5></label>
                                                            <input type="text" value="<?php echo $row['FirstName']; ?> <?php echo $row['LastName']; ?>"  class="form-control input-lg"  name="Customer_Name" >
                                                        </div>
                                                        
                                                        
                                                        <div class="form-group col-md-4 pt-2">
                                                            <label  class="form-label"><h5>City and Province</h5></label>
                                                            <input type="text"  value="<?php echo $row['Province']; ?>, <?php echo $row['City']; ?>" class="form-control p-2" name="Location" >
                                                        </div>

                                                       

                                                        <div class="form-group col-md-4 pt-2">
                                                            <label class="form-label"><h5>Contact Number</h5></label>
                                                            <input type="text" value="<?php echo $row['Contact_No']; ?>" class="form-control p-2" name="Contact" required="true">
                                                        </div>

                                                       

                                                </div>


                                            <?php endwhile; ?> 
                                    
                                </div>

                                
                            </div> 

                            <div class="card mt-1 mb-1" >
                                <div class="card-header">
                                    <h4>Products Ordered </h4>
                                </div>
                            
                                <div class="card-body table-responsive">
                                
                                    <table class="table">
                                        <thead>
                                            <tr>
                                            
                                                <th>Cart Id</th>
                                                <th>Product Ordered</th>
                                                <th>Unit Price</th>
                                                <th>Quantity</th>
                                                <th>Item Subtotal </th>

                                            
                                        </thead>
                        
                                            <tbody>
                                            <?php
                                            $grand_total = 0;
                                            $id = $_GET['id'];
                                            $query = "SELECT * FROM cart_record WHERE Cart_ID = '$id' ORDER BY Cart_ID DESC ";  
                                            $result = mysqli_query($connect, $query);
                                            while($row = mysqli_fetch_array($result)):?> 

                                                <tr>
                                                    
                                                    <td><?php echo $row['Cart_ID']; ?></td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                
                                                            <img src="Pharmacy-upload/<?php echo $row['Product_Photo']; ?> " alt="Product Img" class="img-fluid"  style="width:120px; height:100px;">
                                                                    
                                                            </div>
                                                            <div class="col">
                                                                 <?php echo $row['Product_Name']; ?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $row['Product_Price']; ?></td>
                                                    <td><p><?php echo $row['Quantity']; ?></p></td>
                                                    <td>₱ <?php echo $row['Total_Price']; ?> Php</td>
                                                    <?php $grand_total += $row['Total_Price']; ?>
                                            
                                                </tr>
                                            <?php endwhile; ?> 

                                            </tbody>
        
                                    </table>
                                </div>
                            </div>

                            <div class="card mt-1 mb-1" >  
                                <div class="card-header">
                                    <h4>Payment Method</h4>
                                </div>                    
                                    
                                 
                                <div class="col-md-4 mt-3 mb-3 mx-3">
                                    <select name="Payment_Method" required="true" class="form-control p-2" id="paymentMethodSelect">
                                        <option value="" disabled selected>Select Payment Method</option>
                                        <option value="Cash upon pick-up">Cash upon pick-up</option>
                                        <option value="Cash on delivery">Cash on delivery</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mt-3 mb-3 mx-3" id="pickupDateInput" style="display:none">
                                    <label class="label mx-2">Pick-up Date and time</label>           
                                    <input type="datetime-local"  name="Pickup_Datetime" class="form-control p-2" />
                                    
                                </div>     

                                 <div class="col-md-6  mt-3 mb-3 mx-3"  id="deliveryAddressInput" style="display:none">
                                    <label class="label mx-2"><h5>Billing Address</h5></label>
                                    <input type="text" placeholder="Village Name/ Street Name/Phase number/ Barangay Name" class="form-control p-2" name="Street_Address">
                                </div>
                                
                                
                            

                            


                                <div class="mx-3 d-flex justify-content-end"> 
                                        <h4 class="text-dark mx-3 pt-2"> <span class="fw-bold">Grand total:</span> ₱ <?php echo $grand_total ?></h4>
                                </div>
                                <hr class="dropdown-divider bg-dark" />
                                
                                <div class="row">
                                <div class="col mx-3 d-flex justify-content-start"> 
                                    <a href="Patient-Cart.php" type="button" style="text-decoration: none; text-align:center;" class="btn1 mx-3 mb-2 text-white"> Back to Cart</a>
                                </div>  

                                <div class="col mx-3 d-flex justify-content-end"> 
                                    
                                                

                                            <?php
                                            $id = $_GET['id'];
                                            $query = "SELECT * FROM cart_record WHERE Cart_ID = '$id' ORDER BY Cart_ID DESC ";  
                                            $result = mysqli_query($connect, $query);
                                            while($row = mysqli_fetch_array($result)):?>
                                                            <input type="hidden" value="<?php echo $row['Cart_ID']; ?>" name="Cart_ID">
                                                            <input type="hidden" value="<?php echo $row['Pharmacy_ID']; ?>" name="Pharmacy_ID">
                                                            <input type="hidden" value="<?php echo $row['Product_ID']; ?>" name="Product_ID">
                                                            <input type="hidden" value="<?php echo $row['Product_Photo']; ?>" name="Product_Photo">
                                                            <input type="hidden" value="<?php echo $row['Product_Name']; ?>" name="Product_Name">
                                                            <input type="hidden" value="<?php echo $row['Quantity']; ?>" name="Quantity">
                                                            <input type="hidden" value="<?php echo $row['Total_Price']; ?>" name="Total_Price">
                                                            <input type="hidden" value="Pending Order" name="Status">
                                            <?php endwhile; ?>  

                                            <?php
                                            $id = $_GET['id'];
                                            $query = "SELECT * FROM cart_record WHERE Cart_ID = '$id' ORDER BY Cart_ID DESC ";  
                                            $result = mysqli_query($connect, $query);
                                            while($row = mysqli_fetch_array($result)):?>
                                                        
                                                    <?php

                                                       $Product_ID = $row['Product_ID']; 

                                                        $Stock_search = "SELECT * FROM product_record WHERE Product_ID = '$Product_ID'"; 
                                                        $res = mysqli_query($connect, $Stock_search);
                                                        $row2 = mysqli_fetch_array($res)
            
                                                        ?>
                                                            <input type="hidden" value="<?php echo $row2['Product_Quantity']; ?>" name="Product_Stocks">
                                                        <?php    


                                                     
                                                     
                                                     ?>
                                                          
                                            <?php endwhile; ?>  
                                    
                                        <button type="submit" name="submit" class="btn1 mx-3 mb-2">Place Order</button>
                            

                                </div>
                                
                            </div>       
                        </form>  
                        
                       
                    </div>     

                </main>
                <?php include('includes/App-footer.php');?>
            </div>
        </div>

      
        
       <script>
            var paymentMethodSelect = document.getElementById('paymentMethodSelect');
            var pickupDateInput = document.getElementById('pickupDateInput');
            var deliveryAddressInput = document.getElementById('deliveryAddressInput');

            paymentMethodSelect.addEventListener('change', function() {
                if (this.value === 'Cash upon pick-up') {
                pickupDateInput.style.display = 'block';
                deliveryAddressInput.style.display = 'none';
                } else if (this.value === 'Cash on delivery') {
                pickupDateInput.style.display = 'none';
                deliveryAddressInput.style.display = 'block';
                } else {
                pickupDateInput.style.display = 'none';
                deliveryAddressInput.style.display = 'none';
                }
            });

        </script>

        <script src="js/quantity.js" crossorigin="anonymous"></script>    
                                                 
        <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function(){
            loader.style.display="none";
        })

        </script>
        <script>
            if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
            }
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
