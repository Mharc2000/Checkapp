
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
        <title>Checkapp - Talk to a Doctor</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link href="css/hover.css" rel="stylesheet" media="all">
        <style>
     

        .pagination a {
        color: white;
        padding: 8px 16px;
        text-decoration: none;
        }
        .pagination a:hover {
        color: white;
        padding: 8px 16px;
        text-decoration: none;
        }

        .pagination a:hover:not(.active) {background-color: #024214;}

        </style>
    </head>
    <body class="sb-nav-fixed" style="font-family: 'Poppins', sans-serif;">
        <div class="spinner" id="preloader"></div>
        <?php include('includes/Patient-nav2.php');?>
        <?php include('includes/Patient-Sidenav.php');?>

        <div id="layoutSidenav_content">
            <main class="main">
                <div class="container-fluid">
                   

                        <?php
                        // connect to database
                        
                        include ('config.php');

                        // define how many results you want per page
                        $results_per_page = 6;

                        // find out the number of results stored in database
                        $sql='SELECT * FROM doctor_record ORDER BY Doctor_ID DESC';
                        $result = mysqli_query($connect, $sql);
                        $number_of_results = mysqli_num_rows($result);

                        // determine number of total pages available
                        $number_of_pages = ceil($number_of_results/$results_per_page);

                        // determine which page number visitor is currently on
                        if (!isset($_GET['page'])) {
                        $page = 1;
                        } else {
                        $page = $_GET['page'];
                        }

                        // determine the sql LIMIT starting number for the results on the displaying page
                        $this_page_first_result = ($page-1)*$results_per_page;

                        // retrieve selected results from database and display them on pag

                        // display the links to the pages


                        ?>
                        
         
                    <div class="row d-flex justify-content-center mt-2">  
                           
                       
                            <div class="col-lg-8 me-6 pt-3 pb-2"> 
                                <div class="card pt-2 pb-2 px-2 py-2" style="border-radius: 30px;">
                                    <form class="row" method="POST">
                                        <div class="input-group col-md-3">
                                        <input type="search"  class="form-control" name="valueToSearch"   placeholder="Search Doctor , Location, Medical Category" />
                                        <button class="btn1" type="submit" name="search" >search</button>
                                        </div>
                                    </form>
                                </div>   
                            </div>

                        <nav class="d-flex justify-content-center">
                            
                            <ul class="pagination pt-4">
                                 <span aria-hidden="true">&laquo;</span>
                                <li class="page-item">
                                <?php
                                for ($page=1;$page<=$number_of_pages;$page++):?>
                                    <a href="Patient-findadoctor.php?page=<?php echo $page?>"><?php echo $page?></a>
                                <?php endfor; ?>

                                </li>
                                <span aria-hidden="true">&raquo;</span>
                            </ul>

                        </nav>          
                        <?php

                       
                        if(isset($_POST['search']))

                                {
                                    $valueToSearch = $_POST['valueToSearch']; 
                                    $query = "SELECT * FROM doctor_record WHERE CONCAT(FirstName,LastName,Medical_Specialization,City) LIKE '%".$valueToSearch."%'";
                                    $result = filterRecord($query);


                                  
                                }

                                else

                                {
                                   
                                    $query='SELECT * FROM doctor_record ORDER BY Doctor_ID DESC LIMIT ' . $this_page_first_result . ',' .  $results_per_page; 
                                    $result = filterRecord($query);
                                    

                                } 
                                

                                function filterRecord($query)

                                {

                                    include ('config.php');

                                        
                                    
                                    $filter_result = mysqli_query($connect, $query);
                                    
                                   
                                    
                                    return $filter_result; 
                                  
              
                                 

                                
                                   
                                } 

                            
                                


                        while($row = mysqli_fetch_array($result)):?>
                            
                            <div class="col-lg-10 pt-2 pb-4 hvr-bounce-in" id="doctors-list">   
                                <div class="card" style="border-radius: 30px;">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="card mx-2 mt-2 mb-2"  style="border-radius: 30px;">
                                                <div class="card-img d-flex justify-content-center py-4 px-2 pt-2 pb-2">
                                                    <img src="Doctor_uploads/<?php echo $row['Photo']; ?> " style="width:350px; height:350px;" class="rounded-circle img-fluid"  alt="Doctor" 
                                                    style="border-radius: 15px;">
                                                </div>

                                            </div>
                                        </div>   
                                        <div class="col-lg-7">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h3 class="mt-3 fw-bold"> Dr. <?php echo $row['FirstName']; ?> <?php echo $row['LastName']; ?></h3> 

                                                    </div>

                                                    <div class="col-md-6">

                                                        <p class="mt-3 fw-bold" >
                                                        <?php

                                                            $User_status = $row['User_status']; 

                                                            if($User_status == "Active"){
                                                                ?>
                                                                   Active  <span style='color:green; font-size:25px;"'>●</span>

                                                                <?php
                                                               
                                                            }else{
                                                                ?>
                                                                   Inactive  <span style='color:red; font-size:25px;'>●</span>

                                                                <?php
                                                            }


                                                        ?>
                                                        </p>
                                                    </div>
                                                    

                                                </div>
                                               



                                                <h5 class="  mb-2 pb-1" style="color: #2b2a2a;"><?php echo $row['Medical_Specialization']; ?></h5>
                                                <p class="mt-3 fw-bold"><?php echo $row['Province']; ?>, <?php echo $row['City']; ?></p>

                                                <p class="mt-3 "> Preffered Consultation time: 
                                                    <?php
                                                    
                                                     $time1 = $row['Start_Time'];
                                                     $timestamp = strtotime($time1);
                                                     $formatted_time = date("h:i A", $timestamp);  
                                                     echo $formatted_time;

                                                     ?> 
                                                    
                                                    to  
                                                    
                                                    <?php 
                                                    
                                                    $time2 = $row['End_Time']; 
                                                    $timestamp2 = strtotime($time2);
                                                    $formatted_time2 = date("h:i A", $timestamp2);  
                                                    echo $formatted_time2;
                                                    ?>
                                                    </p>
                                                <div class="d-flex justify-content-start rounded-3 p-2 mb-2"
                                                    style="background-color: #efefef;">
                                                    <div>
                                                        <p class=" text-muted mb-1">Total Patients</p>
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
                        <?php endwhile; ?>

                   
            

                        <nav class="d-flex justify-content-center">
                            
                            <ul class="pagination pt-4">
                                 <span aria-hidden="true">&laquo;</span>
                                <li class="page-item">
                                <?php
                                for ($page=1;$page<=$number_of_pages;$page++):?>
                                    <a href="Patient-findadoctor.php?page=<?php echo $page?>"><?php echo $page?></a>
                                <?php endfor; ?>

                                </li>
                                <span aria-hidden="true">&raquo;</span>
                            </ul>

                        </nav>           
                        
                            

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
