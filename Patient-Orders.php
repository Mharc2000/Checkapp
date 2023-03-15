
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
        <link rel="icon" href="img/logo.png">
        <title>Checkapp - My Orders</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="js/sweetalert.js"></script>

        <style>
    
        </style>
    </head>
    <body class="sb-nav-fixed" style="font-family: 'Poppins', sans-serif;">
    <?php

        if (isset($_POST['cancel'])) {
                                              
            $Cancelled =  mysqli_real_escape_string($connect, $_POST['Order_Status']);     
            $Order_ID =  mysqli_real_escape_string($connect, $_POST['Order_ID']);   
            $Product_ID = mysqli_real_escape_string($connect, $_POST['Product_ID']);  
            $Order_Quantity = mysqli_real_escape_string($connect, $_POST['Order_Quantity']);  
            $Product_Stocks = mysqli_real_escape_string($connect, $_POST['Product_Stocks']);  

            $Stocks_updated = $Product_Stocks + $Order_Quantity; 

            $Cancel_order = mysqli_query ($connect,"UPDATE order_record SET Order_Status = '$Cancelled' WHERE Order_ID = '$Order_ID'");

            $Stocks_Updated = mysqli_query ($connect,"UPDATE product_record SET Product_Quantity ='$Stocks_updated' WHERE Product_ID = '$Product_ID'");

            if($Cancel_order){
                ?>
                <script>
                    swal({
                    title: "Your Order art successfully cancelled!",
                    icon: "success"
                    });
                </script>
                <?php
            }

        }



    ?>
        <div class="spinner" id="preloader"></div>

        <?php include('includes/Patient-nav-cart.php');?>
        <?php include('includes/Patient-Sidenav.php');?>
            <div id="layoutSidenav_content">
                <main class="main">
                    <div class="container-fluid">
                        <div class="row"> 
                            <div class="col-md-4">
                                <div class="card mt-3" id="shadow" style="border-radius: 30px;">
                                    <h4 class="card-header fw-bold d-flex justify-content-center">My Purchase</h4>
                                </div>
                            </div>
                        </div>
 
                        <div class="card mt-3 mb-4" id="shadow" style="border-radius: 15px;">
                        
                            <div class="card-body table-responsive">
                            
                                <table class="table table-hover" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Transaction ID</th>
                                            <th>Pharmacy / Location</th>
                                            <th>Ordered Product</th>
                                            <th>Quantity</th>
                                            <th>Item Subtotal</th>
                                            <th>Payment method</th>
                                            <th>Order Status</th>
                                            <th>Buy again</th>   

                                 
        
                                        </tr>
                                    </thead>
                    
                                        <tbody>
                                        <?php
    
                                            $query = "SELECT * FROM order_record WHERE Patient_ID = '$Patient_ID' ORDER BY Order_ID DESC ";  
                                            $result = mysqli_query($connect, $query);

                                        

                                            while($row = mysqli_fetch_array($result)){
                                                
                                                ?>
                                                <tr>
                                                    <td><p class="d-flex justify-content-center mt-3"><?php echo $row['Order_ID']; ?></p></td>
                                                    <td><p class="d-flex justify-content-center mt-3"><?php echo $row['Transaction_ID']; ?></p></td>

                                                    <td><p class="d-flex justify-content-center mt-3">
                                                        <?php
                                                        
                                                        
                                                        $Pharmacy_ID = $row['Pharmacy_ID']; 

                                                        $query = "SELECT * FROM pharmacy_record WHERE Pharmacy_ID = '$Pharmacy_ID' ";  
                                                        $res = mysqli_query($connect, $query);

                                                        $roww = mysqli_fetch_array($res);
                                                        
                                                        echo $roww['Pharmacy_Name'];
                                                        
                                                        ?></p>

                                                        <p class="d-flex justify-content-center mt-3">
                                                        <?php
                                                        
                                                        
                                                        $Pharmacy_ID = $row['Pharmacy_ID']; 

                                                        $query = "SELECT * FROM pharmacy_record WHERE Pharmacy_ID = '$Pharmacy_ID' ";  
                                                        $res = mysqli_query($connect, $query);

                                                        $roww = mysqli_fetch_array($res);
                                                        
                                                        echo $roww['Pharmacy_Address'];
                                                        
                                                        ?></p>
                                                    </td>
                                                 



                                                    <td>
                                                        
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                
                                                            <img src="Pharmacy-upload/<?php echo $row['Product_Photo']; ?> " alt="Product Img" class="img-fluid"  style="width:120px; height:100px;">
                                                                    
                                                            </div>
                                                            <div class="col-lg-5 mt-3">
                                                                <?php echo $row['Product_Name']; ?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <p class="d-flex justify-content-center mt-3"><font size="2"><?php echo $row['Quantity'];?></p></td>
                                                
                                                    <td><p class="d-flex justify-content-center mt-3"> ₱ <?php echo $row['Total_Price']; ?> Php</p></td>
                    
                                                    <td>
                                                        <div class="d-flex justify-content-center mt-3">
                                                            <?php

                                                            $PayMethod = $row['Payment_Method']; 
                                                        
                                                            if($PayMethod == "Cash upon pick-up"){
                                                                ?>
                                                                    <button class="btn btn-sm btn-primary fw-bold" ><?php echo $PayMethod; ?> </button>
                                                                <?php
                                                            }
                                                            elseif($PayMethod == "Cash on delivery")
                                                            {
                                                                ?>
                                                                    <button class="btn btn-sm btn-info fw-bold" ><?php echo $PayMethod; ?> </button>
                                                                <?php
                                                            }

                                                            ?>
                                                        </div>
                                                    </td>

                                                   
                                                    

                                                    <td>
                                                        <?php 

                                                            $Product_ID = $row['Product_ID'];

                                                            $Product_Search = mysqli_query($connect,"SELECT * FROM product_record WHERE Product_ID = '$Product_ID'");
                                                            $row2 = mysqli_fetch_array($Product_Search);

                                                            $Product_Stocks = $row2['Product_Quantity'];
                                                            

                                                            $Order_Quantity = $row['Quantity'];
                                                            $Order_ID = $row['Order_ID'];
                                                            $status = $row['Order_Status'];
                                                            if($status == "Completed"){
                                                                ?>
                                                                <div class="d-flex justify-content-center mt-3"><button class="btn btn-sm btn-primary fw-bold" ></i><?php echo $status; ?></button></div>
                                                                <?php
                                                            }
                                                            elseif($status == "Ready to Pick-up")
                                                            {
                                                                ?>
                                                                <div class="d-flex justify-content-center mt-3"><button class="btn btn-sm btn-warning fw-bold"></i><?php echo $status; ?></button></div>
                                                                
                                                                
                                                                

                                                                <?php

                                                            }
                                                            elseif($status == "Order Cancelled")
                                                            {
                                                                ?>
                                                                <div class="d-flex justify-content-center mt-3"><button class="btn btn-sm btn-danger fw-bold"></i><?php echo $status; ?></button></div>
                                                                
                                                                
                                                                

                                                                <?php

                                                            }
                                                            elseif($status == "Out for Delivery")
                                                            {
                                                                ?>
                                                                <div class="d-flex justify-content-center mt-3"><button class="btn btn-sm btn-info fw-bold" ></i><?php echo $status; ?></button></div>
                                                                    
                                                                <?php

                                                            }
                                                            else
                                                            {

                                                                ?>
                                                                <div class="d-flex justify-content-center mt-3"><button class="btn btn-sm btn-warning fw-bold"></i><?php echo $status; ?></button></div>
                                                                <div class="d-flex justify-content-center mt-3">
                                                                    <form action="" method="POST"> 
                                                                        <input type="hidden" value="<?php echo $Order_ID; ?>" name="Order_ID">
                                                                        <input type="hidden" value="<?php echo $Product_ID; ?>" name="Product_ID">
                                                                        <input type="hidden" value="<?php echo $Product_Stocks; ?>" name="Product_Stocks">
                                                                        <input type="hidden" value="<?php echo $Order_Quantity; ?>" name="Order_Quantity">
                                                                        <input type="hidden" value="Order Cancelled" name="Order_Status">
                                                                        <button class="btn btn-sm btn-danger fw-bold" name="cancel">Cancel Order</button>
                                                                    </form>
                                                                </div>
                                                                <?php
                                                            }
                                                        
                                                        
                                                        
                                                        ?>
                                                       
                                                        
                                                    </td>

                                                    <td>
                                                        <div class="d-flex justify-content-center mt-3"><a href="Patient-Buy-Medicine.php?Product_ID=<?php echo $row['Product_ID'];?>"><button type="submit" class="btn btn-sm btn-success fw-bold">Buy Again</button></a></div>
                                                        
                                                    </td>
                                                            
                                                    <!---<td><div class="d-flex justify-content-center mt-3"><a href="Patient-Delete-Orders.php?delete=<?php //echo $row['Order_ID'];?>"><button class="btn btn-sm btn-danger fw-bold" style="border-radius: 30px;"><i class="fas fa-trash"></i></button></a></div></td>-->
                                                
                                                
                                                </tr>
                                                <?php
                                            }
                                        ?> 

                                        </tbody>
    
                                </table>
                                
    

                                <!--<div class="mx-3 d-flex justify-content-end"> 
                                  <a href="Patient-Place-Order.php"><button type="submit" class="btn btn-lg btn-success mx-3" form="my-form">Check Out</button></a>
                                </div>-->
                                
                                      
                    
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
        <script>
            $(document).ready( function () {


                $('#datatablesSimple').DataTable({
                    order: [[0, 'desc']],
                });
            } );
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>t>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
