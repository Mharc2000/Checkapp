<?php  
include("Doctor-session.php");  
include ('config.php');
$Doctor_ID = $_SESSION['Doctor_ID'];
$query = "SELECT COUNT(*) AS count FROM consultation_record WHERE Doctor_ID = '$Doctor_ID'";  
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
        <title>Checkapp - Dashboard</title>
        <link rel="icon" href="img/logo.png">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
        <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/jquery.signature.min.js"></script>
        <link rel="stylesheet" type="text/css" href="js/jquery.signature.css">
        <script src="js/sweetalert.js"></script>
        <script>
        function copyValue() {
        var input1 = document.getElementById("input1");
        var input2 = document.getElementById("input2");
        if (input2.value.length > 0) {
            input2.value += ", ";
        }
        input2.value += input1.value;
        }
        </script>
        <style>
        .kbw-signature { width: 600px; height: 300px;}
        #sig canvas{
            width: 100% !important;
            height: auto;
        }
        </style>
    </head>
    <body class="sb-nav-fixed" style="font-family: 'Poppins', sans-serif;">
    <?php

            
    if (isset($_POST['submit'])) {

        $Doctor_ID = mysqli_real_escape_string($connect, $_POST['Doctor_ID']);
        $Doctor_Photo = mysqli_real_escape_string($connect, $_POST['Doctor_Photo']);
        $Doctor_Name = mysqli_real_escape_string($connect, $_POST['Doctor_Name']);
        $Patient_ID = mysqli_real_escape_string($connect, $_POST['Patient_ID']);
        $Patient_Photo = mysqli_real_escape_string($connect, $_POST['Patient_Photo']);
        $Patient_Name = mysqli_real_escape_string($connect, $_POST['Patient_Name']);

        $Symptoms = mysqli_real_escape_string($connect, $_POST['Symptoms']);
        $Diagnosis = mysqli_real_escape_string($connect, $_POST['Diagnosis']);
        $Prescription = mysqli_real_escape_string($connect, $_POST['Prescription']);
        $Treatment = mysqli_real_escape_string($connect, $_POST['Treatment']);

        $folderPath = "Doctor_uploads/";
        $image_parts = explode(";base64,", $_POST['Signiture']); 
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . uniqid() . '.'.$image_type;
        file_put_contents($file, $image_base64);
        
        $sql = "INSERT INTO medication_record (Doctor_ID, Doctor_Photo, Doctor_Name, Patient_ID, Patient_Photo, Patient_Name, Symptoms, Diagnosis, Prescription, Treatment, Doctor_Signiture ) VALUES
        ('$Doctor_ID','$Doctor_Photo','$Doctor_Name','$Patient_ID','$Patient_Photo', '$Patient_Name', '$Symptoms', '$Diagnosis', '$Prescription', '$Treatment', '$file')";
        $result = $connect->query($sql);
        ?>
        <script>
            swal({
            title: "Prescription Sent Success!",
            icon: "success"
            }).then((success)=>{
                if(success){
                    window.location.href='Doctor-patients.php';
                }
            });
            
        </script>

        <?php
    }





    ?>
        <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 fw-bold" href="#">
                <img class="round-circle" width="50px" height="50px" src="img/logo.png" alt="">
                <span style="color:#1c9e05;">Check</span>App
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
               
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav  ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php
                        $query = "SELECT * FROM doctor_record WHERE Doctor_ID = '$Doctor_ID'";  
                        $result = mysqli_query($connect, $query);  
                        while($row = mysqli_fetch_array($result)):?>
                        <img src="Doctor_uploads/<?php echo $row['Photo']; ?> " alt="" class="rounded-circle" width="30" height="30"> 
                    <?php endwhile; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <?php
                        $query = "SELECT * FROM doctor_record WHERE Doctor_ID = '$Doctor_ID'";  
                        $result = mysqli_query($connect, $query);  
                        while($row = mysqli_fetch_array($result)):?>
                        <li><a class="dropdown-item" href=""><img src="Doctor_uploads/<?php echo $row['Photo']; ?> " alt="" class="rounded-circle py-2 px-2 " width="50" height="50"><?php echo $row['FirstName']; ?> <?php echo $row['LastName']; ?></a></li>
                        <?php endwhile; ?>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="Doctor-logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">

            <?php include('includes/Doctor-sidenav.php');?> 
           
            <div id="layoutSidenav_content">
                <main class="main">
                    
                <div class="container-fluid">
                    
                        <div class="col">
                            <div class="card mb-5" id="shadow" style="border-radius: 30px;">
                                    <div class="card-header">
                                        <h4 class="mt-2 px-2 py-2 fw-bold">Patient's Medication</h4>
                                    </div>
                                    
                                    <div class="card-body">
                                    
                                            <div class="row d-flex justify-content-center">
                                            
                                                <div class="col">
                                                    <form action="" method="POST" class="row" id="invite_form">

                                                    <?php
                                                        $Doctor_ID = $_SESSION['Doctor_ID'];
                                                        $query = "SELECT * FROM doctor_record WHERE Doctor_ID= '$Doctor_ID'";  
                                                        $result = mysqli_query($connect, $query); 
                                                        while($row = mysqli_fetch_array($result)):?>  
                                                        <input type="hidden" class="form-control" value="<?php echo $row['Photo']; ?>" name="Doctor_Photo">   
                                                    <?php endwhile; ?> 

                                                    <?php

                                                        $Consultation_ID = $_GET['id'];
                                                        $query = "SELECT * FROM Consultation_record WHERE Consultation_ID = '$Consultation_ID'";  
                                                        $result = mysqli_query($connect, $query); 
                                                        while($row = mysqli_fetch_array($result)):?>

                                                         <input type="hidden" class="form-control" value="<?php echo $row['Patient_ID']; ?>" name="Patient_ID">   
                                                         <input type="hidden" class="form-control" value="<?php echo $row['Doctor_ID']; ?>" name="Doctor_ID">
                                                         <input type="hidden" class="form-control" id="doctor" value="<?php echo $row['Doctor_Name']; ?>" name="Doctor_Name">    
                                                         <input type="hidden" class="form-control" id="doctor" value="<?php echo $row['Patient_Photo']; ?>" name="Patient_Photo"> 
                                                         <input type="hidden" class="form-control" id="doctor" value="<?php echo $row['Patient_Photo']; ?>" name="Patient_Photo">    
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Patient :</label>
                                                            <input type="text" class="form-control" required="true" value="<?php echo $row['FirstName']; ?> <?php echo $row['LastName']; ?>" name="Patient_Name" id="recipient-name">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Symptoms :</label>
                                                            <input type="text" class="form-control" value="<?php echo $row['Symptom']; ?>, Other Symptoms :  <?php echo $row['Other_Symptom']; ?>" name="Symptoms" id="recipient-name">
                                                        </div>

                                                        <div class="form-group pt-2">
                                                            <label for="exampleFormControlTextarea1" class="label mx-2">Diagnosis:</label>
                                                            <textarea class="form-control" placeholder="Write your diagnosis here!" rows="4" required="true" name="Diagnosis" ></textarea>
                                                        </div>

                                                        <div class="form-group pt-2">


                                                            <label for="exampleFormControlTextarea1" class="label mx-2">Medicine Prescription:</label>
                                                                
                                                                <div class="row">
                                                                    <div class="col-lg-9">
                                                                        <div class="autocomplete mb-2">
                                                                            
                                                                            <input id="input1" type="text" class="form-control"   placeholder="Search for Medicine">
                                                                        
                                                                        </div>  
                                                               
                                                                        <input type="button" class="btn btn-outline-primary mb-2" style="border-radius: 30px;" value="Add Medicine" onclick="copyValue()">   
                                                                        <input type="button" class="btn btn-outline-primary mb-2" style="border-radius: 30px;" value="Clear text" onclick="document.getElementById('input1').value = ''"> 
                                                                    </div>
                                                                   
                                                                   
                                                                </div>
                                                                    
                                                                <textarea class="form-control" rows="5" required="true" placeholder="Write or Copy Paste the medicine here" name="Prescription" id="input2"></textarea>
                                                        </div>

                                                        <div class="form-group pt-2">
                                                            <label for="exampleFormControlTextarea1" class="label mx-2">Treatment Note:</label>
                                                            <textarea class="form-control" placeholder="Write your note here" rows="5" required="true" name="Treatment" id="message"></textarea>
                                                        </div>
                                                
                                
                                                        
                                                        <div class="form-group pt-2">
                                                            <label class="" for=""> Doctor Signature:</label>
                                                            <br/>
                                                            
                                                            <div class="card border-4" id="sig"  ></div>
                                                            <br/>
                                                            <button class="btn1" id="clear">Clear Signature</button>
                                                            <textarea id="signature64" required="true" name="Signiture" style="display: none"></textarea>
                                                        </div>

                                

                                                        <div class="form-group pt-2 mt-3">
                                                            <a href="Doctor-dashboard.php"><button type="button"  class="btn1">Back</button></a>
                                                            <button type="submit" name="submit"  style="float:right;" class="btn1"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send Medication</button>
                                                        </div>

                                                        
                                                            
                                                        <?php endwhile; ?>   

                                                    
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
        <script type="text/javascript">
            var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
            $('#clear').click(function(e) {
                e.preventDefault();
                sig.signature('clear');
                $("#signature64").val('');
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script>
            function autocomplete(inp, arr) {
      /*the autocomplete function takes two arguments,
      the text field element and an array of possible autocompleted values:*/
      var currentFocus;
      /*execute a function when someone writes in the text field:*/
      inp.addEventListener("input", function(e) {
          var a, b, i, val = this.value;
          /*close any already open lists of autocompleted values*/
          closeAllLists();
          if (!val) { return false;}
          currentFocus = -1;
          /*create a DIV element that will contain the items (values):*/
          a = document.createElement("DIV");
          a.setAttribute("id", this.id + "autocomplete-list");
          a.setAttribute("class", "autocomplete-items");
          /*append the DIV element as a child of the autocomplete container:*/
          this.parentNode.appendChild(a);
          /*for each item in the array...*/
          for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
              /*create a DIV element for each matching element:*/
              b = document.createElement("DIV");
              /*make the matching letters bold:*/
              b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
              b.innerHTML += arr[i].substr(val.length);
              /*insert a input field that will hold the current array item's value:*/
              b.innerHTML += "<input type='hidden' class='form-control' value='" + arr[i] + "'>";
              /*execute a function when someone clicks on the item value (DIV element):*/
              b.addEventListener("click", function(e) {
                  /*insert the value for the autocomplete text field:*/
                  inp.value = this.getElementsByTagName("input")[0].value;
                  /*close the list of autocompleted values,
                  (or any other open lists of autocompleted values:*/
                  closeAllLists();
              });
              a.appendChild(b);
            }
          }
      });
      /*execute a function presses a key on the keyboard:*/
      inp.addEventListener("keydown", function(e) {
          var x = document.getElementById(this.id + "autocomplete-list");
          if (x) x = x.getElementsByTagName("div");
          if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
          } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
          } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
              /*and simulate a click on the "active" item:*/
              if (x) x[currentFocus].click();
            }
          }
      });
      function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
      }
      function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
          x[i].classList.remove("autocomplete-active");
        }
      }
      function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
          if (elmnt != x[i] && elmnt != inp) {
            x[i].parentNode.removeChild(x[i]);
          }
        }
      }
      /*execute a function when someone clicks in the document:*/
      document.addEventListener("click", function (e) {
          closeAllLists(e.target);
      });
    }
    
    /*An array containing all the country names in the world:*/
   
    var medicines = [ "Acetaminophen, 500 mg - Tylenol",
                        "Ibuprofen, 200 mg - Advil",
                        "Naproxen, 220 mg - Aleve",
                        "Diphenhydramine, 25 mg - Benadryl",
                        "Pseudoephedrine, 30 mg - Sudafed",
                        "Loratadine, 10 mg - Claritin",
                        "Cetirizine, 10 mg - Zyrtec",
                        "Fexofenadine, 180 mg - Allegra",
                        "Omeprazole, 20 mg - Prilosec",
                        "Ranitidine, 150 mg - Zantac",
                        "Famotidine, 20 mg - Pepcid",
                        "Calcium carbonate, 500 mg - Tums",
                        "Magnesium hydroxide, 400 mg - Milk of Magnesia",
                        "Bisacodyl, 5 mg - Dulcolax",
                        "Senna, 8.6 mg - Senokot",
                        "Docusate sodium, 100 mg - Colace",
                        "Polyethylene glycol 3350, 17 g - MiraLax",
                        "Loperamide, 2 mg - Imodium",
                        "Simethicone, 125 mg - Gas-X",
                        "Chlorpheniramine maleate, 4 mg - Chlor-Trimeton",
                        "Dextromethorphan, 10 mg - Robitussin",
                        "Guaifenesin, 100 mg - Mucinex",
                        "Cough suppressant/expectorant - Robitussin DM",
                        "Nasal decongestant - Afrin",
                        "Topical pain relief - Bengay",
                        "Topical allergy relief - Cortaid",
                        "Topical antifungal - Lamisil",
                        "Topical acne treatment - Benzoyl peroxide",
                        "Topical cold sore treatment - Abreva",
                        "Multivitamins - Centrum",
                        "Vitamin C - Emergen-C",
                        "Vitamin D - Caltrate",
                        "Fish oil - Omega-3",
                        "Calcium - Caltrate Plus",
                        "Iron - Ferrous sulfate",
                        "Folic acid - Folacin",
                        "B12 - Vitamin B12",
                        "Magnesium - Magnesium oxide",
                        "Potassium - Potassium chloride",
                        "Zinc - Zinc gluconate",
                        "Echinacea - Echinacea",
                        "Garlic - Kyolic",
                        "Ginger - Ginger root",
                        "Valerian root - Valerian",
                        "Melatonin - Melatonin",
                        "St. John's wort - St. John's wort",
                        "Ginkgo biloba - Ginkgo biloba",
                        "Saw palmetto - Saw palmetto",
                        "Cranberry - Cranberry",
                        "Green tea - Green tea extract", 
                        "Aspirin, 325 mg - Bayer", 
                        "Acetaminophen, 500 mg - Johnson & Johnson", 
                        "Ibuprofen, 200 mg - Pfizer",  
                        "Naproxen, 220 mg - Bayer",
                        "Claritin, 10 mg - Schering-Plough",
                        "Zyrtec, 10 mg - Pfizer",  
                        "Singulair, 10 mg - Merck",  
                        "Flonase, 50 mcg/actuation - GlaxoSmithKline",  
                        "Albuterol, 90 mcg/actuation - GlaxoSmithKline",  
                        "Prednisone, 5 mg - Pfizer",  
                        "Lisinopril, 20 mg - Merck",  
                        "Metformin, 500 mg - Bristol-Myers Squibb",  
                        "Lipitor, 10 mg - Pfizer",  
                        "Ambien, 10 mg - Sanofi-Aventis",  
                        "Xanax, 0.25 mg - Pfizer",  
                        "Prozac, 20 mg - Eli Lilly",  
                        "Zoloft, 50 mg - Pfizer",  
                        "Paxil, 20 mg - GlaxoSmithKline",  
                        "Viagra, 100 mg - Pfizer",  
                        "Cialis, 20 mg - Eli Lilly",
                        "Acetaminophen (paracetamol) - 325-1000 mg - Manufacturers: Tylenol, Panadol, Acetamol, Mapap",
                        "Ibuprofen - 200-800 mg - Manufacturers: Advil, Motrin, Nurofen",
                        "Aspirin - 325-1000 mg - Manufacturers: Bayer, Bufferin",
                        "Naproxen - 220-550 mg - Manufacturers: Aleve, Naprosyn",
                        "Diclofenac - 50-100 mg - Manufacturers: Voltaren, Cataflam",
                        "ketoprofen - 50-100 mg - Manufacturers: Orudis, Oruvail",
                        "Mefenamic acid - 250-500 mg - Manufacturers: Ponstel, Meftal",
                        "Nimesulide - 100-200 mg - Manufacturers: Nimulid, Mesulid",
                        "Indomethacin - 25-50 mg - Manufacturers: Indocin, Indometacin",
                        "Celecoxib - 100-200 mg - Manufacturers: Celebrex",
                        "Piroxicam - 10-20 mg - Manufacturers: Feldene",
                        "Meloxicam - 7.5-15 mg - Manufacturers: Mobic",
                        "Etoricoxib - 60-120 mg - Manufacturers: Arcoxia",
                        "Lornoxicam - 8-16 mg - Manufacturers: Xefo",
                        "Aceclofenac - 100-200 mg - Manufacturers: Aclonac",
                        "Phenazone - 300-600 mg- Manufacturers: Antipyrine",
                        "Phenacetin - 300-600 mg - Manufacturers: Acephen",
                        "Paracetamol and codeine - Manufacturers: Tylenol with Codeine, Panadol with Codeine",
                        "Paracetamol and dextromethorphan - 325-1000 mg/15-30 mg - Manufacturers: Robitussin DM, Vicks Formula 44",
                        "Paracetamol and guaifenesin - 325-1000 mg/100-200 mg - Manufacturers: Mucinex, Robitussin",
                        "Paracetamol and pseudoephedrine - 325-1000 mg/60-120 mg - Manufacturers: Sudafed, Sinutab",
                        "Paracetamol and phenylephrine - 325-1000 mg/5-10 mg - Manufacturers: Sin",
                        "Paracetamol (Biogesic)"
                    ];
                    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
                autocomplete(document.getElementById("input1"), medicines);

                
        </script>

       
    </body>
</html>
