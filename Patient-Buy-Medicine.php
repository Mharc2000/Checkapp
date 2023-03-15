<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Checkapp - Pharmacy</title>
        <link rel="icon" href="img/logo.png">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="js/jquery-3.5.1.js"></script>
        <script src="js/quantity.js" crossorigin="anonymous"></script>
        <script src="js/sweetalert.js"></script>
        <style>
            
        </style>
    </head>
    <body class="sb-nav-fixed" style="font-family: 'Poppins', sans-serif;">
        <?php include('includes/Patient-Addtocart.php');?>
        <?php include('includes/Patient-nav-cart.php');?>
        <?php include('includes/Patient-Sidenav.php');?>
            <div id="layoutSidenav_content">
                <main class="main">
                <div class="container-fluid">
                        <div class="row"> 
                            <div class="col-lg-5">
                                <div class="card mt-3" id="shadow" style="border-radius: 30px;">
                                    <h4 class="card-header fw-bold d-flex justify-content-center">Buy Medicine</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3 mb-5" id="shadow" style="border-radius: 30px;">
                            <div class="card-body" id="content">
                                <a href="Patient-Pharmacy.php" class="text-success" style="text-decoration: none;"><i class="fa fa-arrow-left text-success" aria-hidden="true"></i> Buy other medicine</a>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            
                                                <div class="card-img d-flex justify-content-center mt-2">
                                                <?php
                                                $Product_ID = $_GET['Product_ID'];
                                                $query = "SELECT * FROM product_record WHERE Product_ID ='$Product_ID'";  
                                                $result = mysqli_query($connect, $query);
                                                while($row = mysqli_fetch_assoc($result)):?>
                                                    <img src="Pharmacy-upload/<?php echo $row['Product_Photo']; ?> " alt="" style="width:1300px; height:700px;border-radius: 30px;" class="img-fluid"></i> 
                                                <?php endwhile; ?>
                                                </div>
                                        </div>
                                       
                                        <div class="col-lg-5">
                                            <form action="" method="POST"  enctype="multipart/form-data" class="row d-flex justify-content-center">

                                                <?php
                                                    $Patient_ID = $_SESSION['Patient_ID'];
                                                    $query = "SELECT * FROM patient_record WHERE Patient_ID  ='$Patient_ID'";  
                                                    $result = mysqli_query($connect, $query);
                                                    while($row = mysqli_fetch_assoc($result)):?> 
                                                    <input type="hidden" value="<?php echo $row['Patient_ID'];?>" name="Patient_ID">
                                                <?php endwhile; ?>    
                                                <?php
                                                    $Product_ID = $_GET['Product_ID'];
                                                    $query = "SELECT * FROM product_record WHERE Product_ID ='$Product_ID'";  
                                                    $result = mysqli_query($connect, $query);

                                                    $value = 1;

                                                    
                                                    while($row = mysqli_fetch_array($result)){ 
                                                    ?>   
                                                    <div class="row mt-2 mx-2">
                                                        <input type="hidden" value="<?php echo $row['Product_ID'];?>" name="Product_ID">
                                                        <input type="hidden" value="<?php echo $row['Pharmacy_ID'];?>" name="Pharmacy_ID"> 
                                                        <input type="hidden" value="<?php echo $row['Product_Photo'];?>" name="Product_Photo">  
                                                        <input type="hidden" value="<?php echo $row['Product_Name'];?>" name="Product_Name">
                                                        <input type="hidden" value="<?php echo $row['Product_Price']; ?>" name="Product_Price">
                                                        
                                                        <input type="hidden" value="<?php echo $row['Product_Quantity']; ?>" name="Product_Quantity">
                                                        <div class="form-group mt-2 pt-2">
                                                        <a class="dropdown-item" href=""><img src="Pharmacy-upload/<?php echo $row['Pharmacy_Photo']; ?> " alt="" class="rounded-circle" width="50" height="50"><?php echo $row['Pharmacy_Name'];?></a> 
                                                        </div>
                                                        <div class="form-group pt-2">
                                                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $row['Pharmacy_Address'];?> <?php echo $row['Product_Location'];?></p>
                                                        </div>
                                                        <div class="form-group mt-2 pt-2">
                                                            <h1><?php echo $row['Product_Name'];?></h1>
                                                        </div>

                                                        <div class="rating mt-2">
                                                            <span class="star selected">&#9733;</span>
                                                            <span class="star selected">&#9733;</span>
                                                            <span class="star selected">&#9733;</span>
                                                            <span class="star selected">&#9733;</span>
                                                            <span class="star selected">&#9733;</span>
                                                        </div>

                                                        <div class="form-group pt-2">
                                                            <h3> ₱<?php echo $row['Product_Price'];?> Php</h1>
                                                        </div>
                                                       

                                                        
                                                        <div class="form-group d-flex mt-2 pt-1 py-2 px-2">
                                                            <div class="card py-2 px-2">
                                                            <p>Medicine Description</p>
                                                            <p><?php echo $row['Product_Description'];?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group pt-2">
                                                            <p> Stock available:  <?php
                                                             $qty = $row['Product_Quantity'];
                                                            $zero = "Out of stock";
                                                                if($qty == 0){
                                                                    echo $zero;
                                                                }else{
                                                                    echo $qty;
                                                                }
                                                             
                                                             
                                                             ?></p> 
                                                            
                                                        </div>   
                                                        <div class="form-group mt-1">
                                                        <p>Quantity</p>
    
                                                            <div class="col-lg-3">
                                                                    <div class="input-group">
                                                                        <span class="input-group-prepend">
                                                                            <button type="button" class="quantity-left-minus input-group-text"  data-type="minus" data-field="">
                                                                            <span>-</span>
                                                                            </button>
                                                                        </span>
                                                                        <input type="text" id="quantity" name="quantity" class="form-control input-number"  value="<?php echo $value; ?>" min="1" max="100">
                                                                        <span class="input-group-prepend">
                                                                            <button type="button" class="quantity-right-plus input-group-text" data-type="plus" data-field="">
                                                                            <span >+</span>
                                                                            </button>
                                                                        </span>
                                                                    </div>
                                                            </div>
                                                        </div>

                                                            

                                                        <div class="d-flex mt-3 pt-1 pb-5">
                                                            <button class="btn1 flex-grow-1 p-2" type="submit" name="submit" style="border-radius: 30px;"><i class="fa-solid fa-cart-shopping"></i> <span class="fw-bold">  ADD TO CART </span></button>
                                                        </div>

                                                       
                                                        
                                                                                                              
                                                        
                        
                                                    </div>
                                                    <?php

                                                    }

                                                ?>
                                            </form> 



                                        </div>          
                                    </div>
                            </div>
                        </div>

                    </div>         
                        
                            

                </main>
                <?php include('includes/App-footer.php');?>
            </div>
        </div>
                                                     
        <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function(){
            loader.style.display="none";
        })

        </script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.4/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>
