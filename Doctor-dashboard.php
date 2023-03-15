<?php  
include("Doctor-session.php");  
include ('config.php');
$Doctor_ID = $_SESSION['Doctor_ID'];


    $query = "SELECT COUNT(*) AS count FROM consultation_record WHERE Doctor_ID = '$Doctor_ID '";  
    $query_result = mysqli_query($connect, $query);  
    while($row = mysqli_fetch_assoc($query_result)){
        $output = $row['count'];    

    }

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
        <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="js/sweetalert.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed" style="font-family: 'Poppins', sans-serif;">
        <div id="layoutSidenav"> 
        <?php include('includes/Doctor-nav.php');?>
        <?php include('includes/Doctor-sidenav.php');?> 
            <div id="layoutSidenav_content">
                <main class="main">
                    <div class="container-fluid">
                        <div class="row">
                        
                            <div class="col-md-4"  >
                                <div class="card pt-3 pb-3 mt-3" id="shadow" style="border-radius: 30px;" >
                                    <div class="row">
                                 
                                        <div class="col-sm-4">
                                            <div class="card-img d-flex justify-content-center">
                                                <img src="img/cover.png" alt="" class="rounded-circle py-2 px-2 img-fluid" width="150" height="150">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="card-body mt-3">
                                                <h4 class="d-flex justify-content-center">  Total Patient's </h4>
                                                <h4 class="d-flex justify-content-center"> <?php echo $output ?> </h4>
                                            </div>
                                        </div>
                                
                                    </div>
                                </div>  
                            </div>

                            <div class="col-md-4">
                                <div class="card pt-3 pb-3 mt-3"  id="shadow" style="border-radius: 30px;" >
                                    <div class="row">
                                 
                                        <div class="col-sm-4">
                                            <div class="card-img d-flex justify-content-center">
                                                <img src="img/subscriber.png" alt="" class="rounded-circle py-2 px-2 img-fluid" width="150" height="150">
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="card-body mt-3">
                                                <h4 class="d-flex justify-content-center">Total Patient Subscribes </h4>
                                                <h4 class="d-flex justify-content-center"> <?php echo $output ?> </h4>
                                            </div>
                                        </div>
                                
                                    </div>
                                </div>  
                            </div>

                            <div class="col-md-4">
                                <div class="card pt-3 pb-3 mt-3" id="shadow" style="border-radius: 30px;" >
                                    <div class="row">
                                 
                                        <div class="col-sm-4">
                                            <div class="card-img d-flex justify-content-center">
                                                <img src="img/review.png" alt="" class="rounded-circle py-2 px-2 img-fluid " width="150" height="150">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="card-body mt-3">
                                                <h4 class="d-flex justify-content-center"> Ratings </h4>
                                                <h4 class="d-flex justify-content-center">8.5 </h4>
                                            </div>
                                        </div>
                                
                                    </div>
                                </div>  
                            </div>

                        </div>
                        
                        <div class="card mt-3 mb-4" style="border-radius: 15px;">
                            <div class="card-header"><h4 class="mt-2 px-2 py-2 ">Recent Patients</div>
                                <div class="card-body table-responsive" >
                                
                                <table class="table table-hover" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Patient's Name</th>
                                            <th>Gender</th>
                                            <th>Age</th>
                                            <th>Symptoms</th>
                                            <th>Other Symptoms</th>
                                            <th>Appointment Date </th> 
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $Doctor_ID = $_SESSION['Doctor_ID'];
                                            $query = "SELECT * FROM consultation_record WHERE Doctor_ID = '$Doctor_ID' ORDER BY Consultation_ID DESC";  
                                            $result = mysqli_query($connect, $query); 
                                            while($row = mysqli_fetch_assoc($result)):?>
                                            <tr class="fw-bold">
                                                <td><div class="d-flex justify-content-center mt-3">  <?php echo $row['Consultation_ID']; ?> </div></td>
                                                <td id="name"> <img src="Patient_uploads/<?php echo $row['Patient_Photo'];?>" alt="" class="rounded-circle py-2 px-2 " width="50" height="50"> <?php echo $row['FirstName']; ?> <?php echo $row['LastName'];?></td>
                                                <td><div class="d-flex justify-content-center mt-3">  <?php echo $row['Gender']; ?> </div></td>
                                                <td><div class="d-flex justify-content-center mt-3">  <?php echo $row['Age']; ?> </div></td>
                                                <td><div class="d-flex justify-content-center mt-3"> <?php echo $row['Symptom']; ?></div></td>
                                                <td><div class="d-flex justify-content-center mt-3">  <?php echo $row['Other_Symptom']; ?></div></td>
                                                <td>
                                                <div class="d-flex justify-content-center mt-3">   
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
                                                 </div> 
                                                </td>
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
