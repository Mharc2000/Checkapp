<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/logo.png">
    <title>Doctor - login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <script src="js/sweetalert.js"></script>
  </head>
  <body style="font-family: 'Poppins', sans-serif;">
  <?php 

    include ('config.php');

    session_start();

    if (isset($_POST['submit'])) {
        $Email = mysqli_real_escape_string($connect, $_POST['Email']);
        $Password = mysqli_real_escape_string($connect, $_POST['Password']);
        $active = mysqli_real_escape_string($connect, $_POST['online_status']);
        $Password = md5($Password);

        $sql = "SELECT * FROM doctor_record WHERE Email='$Email' AND Password='$Password'";
        $result = mysqli_query($connect, $sql);

        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['Doctor_ID'] = $row['Doctor_ID'];
            //Testing purposes//echo ($_SESSION['Doctor_ID']);

            ?>
            <script>
                swal({
                title: "Login Success!",
                icon: "success"
                }).then((success)=>{
                    if(success){
                        window.location.href='Doctor-dashboard.php';
                    }
                });
                
            </script>

            <?php

        } else {
    
             ?>
            <script>
                swal({
                title: "Woops! Email or Password is Wrong !",
                icon: "warning"
                });
                
            </script>
            <?php

        
        }
        $status = mysqli_query ($connect,"UPDATE doctor_record SET User_status ='$active' WHERE Email = '$Email'");
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
    <section class="Form my-2 mx-2 mt-4">
        <div class="container">
            <div class="row g-0" style="border-radius: 30px;" id="shadow">
                <div class="col-lg-6">
                    <img src="img/cover2.png" width="2000" height="2000" class="img-fluid" alt="cover" style="border-radius: 30px;">
                </div>
                <div class="col-lg-6 px-5 pt-5" id="shadow">
                    <h1 class="font-weight-bold py-3"> <span style="color:green">DOCTORS</span> LOGIN  PAGE</h1>
                    <h4>Sign into your account</h4>
                    <form action="" method="POST">

                        <input type="hidden" name="online_status" value="Active">

                        <div class="form-row pt-1">
                            <div class="col-lg-10">
                                <label class="label mx-2">Email address</label>
                                <input type="email" placeholder="Username" class="form-control  p-3" name="Email">
                            </div>
                        </div>
                        <div class="form-row pt-2">
                            <div class="col-lg-10">
                                <label class="label mx-2">Password</label>
                                <input type="password" placeholder="Password" class="form-control  p-3" name="Password">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10 my-2 mx-2">
                            <input type="checkbox" value="lsRememberMe" id="rememberMe"> <label for="rememberMe">Remember me</label>
                            </div> 
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <div class="d-flex pt-2">
                                    <button type="submit" name="submit" class="btn1 flex-grow-1">Login</button>
                                </div>
                        
                            </div>

                            <div class="col-lg-10">
                                <div class="d-flex pt-2">
                                    <a href="Doctor-register.php" type="button" style="text-decoration: none; text-align:center;" class="btn1 flex-grow-1 text-white">Create Account</a>
                                </div>
                            </div>

                            <div class="col-lg-10 my-2 mx-2 d-flex justify-content-center">
                                <a href="#forgot" style="text-decoration: none;" data-toggle="tab">Forgot Password?</a>
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
     <footer class="text-center text-lg-start bg-white text-dark ">
       
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
          © 2022 Copyright:
          <a class="text-reset fw-bold" href="#"><span style="color:green">CHECKAPP.COM</span></a>
        </div>
        <!-- Copyright -->
        <!-- Copyright -->
      </footer>

        <!-- FOOTER -->
    
    <script>
        $('#myModal').on('hidden.bs.modal', function (e) {
        // do something...
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.4/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>