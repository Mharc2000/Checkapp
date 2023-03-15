 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkapp Patient Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <link href="css/button.css" rel="stylesheet">
    <link href="css/button2.css" rel="stylesheet">
    <link rel="icon" href="img/logo.png">
    <script src="js/sweetalert.js"></script>
    
  </head>
  <body style="font-family: 'Poppins', sans-serif;">
  <?php 
    include ('config.php'); 
    session_start();
    if (isset($_POST['submit'])) {
        $Email = mysqli_real_escape_string($connect, $_POST['Email']);
        $Password = mysqli_real_escape_string($connect, $_POST['Password']);
        $Password = md5($Password);

        
        $sql = "SELECT * FROM patient_record WHERE Email='$Email' AND Password='$Password'";
        $result = mysqli_query($connect, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['Patient_ID'] = $row['Patient_ID'];
            //Testing purposes//echo ($_SESSION['Patient_ID']);
            ?>
            <script>
                swal({
                title: "Login Success!",
                icon: "success"
                }).then((success)=>{
                    if(success){
                        window.location.href='Patient-dashboard.php';
                    }
                });
                
            </script>

            <?php

        } 
        else{


            ?>
            <script>
                swal({
                title: "Woops! Email or Password is Wrong.",
                icon: "warning"
                });
                
            </script>
            <?php
            
        }
    }

    ?>
            <nav class="navbar navbar-expand-lg py-3 sticky-top navbar-light bg-white">
                <div class="container">
                    <a class="navbar-brand fw-bold" href="http://localhost/checkapp/">
                        <img class="logo" width="60px" height="60px" src="img/logo.png" alt="">
                        <span style="color:#1c9e05;">Check</span>App
                    </a>
                </div>
            </nav><!-- //NAVBAR -->

    <!-- LOGIN FORM -->
    <section class="Form my-2 mx-2 mt-4" >
        <div class="container" >
            <div class="row " id="shadow" style="border-radius: 30px;">
                <div class="col-lg-6">
                    <img src="img/cover.png"  class="img-fluid" alt="" style="border-radius: 30px;">
                </div>

                <div class="col-lg-6 px-5 pt-5 " id="shadow">

                <h1 class="font-weight-bold py-3"> <span style="color:green">PATIENT</span> LOGIN  PAGE</h1>
                <h4>Sign into your account</h4>

                
                    <form action="" method="POST">
                        
                        <div class="form-row pt-1">
                            <div class="col-lg-10">
                                <label class="label mx-2">Email address</label>
                                <input type="email" placeholder="Email" class="form-control  p-3" id="email"  name="Email" >
                            </div>
                        </div>
                        <div class="form-row pt-2">
                            <div class="col-lg-10">
                                <label class="label mx-2">Password</label>
                                <input type="password" placeholder="Password" class="form-control p-3" id="password"  name="Password">
                            </div>
                            
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10 my-2 mx-2">
                            <input type="checkbox" value="lsRememberMe" id="rememberMe"> <label for="rememberMe">Remember me</label>
                            </div> 
                        </div>
                        
                        <div class="form-row">
                            <div class="col-lg-10">
                                <div class="d-flex pt-1">
                                <button type="submit" name="submit" id="submit" class="btn1 flex-grow-1">Login</button>
                                </div>
                               
                            </div>
                            <div class="col-lg-10">
                                <div class="d-flex pt-2">
                                    <a href="Patient-register.php" type="button"  style="text-decoration: none; text-align:center;" class="btn1 flex-grow-1 text-white">Create Account</a>
                                </div>
                            </div>

                            <div class="col-lg-10 my-2 mx-2 d-flex justify-content-center">
                            <a href="#forgot" style="text-decoration: none;" data-toggle="tab">Forgot Password?</a>
                            </div> 

                            <div class="col-lg-10">
                                <h5 class="d-flex justify-content-center">Sign in with</h5>
                            </div>
                            

                            <div class="col-lg-10">
                                <div class="d-flex pt-2">
                                    <button type="submit"  class="social-btn flex-grow-1"> <i class="fa-brands fa-facebook"></i> Facebook</button>
                                </div>
                            </div>

                            <div class="col-lg-10">
                                <div class="d-flex pt-2">
                                    <button type="submit" name="submit" class="social-btn1 flex-grow-1 mb-5"><img src="img/google.png" width="25px" height="25px" alt="">mail</button>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section><!-- LOGIN FORM -->
    <br><br><br><br><br><br><br><br>
     <!-- FOOTER -->
     <!-- Footer -->
     <footer class="text-center text-lg-start bg-white text-dark g-0">
       
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
          © 2022 Copyright:
          <a class="text-reset fw-bold" href="#"><span style="color:green">CHECKAPP.COM</span></a>
        </div>
        <!-- Copyright -->
        <!-- Copyright -->
      </footer>

        <!-- FOOTER -->

         
    

    <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function(){
            loader.style.display="none";
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.4/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>