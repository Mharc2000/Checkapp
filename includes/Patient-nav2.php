<nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 fw-bold" href="#">
                <img class="round-circle" width="50px" height="50px" src="img/logo.png" alt="">
                <span style="color:#1c9e05;">Check</span>App
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
          
            <ul class="navbar-nav  ms-auto me-0" >

                <li class="nav-item dropdown">
                    <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell" style="color:green;"></i>
                    
                        <span class="badge rounded-pill badge-notification bg-success count" id="noti_number"></span>
        

                    </a>
                  
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" id="notify">  
                    </ul>
                    

                </li>

            </ul>
     

            <ul class="navbar-nav  ms-auto ms-md-0 me-3 me-0">
                <li class="nav-item dropdown">
                    <a class="nav-link " id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php
                        $Patient_ID = $_SESSION['Patient_ID'];
                        $query = "SELECT * FROM patient_record WHERE Patient_ID = '$Patient_ID'";  
                        $result = mysqli_query($connect, $query);
                        while($row = mysqli_fetch_array($result)):?>
                            <img src="Patient_uploads/<?php echo $row['Photo']; ?> " alt="" class="rounded-circle " width="30" height="30">
                    <?php endwhile; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <?php
                        $query = "SELECT * FROM patient_record WHERE Patient_ID = '$Patient_ID'";  
                        $result = mysqli_query($connect, $query);  
                        while($row = mysqli_fetch_array($result)):?>
                        <li><a class="dropdown-item" href="Patient-Profile.php"><img src="Patient_uploads/<?php echo $row['Photo']; ?> " alt="" class="rounded-circle py-2 px-2 " width="50" height="50"><?php echo $row['FirstName']; ?> <?php echo $row['LastName']; ?></a></li>
                        <?php endwhile; ?>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!"><i class="fa-solid fa-user"></i> My Account</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="Patient-logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
        $("#notify").on("click", function() {
            $.ajax({
            url: "Patient-Read-notfication.php",
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
            document.getElementById("noti_number").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "notify_count_bell.php", true);
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
        xhttp.open("GET", "notify_display.php", true);
        xhttp.send();

        },1000);


        }
        loadDoc();
    </script>

    <script type="text/javascript">
	//HIDE NOTIFICATION IF COUNT IS ZERO
	let divs = document.getElementsByClassName('count');

	for (let x = 0; x < divs.length; x++) {
	    let div = divs[x];
	    let content = div.innerHTML.trim();

	    if (content == '0') {
	        div.style.display = 'none';
	    }
	}
    </script>
