
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
        <title>Checkapp - Pharmacy</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
		<link href="css/hover.css" rel="stylesheet" media="all">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
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

        <?php include('includes/Patient-nav-cart.php');?>
        <?php include('includes/Patient-Sidenav.php');?>

            <div id="layoutSidenav_content">
            <main class="main">
                <div class="container-fluid">

                       

                        <?php
                        // connect to database
                        
                        include ('config.php');

                        // define how many results you want per page
                        $results_per_page = 30;

                        // find out the number of results stored in database
                        $sql='SELECT * FROM product_record';
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
                           
                            <div class="row d-flex justify-content-center">
                              
                                <div class="col pt-4 pb-2 "> 
                                        <div class="card pb-2 px-2 py-2" style="border-radius: 30px;">
                                            <form class="row" method="POST">
                                                <div class="input-group col-md-3">
                                                <input type="text"  class="form-control" name="valueToSearch"   placeholder="Search for medicines, Pharmacy, Location" />
                                                <button class="btn1" type="submit" name="search" ><i class="fa-solid fa-magnifying-glass"></i></button>
                                                </div>
                                            </form>
                                            
                                        </div>  
                                </div> 

                               
                                                            


                            </div>
                         
                            

                            
                        
                           
                            <div class="col-lg-2 mx-2 mt-3 "> 

                                <div class="card pt-2 pb-2 px-2 py-2" style="border-radius: 30px;">
                                    <h4 class="mx-2">Categories: </h4>
                                   
                                        <a href="Patient-Pharmacy.php" class="mt-2 mx-2 pb-3 "  style="text-decoration: none; text-align:center;"><div class="d-flex"><button class="btn1 flex-grow-1"> All</button></div></a>
                             
                                    <form class="pb-2 px-2 py-2" method="POST">
                                        <input type="hidden" class="btn1 mt-2" name="valueToSearch"  value="Tablet Medicine">
                                        <div class="d-flex">
                                            <button class="btn1 flex-grow-1" type="submit" name="search" >Tablet Medicine</button>
                                        </div>
                                    </form>  
                                    
                                    <form class="pb-2 px-2 py-2" method="POST">
                                        <input type="hidden" class="btn1 mt-2" name="valueToSearch"  value="Capsul Medicine">
                                        <div class="d-flex">
                                            <button class="btn1 flex-grow-1" type="submit" name="search" >Capsul Medicine</button>
                                        </div>
                                    </form> 

                                    <form class="pb-2 px-2 py-2" method="POST">
                                        <input type="hidden" class="btn1 mt-2" name="valueToSearch"  value="Liquid Medicine">
                                        <div class="d-flex">
                                        <button class="btn1 flex-grow-1" type="submit" name="search" >Liquid Medicine</button>
                                        </div>
                                    </form> 

                                    <form class="pb-2 px-2 py-2" method="POST">
                                        <input type="hidden" class="btn1 mt-2" name="valueToSearch"  value="Topical medicine">
                                        <div class="d-flex">
                                            <button class="btn1 flex-grow-1" type="submit" name="search" >Topical medicine</button>
                                        </div>
                                    </form> 

                                    <form class="pb-2 px-2 py-2" method="POST">
                                        <input type="hidden" class="btn1 mt-2" name="valueToSearch"  value="Suppositories">
                                        <div class="d-flex">
                                        <button class="btn1 flex-grow-1" type="submit" name="search" >Suppositories</button>
                                        </div>
                                    </form> 

                                    <form class="pb-2 px-2 py-2" method="POST">
                                        <input type="hidden" class="btn1 mt-2" name="valueToSearch"  value="Drops">
                                        <div class="d-flex">
                                            <button class="btn1 flex-grow-1" type="submit" name="search" >Drops</button>
                                            </div>
                                    </form> 

                                    <form class="pb-2 px-2 py-2" method="POST">
                                        <input type="hidden" class="btn1 mt-2" name="valueToSearch"  value="Inhalers">
                                        <div class="d-flex">
                                            <button class="btn1 flex-grow-1" type="submit" name="search" >Inhalers</button>
                                        </div>
                                    </form> 
                                    <form class="d-dlex b-2 px-2 py-2" method="POST">
                                        <input type="hidden" class="btn1 mt-2" name="valueToSearch"  value="Injections">
                                        <div class="d-flex">
                                            <button class="btn1 flex-grow-1" type="submit" name="search" >Injections</button>
                                        </div>
                                    </form> 
                                    

                                </div> 
                                
                            </div>

                            
                             
                        
                        <div class="col"> 
                  
                
                            <div class="row mt-3">

                            
                          
        
                            
                                <?php

                            
                                if(isset($_POST['search']))

                                        {
                                            $valueToSearch = $_POST['valueToSearch']; 
                                            $query = "SELECT * FROM product_record WHERE CONCAT(Product_Name, Product_Description, Pharmacy_Name, Product_Location, Product_Category) LIKE '%".$valueToSearch."%'";
                                            $result = filterRecord($query);
                                            
                                        
                                        }

                                        else

                                        {
                                        
                                            

                                          
                                              $query='SELECT * FROM product_record ORDER BY Product_ID DESC LIMIT ' . $this_page_first_result . ',' .  $results_per_page; 
                                              $result = filterRecord($query);

                                        } 
                                        

                                        function filterRecord($query)

                                        {

                                            include ('config.php');

                                                
                                            
                                            $filter_result = mysqli_query($connect, $query);


                                            

                                             
                                            return $filter_result; 

                                        
                                        
                                        
                                        } 

                                        if($result){

                                            ?>
                                                <div class="mx-3"><h5 class="text-white"> Number of Medicines : <?php echo mysqli_num_rows($result);?> </h5></div>
                                             
                                            <?php
                                        }
                                        

                                        
                                        
                                while($row = mysqli_fetch_assoc($result)){
                                    
                                    ?> 
                                    
                                    <div class="col-lg-3 col-sm-3 pt-2">
                                        <div class="card hvr-grow-shadow mt-3" style="border-radius: 30px;  display: flex;">
                                            
                                            <a class="text-dark text-truncate" style="border-radius: 30px; text-decoration: none;" href=""><img src="Pharmacy-upload/<?php echo $row['Pharmacy_Photo']; ?> " alt="" class="rounded-circle py-2 px-2" width="50" height="50"> <?php echo $row['Pharmacy_Name'];?></a>  
                              
                                            <div class="d-flex justify-content-center">
                                                <a href="Patient-Buy-Medicine.php?Product_ID=<?php echo $row['Product_ID'];?>" style="text-decoration: none;"><img class="card-img img-fluid" style="width:300px; height:300px;" src="Pharmacy-upload/<?php echo $row['Product_Photo']; ?> " alt="Talk to a Doctor"></a>

                                            </div>
                                            <div class="card-body overflow-hidden">
                                                <a href="Patient-Buy-Medicine.php?Product_ID=<?php echo $row['Product_ID'];?>" style="text-decoration: none;"><p class="card-title text-dark"><span class="text-truncate"><?php echo $row['Product_Name'];?></span></p></a> 
                                                <p class="card-text"> ₱<?php echo $row['Product_Price'];?> php</p>
                                                <div class="rating">
                                                    <span class="star selected">&#9733;</span>
                                                    <span class="star selected">&#9733;</span>
                                                    <span class="star selected">&#9733;</span>
                                                    <span class="star selected">&#9733;</span>
                                                    <span class="star selected">&#9733;</span>
                                                </div>
                                                <p class="text-truncate"> <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $row['Product_Location'];?></p>
                                                <input type="hidden" value="<?php echo $row['Product_Category'];?>">
                                            </div>
                                        </div>  
                                    </div>
                                    <?php

                                }


                                   
                                ?>

                            </div> 
                                

                            <nav class="d-flex justify-content-center">
                            
                                <ul class="pagination pt-4">
                                    <span aria-hidden="true">&laquo;</span>
                                    <li class="page-item">
                                    <?php
                                    for ($page=1;$page<=$number_of_pages;$page++):?>
                                        <a href="Patient-Pharmacy.php?page=<?php echo $page?>"><?php echo $page?></a>
                                    <?php endfor; ?>

                                    </li>
                                    <span aria-hidden="true">&raquo;</span>
                                </ul>

                            </nav> 

                        </div>           
                                    

                                 
                    </div>    
                            

                </main>
                <?php include('includes/App-footer.php');?>
            </div>
        </div>
        <script>
            var stars = document.getElementsByClassName("star");

            for (var i = 0; i < stars.length; i++) {
            stars[i].addEventListener("mouseover", function() {
                for (var j = 0; j < stars.length; j++) {
                if (j <= this.id.slice(-1) - 1) {
                    stars[j].classList.add("hover");
                } else {
                    stars[j].classList.remove("hover");
                }
                }
            });
            
            stars[i].addEventListener("mouseout", function() {
                for (var j = 0; j < stars.length; j++) {
                stars[j].classList.remove("hover");
                }
            });
            
            stars[i].addEventListener("click", function() {
                var rating = this.id.slice(-1);
                document.getElementById("rating").setAttribute("data-rating", rating);
                
                // Send the rating to the server using an AJAX call
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "save_rating.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert("Rating saved!");
                }
                };
                xhr.send("rating=" + rating);
            });
            }
        </script>                                    
                
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
