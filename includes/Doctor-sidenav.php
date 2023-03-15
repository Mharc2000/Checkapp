<div id="layoutSidenav_nav">
    
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <hr class="dropdown-divider bg-dark" />
                <a id="nav-hover" href="Doctor-dashboard.php" class="nav-link fw-bold"><div class="sb-nav-link-icon"><i 
                        class="fas fa-tachometer-alt"></i></div>My Dashboard</a>
                <hr class="dropdown-divider bg-dark" />
                <a  id="nav-hover" href="Doctor-patients.php" class="nav-link fw-bold"><div class="sb-nav-link-icon"><i
                        class="fa fa-user-md me-2"></i></div>My Patient</a>
                <hr class="dropdown-divider bg-dark" />
                <a  id="nav-hover" href="Doctor-MyInvitations.php" class="nav-link fw-bold"><div class="sb-nav-link-icon"><i
                        class="fa fa-user-md me-2"></i></div>My Invitation</a>
                <hr class="dropdown-divider bg-dark" />
                <a id="nav-hover" href="#" class="nav-link fw-bold"><div class="sb-nav-link-icon"><i
                        class="fa fa-comment me-2"></i></div>Chat</a>
                <hr class="dropdown-divider bg-dark" />
                <a id="nav-hover" href="#" class="nav-link fw-bold"><div class="sb-nav-link-icon"><i
                        class="fa fa-paperclip me-2"></i></div>Reports</a>
                <hr class="dropdown-divider bg-dark" />
                <a id="nav-hover" href="Doctor-logout.php" class="nav-link fw-bold"><div class="sb-nav-link-icon"><i
                        class="fa fa-sign-out me-2"></i></div>Logout</a>
                <hr class="dropdown-divider bg-dark" />

                
              
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php
                $query = "SELECT * FROM doctor_record WHERE Doctor_ID = '$Doctor_ID'";  
                $result = mysqli_query($connect, $query); 
                while($row = mysqli_fetch_array($result)):?>
                <p style="color: #019401;" class="fw-bold"> Dr. <?php echo $row['FirstName']; ?> <?php echo $row['LastName']; ?></p>
            <?php endwhile; ?>
        </div>
    </nav>

</div>