<nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#">
                <img class="logo" src="img/logo.jpg" alt="">
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
          

            <ul class="navbar-nav  ms-auto me-0">
                <li class="nav-item dropdown">
                    <a class="nav-link" id="notifications" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        
                        <?php
                        $Patient_ID = $_SESSION['Patient_ID'];
                        $sql = "SELECT * FROM invitation_record WHERE Invitation_Status = 0 AND Patient_ID='$Patient_ID'";
                        $res = mysqli_query($connect, $sql); 
                        
                        ?>
                        
                        <span class="badge rounded-pill badge-notification bg-danger count"><?php echo mysqli_num_rows($res); ?></span>


                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <?php

                        $Patient_ID = $_SESSION['Patient_ID'];

                        $query = "SELECT * FROM invitation_record WHERE Patient_ID = '$Patient_ID' ORDER BY Invitation_ID DESC LIMIT 5";  
                        $result = mysqli_query($connect, $query);
                        while($row = mysqli_fetch_array($result)):?>
                            <li><hr class="dropdown-divider" /></li>
                            <li>
                            <a class="dropdown-item" href="Patient-MyInvitation.php"><img src="Doctor_uploads/<?php echo $row['Doctor_photo']; ?> " alt="" class="rounded-circle py-2 px-2 " width="50" height="50"> Dr. <?php echo $row['Doctor_Name'];?>
                            <br>

                            Google Meet link invitation !! ID:<?php echo $row['Invitation_ID'];?></a>
                            </li>
                            
                        <?php endwhile; ?>
                        
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <a class="dropdown-item" href="#"><?php echo mysqli_num_rows($res); ?> New Notification </a>
                        </li>
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
                        <li><a class="dropdown-item" href="#!">My Account</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="Patient-logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
        $("#notifications").on("click", function() {
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
    
    <script>
        function autoRefresh() {
            $('#count').load(location.href + ' #count');
        }
        setInterval('autoRefresh()', 1000);
    </script>