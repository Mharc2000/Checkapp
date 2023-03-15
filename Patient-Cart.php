

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
        <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
        <script src="js/sweetalert.js"></script>

        <style>
    
        </style>
    </head>
    <body class="sb-nav-fixed" style="font-family: 'Poppins', sans-serif;">

    <?php
    
        include ('Patient-session.php');
        include ('config.php');
        $Patient_ID = $_SESSION['Patient_ID'];



        if (isset($_POST['update'])) {
            $Quantity = $_POST['Quantity'];
            $Cart_ID = $_POST['Cart_ID'];
            $Product_Price = $_POST['Price'];
            $total_Price = $Product_Price * $Quantity; 
            $query = mysqli_query($connect, "UPDATE cart_record SET quantity = '$Quantity', Total_Price = '$total_Price' WHERE Cart_ID = '$Cart_ID'");
            if ($query) {

                ?>
                 
                        <script>
                            swal({
                            title: "Quantity Updated!",
                            icon: "success"
                            });
                        </script>
                    <?php

            }
        }




        ?>

         <?php include('includes/Patient-nav-cart.php');?>
        <?php include('includes/Patient-Sidenav.php');?>
        <div class="spinner" id="preloader"></div>
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
 
                        <div class="card mt-3 mb-4" id="shadow" style="border-radius: 15px;" id="cart_table">
                        
                            <div class="card-body table-responsive" >
                            
                                <table class="table table-hover" id="datatablesSimple">
                                    <thead>
                                        <tr>
            
                                            <th>Cart Id</th>
                                            <th>Product</th>
                                            <th>Unit Price</th>
                                            <th>Quantity</th>
                                            <th>Item Subtotal</th>
                                            <th>Checkout</th>
                                            <th>Delete</th>
                                          
        
                                        </tr>
                                    </thead>
                    
                                        <tbody>
                                        <?php
                                        $grand_total = 0;
                                        $query = "SELECT * FROM cart_record WHERE Patient_ID = '$Patient_ID' ORDER BY Cart_ID DESC ";  
                                        $result = mysqli_query($connect, $query);
                                        while($row = mysqli_fetch_array($result)):?> 

                                            <tr>
                                            
                                                <td><?php echo $row['Cart_ID']; ?></td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            
                                                        <img src="Pharmacy-upload/<?php echo $row['Product_Photo']; ?> " alt="Product Img" class="img-fluid"  style="width:120px; height:100px;">
                                                                
                                                        </div>
                                                        <div class="col mt-3">
                                                            <?php echo $row['Product_Name']; ?>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><div class="d-flex justify-content-center mt-3">₱ <?php echo $row['Product_Price']; ?> Php</div></td>
                                                <td>
                                                    <div class="d-flex justify-content-center mt-3"> 
                                        
                                                        <form action="" method="POST">
                                                                        <input type="hidden" name="Cart_ID" value="<?php echo $row['Cart_ID']; ?>">
                                                                        <input type="hidden" name="Price" value="<?php echo $row['Product_Price']; ?>">

                                                                <div class="input-group">
                                                                        <input type="number" name="Quantity" class="form-control"  value="<?php echo $row['Quantity'];?>">
                                                                        <button type="submit" name="update"  class="btn1"><i class="fa-solid fa-refresh"></i></button>     
                                                                </div>

                                                        </form>
                                                    </div>
                                                   
                                             
                                                </td>
                                                <td><div class="d-flex justify-content-center mt-3">₱ <?php echo $row['Total_Price']; ?> Php</div></td>
                                                <td>
                                                    <div class="d-flex justify-content-center mt-3"><a href="Patient-Place-Order.php?id=<?php echo $row['Cart_ID'];?>"><button type="submit" class="btn1 mx-3" form="my-form">Checkout</button></a></div>
                                                    
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center mt-3">
                                                        <form action="Patient-Cart-Delete.php" method ="POST">
                                                            <input type="hidden" name="Cart_ID" value="<?php echo $row['Cart_ID']; ?>">  
                                                            <button type="button" style="border-radius: 30px;" class="btn btn-danger delete_product_btn" value="<?php echo $row['Cart_ID']; ?>" ><i class="fas fa-trash"></i></button> 
                                                        </form>
                                                    </div>   
                                                </td>
                                             
                                                <?php $grand_total += $row['Total_Price']; ?>
                                                
                                            </tr>
                                        <?php endwhile; ?> 

                                        </tbody>
    
                                </table>
                                
    

                                <!--<div class="mx-3 d-flex justify-content-end"> 
                                    <h1> </h1>
                                  <a href="Patient-Place-Order.php"><button type="submit" class="btn btn-lg btn-success mx-3" form="my-form">Check Out</button></a>
                                </div>-->
                                
                                      
                    
                            </div>
                        </div>

                    </div>     

                </main>
                <?php include('includes/App-footer.php');?>
            </div>
        </div>
        
        <script src="js/delete.js"></script> 

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
                    order: [[1, 'desc']],
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
