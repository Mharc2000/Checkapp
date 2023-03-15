<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


    <title>CHECKAPP</title>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg py-3 sticky-top navbar-light bg-white">
        <div class="container">
           <a class="navbar-brand fw-bold" href="http://localhost/checkapp/">
              <img class="logo" width="60px" height="60px" src="img/logo.png" alt="">
              <span style="color:#1c9e05;">Check</span>App
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Medical Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">About us?</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="#users">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#team">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>


                </ul>

                <a href="#users" class="btn btn-success ms-lg-3">Log in</a>

                <!--<button class="btn btn-success ms-lg-3">Join Us</button>-->
            </div>
        </div>
    </nav><!-- //NAVBAR -->

    <!-- HERO -->
    <div class="hero vh-100 d-flex align-items-center" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto text-center">
                    <h1 class="display-4 text-white"><span style="color: green;">Healthcare</span> at your convenience</h1>
                    <p class="text-white my-3"></p>
                    <a href="#users" class="btn me-2 btn-success">Get Started</a>
                </div>
            </div>
        </div>
    </div><!-- //HERO -->

    <!-- SERVICES -->
    <section id="services">
        <div class="container" >
            <div class="row mb-5" data-aos="fade-up">
                <div class="col-md-8 mx-auto text-center">
                    
                    <h1 style="color:#1c9e05;">Medical Services</h1>
                    <p></p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-sm-6" data-aos="fade-left">
                    <div class="service card-effect bounceInUp">
                        <div class="iconbox">
                            <i class='bx bxs-heart'></i>
                        </div>
                        <h5 class="mt-4 mb-2">GENERAL MEDICINE</h5>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-left">
                    <div class="service card-effect">
                        <div class="iconbox">
                            <i class='bx bxs-heart'></i>
                        </div>
                        <h5 class="mt-4 mb-2">FAMILY MEDICINE</h5>
                        <!--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil perspiciatis illo asperiores
                            perferendis </p>-->
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service card-effect" data-aos="fade-left">
                        <div class="iconbox">
                            <i class='bx bxs-heart'></i>
                        </div>
                        <h5 class="mt-4 mb-2">DERMATOLOGY</h5>
                     
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-right">
                    <div class="service card-effect">
                        <div class="iconbox">
                            <i class='bx bxs-heart'></i>
                        </div>
                        <h5 class="mt-4 mb-2">DESTISTRY</h5>
                      
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-right">
                    <div class="service card-effect">
                        <div class="iconbox">
                            <i class='bx bxs-heart'></i>
                        </div>
                        <h5 class="mt-4 mb-2">OPHTHAMOLOGY</h5>
                      
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-right">
                    <div class="service card-effect">
                        <div class="iconbox">
                            <i class='bx bxs-heart'></i>
                        </div>
                        <h5 class="mt-4 mb-2">PSYCIATRY</h5>
                       
                    </div>
                </div>
            </div>
        </div>
    </section><!-- SERVICES -->

    <!-- FEATURES -->
    <section class="row w-100 py-0 bg-light" id="features">
        <div class="col-lg-6 col-img" data-aos="fade-right"></div>
        <div class="col-lg-6 py-5" data-aos="fade-left">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h1 style="color:#1c9e05;">About Us</h1>
                        <p>CheckApp is an app that offers capabilities for online pharmacies, video
                        conferencing, and other medical transaction features in an effort to
                        address the issue of the unavailability of remote monitoring. In turn, this
                        makes the app a complete medical app for primary care.
                        </p>

                        <div class="feature d-flex mt-5">
                            <div class="iconbox me-3">
                            <i class='bx bxs-video'></i>
                            </div>
                            <div>
                                <h5>Online Consultation</h5>
                                <p>Get your primary care by a doctor online.</p>
                            </div>
                        </div>
                        <div class="feature d-flex">
                            <div class="iconbox me-3">
                            <i class='bx bxs-file-plus' ></i>
                            </div>
                            <div>
                                <h5>Medical Documents</h5>
                                <p>Get Medical prescription and medical certificate online.</p>
                            </div>
                        </div>
                        <div class="feature d-flex">
                            <div class="iconbox me-3">
                             <i class='bx bxs-capsule' ></i>
                            </div>
                            <div>
                                <h5>Online Pharmacy</h5>
                                <p>Purchase your medicine at home. </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section><!-- FEATURES -->

 

            <!-- //USER SELECTION -->
    <section id="users" class="bg-light">
                <div class="container">
                    <div class="row mb-5" data-aos="fade-up">
                        <div class="col-md-8 mx-auto text-center">

                            <h1 style="color:#1c9e05;">User's Selection</h1>
    
                        </div>
                    </div>
                        
                    <div class="row g-3" data-aos="fade-up">
                        <div class="col-lg-4 col-sm-6">
                            <div class="pricing card-effect text-center" style="border-radius: 30px;">
                            
                                <h1>Patient</h1>
                                <img class="card-img" src="img/patient.png"  width="400" height="200" alt="patient">
                                <hr>
                                <a href="Patient-login.php" data-url="new.html" class="btn btn-success smoothLink">Log in / Sign up</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6" data-aos="fade-up">
                            <div class="pricing card-effect text-center" style="border-radius: 30px;">
                              
                                <h1>Doctor</h1>
                                <img class="card-img" src="img/medical-team.png"  width="400" height="200" alt="doctor">
                                <hr>
                                <a href="Doctor-login.php" data-url="new.html" class="btn btn-success smoothLink">Log in / Sign up</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6" data-aos="fade-up">
                            <div class="pricing card-effect text-center" style="border-radius: 30px;">
                                
                                <h1>Pharmacy</h1>
                                <img class="card-img" src="img/Pharmacy.png" width="400" height="200" alt="admin">
                                <hr>
                                <a href="Pharmacy-login.php" data-url="new.html" class="btn btn-success smoothLink">Log in / Sign up</a>
                            </div>
                        </div>
                       
                    </div>
                </div>
    </section><!-- //USER SELECTION -->

    <!-- TEAM -->
    <section id="team">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center" data-aos="fade-up">

                    <h1 style="color:#1c9e05;">Meet the Crew</h1>
                    <p></p>
                </div>
            </div>
            <div class="row text-center g-4" >
                <div class="col-lg-3 col-sm-6" data-aos="fade-right">
                    <div class="team-member card-effect" style="border-radius: 30px;">
                        <img src="img/team1.jpg" alt="">
                        <h5 class="mb-0 mt-4">Kim Bermudez</h5>
                        <p>Team Leader / System Analyst</p>
                        <div class="social-icons">
                            <a href="#"><i class='bx bxl-facebook'></i></a>
                            <a href="#"><i class='bx bxl-twitter'></i></a>
                            <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6" data-aos="fade-right">
                    <div class="team-member card-effect" style="border-radius: 30px;">
                        <img src="img/team2.jpg" alt="">
                        <h5 class="mb-0 mt-4">Rey Gadgude</h5>
                        <p>System Analyst</p>
                        <div class="social-icons">
                            <a href="#"><i class='bx bxl-facebook'></i></a>
                            <a href="#"><i class='bx bxl-twitter'></i></a>
                            <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6" data-aos="fade-left">
                    <div class="team-member card-effect" style="border-radius: 30px;">
                        <img src="img/team3.jpg" alt="">
                        <h5 class="mb-0 mt-4">Ivan Mharc Maglangit</h5>
                        <p>Senior Programmer</p>
                        <div class="social-icons">
                            <a href="#"><i class='bx bxl-facebook'></i></a>
                            <a href="#"><i class='bx bxl-twitter'></i></a>
                            <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6" data-aos="fade-left">
                    <div class="team-member card-effect" style="border-radius: 30px;">
                        <img src="img/team4.jpg" alt="">
                        <h5 class="mb-0 mt-4">Lady Mae Rodrigo</h5>
                        <p>Junior Programmer</p>
                        <div class="social-icons">
                            <a href="#"><i class='bx bxl-facebook'></i></a>
                            <a href="#"><i class='bx bxl-twitter'></i></a>
                            <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- TEAM -->

    <!-- CONTACT -->
    <section id="contact">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                    <h1 style="color:#1c9e05;">Get In Touch</h1>
                    <p>Contact us for more inquiry.</p>
                </div>
            </div>

            <form action="" class="row g-3 justify-content-center">
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Full Name">
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Enter E-mail">
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control" placeholder="Enter Subject">
                </div>
                <div class="col-md-10">
                    <textarea name="" id="" cols="30" rows="5" class="form-control"
                        placeholder="Enter Message"></textarea>
                </div>
                <div class="col-md-10 d-grid">
                    <button class="btn btn-success">Contact</button>
                </div>
            </form>

        </div>
    </section><!-- CONTACT -->

    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4">
                        <img class="logo" src="img/logo.png" alt="">
                    </div>
                    <div class="col-lg-2">
                        <h5 class="text-white">Brand</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">About</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Features</a></li>
                            <li><a href="#">Pricing</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2">
                        <h5 class="text-white">More</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">FAQ's</a></li>
                            <li><a href="#">Privacy & Policy</a></li>
                        
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <h5 class="text-white">Contact</h5>
                        <ul class="list-unstyled">
                            <li>Address: Toril, Davao City</li>
                            <li>Email: Checkapp.davao@gmail.com</li>
                            <li>Phone: (603) 555-0123</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-0">© 2022 copyright all right reserved | Designed with <i
                            class="bx bx-heart text-danger"></i> by<a
                                href=""
                                class="text-white"> Mharcivan</a></p>
                    </div>
                    <div class="col-md-6">
                        <div class="social-icons">
                            <a href="#"><i class='bx bxl-facebook'></i></a>
                            <a href="#"><i class='bx bxl-twitter'></i></a>
                            <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
    AOS.init();
    </script>
    <script src="js/smoothlink.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>