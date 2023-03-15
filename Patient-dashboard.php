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
        <title>Checkapp - Dashboard</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="js/sweetalert.js"></script>
    </head>
    <body class="sb-nav-fixed" style="font-family: 'Poppins', sans-serif;">
    <div class="spinner" id="preloader"></div>
    
        <?php include('includes/Patient-nav2.php');?>
        <?php include('includes/Patient-Sidenav.php');?>

            <div id="layoutSidenav_content">
                <main class="main">
                    <div class="container pb-5">
                          
                           
                        <!-- PATIENT CARDS -->
                            <div class="row">
                                <div class="col-sm-6 mt-3 ">
                                <div class="card" id="shadow" style="border-radius: 30px;">
                                        <img class="card-img img-fluid"  src="img/healthcare.png" alt="Talk to a Doctor">
                                        <div class="card-body">
                                            <h5 class="card-title">Welcome to Checkapp</h5>
                                            <p class="card-text">Talk with a Doctor now!</p>
                                            <a href="Patient-findadoctor.php"><button class="btn1">Find a Doctor</button></a>
                                        </div>
                                    </div>  
                                </div>
                                <div class="col-sm-6 mt-3">
                                <div class="card" id="shadow" style="border-radius: 30px;">
                                    <img class="card-img img-fluid" src="img/Consultation.jpg" alt="Consultations" style="border-radius:30px;">
                                        <div class="card-body"><br>
                                            <h5 class="card-title">Click here to see your appointments.</h5>
                                            <p class="card-text">See your pending consultation.</p>
                                            <a href="Patient-Consultations.php"> <button class="btn1" >My Appointment</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-6 mt-3">
                                    <div class="card" id="shadow" style="border-radius: 30px;">
                                        <img class="card-img img-fluid" src="img/cover3.jpg"  alt="Pharmacy" style="border-radius:30px;">
                                        <div class="card-body">
                                                
                                            <h5 class="card-title">Buy from the nearest pharmacies.</h5>
                                            <p class="card-text">Find your prescribed medicine here.</p>
                                            <a href="Patient-Pharmacy.php"> <button class="btn1" >Buy Medicine</button></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="card" id="shadow" style="border-radius: 30px;">
                                        <img class="card-img img-fluid" src="img/meet.jpg"  alt="Pharmacy" style=" width:600px; height:600px;  border-radius:30px;">
                                        <div class="card-body">
                                                
                                            <h5 class="card-title">Video Conference with your Doctor.</h5>
                                            <p class="card-text">Join a video conference here.</p>
                                            <a href="Patient-MyInvitation.php"> <button class="btn1" >Meet with your Doctor</button></a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-2">
                                <div class="col-md-6 mt-3">
                                    <div class="card" id="shadow" style="border-radius: 30px;">
                                        <img class="card-img img-fluid" src="img/med.png"  alt="Pharmacy" style="border-radius:30px;">
                                        <div class="card-body">
                                                
                                            <h5 class="card-title">Your Medication.</h5>
                                            <p class="card-text">See your prescribed medicine here.</p>
                                            <a href="Patient-Medication-table.php"> <button class="btn1" >Prescriptions</button></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="card" id="shadow" style="border-radius: 30px;">
                                        <img class="card-img img-fluid" src="img/online-purchase.png"  alt="Pharmacy" style="width:600px; height:600px; border-radius:30px;">
                                        <div class="card-body">
                                                
                                            <h5 class="card-title">Purchased Medicine.</h5>
                                            <p class="card-text">See your purchased medicine here.</p>
                                            <a href="Patient-Orders.php"> <button class="btn1" >My Purchased Medications</button></a>
                                        </div>
                                    </div>
                                </div>

                              

                            </div>
                            <!-- PATIENT CARDS -->
                    </div> 
                </main>
                
                 <!-- FOOTER -->
                <?php include('includes/App-footer.php');?>
            </div>
        </div>
       
        
        <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function(){
            loader.style.display="none";
        })
        </script>
         <script>
        const clockElement = document.getElementById("clock");

        function updateClock() {
        const now = new Date();
        const hours = now.getHours();
        const minutes = now.getMinutes();
        const seconds = now.getSeconds();
        const date = now.toDateString();
        clockElement.innerHTML = `${hours}:${minutes}:${seconds} ${date}`;
        }

        setInterval(updateClock, 1000);
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
