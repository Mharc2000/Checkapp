<nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 fw-bold" href="#">
                <img class="round-circle" width="50px" height="50px" src="img/logo.png" alt="">
                <span style="color:#1c9e05;">Check</span>App
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <ul class="navbar-nav  ms-auto me-0">

                <li class="nav-item dropdown">
                    <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell" style="color:green;"></i>
                    
                        <span class="badge rounded-pill badge-notification bg-success" id="notify_count"></span>
        

                    </a>
                  
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" id="notify"> 

                    </ul>
                    

                </li>

            </ul>

            <!-- Navbar-->
            <ul class="navbar-nav  ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php
                        $query = "SELECT * FROM doctor_record WHERE Doctor_ID = '$Doctor_ID'";  
                        $result = mysqli_query($connect, $query);  
                        while($row = mysqli_fetch_array($result)):?>
                        <img src="Doctor_uploads/<?php echo $row['Photo'];?>" alt="" class="rounded-circle" width="30" height="30"> 
                    <?php endwhile; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <?php
                        $query = "SELECT * FROM doctor_record WHERE Doctor_ID = '$Doctor_ID'";  
                        $result = mysqli_query($connect, $query);  
                        while($row = mysqli_fetch_array($result)):?>
                        <li><a class="dropdown-item" href=""><img src="Doctor_uploads/<?php echo $row['Photo']; ?>" alt="" class="rounded-circle py-2 px-2 " width="50" height="50"><?php echo $row['FirstName']; ?> <?php echo $row['LastName']; ?></a></li>
                        <?php endwhile; ?>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                        <?php
                           
                         if (isset($_POST['logout'])) {

                           


                            $inactive = mysqli_real_escape_string($connect, $_POST['user-status']);

                            $status = mysqli_query ($connect,"UPDATE doctor_record SET User_status ='$inactive' WHERE Doctor_ID = '$Doctor_ID'");
                            if($status){
                                ?>

                                <script>

                                    swal({
                                        title: "Are you sure?",
                                        text: "You will be logged out!",
                                        icon: "warning",
                                        buttons: true,
                                        buttons: ['No', 'yes'],
                                        dangerMode: true,
                                        }).then((success)=>{
                                            if(success){
                                                window.location.href='Doctor-logout.php';
                                            }else{
                                                swal("Cancelled", "You are still logged in :)", "error");
                                            }
                                        });
                                        
                                </script>

                                <?php
                            }
                         }
                        ?>
                            <div class="d-flex justify-content-center">
                                
                                <form action="" method="POST">
                                    <input type="hidden" name="user-status" value="inactive">
                                    <button class = "btn btn-sm btn-outline-success" name="logout"><i class="fa-solid fa-right-from-bracket"></i> logout</button> 
                                </form>
                            </div>
                          
                           
                        
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
        $("#notify").on("click", function() {
            $.ajax({
            url: "Doctor-read-notification.php",
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
        xhttp.open("GET", "Doctor-Count-Bell.php", true);
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
        xhttp.open("GET", "Doctor-Notify-display.php", true);
        xhttp.send();

        },1000);


        }
        loadDoc();
    </script>

 