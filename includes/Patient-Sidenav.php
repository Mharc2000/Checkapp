<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <hr class="dropdown-divider bg-dark" />
                            <a id="nav-hover" class="nav-link fw-bold" href="Patient-dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Home
                            </a>
                            <hr class="dropdown-divider bg-dark" />
                            <a id="nav-hover" href="Patient-findadoctor.php" class="nav-link fw-bold"><div class="sb-nav-link-icon"><i
                                    class="fa fa-user-md me-2"></i></div>Find a doctor</a>
                            <hr class="dropdown-divider bg-dark" />
                            <a id="nav-hover" href="Patient-Consultations.php" class="nav-link fw-bold"><div class="sb-nav-link-icon"><i 
                                    class="fa-solid fa-laptop-medical"></i></div> My Appointment</a>
                            <hr class="dropdown-divider bg-dark" />
                            <a id="nav-hover" href="Patient-Medication-table.php" class="nav-link fw-bold"><div class="sb-nav-link-icon"><i 
                                    class="fa-solid fa-file-prescription"></i></div>My Medication</a> 
                            <hr class="dropdown-divider bg-dark" />
                            <a id="nav-hover" href="Patient-MyInvitation.php" class="nav-link fw-bold"><div class="sb-nav-link-icon"><i 
                                    class="fa-solid fa-video"></i></div>Meet Invitations</a>
                            <hr class="dropdown-divider bg-dark" />


                            <a class="nav-link collapsed fw-bold" id="nav-hover" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-clinic-medical"></i></div>
                                Pharmacy
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div  class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    
                 
                                    <a class="nav-link fw-bold" id="nav-hover" href="Patient-Pharmacy.php"><div class="sb-nav-link-icon"><i class="fa-solid fa-capsules"> </i> </div> Buy Medicine</a>
                                    <a class="nav-link fw-bold" id="nav-hover" href="Patient-Cart.php"><div class="sb-nav-link-icon"><i class="fa-solid fa-cart-shopping"></i></div> My Cart</a>
                                    <a class="nav-link fw-bold" id="nav-hover" href="Patient-Orders.php"><div class="sb-nav-link-icon"><i class="fa-solid fa-bag-shopping"></i></div> My Purchase</a>
            
                                </nav>
                            </div>
                            <hr class="dropdown-divider bg-dark" />
                            <a id="nav-hover" href="#" class="nav-link fw-bold"><div class="sb-nav-link-icon"><i
                                    class="fa fa-paperclip me-2"></i></div>Reports</a>
                            <hr class="dropdown-divider bg-dark" />
                        
                        </div>

                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php
                            $query = "SELECT * FROM patient_record WHERE Patient_ID = '$Patient_ID'";  
                            $result = mysqli_query($connect, $query); 
                            while($row = mysqli_fetch_array($result)):?>
                            <p style="color: #019401;" class="fw-bold"><?php echo $row['FirstName']; ?> <?php echo $row['LastName']; ?></p>
                        <?php endwhile; ?>
                    </div>
                </nav>
            </div>

           