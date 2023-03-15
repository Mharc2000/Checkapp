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
        <title> Checkapp - Meet Invitation</title>
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
                                    <h4 class="card-header fw-bold d-flex justify-content-center">Meet Invitation</h4>
                                </div>
                            </div>
                        </div>
 
                        <div class="card mt-3 mb-4" id="shadow" style="border-radius: 15px;">
                            
                            <div class="card-body table-responsive">
                            
                                <table class="table table-hover" id="datatablesSimple" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Doctor Name</th>
                                            <th>Message</th>
                                            <th>Meet Link</th>
                                            <th>Join</th>
                                            <th>Delele</th>

                                        </tr>
                                    </thead>
                                    <tbody >
                                    <?php
                                     $query = "SELECT * FROM invitation_record WHERE Patient_ID = '$Patient_ID' ORDER BY Invitation_ID DESC";  
                                     $result = mysqli_query($connect, $query);
                                     while($row = mysqli_fetch_assoc($result)):?> 

                                        <tr>
                                            <td><div class="d-flex justify-content-center mt-3 mb-3"><?php echo $row['Invitation_ID']; ?>  </div></td>
                                            <td><img src="Doctor_uploads/<?php echo $row['Doctor_photo'];?>" alt="" class="rounded-circle py-2 px-2 " width="50" height="50"> Dr. <?php echo $row['Doctor_Name'];?></td>
                                            <td><div class="d-flex justify-content-center mt-3  mb-3"><?php echo $row['Messages']; ?></div></td>
                                            <td><div class="d-flex justify-content-center mt-3 mb-3"><?php echo $row['MeetCode']; ?></div></td>
                                            <td><div class="d-flex justify-content-center mt-3 mb-3"><a href="<?php echo $row['MeetCode']; ?>" target="_blank" ><button class="btn btn-sm btn-success"> <i class="fa-solid fa-video"></i> Join meet</button></div></td>
                                            <td><div class="d-flex justify-content-center mt-3 mb-3"><a href="Patient-invitation-delete.php?delete=<?php echo $row['Invitation_ID'];?>"><button class="btn btn-sm btn-danger"> <i class="fa-solid fa-trash"></i> Delete</button></div></td>
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
