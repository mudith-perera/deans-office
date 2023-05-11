<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

echo '
<nav class="navbar navbar-expand-md navbar-dark bg-success z">
        <div class="d-flex navContent order-0">
            <a class="navbar-brand mr-1" href="./../02.Dean/deanWelcome.php">
                <h3><i class="fas fa-user-tie" style="margin: 0 10px 0 0;"></i>Dean  <br><span style="font-size:1rem;">Dr. '.ucwords($_SESSION['fullname']).'</span></h3>
            </a>
            <button class="navbar-toggler text-center" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                <span class="navbar-toggler-icon "></span>
            </button>
        </div>
        <div class="navbar-collapse collapse text-center justify-content-center mt-2  order-2" id="collapsingNavbar">
            <ul class="navbar-nav mx-auto">

                <li class="nav-item mx-4">
                    <a class="nav-link text-light academicDetails" href="./../data_input/menu.php">
                        <p> Academic Details</p>
                    </a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link text-light staffDetails" href="./../02.Dean/staffSearch.php">
                        <p>Staff Details</p>
                    </a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link text-light updatePersonalInfo" href="./../02.Dean/updatePersonalInfoDean.php">
                        <p>Update Personal Info</p>
                    </a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link text-light report" href="./../reports/reportHome.php">
                        <p>Report</p>
                    </a>
                </li>

            </ul>
            <ul class="nav navbar-nav flex-row justify-content-center flex-nowrap">
                            <li class="nav-item mr-2"><a class="nav-link" href="./../../includes/logout.php"><i class="fas fa-lg fa-sign-out-alt"></i></i></a> </li>
                            
                        </ul>
        </div>
        
        
    </nav>
';
?>