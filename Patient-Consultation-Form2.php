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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
    </head>
    <body class="sb-nav-fixed" style="font-family: 'Poppins', sans-serif;">
    <?php


    if (isset($_POST['submit'])) {
        
        $Photo = $_POST['Photo'];
        $FirstName = $_POST['FirstName'];
        $LastName = $_POST['LastName'];
        $Gender = $_POST['Gender'];
        $Age = $_POST['Age'];
        $Symptom = $_POST['Symptom'];
        $Other_Symptom=$_POST['Other_Symptom'];
        $AppointmentDate = $_POST['AppointmentDate'];
        $Patient_ID= $_SESSION['Patient_ID'];
        $Doctor_ID =$_POST['Doctor_ID'];
        $Doctor_Name =$_POST['Doctor_Name'];
        
        $sql = "INSERT INTO consultation_record ( Patient_ID, Doctor_ID, Doctor_Name, Patient_Photo, FirstName, LastName, Gender,Age, Symptom, AppointmentDate) 
        VALUES('$Patient_ID','$Doctor_ID', '$Doctor_Name', '$Photo', '$FirstName', '$LastName', '$Gender','$Age', '$Symptom', '$AppointmentDate')";
        $result = $connect->query($sql);
        ?>
        <script>
            swal({
            title: "Successfully Submitted!",
            icon: "success"
            }).then(function() {
            // Redirect the user
            window.location.href='Patient-Consultations.php';
            console.log('The Ok Button was clicked.');
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
               

                    <!-- CONSULTATION REQUEST FORM -->
                    <div class="row mt-3 mb-3">

                    <div class="col">
                        <div class="card" id="shadow" style="border-radius: 30px;">
                            <div class="card-header"><h4 class="mt-2 px-2 py-2 fw-bold">Consultation Form</h4></div>
                                    <div class="card mx-3 my-3 mt-3 mb-3" style="border-radius: 10px;">
                                        <div class="card-body">
                                            <form action="" method="POST">
                                                

                                                <div class="col">
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" value="<?php echo $Doctor_ID = $_GET['Doctor_ID']; ?>" id="exampleFormControlInput1" placeholder="" name="Doctor_ID">
                                                    </div>
                                                </div>

                                                <?php
                                                $query = "SELECT * FROM patient_record WHERE Patient_ID = '$Patient_ID'";  
                                                $result = mysqli_query($connect, $query); 
                                                while($row = mysqli_fetch_array($result)):?>  
                                                <input type="hidden" class="form-control" value="<?php echo $row['Photo'];?>" name="Photo">   
                                                <?php endwhile; ?> 
                                               
                                                <div class="col">
                                                <?php
                                                $Doctor_ID = $_GET['Doctor_ID'];
                                                $query = "SELECT * FROM doctor_record WHERE Doctor_ID = '$Doctor_ID'";  
                                                $result = mysqli_query($connect, $query);
                                                while($row = mysqli_fetch_assoc($result)):?>
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" value="<?php echo $row['FirstName']; ?> <?php echo $row['LastName']; ?> " id="exampleFormControlInput1" placeholder="" name="Doctor_Name">
                                                    </div>
                                                <?php endwhile; ?>
                                                </div>

                                            
                                                <?php
                                                $Patient_ID = $_SESSION['Patient_ID'];
                                                $query = "SELECT * FROM patient_record WHERE Patient_ID = '$Patient_ID'";  
                                                $result = mysqli_query($connect, $query);
                                                while($row = mysqli_fetch_assoc($result)):?>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label class="label mx-2">First Name</label>
                                                            <input type="text" class="form-control"  value="<?php echo $row['FirstName']; ?>" id="exampleFormControlInput1" placeholder="Enter First Name"  name="FirstName" required="true">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="label mx-2">Last Name</label>
                                                            <input type="text" class="form-control" value="<?php echo $row['LastName']; ?>" id="exampleFormControlInput1" placeholder="Enter Last Name" name="LastName" required="true">
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <div class="row mt-3">
                                                    <div class="col-md-4">
                                                        <div class="form-group ">
                                                        <label class="label mx-2">Gender</label>  
                                                            <select name="Gender" class="form-control" required="true">
                                                                <option value="<?php echo $row['Gender']; ?>" selected><?php echo $row['Gender']; ?></option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                                <label class="label mx-2">Age</label>
                                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['Age']; ?>"  name="Age">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label class="label mx-2">Consultation Schedule</label>
                                                        <input type="datetime-local" class="form-control" id="exampleFormControlInput1" placeholder="" name="AppointmentDate" required="true">
                                                        </div>

                                                    </div>
                                                </div>
                                               
                                                <?php endwhile; ?> 


                                                <div class="row">
                                                    <div class="col-lg-7">
                                                    <div class="form-group mt-4">
                                                    <label for="exampleFormControlTextarea1" class="label mx-2">Your Symptoms:</label>
                                                                
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="autocomplete mb-2">
                                                                            
                                                                            <input id="input1" type="text" class="form-control"   placeholder="Search your Symptoms">
                                                                            
                                                                        </div>  
                                                               
                                                                        <input type="button" class="btn btn-outline-primary mb-2" style="border-radius: 30px;" value="Add Symptom" onclick="copyValue()">

                                                                        <input type="button" class="btn btn-outline-primary mb-2" style="border-radius: 30px;" value="Clear text" onclick="document.getElementById('input1').value = ''"> 
                                                                    </div>
                                                                   
                                                                   
                                                                </div>

                                                                <textarea class="form-control" id="input2" rows="5" name="Symptom" placeholder="Add your symptoms here!" required="true"></textarea>
                                                    </div>

                                                    </div>
                                                </div>
                                                


                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mt-4">
                                                        <a href="Patient-findadoctor.php" type="button" style="text-decoration: none; text-align:center;" class="btn1 text-white"> Back</a>  
                                                        <button class="btn1" style="float:right;" type="submit" name="submit"> Submit</button>
                                                        </div>

                                                    </div>
                                                </div>
                                        
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
   
   var symptoms = ['Headache', 'Fever', 'Fatigue', 'Nausea', 'Vomiting', 'Diarrhea', 'Muscle pain', 'Joint pain', 'Chest pain', 'Shortness of breath', 'Cough',
    'Sore throat', 'Runny nose', 'Stuffy nose', 'Sneezing', 'Watery eyes', 'Itchy eyes', 'Red eyes', 'Swollen glands', 'Skin rash', 'Bumps', 'Blisters', 'Warts',
     'Hives', 'Itchy skin', 'Dry skin', 'Oily skin', 'Acne', 'Psoriasis', 'Eczema', 'Dandruff', 'Hair loss', 'Brittle nails', 'Yellow nails', 'Sore gums', 'Bleeding gums', 
     'Bad breath', 'Toothache', 'Sensitivity', 'Swollen tongue', 'Swollen lips', 'Swollen face', 'Swollen feet', 'Swollen hands', 'Swollen legs', 'Swollen ankles', 
     'Swollen wrists', 'Swollen knees', 'Swollen hips', 'Back pain', 'Neck pain', 'Shoulder pain', 'Arm pain', 'Elbow pain', 'Wrist pain', 'Hand pain', 'Finger pain',
      'Hip pain', 'Knee pain', 'Ankle pain', 'Foot pain', 'Toe pain', 'Dizziness', 'Lightheadedness', 'Fainting', 'Loss of balance', 'Loss of coordination', 'Loss of appetite',
       'Weight loss', 'Weight gain', 'Constipation', 'Difficulty swallowing', 'Heartburn', 'Indigestion', 'Gas', 'Bloating', 'Incontinence', 'Frequent urination', 'Difficulty urinating',
        'Painful urination', 'Blood in urine', 'Cloudy urine', 'Dark urine', 'Odorless urine', 'Frequent bowel movements', 'Difficulty passing stool', 'Constipation', 'Diarrhea', 
        'Bloody stool', 'Mucus in stool', 'Yellow stool', 'Green stool', 'Black stool', 'Pale stool', 'Floaty stool', 'Sunken eyes', 'Dark circles', 'Wrinkles', 'Age spots',
        'Sunburn', 'Dry mouth', 'Thick saliva', 'Sour taste', 'Bad taste', 'Alteration of taste', 'Dehydration', 'Sweating', 'Chills', 'Shivering', 'Trembling', 'Chest tightness',
         'Chest discomfort', 'Chest pressure', 'Chest burning', 'Chest pain', 'Heart palpitations', 'Rapid heartbeat', 'Slow heartbeat', 'Fluttering heartbeat', 'Irregular heartbeat', 
         'Chest pain', 'Chest heaviness', 'Chest numbness', 'Chest tingling', 'Chest tightness', 'Chest discomfort', 'Chest pressure', 'Chest burning', 'Chest pain', 'Heart palpitations', 
         'Rapid heartbeat', 'Slow heartbeat', 'Fluttering heartbeat', 'Irregular heartbeat', 'Angina', 'Heart attack', 'Stroke', 'Seizures', 'Migraine', 'Tension headache', 'Cluster headache',
          'Sinus headache', 'Rebound headache', 'Allergic rhinitis', 'Sinusitis', 'Bronchitis', 'Pneumonia', 'Asthma', 'Emphysema', 'Chronic obstructive pulmonary disease', 'Tuberculosis',
           'Cystic fibrosis', 'Lung cancer', 'Breast cancer', 'Prostate cancer', 'Colon cancer', 'Rectal cancer', 'Tooth sensitivity', 'Tooth pain', 'Tooth ache', 'Tooth discomfort', 
           'Tooth throbbing', 'Tooth pressure', 'Tooth cavities', 'Tooth decay', 'Gum pain', 'Gum bleeding', 'Gum swelling', 'Gum infection', 'Gum recession', 'Gum disease',
            'Tooth extraction pain', 'Tooth filling pain', 'Tooth grinding pain', 'Tooth root pain', 'Tooth jaw pain', 'Muscle cramps', 'Muscle spasms', 'Muscle stiffness', 
            'Muscle weakness', 'Muscle soreness', 'Muscle fatigue', 'Muscle tightness', 'Muscle twitching', 'Muscle burning', 'Muscle tingling', 'Muscle numbness', 'Muscle aching',
             'Muscle stiffness', 'Muscle strain', 'Muscle pull', 'Muscle tear', 'Muscle sprain', 'Muscle contusion', 'Muscle injury', 'Muscle tension','gonorrhea'];
                    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
                autocomplete(document.getElementById("input1"), symptoms);

                
        </script>
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
