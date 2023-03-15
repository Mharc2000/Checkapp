<?php
include ('Patient-session.php');
include ('config.php');
$Patient_ID = $_SESSION['Patient_ID']; 
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
        <title> Checkapp - My Consultation</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet" />

        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed" style="font-family: 'Poppins', sans-serif;" >
    <div class="spinner" id="preloader"></div>
        <?php include('includes/Patient-nav2.php');?>
        <?php include('includes/Patient-Sidenav.php');?>
            <div id="layoutSidenav_content">
                <main class="main">

                    <div class="container-fluid">
                        <div class="row"> 
                            <div class="col-lg-5">
                                <div class="card mt-3" id="shadow" style="border-radius: 30px;">
                                    <h4 class="card-header fw-bold d-flex justify-content-center">My Consultation Appointment</h4>
                                </div>
                            </div>
                        </div>
 
                        <div class="card mt-3 mb-4" style="border-radius: 15px;"  id="shadow" >
                        
                            <div class="card-body table-responsive" >
                            
                                <table class="table  table-sm table-hover" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Consultation ID</th>
                                            <th>Doctor Name</th>
                                            <th>Patient Name</th>
                                            <th>Gender</th>
                                            <th>Age</th>
                                            <th>Symptons</th>
                                            <th>Other Symptoms</th>
                                            <th>Consultation Appointment</th>
                                            <th>Actions</th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                     $query = "SELECT * FROM consultation_record WHERE Patient_ID = '$Patient_ID' ORDER BY Consultation_ID DESC ";  
                                     $result = mysqli_query($connect, $query);
                                     while($row = mysqli_fetch_array($result)):?> 

                                        <tr>
                                        
                                            <td> <div class="d-flex justify-content-center mt-3 mb-3"><?php echo $row['Consultation_ID']; ?></div></td>
                                            <td><div class="d-flex justify-content-center mt-3 mb-3">Dr. <?php echo $row['Doctor_Name']; ?></div></td>
                                            <td> <div class="d-flex justify-content-center mt-3 mb-3"><?php echo $row['FirstName']; ?> <?php echo $row['LastName'];?></div></td>
                                            <td><div class="d-flex justify-content-center mt-3 mb-3"><?php echo $row['Gender']; ?></div></td>
                                            <td><div class="d-flex justify-content-center mt-3 mb-3"><?php echo $row['Age']; ?></div></td>
                                            <td><div class="d-flex justify-content-center mt-3 mb-3"><?php echo $row['Symptom']; ?></div></td>
                                            <td><div class="d-flex justify-content-center mt-3 mb-3"><?php echo $row['Other_Symptom']; ?></div></td>
                                            <td><div class="d-flex justify-content-center mt-3 mb-3">
            
                                                <?php
                                                    $date = $row['AppointmentDate']; 
                                                    $timestamp = strtotime($date);

                                                    // Use date() to format the timestamp according to the desired format
                                                    $formatted_date = date("m/d/y", $timestamp);
                                                    $formatted_time = date("h:i A", $timestamp);
                                                    $at = "at";
                                                    ?>
                                                    <p><?php echo $formatted_date;?> <?php echo $at;?> <?php echo $formatted_time;?></p>


                                                    <?php
                                                ?>
                                            </div></td>
                                            <td><div class="d-flex justify-content-center mt-3 mb-3"><a href="Patient-Consultation-Edit.php?id=<?php echo $row['Consultation_ID'];?>"><button class="btn btn-outline-primary"><i class="fas fa-edit"></button></a></div></td>
                                            <td><div class="d-flex justify-content-center mt-3 mb-3"><a href="Patient-Consultation-Delete.php?delete=<?php echo $row['Consultation_ID'];?>"><button class="btn btn-outline-danger"><i class="fas fa-trash"></button></a></div></td>
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
