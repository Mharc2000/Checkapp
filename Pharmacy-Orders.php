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
        <title>Pharmacy - Orders</title>
        <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="js/sweetalert.js"></script>
    </head>
    <body class="sb-nav-fixed" style="font-family: 'Poppins', sans-serif;">
    <?php
     
        $Pharmacy_ID = $_SESSION['Pharmacy_ID'];


        if (isset($_POST['update'])) {
            $Order_Status = $_POST['Order_Status'];
            $Order_ID = $_POST['Order_ID'];
          
            $query = mysqli_query($connect, "UPDATE order_record SET Order_Status = '$Order_Status'  WHERE Order_ID = '$Order_ID'");
            
            if ($query) {

                ?>
                        <script>
                            swal({
                            title: "Status Updated!",
                            text: "Order status has been updated!",
                            icon: "success"
                            });
                        </script>
                    <?php

            }
        }




        ?>
    <?php include('includes/Pharmacy-nav.php');?>
    <?php include('includes/Pharmacy-Sidenav.php');?>  
            <div id="layoutSidenav_content">
                <main class="main">
                    <div class="container-fluid">   
                   

        
                        <div class="card mt-3 mb-4" style="border-radius: 15px;">
                            <div class="card-header"><h4 class="mt-2 px-2 py-2 ">Purchase Order</h4></div>
                                <div class="card-body table-responsive">
                
                                    <table class="table table-hover" id="datatablesSimple">


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
                                            <th>Status</th>
                                            <th>Action</th>
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
                                                <td><div class="d-flex justify-content-center mt-3 mb-3"> 

                                                <?php
                                                    $method = $row['Payment_Method'];
                                                    if($method == "Cash upon pick-up") {
                                                        $date = $row['Pickup_Datetime']; 
                                                        $timestamp = strtotime($date);
    
                                                        // Use date() to format the timestamp according to the desired format
                                                        $formatted_date = date("m/d/y", $timestamp);
                                                        $formatted_time = date("h:i A", $timestamp);
                                                        $at = "at";
                                                        ?>
                                                        
                                                        <p>Cash upon pick-up at: <?php echo $formatted_date;?> <?php echo $at;?> <?php echo $formatted_time;?></p>
    
    
                                                        <?php     


                                                    }elseif($method == "Cash on delivery") {
                                                        ?>
                                                            <p><?php echo $row['Payment_Method']; ?></p>
                                                        <?php   
                                                        
                                                    }
                                                ?>   
                                            
                                                </div></td>
                                                <td><div class="d-flex justify-content-center mt-3 mb-3"> ₱ <?php echo $row['Total_Price']; ?></div> </td>
                                                <td><div class="d-flex justify-content-center mt-3 mb-3"><?php echo $row['Order_Date']; ?></div> </td>
                                                <td> 
                                                    <div class="d-flex justify-content-center mt-3">
                                                       


                                                        <?php 
                                                            $status = $row['Order_Status'];
                                                            if($status == "Completed"){
                                                                ?>
                                                                <button type="button" class="btn btn-sm btn-primary status" value="<?php echo $row['Order_ID']; ?>"> <span id="OrderStatus<?php echo $row['Order_ID']; ?>"><?php echo $row['Order_Status']; ?></span></button>
                                                                <?php
                                                            }
                                                            elseif($status == "Ready to Pick-up")
                                                            {
                                                                ?>
                                                                <button type="button" class="btn btn-sm btn-warning status" value="<?php echo $row['Order_ID']; ?>"> <span id="OrderStatus<?php echo $row['Order_ID']; ?>"><?php echo $row['Order_Status']; ?></span></button>
                                                                
                                                                
                                                                

                                                                <?php

                                                            }
                                                            elseif($status == "Out for Delivery")
                                                            {
                                                                ?>
                                                                    <button type="button" class="btn btn-sm btn-info status" value="<?php echo $row['Order_ID']; ?>"> <span id="OrderStatus<?php echo $row['Order_ID']; ?>"><?php echo $row['Order_Status']; ?></span></button>
                                                                    
                                                                <?php

                                                            }
                                                            elseif($status == "Order Canceled")
                                                            {
                                                                ?>
                                                                <button type="button" class="btn btn-sm btn-danger status" value="<?php echo $row['Order_ID']; ?>"> <span id="OrderStatus<?php echo $row['Order_ID']; ?>"><?php echo $row['Order_Status']; ?></span></button>
                                                                    
                                                                <?php

                                                            }
                                                            else
                                                            {

                                                                ?>
                                                                 <button  class="btn btn-sm btn-warning status" value="<?php echo $row['Order_ID']; ?>"> <span id="OrderStatus<?php echo $row['Order_ID']; ?>"><?php echo $row['Order_Status']; ?></span></button>
                                                                <?php
                                                            }
                                                        
                                                        
                                                        
                                                        ?>


                                                    </div>

                                                        


                                                <td>
                                                    <div class="d-flex justify-content-center mt-3 ">
                                                        <a href="print.php?id=<?php echo $row['Order_ID'];?>"><button class="btn btn-sm btn-primary">Print</button></a>
                                                    </div>
                                                </td>
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

        <div class="modal fade modal-signin" id="status" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" >
                <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
                    <div class="modal-header p-3 pb-3">
                        <h5 class="modal-title" id="staticBackdropLabel">Update Order Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <br>
                    <div class="modal-body p-5 pt-0">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row mb-4"> 

                                             
                                <div class="form-group  pt-3">
                                <label class="label mx-2">ORDER ID</label>
                                    <input type="text" class="form-control p-2" id="EOrderID" name="Order_ID" required="true">
                                </div>               

                                <div class="form-group  pt-3">
                                <label class="label mx-2">ORDER STATUS</label>
                                    <input type="text" class="form-control p-2" id="EOrderStatus" required="true">

                                    <select name="Order_Status" required class="form-control p-2 mt-3">
                                    <option value="" disabled selected> Select Order Status</option>
                                    <option value="Ready to Pick-up">Ready for Pick-up</option>
                                    <option value="Out for Delivery">Out for Delivery</option>
                                    <option value="Completed">Transaction Completed</option>
                                    <option value="Order Canceled">Order Canceled</option>
                                    </select>          


                                </div>                     
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-lg btn-default" data-bs-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                    <button class="btn btn-lg btn-success" name="update" type="submit"><i class="fa fa-plus" aria-hidden="true"></i> Update Status</button>
                                </div>                
        
                        </div>
                    </form>
                </div>
            </div>
        </div>                                        



        <script>
            $(document).ready(function(){
            $(document).on('click', '.status', function(){
                var id=$(this).val();
                var OrderID=$('#OrderID'+id).text();
                var OrderStatus=$('#OrderStatus'+id).text();
               
                $('#status').modal('show');
                $('#EOrderID').val(OrderID);
                $('#EOrderStatus').val(OrderStatus);
            });
        });
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
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
