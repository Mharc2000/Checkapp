<?php
include ('Patient-session.php');
include ('config.php');
$Patient_ID = $_SESSION['Patient_ID'];
$query = "SELECT * FROM patient_record WHERE Patient_ID = '$Patient_ID'";  
$result = mysqli_query($connect, $query);   
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
        <title>Checkapp - My Profile</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui.css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.2/js/bootstrap.min.js" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="js/city.js"></script>
        <script src="js/jquery-3.5.1.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script type = "text/javascript">
            $(document).ready(function () {
                var age = "";
                $('#dob').datepicker({
                    onSelect: function (value, ui) {
                        var today = new Date();
                        age = today.getFullYear() - ui.selectedYear;
                        $('#age').val(age);
                    },
                    changeMonth: true,
                    changeYear: true
                })
            })
        </script>
        <script>	
        window.onload = function() {	

            // ---------------
            // basic usage
            // ---------------
            var $ = new City();
            $.showProvinces("#province");
            $.showCities("#city");

            // ------------------
            // additional methods 
            // -------------------

            // will return all provinces 
            console.log($.getProvinces());
            
            // will return all cities 
            console.log($.getAllCities());
            
            // will return all cities under specific province (e.g Batangas)
            console.log($.getCities("Batangas"));	
            
        }
        </script>
         <script src="js/sweetalert.js"></script>
    </head>
    <body class="sb-nav-fixed" style="font-family: 'Poppins', sans-serif;" >
    <?php
    
        if(isset($_POST['btn-upload']))
            { 
            $Patient_ID= $_SESSION['Patient_ID'];

            $file = rand(1000,100000)."-".$_FILES['file']['name'];
            $file_loc = $_FILES['file']['tmp_name'];
            $folder="Patient_uploads/";
            
            // new file size in KB
            //$new_size = $file_size/1024;  
            // new file size in KB
            
            // make file name in lower case
            $new_file_name = strtolower($file);
            // make file name in lower case
            
            $final_file=str_replace(' ','-',$new_file_name);
            
            if(move_uploaded_file($file_loc,$folder.$final_file))
            {
            $sql = "UPDATE patient_record SET Photo='$final_file' WHERE Patient_ID = '$Patient_ID'";
            $result = $connect->query($sql);
            
            ?>
                <script>
                    swal({
                    title: "Profile Photo Updated!",
                    icon: "success"
                    });
                </script>
            <?php
            }
            else
            {
            
            ?>
            <script>
                swal({
                title: "Error while uploading file",
                text: "Please add a file!",
                icon: "error"
                });
            </script>
            <?php
            }
            }



            if (isset($_POST['submit'])) {
            
                $Patient_ID = $_SESSION['Patient_ID'];
                $FirstName = $_POST['FirstName'];
                $MiddleName = $_POST['MiddleName'];
                $LastName = $_POST['LastName'];
                $Birthdate = $_POST['Birthdate'];
                $Age = $_POST['Age'];
                $Gender = $_POST['Gender'];
                $Contact_No = $_POST['Contact_No'];
                $Civil_Status = $_POST['Civil_Status'];
                $Province= $_POST['Province'];
                $City= $_POST['City'];
            
                
                $sql = "UPDATE patient_record SET FirstName='$FirstName', MiddleName='$MiddleName', LastName='$LastName', Birthdate='$Birthdate', Age='$Age', Gender='$Gender'
                ,Contact_No='$Contact_No' ,Civil_Status='$Civil_Status', Province='$Province', City='$City'  WHERE Patient_ID = '$Patient_ID'";
                $result = $connect->query($sql);
                ?>
                <script>
                    swal({
                    title: "Updated! Successfully",
                    icon: "success"
                    });
                </script>
                <?php

            }     
            
        



            

        ?>
 
        <?php include('includes/Patient-nav2.php');?>
        <?php include('includes/Patient-Sidenav.php');?>
            <div id="layoutSidenav_content">
                <main class="main">
                
                    <div class="container-fluid">
                        <div class="row"> 
                            <div class="col-lg-5">
                                <div class="card mt-3" id="shadow" style="border-radius: 30px;">
                                    <h4 class="card-header fw-bold d-flex justify-content-center">My Profile</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3 mb-5" id="shadow" style="border-radius: 30px;">
                            <div class="card-body" id="content">
                               
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="card" style="border-radius: 15px;">
                                                <div class="card-img d-flex justify-content-center mt-2 mb-5">
                                                <?php
                                                $query = "SELECT * FROM patient_record WHERE Patient_ID = '$Patient_ID'";  
                                                $result = mysqli_query($connect, $query);
                                                while($row = mysqli_fetch_array($result)):?>
                                                   <form action="" method="POST" enctype="multipart/form-data">
                                                   <img src="Patient_uploads/<?php echo $row['Photo']; ?> " alt="" style="width:250px; height:250px;" class="rounded-circle img-fluid"></i> 

                                                    <div class="upload">
            
                                                            <div class="round">
                                                                <input type="file" name="file"  id="customFile">
                                                                <i class = "fa fa-camera" style = "color: #fff;"></i>
                                                            </div>
                                                    </div>

                                                    <div class="mx-2 my-2 mt-2 pb-2 d-flex justify-content-center"><button type="submit" style="float:right;" name ="btn-upload" class="btn1 mt-3" >Update Picture</button> </div>
                                                    </form>
                                                <?php endwhile; ?>
                                                </div>


                                              
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <form action="" method="POST" class="row d-flex justify-content-center">
                                                <?php
                                                    $query = "SELECT * FROM patient_record WHERE Patient_ID = '$Patient_ID'";  
                                                    $result = mysqli_query($connect, $query);
                                                    while($row = mysqli_fetch_array($result)):?>    
                                                    <div class="row">
                                                                    
                                                        <div class="form-group col-md-6 pt-2">
                                                            <label for="inputFirstname" class="form-label"><h5>First Name</h5></label>
                                                            <input type="text" value="<?php echo $row['FirstName']; ?>"  class="form-control input-lg" id="inputFirstname" name="FirstName" >
                                                        </div>

                                                        <div class="form-group col-md-6  pt-2">
                                                            <label for="inputMiddlename" class="form-label"><h5>Middle Name</h5></label>
                                                            <input type="text" value="<?php echo $row['MiddleName'];?>"  class="form-control" id="inputMiddlename" name="MiddleName" >
                                                        </div>

                                                        <div class="form-group col-md-6  pt-2">
                                                            <label for="inputLastname" class="form-label"><h5>Lastname</h5></label>
                                                            <input type="text" value="<?php echo $row['LastName'];?>"   class="form-control" id="inputLastname" name="LastName" >
                                                        </div>
                                                            
                                                        <div class="form-group col-md-6 pt-2">
                                                            <label for="inputBday" class="form-label"><h5>Birthday</h5></label>
                                                            <input type="text" class="form-control " id ="dob" value="<?php echo $row['Birthdate'];?>" name="Birthdate" >
                                                        </div>

                                                        <div class="form-group col-md-6 pt-2">
                                                            <label for="inputBday" class="form-label"><h5>Age</h5></label>
                                                            <input type="number" class="form-control" id = "age" value="<?php echo $row['Age'];?>" name="Age" >
                                                        </div>

                                                        <div class="form-group col-md-6  pt-2">
                                                            <label for="inputBday" class="form-label"><h5>Gender</h5></label>
                                                            <select name="Gender" class="form-control">
                                                            <option value="<?php echo $row['Gender'];?>"selected><?php echo $row['Gender'];?></option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                        
                                                        
                                                        <div class="form-group col-md-6 pt-2">
                                                            <label for="inputContact" class="form-label"><h5>Contact Number</h5></label>
                                                            <input type="number" class="form-control" name="Contact_No" id="inputNumber" value="<?php echo $row['Contact_No'];?>" >
                                                        </div>

                                                        <div class="form-group col-md-6 pt-2">
                                                            <label for="inputCivilStatus" class="form-label"><h5>Civil Status</h5></label>
                                                            <select name="Civil_Status"  class="form-control">
                                                            <option value="<?php echo $row['Civil_Status'];?>"selected><?php echo $row['Civil_Status'];?></option>
                                                            <option value="Single">Single</option>
                                                            <option value="Married">Married</option>
                                                            <option value="Widowed">Widowed</option>
                                                            <option value="Separated">Separated</option>
                                                            <option value="Divorced">Divorced</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="form-group col-md-6  pt-2">
                                                            <label for="inputProvince" class="form-label"><h5>Current Province</h5></label>
                                                            <input type="text" name="Province" class="form-control" value="<?php echo $row['Province'];?>">
                                                        </div>
                                                    
                                                        <div class="form-group col-md-6 pt-2">
                                                            <label for="inputProvince" class="form-label"><h5>Current City</h5></label>
                                                            <input type="text" name="City" class="form-control"  value="<?php echo $row['City'];?>" >
                                                        </div>

                                                        <div class="form-group col-md-6  pt-2">
                                                            <label for="inputProvince" class="form-label"><h5>Set New Province</h5></label>
                                                            <select name="Province" id="province" class="form-control"></select>
                                                        </div>

                                                        <div class="form-group col-md-6  pt-2">
                                                            <label for="inputCity" class="form-label"><h5>Set New City</h5></label>
                                                            <select name="City" id="city" class="form-control"></select>
                                                        </div>
                                                    
                                            
                                                            
                                                        <div class="form-group col pt-4">
                                                            <button type="submit" name ="submit" class="btn1 mx-3 my-3 px-5" style="float:right;">Update Profile</button>
                                                        </div>

                                                       

                                                    </div>
                                                <?php endwhile; ?> 
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
        <script src="js/print.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js" integrity="sha512-d5Jr3NflEZmFDdFHZtxeJtBzk0eB+kkRXWFQqEc1EKmolXjHm2IKCA7kTvXBNjIYzjXfD5XzIjaaErpkZHCkBg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
