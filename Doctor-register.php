

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doctor - Register</title>
    <link rel="icon" href="img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="css/login.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui.css" />
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/city.js"></script>	
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
    <script src="js/sweetalert.js"></script>
  </head>
  <body style="font-family: 'Poppins', sans-serif;">
  <?php

include("config.php");
      	
if (isset($_POST['submit'])) {

  $FirstName = mysqli_real_escape_string($connect, $_POST['FirstName']);
  $MiddleName = mysqli_real_escape_string($connect, $_POST['MiddleName']);
  $LastName = mysqli_real_escape_string($connect, $_POST['LastName']);
  $Medical_Specialization = mysqli_real_escape_string($connect, $_POST['Medical_Specialization']);
  $Birthdate = mysqli_real_escape_string($connect, $_POST['Birthdate']);
  $Age = mysqli_real_escape_string($connect, $_POST['Age']);
  $Gender = mysqli_real_escape_string($connect, $_POST['Gender']);
  $Contact_No = mysqli_real_escape_string($connect, $_POST['Contact_No']);
  $Province = mysqli_real_escape_string($connect, $_POST['Province']);
  $City = mysqli_real_escape_string($connect, $_POST['City']);
  $start_time = mysqli_real_escape_string($connect, $_POST['start_time']);
  $end_time = mysqli_real_escape_string($connect, $_POST['end_time']);
  $Email = mysqli_real_escape_string($connect, $_POST['Email']);
  $Password = mysqli_real_escape_string($connect, $_POST['Password']);
  $Password = md5($Password);

  $file = rand(1000,100000)."-".$_FILES['file']['name'];
	$file_loc = $_FILES['file']['tmp_name'];
	$folder="Doctor_uploads/";
	 
	 // new file size in KB
	 //$new_size = $file_size/1024;  
	 // new file size in KB
	 
	 // make file name in lower case
	$new_file_name = strtolower($file);
	 // make file name in lower case
	 
	$final_file=str_replace(' ','-',$new_file_name);
	 
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{

      $query = "INSERT INTO doctor_record (FirstName, MiddleName, LastName, Medical_Specialization, Birthdate, Age, Gender, Contact_No, Province, City, Start_Time, End_Time, Email, Password,Photo) VALUES('$FirstName','$MiddleName',
       '$LastName', ' $Medical_Specialization', '$Birthdate', '$Age', '$Gender', '$Contact_No', '$Province', '$City', '$start_time', '$end_time', '$Email', '$Password','$final_file')";
	
	$result = $connect->query($query);
  ?>
  <script>
    swal({
    title: "Registered Successfully!",
    icon: "success"
    }).then(function() {
    // Redirect the user
    window.location.href='Doctor-login.php';
    console.log('The Ok Button was clicked.');
    });
</script>
<?php
	}
	else{
		?>
      <script>
        alert('Error adding user');
        window.location.href='Doctor-register.php';
      </script>
      <?php
	}
}
?>    

  <nav class="navbar navbar-expand-lg py-3 sticky-top navbar-light bg-white">
      <div class="container">
          <a class="navbar-brand fw-bold" href="http://localhost/checkapp/">
              <img class="logo" width="60px" height="60px" src="img/logo.png" alt="">
              <span style="color:#1c9e05;">Check</span>App
          </a>
      </div>
    </nav><!-- //NAVBAR -->

    <!--REGISTRATION FORM -->
    <section class="Form mt-4">
        <div class="container">
            <div class="row g-0" style="border-radius: 30px;" id="shadow">
                <div class="col-lg-6">
                    <img src="img/cover2.png" class="img-fluid" alt="Cover" style="height:960px; border-radius: 30px;">
                </div>
                <div class="col-lg-6 px-5 pt-5" id="shadow">
                    <h4 class="fw-bold py-3"> <span style="color:green">DOCTOR'S</span> REGISTRATION PAGE</h4>
                    <h4>Create Profile</h4>
                    <form class="row " action="" method="POST" enctype="multipart/form-data">
                        
                        <div class="row mb-4">
                          <div class="form-group col-md-6 pt-3">
                              <label for="inputFirstname" class="label mx-2">First Name</label>
                              <input type="text" placeholder="Ex. John"  class="form-control p-2" id="inputFirstname" name="FirstName" required="true">
                          </div>

                          <div class="form-group col-md-6 pt-3">
                              <label for="inputMiddlename" class="label mx-2">Middle Name</label>
                              <input type="text" placeholder="Ex. Kennedy"  class="form-control p-2" id="inputMiddlename" name="MiddleName" required="true">
                          </div>

                          <div class="form-group col-md-6 pt-3">
                              <label for="inputLastname" class="label mx-2">Lastname</label>
                              <input type="text" placeholder="Ex. Doe"  class="form-control p-2"id="inputLastname" name="LastName" required="true">
                          </div>

                          <div class="form-group col-md-6 pt-3">
                            <label for="inputMedicalEx" class="label mx-2">Medical Specialization</label>
                              <select name="Medical_Specialization" required="true" class="form-control p-2">
                              <option value="" disabled selected>Select Medical Specialization</option>
                              <option value="Allergy and immunology">Allergy and immunology</option>
                              <option value="Allergy and immunology">Anesthesiology</option>
                              <option value="Dentistry">Dentistry</option>
                              <option value="Dermatology">Dermatology</option>
                              <option value="Diagnostic radiology">Diagnostic radiology</option>
                              <option value="Emergency Medicine">Emergency Medicine</option>
                              <option value="Family Medicine">Family Medicine</option>
                              <option value="Internal Medicine">Internal Medicine</option>
                              <option value="Medical genetics">Medical genetics</option>
                              <option value="Neurology">Neurology</option>
                              <option value="Nuclear medicine">Nuclear medicine</option>
                              <option value="General Medicine">General Medicine</option>
                              <option value="Obstetrics and gynecology">Obstetrics and gynecology</option>
                              <option value="Ophthalmology">Ophthalmology</option>
                              <option value="Pathology">Pathology</option>
                              <option value="Pediatrics">Pediatrics</option>
                              <option value="Physical medicine and rehabilitation">Physical medicine and rehabilitation</option>
                              <option value="Phychiatry">Phychiatry</option>
                              <option value="Preventive medicine">Preventive medicine</option>
                              <option value="Radiation oncology">Radiation oncology</option>
                              <option value="Surgery<">Surgeon</option>
                              <option value="Urology">Urology</option>
                              <option value="Cardiologist">Cardiologist</option>
                              <option value="Gastroenterologists">Gastroenterologists</option>
                              
                            </select>
                          </div>

                          <div class="form-group col-md-6 pt-3">
                              <label for="inputBday" class="label mx-2">Birthday</label>
                              <input type="text" class="form-control p-2" id ="dob" placeholder="Month/Day/Year" name="Birthdate" required="true">
                          </div>

                          <div class="form-group col-md-6 pt-3">
                            <label for="inputBday" class="label mx-2">Age</label>
                            <input type="number" class="form-control p-2" id = "age" placeholder="Your Age" name="Age" required="true">
                          </div>

                          <div class="form-group col-md-6 pt-3">
                            <label for="inputBday" class="label mx-2">Gender</label>
                            <select name="Gender" required="true" class="form-control">
                              <option value="" disabled selected>Select Gender</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </div>

                          <div class="form-group col-md-6 pt-3">
                            <label for="inputContact" class="label mx-2">Contact Number</label>
                            <input type="number" class="form-control p-2" placeholder="+63 909 1234 567" name="Contact_No" id="inputNumber" required="true">
                          </div>


                          <div class="form-group col-md-6 pt-3">
                            <label for="inputProvince" class="label mx-2">Province</label>
                            <select name="Province" id="province" required="true" class="form-control p-2"></select>
                          </div>

                          <div class="form-group col-md-6 pt-3">
                            <label for="inputCity" class="label mx-2">City</label>
                            <select name="City" id="city" required="true" class="form-control p-2"></select>
                          </div>



                          <div class="form-group col-md-6 pt-3">
                          <label for="schedule">Preferred Consultation time:</label>
                          <input type="time" id="start_time" class="form-control p-2" name="start_time" value="17:00"> to
                          <input type="time" id="end_time" class="form-control p-2" name="end_time" value="19:00">
                          </div>

                         

                          <div class="form-group col-md-6 pt-3">
                              <label class="label mx-2" for="customFile">Upload your photo here</label>
                              <input type="file" name="file"  required="true" class="form-control" id="customFile" /> 
                          </div>

                        </div>
                        
                       
                        <h4>Create Email & Password</h4>
                        <div class="row ">
                          <div class="form-group col">
                              <label for="inputEmail" class="label mx-2">Email</label>
                              <input type="email" placeholder= "Email"  name="Email" class="form-control p-2" id="inputEmail" required="true">
                          </div>
                        </div>
                         
                        <div class="row">

                          <div class="form-group col-md-6 pt-3">
                            <label for="inputPass" class="label mx-2">Password</label>
                            <input type="password" placeholder="*******"  class="form-control p-2" name="Password"  onChange="onChange()" required="true">
                          </div> 

                          <div class="form-group col-md-6 pt-3">
                            <label for="inputPass" class="label mx-2"> Confirm Password</label>
                            <input type="password" placeholder="*******"   class="form-control p-2" name="Confirm" onChange="onChange()" required="true">
                          </div> 

                        </div>
                        

                        
                        <div class="row mt-3">
                          <div class="form-group col">
                              <a href="Doctor-login.php"><button type="button" class="btn1 mt-1 mb-5">Back</button></a>
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
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.4/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>