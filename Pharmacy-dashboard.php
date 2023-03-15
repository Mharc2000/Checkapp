<?php
include("config.php"); 
include("Pharmacy-session.php");

// mysqli_close($connect);
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
        <title>Pharmacy - Dashboard</title>
        <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body class="sb-nav-fixed" style="font-family: 'Poppins', sans-serif;">
        <?php include('includes/Pharmacy-nav.php');?>
        <?php include('includes/Pharmacy-Sidenav.php');?>   
            <div id="layoutSidenav_content">
                <main class="main">
                    <div class="container-fluid">   
                        <div class="row">
                            
                            <div class="col-md-4"  >
                                <div class="card pt-3 pb-3 mt-3" id="shadow" style="border-radius: 30px;" >
                                    <div class="row">
                                
                                        <div class="col-sm-4">
                                            <div class="card-img d-flex justify-content-center">
                                                <img src="img/order.png" alt="" class="rounded py-2 px-2 img-fluid" width="150" height="150">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="card-body mt-3">
                                            <a href="Pharmacy-Orders.php" style="text-decoration: none;"> <h4 class="d-flex justify-content-center">Orders</h4> </a>
                                                <?php  
                                            
                                                $Pharmacy_ID = $_SESSION['Pharmacy_ID'];


                                                    $query = "SELECT COUNT(*) AS count FROM order_record WHERE Pharmacy_ID = '$Pharmacy_ID'";  
                                                    $query_result = mysqli_query($connect, $query);  
                                                    while($row = mysqli_fetch_assoc($query_result)){
                                                        $output = $row['count'];    

                                                    }
                                                ?>  
                                                <h4 class="d-flex justify-content-center"> <?php echo $output; ?> </h4>
                                            </div>
                                        </div>
                                
                                    </div>
                                </div>  
                            </div>

                            <div class="col-md-4">
                                <div class="card pt-3 pb-3 mt-3"  id="shadow" style="border-radius: 30px;" >
                                    <div class="row">
                                
                                        <div class="col-sm-4">
                                            <div class="card-img d-flex justify-content-center">
                                                <img src="img/medicine.png" alt="" class="rounded py-2 px-2 img-fluid" width="150" height="150">
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="card-body mt-3">
                                                <a href="Pharmacy-Product.php" style="text-decoration: none;"> <h4 class="d-flex justify-content-center">Product</h4></a>
                                                <?php  
                                            
                                                $Pharmacy_ID = $_SESSION['Pharmacy_ID'];


                                                    $query = "SELECT COUNT(*) AS count FROM product_record WHERE Pharmacy_ID = '$Pharmacy_ID'";  
                                                    $query_result = mysqli_query($connect, $query);  
                                                    while($row = mysqli_fetch_assoc($query_result)){
                                                        $product = $row['count'];    

                                                    }
                                                ?> 
                                                
                                                <h4 class="d-flex justify-content-center"><?php echo $product; ?></h4>
                                            </div>
                                        </div>
                                
                                    </div>
                                </div>  
                            </div>

                            <div class="col-md-4">
                                <div class="card pt-3 pb-3 mt-3" id="shadow" style="border-radius: 30px;" >
                                    <div class="row">
                                
                                        <div class="col-sm-4">
                                            <div class="card-img d-flex justify-content-center">
                                                <img src="img/earnings.png" alt="" class="py-2 px-2 img-fluid " width="150" height="150">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="card-body mt-3">
                                                <h4 class="d-flex justify-content-center">Total Revenue</h4>
                                                <?php  
                                            
                                                $Pharmacy_ID = $_SESSION['Pharmacy_ID'];


                                                    $query = "SELECT * FROM order_record WHERE Pharmacy_ID = '$Pharmacy_ID' AND Order_Status = 'Completed'";  

                                                    $query_result = mysqli_query($connect, $query); 
                                                    $Total_Rev = 0;
                                                    while($row = mysqli_fetch_assoc($query_result)){

                                                        $Order_Status = $row['Order_Status'];
                                                        $total_Price = $row['Total_Price'];
                                                        $Total_Rev += $total_Price;  
                                
                                                    }

                                                ?> 
                                                <h4 class="d-flex justify-content-center">₱ <?php echo $Total_Rev; ?></h4>
                                            </div>
                                        </div>
                                
                                    </div>
                                </div>  
                            </div>
                            <div class="row mt-3">
                            <div class="col-xl-6">
                                <div class="card mb-4" style="border-radius: 30px;">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Daily Sales
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4" style="border-radius: 30px;">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Monthly Revenue
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            </div>                       
                                                    
                            

                        </div>

                   
                   

        
                        <div class="card mt-3 mb-4" style="border-radius: 30px;">
                            <div class="card-header"><h4 class="mt-2 px-2 py-2 ">Recent Orders</h4></div>
                                <div class="card-body table-responsive">
                
                                    <table class="table" id="datatablesSimple">
                                        <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Transaction ID</th>
                                            <th>Customer Name</th>
                                            <th>Billing Address & Contact#</th>
                                            <th>Ordered Product</th>
                                            <th>Quantity</th>
                                            <th>Payment Method</th>
                                            <th>Total Price</th>
                                            <th>Order Date</th>
                                           
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $Pharmacy_ID = $_SESSION['Pharmacy_ID'];
                                            $query = "SELECT * FROM order_record WHERE Pharmacy_ID = '$Pharmacy_ID' ORDER BY Order_ID DESC";  
                                            $result = mysqli_query($connect, $query); 
                                            while($row = mysqli_fetch_array($result)):?>
                                            <tr>
                                                
                                                <td> <div class="d-flex justify-content-center mt-3 mb-3"><span id="OrderID<?php echo $row['Order_ID']; ?>"><?php echo $row['Order_ID']; ?></span></div></td>
                                                <td> <div class="d-flex justify-content-center mt-3 mb-3"><?php echo $row['Transaction_ID']; ?> </div></td>
                                                <td> <div class="d-flex justify-content-center mt-3 mb-3"> <?php echo $row['Customer_Name']; ?> </div> </td>
                                                <td> <div class="d-flex justify-content-center mt-3 mb-3"><?php echo $row['Street_Address']; ?>, <?php echo $row['Location']; ?>,  Contact: <?php echo $row['Contact']; ?></div> </td>
                                                <td> 
                                                    <div class="d-flex justify-content-center mt-3 mb-3">
                                                        <div class="row">
                                                            <div class="col-lg-5">
                                                                
                                                            <img src="Pharmacy-upload/<?php echo $row['Product_Photo']; ?> " alt="Product Img" class="img-fluid"  style="width:120px; height:100px;">
                                                                    
                                                            </div>
                                                            <div class="col mt-3">
                                                                <?php echo $row['Product_Name']; ?>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                 </td>

                                                <td><div class="d-flex justify-content-center mt-3 mb-3"> <?php echo $row['Quantity']; ?></div>  </td>
                                                <td><div class="d-flex justify-content-center mt-3 mb-3"> <?php echo $row['Payment_Method']; ?> </div> </td>
                                                <td><div class="d-flex justify-content-center mt-3 mb-3"> ₱ <?php echo $row['Total_Price']; ?></div> </td>
                                                <td><div class="d-flex justify-content-center mt-3 mb-3"><?php echo $row['Order_Date']; ?></div> </td>
                                               

                                                        


                                            </tr>
                                        <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                  
                    </div>   
                      
                </main>
                <?php include('includes/App-footer.php');?>
            </div>
            
        </div>
        <div class="modal fade modal-signin" id="addequipment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" >
                <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
                    <div class="modal-header p-3 pb-3">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <br>
                    <div class="modal-body p-5 pt-0">
                    <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-4"> 

                    <?php
                        $Pharmacy_ID = $_SESSION['Pharmacy_ID'];
                        $query = "SELECT * FROM pharmacy_record WHERE Pharmacy_ID='$Pharmacy_ID'";
                        $result = mysqli_query($connect, $query); 
                        while($row = mysqli_fetch_array($result)):?>  
                            <input type="hidden" value="<?php echo $row['Pharmacy_Name']; ?>" name="Pharmacy_Name"> 
                            <input type="hidden" value="<?php echo $row['Photo']; ?>" name="Pharmacy_Photo"> 
                        <?php endwhile; ?> 
                            <div class="form-group col-md-6 pt-3">
                                <label class="label mx-2">Product Name</label>
                                <input type="text" placeholder="Enter your product name"  class="form-control p-2" id="" name="Product_Name" required="true">
                            </div>

                            <div class="form-group col-md-6 pt-3">
                                <label class="label mx-2">Product Price</label>
                                <input type="text" placeholder="Php 0.00" class="form-control p-2" name="Product_Price" id="" required="true">
                            </div>

                            <div class="form-group pt-3">
                                <label class="label mx-2">Product Descrption</label>
                                <textarea class="form-control"  placeholder="Describe your product" id="exampleFormControlTextarea1" rows="3" name="Product_Description" required="true"></textarea>

                            </div>

                            <div class="form-group col-md-6 pt-3">
                                <label class="label mx-2">Product Quantity</label>
                                <input type="number" value="0" class="form-control p-2" name="Product_Quantity" id="" required="true">
                            </div>
                            
                            <div class="form-group pt-3">
                                <label for="exampleFormControlTextarea1"><h5>Product Category: </h5></label>
                                
                                <div class="row">
                                    <div class="col-sm-4">
                                    <input type="checkbox" name="Category[]" value= "Liquid Medicine" tabindex="1"/> Liquid Medicine<br/>
                                    <input type="checkbox" name="Category[]" value= "Tablet Medicine" tabindex="1"/> Tablet Medicine<br/>
                                    <input type="checkbox" name="Category[]" value= "Capsule Medicine" tabindex="1"/> Capsule Medicine<br/>
                                    <input type="checkbox" name="Category[]" value= "Topical medicine" tabindex="1"/> Topical medicine<br/>
                                    

                                    </div>
                                    <div class="col-sm-4">
                                    <input type="checkbox" name="Category[]" value= "Suppositories" tabindex="1"/> Suppositories<br/>
                                    <input type="checkbox" name="Category[]" value= "Drops" tabindex="1"/> Drops<br/>
                                    <input type="checkbox" name="Category[]" value= "Inhalers" tabindex="1"/> Inhalers<br/>
                                    <input type="checkbox" name="Category[]" value= "Injections" tabindex="1"/> Injections<br/>

                                    </div>

                                    <div class="col-sm-4">
                                    <input type="checkbox" name="Category[]" value= "Implants or patches" tabindex="1"/> Implants or patches<br/>

                                    </div>
                                </div>
                                <br>
                               

                            </div>

                            <?php
                            $Pharmacy_ID = $_SESSION['Pharmacy_ID'];
                            $query = "SELECT * FROM pharmacy_record WHERE Pharmacy_ID='$Pharmacy_ID'";
                            $result = mysqli_query($connect, $query); 
                            while($row = mysqli_fetch_array($result)):?>  

                            <div class="form-group col-md-12 pt-3">
                                <label class="label mx-2">Province/City</label>
                                <input type="text" value="<?php echo $row['Province']; ?>, <?php echo $row['City']; ?>" class="form-control p-2" name="Product_Location" required="true">
                            </div>
                       
                        

                            <div class="form-group col-md-12 pt-3">
                                <label class="label mx-2">Address</label>
                                <input type="text" value="<?php echo $row['Pharmacy_Address']; ?>" class="form-control p-2"  name="Pharmacy_Address" id="" required="true">
                            </div>
                            <?php endwhile; ?>    

                    
                            <div class="form-group col-md-6 pt-3">
                                <label class="form-label" for="customFile">Upload Product Photo</label>
                                <input type="file" required="true" name="Product_Photo" class="form-control " id="customFile" /> 
                            </div>

                        
                            </div>
                        
                
                    
                        <button class="w-100 mb-2 btn btn-lg rounded-4 btn-success" name ="submit" type="submit">Add Product</button></a>
                        </form>
       
                    </div>
                </div>
            </div>
        </div>
        
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
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
