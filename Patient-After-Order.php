
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
        <title>Checkapp - My Cart</title>
        <link rel="icon" href="img/logo.png">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <style>
    
        </style>
    </head>
    <body class="sb-nav-fixed" style="font-family: 'Poppins', sans-serif;">
        <div class="spinner" id="preloader"></div>
        <?php include('includes/Patient-nav-cart.php');?>
        <?php include('includes/Patient-Sidenav.php');?>
            <div id="layoutSidenav_content">
                <main class="main">
                    <div class="container-fluid">
                        <div class="card mt-5" id="shadow" style="border-radius: 30px;">
                            <br><br><br>
                            <h1 class="d-flex justify-content-center">Thank you for your Order !</h1>
                            <br><br><br>
                            <hr class="dropdown-divider bg-dark" />
                            <div class="mt-3 pb-3 d-flex justify-content-center"> 
                            <a href="Patient-Orders.php"><button class="btn btn-success"><i class="fa-solid fa-cart-shopping"></i> See your Order!</button> </a> 
                            </div>
                            
                        </div>
                        
                    </div>
                </main>
                <?php include('includes/App-footer.php');?>
            </div>
        </div>
        <script src="js/quantity.js" crossorigin="anonymous"></script>    
                                                 
        <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function(){
            loader.style.display="none";
        })

        </script>
        <script>
            if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
            }
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
