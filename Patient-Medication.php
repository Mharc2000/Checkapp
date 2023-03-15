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
        <title>Checkapp - My Medication</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui.css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.2/js/bootstrap.min.js" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cdn.apidelv.com/libs/awesome-functions/awesome-functions.min.js"></script> 

        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" ></script>
        <script src="js/city.js"></script>
        <script src="js/jquery-3.5.1.js"></script>
        <script src="js/jquery-ui.js"></script>
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
                   // var opt = 
                    //{
                   // margin:       1,
                   // filename:     'Checkapp-E-prescription'+js.AutoCode()+'.pdf',
                   // image:        { type: 'jpeg', quality: 0.98 },
                   // html2canvas:  { scale: 2 },
                   // jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
                   // };

                  // New Promise-based usage:
                   // html2pdf().set(opt).from(element).save();

                    
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
                        <div class="d-flex justify-content-center"> 
                            <div class="col-lg-5">
                                <div class="card mt-3 " id="shadow" style="border-radius: 30px;">
                                    <h4 class="card-header fw-bold d-flex justify-content-center">My Medication</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-6">
                                    <div class="card mt-3 mb-5" id="shadow" style="border-radius: 30px;">
                                
                                        <div class="card-body" id="container_content">
                                            <div class="card border border-4" style="border-radius: 30px;">
                                            <?php
                                                    $Med_ID = $_GET['id'];
                                                    $query = "SELECT * FROM medication_record WHERE Med_ID = '$Med_ID'";  
                                                    $result = mysqli_query($connect, $query);
                                                    while($row = mysqli_fetch_array($result)):?>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="col pt-3 my-4 mx-5"> 
                                                                <h4 class="fw-bold" ><img src="img/logo.png" width="70px" height="70px" alt=""> E-Prescription </h4>
                                                            </div>
                                                            <div class="col-md-5 my-4 mx-5 pt-1"> 
                                                                <h5 class="col-form-label fw-bold" >Prescription ID: <?php echo $row['Med_ID'] ?> </h5>
                                                            </div>
                                                            
                                                            <div class="col my-4 mx-5 pt-1"> 
                                                            <h5 class="col-form-label fw-bold" >Patient Name: </h5>
                                                                <div class="d-flex justify-content-start rounded-3 p-2 mb-2"style="background-color: #efefef;">
                                                                    <h5><img src="Patient_uploads/<?php echo $row['Patient_Photo']; ?> " alt="" class="rounded-circle py-2 px-2 " width="80" height="80"><img src="" alt=""> <?php  echo $row['Patient_Name'] ?></h5>
                                                                </div>   
                                                            </div>

                                                            <div class="col my-4 mx-5 pt-1"> 
                                                                
                                                                    <h5 class="col-form-label fw-bold" >My Symtoms: </h5>
                                                                    <div class="d-flex justify-content-start rounded-3 p-2 mb-2"style="background-color: #efefef;">
                                                                        <p> <?php  echo $row['Symptoms'] ?></p>
                                                                    </div>
                                                            </div>

                                                            <div class="col my-4 mx-5 pt-1"> 
                                                            <h5 class="col-form-label fw-bold" >Diagnosis: </h5>
                                                                <div class="d-flex justify-content-start rounded-3 p-2 mb-2"style="background-color: #efefef;">
                                                                    <p><?php  echo $row['Diagnosis'] ?></p>
                                                                </div>
                                                            </div>

                                                            <div class="col my-4 mx-5 pt-1"> 
                                                            <h5 class="col-form-label fw-bold" >Prescription: </h5>
                                                                <div class="d-flex justify-content-start rounded-3 p-2 mb-2"style="background-color: #efefef;">
                                                                    <p><?php  echo $row['Prescription'] ?></p>
                                                                </div>
                                                            </div>

                                                            <div class="col my-4 mx-5 pt-1"> 
                                                            <h5 class="col-form-label fw-bold" >Treatment Note: </h5>
                                                                <div class="d-flex justify-content-start rounded-3 p-2 mb-2"style="background-color: #efefef;">
                                                                    <p><?php  echo $row['Treatment'] ?></p>
                                                                </div>
                                                            </div>

                                                            <div class="col my-4 mx-5 pt-1"> 
                                                                <h5 class="col-form-label fw-bold" >Prescribed by: </h5>
                                                                    <div class="mx-5">
                                                                        <img src="<?php echo $row['Doctor_Signiture'];?> " alt="" class="rounded mx-5" width="200" height="100">
                                                                    </div>
                                                                <h5><img src="Doctor_uploads/<?php echo $row['Doctor_Photo']; ?> " alt="" class="rounded-circle" width="50" height="50"> Dr. <?php  echo $row['Doctor_Name'] ?></h5>
                                                            </div>
                                                            

                                                            

                                                        </div>
                                                          

                                                    </div>

                                            <?php endwhile;?>  
                                            </div>           
                                        </div>

                                                            <div class="form-group col pt-4 mx-3 my-3 px-5">
                                                                <a href="Patient-Medication-table.php"><button type="button"  class="btn1">Back</button></a>
                                                                <button type="button" id="rep" style="float:right;" class="btn1 btn_print"><i class="fa fa-download text-white" aria-hidden="true"></i>
                                                                 Download</button>

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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
