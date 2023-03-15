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
        <title>Checkapp - Talk to a Doctor</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body class="sb-nav-fixed" style="font-family: 'Poppins', sans-serif;">
    <?php


    if (isset($_POST['submit'])) {
        
        $Photo = $_POST['Photo'];
        $FirstName = $_POST['FirstName'];
        $LastName = $_POST['LastName'];
        $Gender = $_POST['Gender'];
        $Age = $_POST['Age'];
        $Symptom = $_POST['Symptom'];
        $S=implode(', ',$Symptom);
        $Other_Symptom=$_POST['Other_Symptom'];
        $AppointmentDate = $_POST['AppointmentDate'];
        $Patient_ID= $_SESSION['Patient_ID'];
        $Doctor_ID =$_POST['Doctor_ID'];
        $Doctor_Name =$_POST['Doctor_Name'];
        
        $sql = "INSERT INTO consultation_record ( Patient_ID, Doctor_ID, Doctor_Name, Patient_Photo, FirstName, LastName, Gender,Age, Symptom,Other_Symptom, AppointmentDate) 
        VALUES('$Patient_ID','$Doctor_ID', '$Doctor_Name', '$Photo', '$FirstName', '$LastName', '$Gender','$Age', '$S','$Other_Symptom', '$AppointmentDate')";
        $result = $connect->query($sql);
        ?>
        <script>
            swal({
            title: "Successfully Submitted!",
            icon: "success"
            }).then(function() {
            // Redirect the user
            window.location.href='Patient-Consultations.php';
            console.log('The Ok Button was clicked.');
                        });
        </script>

        <?php
    }     

        
    ?>
    
    <div class="spinner" id="preloader"></div>
    
        <?php include('includes/Patient-nav2.php');?>
        <?php include('includes/Patient-Sidenav.php');?>
            <div id="layoutSidenav_content">
                <main class="main">
                <div class="container-fluid">
               

                    <!-- CONSULTATION REQUEST FORM -->
                    <div class="row mt-3 mb-3">

                    <div class="col">
                        <div class="card" id="shadow" style="border-radius: 15px;">
                            <div class="card-header"><h4 class="mt-2 px-2 py-2 fw-bold">Consultation Form</h4></div>
                                    <div class="card mx-3 my-3 mt-3 mb-3" style="border-radius: 10px;">
                                        <div class="card-body">
                                            <form action="" method="POST">
                                                

                                                <div class="col">
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" value="<?php echo $Doctor_ID = $_GET['Doctor_ID']; ?>" id="exampleFormControlInput1" placeholder="" name="Doctor_ID">
                                                    </div>
                                                </div>

                                                <?php
                                                $query = "SELECT * FROM patient_record WHERE Patient_ID = '$Patient_ID'";  
                                                $result = mysqli_query($connect, $query); 
                                                while($row = mysqli_fetch_array($result)):?>  
                                                <input type="hidden" class="form-control" value="<?php echo $row['Photo'];?>" name="Photo">   
                                                <?php endwhile; ?> 
                                               
                                                <div class="col">
                                                <?php
                                                $Doctor_ID = $_GET['Doctor_ID'];
                                                $query = "SELECT * FROM doctor_record WHERE Doctor_ID = '$Doctor_ID'";  
                                                $result = mysqli_query($connect, $query);
                                                while($row = mysqli_fetch_assoc($result)):?>
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" value="<?php echo $row['FirstName']; ?> <?php echo $row['LastName']; ?> " id="exampleFormControlInput1" placeholder="" name="Doctor_Name">
                                                    </div>
                                                <?php endwhile; ?>
                                                </div>

                                            
                                                <?php
                                                $Patient_ID = $_SESSION['Patient_ID'];
                                                $query = "SELECT * FROM patient_record WHERE Patient_ID = '$Patient_ID'";  
                                                $result = mysqli_query($connect, $query);
                                                while($row = mysqli_fetch_assoc($result)):?>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1"><h5>First Name</h5></label>
                                                            <input type="text" class="form-control"  value="<?php echo $row['FirstName']; ?>" id="exampleFormControlInput1" placeholder="Enter First Name"  name="FirstName" required="true">
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1"><h5>Last Name</h5></label>
                                                            <input type="text" class="form-control" value="<?php echo $row['LastName']; ?>" id="exampleFormControlInput1" placeholder="Enter Last Name" name="LastName" required="true">
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <div class="row mt-3">
                                                    <div class="col-md-4">
                                                        <div class="form-group ">
                                                        <label class="label mx-2">Gender</label>  
                                                            <select name="Gender" class="form-control" required="true">
                                                                <option value="<?php echo $row['Gender']; ?>" selected><?php echo $row['Gender']; ?></option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                                <label class="label mx-2">Age</label>
                                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['Age']; ?>"  name="Age">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label class="label mx-2">Consultation Schedule</label>
                                                        <input type="datetime-local" class="form-control" id="exampleFormControlInput1" placeholder="" name="AppointmentDate" required="true">
                                                        </div>

                                                    </div>
                                                </div>
                                                <?php endwhile; ?> 

                                                <div class="form-group mt-4">
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            <label for="exampleFormControlTextarea1"><h5>Fever:</h5></label>
                                                            <br>
                                                            <input type="checkbox" name="Symptom[]" value= "Sweating" tabindex="1"/> Sweating<br/>
                                                            <input type="checkbox" name="Symptom[]" value= "Headache" tabindex="1"/> Headache<br/>
                                                            <input type="checkbox" name="Symptom[]" value= "Muscle aches" tabindex="1"/> Muscle aches<br/>
                                                            <input type="checkbox" name="Symptom[]" value= "Loss of appetite" tabindex="1"/> Loss of appetite<br/>
                                                        </div>

                                                        <div class="col-sm-2">
                                                            <label for="exampleFormControlTextarea1"><h5>Cough:</h5></label>
                                                            <br>
                                                            <input type="checkbox" name="Symptom[]" value= "Heartburn" tabindex="1"/> Heartburn<br/>
                                                            <input type="checkbox" name="Symptom[]" value= "Runny Nose" tabindex="1"/> Runny Nose<br/>
                                                            <input type="checkbox" name="Symptom[]" value= "Shortness of Breath" tabindex="1"/> Shortness of Breath<br/>
                                                            <input type="checkbox" name="Symptom[]" value= "Sore Throat" tabindex="1"/> Sore Throat<br/> 
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <label for="exampleFormControlTextarea1"><h5>Skin diseases:</h5></label>
                                                            <br>
                                                            <input type="checkbox" name="Symptom[]" value= "Discolored skin patches" tabindex="1"/> Discolored skin patches (abnormal pigmentation)<br/>
                                                            <input type="checkbox" name="Symptom[]" value= "Dry skin" tabindex="1"/> Dry skin<br/>
                                                            <input type="checkbox" name="Symptom[]" value= "Open sores, lesions or ulcers." tabindex="1"/> Open sores, lesions or ulcers.<br/>
                                                            <input type="checkbox" name="Symptom[]" value= "Peeling skin." tabindex="1"/> Peeling skin.<br/> 
                                                            <input type="checkbox" name="Symptom[]" value= "Rashes, possibly with itchiness or pain." tabindex="1"/> Rashes, possibly with itchiness or pain.<br/> 
                                                            <input type="checkbox" name="Symptom[]" value= "Red, white or pus-filled bumps." tabindex="1"/> Red, white or pus-filled bumps.<br/> 
                                                        </div>

                                                    </div> 
                                                    
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-5">
                                                    <div class="form-group mt-4">
                                                    <label for="exampleFormControlTextarea1"><h5>Other Symptoms</h5></label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Other_Symptom" required="true"></textarea>
                                                    </div>

                                                    </div>
                                                </div>
                                                


                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mt-4">
                                                        <a href="Patient-findadoctor.php" type="button" style="text-decoration: none; text-align:center;" class="btn1 text-white"> Back</a>  
                                                        <button class="btn1" style="float:right;" type="submit" name="submit"> Submit</button>
                                                        </div>

                                                    </div>
                                                </div>
                                        
                                            </form>
                                        </div>


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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
