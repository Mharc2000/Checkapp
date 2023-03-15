<nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 fw-bold" href="#">
                <img class="round-circle" width="50px" height="50px" src="img/logo.png" alt="">
                <span style="color:#1c9e05;">Check</span>App
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item dropdown">
                    <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell" style="color:green;"></i>
                    
                        <span class="badge rounded-pill badge-notification bg-success count" id="notify_count" ></span>
        

                    </a>
                  
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" id="notify" style="width: 400px;"> 
                      

                    </ul>
                    

                </li>
                

            </ul>

            <!-- Navbar-->
            <ul class="navbar-nav  ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php
                        $Pharmacy_ID = $_SESSION['Pharmacy_ID'];
                        $query = "SELECT * FROM pharmacy_record WHERE Pharmacy_ID = '$Pharmacy_ID'";  
                        $result = mysqli_query($connect, $query);  
                        while($row = mysqli_fetch_array($result)):?>
                        <img src="Pharmacy-upload/<?php echo $row['Photo'];?>" alt="" class="rounded-circle" width="30" height="30"> 
                    <?php endwhile; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <?php
                        $Pharmacy_ID = $_SESSION['Pharmacy_ID'];
                        $query = "SELECT * FROM pharmacy_record WHERE Pharmacy_ID = '$Pharmacy_ID'";  
                        $result = mysqli_query($connect, $query);  
                        while($row = mysqli_fetch_array($result)):?>
                        <li><a class="dropdown-item" href=""><img src="Pharmacy-upload/<?php echo $row['Photo']; ?>" alt="" class="rounded-circle py-2 px-2 " width="50" height="50"><?php echo $row['Pharmacy_Name']; ?></a></li>
                        <?php endwhile; ?>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="Pharmacy-logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
        $("#notify").on("click", function() {
            $.ajax({
            url: "Pharmacy-Read-notification.php",
            success: function(res) {
                console.log(res);
            }
            });
        });
        });
    </script>


    <script type="text/javascript">
        function loadDoc() {
        

        setInterval(function(){

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("notify_count").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "Pharmacy_count_bell.php", true);
        xhttp.send();

        },1000);


        }
        loadDoc();
    </script>


    <script type="text/javascript">
        function loadDoc() {
    
        setInterval(function(){

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("notify").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "Pharmacy_notify_display.php", true);
        xhttp.send();

        },1000);


        }
        loadDoc();
    </script>

 