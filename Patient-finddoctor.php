
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
        
    </head>
    <body class="sb-nav-fixed" style="font-family: 'Poppins', sans-serif;">
        <div class="spinner" id="preloader"></div>
        <?php include('includes/Patient-nav2.php');?>
        <?php include('includes/Patient-Sidenav.php');?>

            <div id="layoutSidenav_content">
            <main class="main">
                    <div class="container-fluid">
                        <div class="row"> 
                            <div class="col-md-4">
                                <div class="card mt-3" id="shadow" style="border-radius: 30px;">
                                    <h4 class="card-header fw-bold d-flex justify-content-center">Find a Doctor</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3 mb-5" >
                            <div class="card-body">
                            
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                    
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $query = "SELECT * FROM doctor_record ORDER BY Doctor_ID DESC";  
                                    $result = mysqli_query($connect, $query); 
                                    while($row = mysqli_fetch_assoc($result)):?>
                                        <tr>  
                                            <td class="d-flex justify-content-center">
                                                <div class="col-lg-10 pt-2 pb-4" id="doctors-list">   
                                                    <div class="card" id="shadow" style="border-radius: 30px;">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <div class="card border border-3 mx-2 mt-2 mb-2"  style="border-radius: 30px;">
                                                                    <div class="card-img d-flex justify-content-center py-4 px-2 pt-2 pb-2">
                                                                        <img src="Doctor_uploads/<?php echo $row['Photo']; ?> " style="border-radius: 30px; width:500px; height:350px;" class="img-fluid"  alt="Doctor" 
                                                                        style="border-radius: 15px;">
                                                                    </div>

                                                                </div>
                                                            </div>   
                                                            <div class="col-lg-7">
                                                                <div class="card-body">
                                                                    <h3 class="mt-3 fw-bold"> Dr. <?php echo $row['FirstName']; ?> <?php echo $row['LastName']; ?></h3>
                                                                    <h5 class="  mb-2 pb-1" style="color: #2b2a2a;"><?php echo $row['Medical_Specialization']; ?></h5>
                                                                    <p class="mt-3"><?php echo $row['Province']; ?>, <?php echo $row['City']; ?></p>
                                                                    <div class="d-flex justify-content-start rounded-3 p-2 mb-2"
                                                                        style="background-color: #efefef;">
                                                                        <div>
                                                                            <p class=" text-muted mb-1">Total Patient's</p>
                                                                            <p class="mb-0">41</p>
                                                                        </div>
                                                                        <div class="px-3">
                                                                            <p class=" text-muted mb-1">Subcribers</p>
                                                                            <p class="mb-0">976</p>
                                                                        </div>
                                                                        <div>
                                                                            <p class=" text-muted mb-1">Rating</p>
                                                                            <p class="mb-0">8.5</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex pt-1">
                                                                    <a href="Patient-Consultation-Form.php?Doctor_ID=<?php echo $row['Doctor_ID'];?>" type="button" style="text-decoration: none; text-align:center;" class="btn1 flex-grow-1 me-1 mx-3 my-3 text-white">Book for Consultation</a>
                                                                    <button type="button" class="btn1 flex-grow-1 mx-3 my-3">Subscribe</button>
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                        </div>
                                                    </div>    
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
