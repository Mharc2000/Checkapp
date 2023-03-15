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
        <title>Checkapp - My Medication</title>
        <link rel="icon" href="img/logo.png">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui.css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.2/js/bootstrap.min.js" rel="stylesheet"/>
        <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cdn.apidelv.com/libs/awesome-functions/awesome-functions.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" ></script>
        <script src="js/city.js"></script>
        <script src="js/jquery-3.5.1.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script type="text/javascript">
            $(document).ready(function($) 
            { 

                $(document).on('click', '.btn_print', function(event) 
                {
                    event.preventDefault();

                    //credit : https://ekoopmans.github.io/html2pdf.js
                    
                    var element = document.getElementById('container_content'); 

                    //easy
                    //html2pdf().from(element).save();

                    //custom file name
                    html2pdf().set({filename: 'Checkapp-E-prescription'+js.AutoCode()+'.pdf'}).from(element).save();


                    //more custom settings
                    //var opt = 
                    //{
                    //margin:       1,
                    //filename:     'pageContent_'+js.AutoCode()+'.pdf',
                    //image:        { type: 'jpeg', quality: 0.98 },
                    //html2canvas:  { scale: 2 },
                    //jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
                    //};

                    // New Promise-based usage:
                    //html2pdf().set(opt).from(element).save();

                    
                });

        
        
            });
        </script>

    </head>
    <body class="sb-nav-fixed" style="font-family: 'Poppins', sans-serif;" >
    <div class="spinner" id="preloader"></div>
        <?php include('includes/Patient-nav2.php');?>
        <?php include('includes/Patient-Sidenav.php');?>
            <div id="layoutSidenav_content">
                <main class="main">
                    <div class="container-fluid" >
                        <div class="row"> 
                            <div class="col-lg-5">
                                <div class="card mt-3" id="shadow" style="border-radius: 30px;">
                                    <h4 class="card-header fw-bold d-flex justify-content-center">My Medication</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3 mb-4" id="shadow" style="border-radius: 15px;">
                            
                            <div class="card-body table-responsive">
                            
                                <table class="table table-hover" id="datatablesSimple" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>E-Prescription</th>
                                            <th>View</th>
                                            <th>Delete</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody >
                                    <?php
                                        $Patient_ID = $_SESSION['Patient_ID'];
                                        $query = "SELECT * FROM medication_record WHERE Patient_ID = '$Patient_ID' ORDER BY Med_ID DESC";  
                                        $result = mysqli_query($connect, $query);
                                        while($row = mysqli_fetch_assoc($result)):?> 

                                        <tr class="fw-bold">
                                            <td><h5 class="d-flex justify-content-center mt-2"><?php echo $row['Med_ID']; ?></h5></td>
                                            <td>
                                            
                                                <h5> E-prescription by: <img src="Doctor_uploads/<?php echo $row['Doctor_Photo']; ?> " alt="" class="rounded-circle py-2 px-2 " width="50" height="50"> Dr. <?php echo $row['Doctor_Name']?></h5>
                                                
                                                
                                            </td>
                                            <td><a href="Patient-Medication.php?id= <?php echo $row['Med_ID'];?> "><button class="btn btn-outline-success"><i class="fas fa-eye"></i> View Prescription</button></a></td>
                                            <td><a href="Patient-Medication-delete.php?id= <?php echo $row['Med_ID'];?> "><button class="btn btn-outline-danger"><i class="fas fa-trash"></i></button></a></td>

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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
