<?php
include ('Patient-session.php');
include ('config.php');
$Patient_ID = $_SESSION['Patient_ID'];
$id = $_GET['id'];
$query = "SELECT * FROM consultation_record WHERE Patient_ID = '$Patient_ID'";  
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
        <title>Checkapp - comsultation edit Admin</title>
        <link rel="icon" href="img/logo.png">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body class="sb-nav-fixed" style="font-family: 'Poppins', sans-serif;">
    <?php
        include("Patient-session.php");
        include("config.php");


        if (isset($_POST['submit'])) { 
            $id = $_POST['Consultation_ID'];
            $FirstName = $_POST['FirstName'];
            $LastName = $_POST['LastName'];
            $Gender = $_POST['Gender'];
            $Age = $_POST['Age'];
            $Symptom = $_POST['Symptom'];
            $Other_Symptom = $_POST['Other_Symptom'];
            $AppointmentDate = $_POST['AppointmentDate'];
        
            
            $sql = "UPDATE consultation_record SET FirstName='$FirstName', LastName='$LastName', Gender='$Gender',Age='$Age', Symptom='$Symptom', Other_Symptom='$Other_Symptom', AppointmentDate='$AppointmentDate' 
            WHERE Consultation_ID = '$id'";

            $result = $connect->query($sql);
            ?>
            <script>
                swal({
                title: "Successfully Updated!",
                icon: "success"
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
                        <div class="row mt-3 mb-5">
                            <div class="col">
                                <div class="card mt-3 mb-5">
                                    <div class="card-header"><h4 class="mt-2 px-2 py-2 ">Edit Information</h4></div>
                                            <div class="card-body">

                                                <form  action="" method="POST">

                                                <?php
                                                $query = "SELECT * FROM consultation_record WHERE Consultation_ID = '$id'";  
                                                $result = mysqli_query($connect, $query);
                                                while($row = mysqli_fetch_array($result)):?>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" value="<?php echo $id = $_GET['id']; ?>" id="exampleFormControlInput1" placeholder="" name="Consultation_ID">
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1"><h5>First Name</h5></label>
                                                                <input type="text" class="form-control"  value="<?php echo $row['FirstName']; ?>" id="exampleFormControlInput1" placeholder="Enter First Name" name="FirstName" required="true">
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
                                                        <div class="col">
                                                            <div class="form-group ">
                                                                <label for="exampleFormControlInput1"><h5>Gender</h5></label>
                                                                <select name="Gender" class="form-control" required="true">
                                                                    <option value="<?php echo $row['Gender']; ?>" selected><?php echo $row['Gender']; ?></option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                    <label for="exampleFormControlInput1"><h5>Age</h5></label>
                                                                    <input type="text" class="form-control" value="<?php echo $row['Age']; ?>"  name="Age">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                    
                                                        <div class="col-lg-6">
                                                            <div class="form-group mt-4">
                                                            <label for="exampleFormControlInput1"><h5>Consultation Schedule</h5></label>
                                                            <input type="datetime-local" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['AppointmentDate']; ?>" placeholder="" name="AppointmentDate" required="true">
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <div class="form-group mt-4">
                                                            <label for="exampleFormControlTextarea1"><h5>Symptoms</h5></label>
                                                            <input type="text"class="form-control" id="exampleFormControlTextarea1"  value="<?php echo $row['Symptom']; ?>" name="Symptom" required="true">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <div class="form-group mt-4">
                                                            <label for="exampleFormControlTextarea1"><h5>Other Symptoms</h5></label>
                                                            <input type="text" class="form-control" id="exampleFormControlTextarea1"  value="<?php echo $row['Other_Symptom']; ?>" name="Other_Symptom" required="true">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group mt-4">
                                                        <div class="row">
                                                            <div class="col">
                                                                 <a href="Patient-Consultations.php"><button type="button" class="btn1 mt-1 mb-2">Back</button></a>
                                                                <button class="btn1"  style="float:right;" type="submit" name="submit">Update</button>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    
                                                <?php endwhile; ?>
                                                </form>
                                                
                                            </div>
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
