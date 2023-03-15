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
        <link href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="js/sweetalert.js"></script>
    </head>
    <body class="sb-nav-fixed" style="font-family: 'Poppins', sans-serif;">
    <?php  
    include("Doctor-session.php");  
    include ('config.php');
    $Doctor_ID = $_SESSION['Doctor_ID'];


    if (isset($_POST['submit'])) { 
        $Patient_ID = $_POST['Patient_ID'];
        $Doctor_ID = $_POST['Doctor_ID'];
        $Doctor_photo = $_POST['Photo'];
        $Doctor_Name = $_POST['Doctor_Name'];
        $Recipient_Name = $_POST['Recipient_Name'];
        $MeetCode = $_POST['MeetCode'];
        $Messages = $_POST['Messages'];
        $Invitation_Status = "0";
    
        $query = mysqli_query ($connect,"INSERT INTO invitation_record (Patient_ID, Doctor_ID, Doctor_photo,Doctor_Name, Recipient_Name, MeetCode, Messages, Invitation_Status)
        VALUES('$Patient_ID','$Doctor_ID','$Doctor_photo','$Doctor_Name','$Recipient_Name', '$MeetCode', '$Messages', '$Invitation_Status')");
        if ($query) {

            ?>
            <script>
                swal({
                title: "Sent Successfully.",
                icon: "success"
                }).then((success)=>{
                    if(success){
                        window.location.href='Doctor-MyInvitations.php';
                    }
                });
            </script>
            <?php

        }

    }     

 
    
    ?>  
        <div id="layoutSidenav">
        <?php include('includes/Doctor-nav.php');?>
        <?php include('includes/Doctor-sidenav.php');?>  
            <div id="layoutSidenav_content">
                <main class="main">
                    
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center mt-5 mb-5">
                        <div class="col-md-6">
                            <div class="card mt-3 mb-5" id="shadow" style="border-radius: 30px;">
                                    <div class="card-header">
                                        <h4 class="mt-2 px-2 py-2 fw-bold">Google Meet Invitation</h4>
                                    </div>
                                    <div class="card-body">
                                            <div class="row">
                                            
                                                <div class="col">
                                                    <form action="" method="POST" class="row" id="invite_form">
                                                    <?php

                                                        $Doctor_ID = $_SESSION['Doctor_ID'];
                                                        $query = "SELECT * FROM doctor_record WHERE Doctor_ID= '$Doctor_ID'";  
                                                        $result = mysqli_query($connect, $query); 
                                                        while($row = mysqli_fetch_assoc($result)):?>  
                                                        <input type="hidden" class="form-control" value="<?php echo $row['Photo']; ?>" name="Photo">   
                                                        
                                                    <?php endwhile; ?> 

                                                    <?php

                                                        $Consultation_ID = $_GET['id'];
                                                        $query = "SELECT * FROM Consultation_record WHERE Consultation_ID = '$Consultation_ID'";  
                                                        $result = mysqli_query($connect, $query); 
                                                        while($row = mysqli_fetch_assoc($result)):?>

                                                         <input type="hidden" class="form-control" value="<?php echo $row['Patient_ID']; ?>" name="Patient_ID">   
                                                         <input type="hidden" class="form-control" value="<?php echo $row['Doctor_ID']; ?>" name="Doctor_ID">
                                                         <input type="hidden" class="form-control" id="doctor" value="<?php echo $row['Doctor_Name']; ?>" name="Doctor_Name">    

                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Patient Name:</label>
                                                            <input type="text" class="form-control" value="<?php echo $row['FirstName']; ?> <?php echo $row['LastName']; ?>" name="Recipient_Name" id="recipient-name">
                                                        </div>
                                                        <div class="form-group pt-2">
                                                            <label for="exampleFormControlTextarea1" class="col-form-label2">Create Invitation Link: </label>
                                                            <a href="https://meet.google.com/new?hs=180&amp;authuser=0" target="_blank"> Create Google Meet link here !</a>
                                                            <input class="form-control" id="exampleFormControlTextarea1" name="MeetCode" id="subject" placeholder="Enter Google Meet link" required="true"></input>
                                                        </div>                           

                                                        <div class="form-group">
                                                            <label for="message-text" class="col-form-label">Message:</label>
                                                            <textarea class="form-control"  placeholder="Write a message for the patient." name="Messages" id="message"></textarea>
   
                                                         </div>


                                                        <div class="form-group pt-2 mt-3">
                                                            <a href="Doctor-patients.php"><button type="button"  class="btn1">Back</button></a>
                                                            <button type="submit" name="submit" style="float:right;" class="btn1">Send Invitation</button>
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
            $(document).ready( function () {
                $('#myTable').DataTable();
            } );
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
