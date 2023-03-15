<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
            
                            <hr class="dropdown-divider bg-dark" />
                            <a id="nav-hover" href="Pharmacy-dashboard.php" class="nav-link fw-bold"><div class="sb-nav-link-icon"><i 
                                    class="fas fa-tachometer-alt"></i></div>My Dashboard</a>

                                <hr class="dropdown-divider bg-dark" />
                            <a id="nav-hover" href="Pharmacy-Product.php" class="nav-link fw-bold"><div class="sb-nav-link-icon"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                            <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                            </svg>     
                                </div>Medicines</a>

                                <hr class="dropdown-divider bg-dark" />
                            <a id="nav-hover" href="Pharmacy-Orders.php" class="nav-link fw-bold"><div class="sb-nav-link-icon"> 
                            <i class="fa-solid fa-cart-shopping"></i>
                                </div>Orders</a>
                          
                          
                            <hr class="dropdown-divider bg-dark" />
                            <a id="nav-hover" href="Pharmacy-logout.php" class="nav-link fw-bold"><div class="sb-nav-link-icon"><i
                                    class="fa fa-sign-out me-2"></i></div>Logout</a>
                            <hr class="dropdown-divider bg-dark" />
          
                           
                          
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php
                            $Pharmacy_ID = $_SESSION['Pharmacy_ID'];
                            $query = "SELECT * FROM pharmacy_record WHERE Pharmacy_ID = '$Pharmacy_ID'";  
                            $result = mysqli_query($connect, $query); 
                            while($row = mysqli_fetch_array($result)):?>
                            <p style="color: #019401;" class="fw-bold"> </br><?php echo $row['Pharmacy_Name']; ?></p>
                        <?php endwhile; ?>
                    </div>
                </nav>
            </div>