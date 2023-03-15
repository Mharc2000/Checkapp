

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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body class="sb-nav-fixed" style="font-family: 'Poppins', sans-serif;">
    <?php
        include ('Pharmacy-session.php');
        include ('config.php');

        if (isset($_POST['submit'])) {
            $Pharmacy_ID = $_SESSION['Pharmacy_ID'];
            $Pharmacy_Name = mysqli_real_escape_string($connect, $_POST['Pharmacy_Name']);
            $Pharmacy_Photo = mysqli_real_escape_string($connect, $_POST['Pharmacy_Photo']);
            $Product_Name = mysqli_real_escape_string($connect, $_POST['Product_Name']);
            $Product_Price = mysqli_real_escape_string($connect, $_POST['Product_Price']);
            $Product_Description = mysqli_real_escape_string($connect, $_POST['Product_Description']);
            $Product_Quantity = mysqli_real_escape_string($connect, $_POST['Product_Quantity']);
            $Category = $_POST['Category'];
            $C=implode(', ',$Category);
            $Product_Location = mysqli_real_escape_string($connect, $_POST['Product_Location']);
            $Pharmacy_Address = mysqli_real_escape_string($connect, $_POST['Pharmacy_Address']);
                
            $Product_Photo = rand(1000,100000)."-".$_FILES['Product_Photo']['name'];
            $file_loc = $_FILES['Product_Photo']['tmp_name'];
            $folder="Pharmacy-upload/";


        
            // new file size in KB
            //$new_size = $file_size/1024;  
            // new file size in KB
            
            // make file name in lower case
            $new_file_name = strtolower($Product_Photo);
            // make file name in lower case
            
            $final_file=str_replace(' ','-',$new_file_name);
            
            if(move_uploaded_file($file_loc,$folder.$final_file))
            {

            $query = "INSERT INTO product_record (Pharmacy_ID, Pharmacy_Name, Pharmacy_Photo, Product_Photo, Product_Description, Product_Name, Product_Price, Product_Quantity, Product_Category,Product_Location, Pharmacy_Address ) 
            VALUES('$Pharmacy_ID', '$Pharmacy_Name', '$Pharmacy_Photo','$final_file', '$Product_Description', '$Product_Name', '$Product_Price', '$Product_Quantity','$C' ,'$Product_Location', '$Pharmacy_Address')";
            
            $result = $connect->query($query);

                ?>
                <script>
                    swal({
                    title: "Added Successfully!",
                    icon: "success"
                    });
                </script>
                <?php
                }
            else{
                ?>
                <script>
            alert('Error adding product');
                    window.location.href='Pharmacy-Product.php';
                    </script>
                <?php
            
        } 
        } 


        if (isset($_POST['update'])) {

            $Pharmacy_ID = $_SESSION['Pharmacy_ID'];
            $Product_ID = mysqli_real_escape_string($connect, $_POST['Product_ID']);
            $Product_Name = mysqli_real_escape_string($connect, $_POST['Product_Name']);
            $Product_Price = mysqli_real_escape_string($connect, $_POST['Product_Price']);
            $Product_Description = mysqli_real_escape_string($connect, $_POST['Product_Description']);
            $Product_Quantity = mysqli_real_escape_string($connect, $_POST['Product_Quantity']);
        
            $sql = "UPDATE product_record SET Product_Name='$Product_Name',Product_Price='$Product_Price', Product_Description='$Product_Description', 
            Product_Quantity='$Product_Quantity' WHERE Product_ID = '$Product_ID'";

            
            if(mysqli_query($connect, $sql))
            {

                ?>
                <script>
                    swal({
                    title: "Update Success!",
                    icon: "success"
                    });
                </script>
                <?php
            }
            else{
                ?>
                <script>
                    alert('Error to update product');
                    window.location.href='Pharmacy-Product.php';
                    </script>
                <?php
            
        } 
        } 




        ?>
        <div class="spinner" id="preloader"></div>
        <?php include('includes/Pharmacy-nav.php');?>  
        <?php include('includes/Pharmacy-Sidenav.php');?>    
        </nav>
       
            <div id="layoutSidenav_content">
                <main class="main">
                    <div class="container-fluid">
                        <div class="card mt-3 mb-4" style="border-radius: 15px;">
                            <div class="card-header"><h4 class="mt-2 px-2 py-2 ">My Products</h4></div>
                                <div class="card-body table-responsive">
                                <button type="button" class="btn btn-sm btn-success mb-3 me-2" tabindex="-1" data-bs-toggle="modal" data-bs-target="#add">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                    Add product
                                </button>
                                    <table class="table table-hover" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Product Photo</th>
                                            <th>Product Name</th>
                                            <th>Product Price</th>
                                            <th>Product Description</th>
                                            <th>Product Stocks</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $Pharmacy_ID = $_SESSION['Pharmacy_ID'];
                                            $query = "SELECT * FROM product_record WHERE Pharmacy_ID = '$Pharmacy_ID' ORDER BY Product_ID DESC";  
                                            $result = mysqli_query($connect, $query); 
                                            while($row = mysqli_fetch_array($result)):?>
                                            <tr>
                                                <td><span id="ProdID<?php echo $row['Product_ID']; ?>"><?php echo $row['Product_ID']; ?></span></td>
                                                <td> <img src="Pharmacy-upload/<?php echo $row['Product_Photo']; ?> "id="Photo<?php echo $row['Product_ID']; ?>" alt="Product Img" class="img-thumbnail" width="150" height="150"> </td>
                                                <td><span id="ProdName<?php echo $row['Product_ID']; ?>"><?php echo $row['Product_Name']; ?> </span> </td>
                                                <td>₱ <span id="Price<?php echo $row['Product_ID']; ?>"><?php echo $row['Product_Price']; ?>  </span></td>
                                                <td><span id="Description<?php echo $row['Product_ID']; ?>"> <?php echo $row['Product_Description']; ?></span></td>
                                                <td><span id="Quantity<?php echo $row['Product_ID']; ?>"><?php echo $row['Product_Quantity']; ?></span> </td>
                                            
                                                

                                                <td><button type="button" value="<?php echo $row['Product_ID']; ?>" class="btn btn-sm btn-primary edit"><i class="fas fa-edit"></i> Edit</button></td>
                                                <td><a href="Pharmacy-delete.php?delete=<?php echo $row['Product_ID'];?>"><button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</button></a></td>
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

        <div class="modal fade modal-signin" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <label class="label mx-2">Product Stocks</label>
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
                        
                                
                            <div class="modal-footer">
                                <button type="button" class="btn btn-lg btn-default" data-bs-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                <button class="btn btn-lg btn-success" name="submit" type="submit"><i class="fa fa-plus" aria-hidden="true"></i> Add Product</button>
                            </div>

                
                        </form>
       
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade modal-signin" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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

                            <input type="hidden" class="form-control p-2" id="eProdID" name="Product_ID" required="true">

                            <div class="form-group  pt-3">
                                <label class="label mx-2">Product Name</label>
                                <input type="text"  class="form-control p-2" id="eProdName" name="Product_Name" required="true">
                            </div>

                            <div class="form-group  pt-3">
                                <label class="label mx-2">Product Price</label>
                                <input type="text" class="form-control p-2" name="Product_Price" id="ePrice" required="true">
                            </div>

                            <div class="form-group pt-3">
                                <label class="label mx-2">Product Descrption</label>
                                <textarea class="form-control"  placeholder="Describe your product" id="eDescription" rows="8" name="Product_Description" required="true"></textarea>

                            </div>

                            <div class="form-group pt-3">
                                <label class="label mx-2">Product Quantity</label>
                                <input type="text" class="form-control p-2" name="Product_Quantity" id="eQuantity" required="true">
                            </div>
                            
                          
                                
                            <div class="modal-footer">
                                <button type="button" class="btn btn-lg btn-default" data-bs-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                <button class="btn btn-lg btn-success" name="update" type="submit"><i class="fa fa-refresh" aria-hidden="true"></i> Update Product</button>
                            </div>
                                
            
                        </form>
       
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function(){
            $(document).on('click', '.edit', function(){
                var id=$(this).val();
                var prodID=$('#ProdID'+id).text();
                var Photo=$('#Photo'+id).text();
                var ProdName=$('#ProdName'+id).text();
                var Price=$('#Price'+id).text();
                var Description=$('#Description'+id).text();
                var Quantity=$('#Quantity'+id).text();
                var Location=$('#Location'+id).text();



                $('#edit').modal('show');
                $('#eProdID').val(prodID);
                $('#ePhoto').val(Photo);
                $('#eProdName').val(ProdName);
                $('#ePrice').val(Price);
                $('#eDescription').val(Description);
                $('#eQuantity').val(Quantity);
                $('#eLocation').val(Location);
            });
        });
        </script>
        
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
