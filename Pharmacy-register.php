
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pharmacy - Register</title>
    <link rel="icon" href="img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="css/login.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui.css" />
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/city.js"></script>	
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
    <script>
      function onChange() {
        const password = document.querySelector('input[name=Password]');
        const confirm = document.querySelector('input[name=Confirm]');
        if (confirm.value === password.value) {
          confirm.setCustomValidity('');
        } else {
          confirm.setCustomValidity('Passwords do not match');
        }
      }
    </script>
  </head>
  <body style="font-family: 'Poppins', sans-serif;">
  <div class="spinner" id="preloader"></div>
  <nav class="navbar navbar-expand-lg py-3 sticky-top navbar-light bg-white">
      <div class="container">
          <a class="navbar-brand fw-bold" href="http://localhost/checkapp/">
              <img class="logo" width="60px" height="60px" src="img/logo.png" alt="">
              <span style="color:#1c9e05;">Check</span>App
          </a>
      </div>
    </nav><!-- //NAVBAR -->
    <!--REGISTRATION FORM -->
    <section class="Form mt-4 my-2 mx-2">
        <div class="container">
            <div class="row" style="border-radius: 30px;" id="shadow">
                <div class="col-lg-6">
                    <img src="img/cover3.jpg" class="img-fluid" alt="" style="border-radius: 30px;">
                </div>
                  <div class="col-lg-6 px-5 pt-5" id="shadow">
                    <h4 class="font-weight-bold py-3"> <span style="color:green">PATIENT</span> REGISTRATION PAGE</h4>
                    <h4> Create Profile</h4>
                    <form action="" method="POST" enctype="multipart/form-data">
                        
                        <div class="row mb-4">
                          <div class="form-group col-md-6 pt-3">
                              <label class="label mx-2">Pharmacy Name</label>
                              <input type="text" placeholder="Input Pharmacy Name"  class="form-control p-2" id="inputPharmacyname" name="Pharmacy_Name" required="true">
                          </div>

                          <div class="form-group col-md-6 pt-3">
                              <label class="label mx-2">Contact Number</label>
                            <input type="text" placeholder="+63 909 1234 567" class="form-control p-2" name="Contact_No" id="inputNumber" required="true">
                          </div>

                    
                          <div class="form-group col-md-6 pt-3">
                            <label class="label mx-2">Province</label>
                            <select name="Province" id="province" required="true" class="form-control p-2"></select>
                          </div>

                          <div class="form-group col-md-6 pt-3">
                            <label class="label mx-2">City</label>
                            <select name="City" id="city" required="true" class="form-control p-2"></select>

                          </div>
                          <div class="form-group col-md-12 pt-3">
                                <label class="label mx-2">Address</label>
                                <input type="text" placeholder="Building Name/ Street Name/ Phase number/ Barangay Name" class="form-control p-2" name="Pharmacy_Address" id="" required="true">
                            </div>

                         
                          <div class="form-group col-md-6 pt-3">
                              <label class="form-label" for="customFile">Upload your Pharmacy photo here</label>
                              <input type="file" required="true" name="Photo" class="form-control " id="customFile" /> 
                          </div>

                       
                        </div>
                        
                       
                        <h4>Create Email & Password</h4>
                        <div class="row">
                          <div class="form-group col">
                              <label for="inputEmail" class="label mx-2">Email</label>
                              <input type="email" placeholder="Email Address"  name="Email" class="form-control p-2" id="inputEmail" required="true">
                          </div>
                        </div>

                        <div class="row pt-3">
                          <div class="form-group col-md-6 pt-1">
                              <label for="inputPass" class="label mx-2">Password</label>
                              <input type="password" placeholder="Password"  class="form-control p-2" name="Password"  onChange="onChange()" required="true">
                            </div> 

                            <div class="form-group col-md-6 pt-1">
                              <label for="inputPass" class="label mx-2"> Confirm Password</label>
                              <input type="password" placeholder="Confirm Password"   class="form-control p-2" name="Confirm" onChange="onChange()" required="true">
                            </div> 

                        </div>
                        
                        <div class="row pt-3">
                          <div class="form-group col">
                              <a href="Pharmacy-login.php"><button type="button" class="btn1 mt-1 mb-5">Back to login</button></a>
                              <button type="submit" name ="submit" class="btn1 mt-1 mb-5" style="float:right;">Register</button>
                          </div>
                        </div>
        
                    </form>
                </div>
            </div>
        </div>
    </section><!--REGISTRATION FORM -->
    <br><br><br><br><br><br><br><br>
     <!-- FOOTER -->
     <!-- Footer -->
     <footer class="text-center text-lg-start bg-white text-dark">
       
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
          © 2022 Copyright:
          <a class="text-reset fw-bold" href="#"><span style="color:green">CHECKAPP.COM</span></a>
        </div>
        <!-- Copyright -->
        <!-- Copyright -->
      </footer>

        <!-- FOOTER -->
        <?php

      include("config.php");   	

      if (isset($_POST['submit'])) {
        
        $Pharmacy_Name = mysqli_real_escape_string($connect, $_POST['Pharmacy_Name']);
        $Contact_No = mysqli_real_escape_string($connect, $_POST['Contact_No']);
        $Province = mysqli_real_escape_string($connect, $_POST['Province']);
        $City = mysqli_real_escape_string($connect, $_POST['City']);
        $Pharmacy_Address = mysqli_real_escape_string($connect, $_POST['Pharmacy_Address']);
        $Email = mysqli_real_escape_string($connect, $_POST['Email']);
        $Password = mysqli_real_escape_string($connect, $_POST['Password']);
      
        $Password = md5($Password);
          

        $Photo = rand(1000,100000)."-".$_FILES['Photo']['name'];
        $file_loc = $_FILES['Photo']['tmp_name'];
        $folder="Pharmacy-upload/";
        
        // new file size in KB
        //$new_size = $file_size/1024;  
        // new file size in KB
        
        // make file name in lower case
        $new_file_name = strtolower($Photo);
        // make file name in lower case
        
        $final_file=str_replace(' ','-',$new_file_name);
        
        if(move_uploaded_file($file_loc,$folder.$final_file))
        {

            $query = "INSERT INTO pharmacy_record (Pharmacy_Name, Contact_No, Province, City, Pharmacy_Address, Email, Password, Photo) 
            VALUES('$Pharmacy_Name', '$Contact_No', '$Province', '$City', '$Pharmacy_Address','$Email', '$Password', '$final_file')";
        
        $result = $connect->query($query);
        ?>
               <script>
                swal('Registered Successfully', "success");
                window.location.href='Pharmacy-login.php';
                </script>
          <?php
        }
        else{
          ?>
          <script>
          alert('Error adding user');
                window.location.href='Pharmacy-login.php';
                </script>
          <?php
        
      } 
      } 
      mysqli_close($connect);
      ?>
    <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function(){
            loader.style.display="none";
        })

    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.4/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>