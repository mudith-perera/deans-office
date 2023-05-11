<!--====================== DB Config Start ===================-->
<?php

session_start();


// Show PHP errors
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once 'classes/crud.php';

$objCrud = new Crud();

$username="";
$password ="";
$user_type="";
$user_department="";
$userNotFound ="";

if(isset($_POST['login_submit'])){
	$_SESSION['fullname']=$objCrud->getName($_POST['username']);
	
    $username = strip_tags($_POST['username']);
	$password = strip_tags($_POST['password']);

    $check_val = $objCrud->checkUserExcistance($username,$password);
    
	$_SESSION['username']=$check_val;
	
    if ($check_val != null) {
        $user_type = $objCrud->getUserType($username);
        $_SESSION['userType']=$user_type;
		$user_department = $objCrud->getUserDepartment($username);
        $_SESSION['userDept']=$user_department;
		$objCrud->setCurrentUser($username);

		if ($user_type == "admin") {
			header("Location: views/01.Admin/adminPanel.php");
			die();
		}elseif ($user_type == "dean") {
			header("Location: views/02.Dean/deanWelcome.php");
			die();
		}elseif ($user_type == "department head") {
			header("Location: views/03.Dept Head/deptHeadWelcome.php");
			die();
		}elseif ($user_type == "academic") {
			header("Location: views/04.Academic/academicWelcome.php");
			die();
		}else{
			header("Location: views/05.Acc Supp/academicSuppWelcome.php");
			die();
		}
	}else {
        $userNotFound = "Incorrect Username or Password!";
        session_unset();
        session_destroy();
        //print_r($userNotFound);
    }
}
?>

<!--====================== DB Config End ===================-->



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->

</head>

<body>


    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="images/img-01.png" alt="IMG">
                </div>

                <form class="login100-form validate-form " id="loginForm" method="post" action="">
                    <span class="login100-form-title">
                        Member Login
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid Username is required!">
                        <input class="input100" type="text" name="username" placeholder="Username" autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password"
                            autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <input type="hidden" value="value" name="user_name">
                    <!-- <div class="text-center">
						<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
							<div class="btn-group mr-2" role="group" aria-label="First group">
								<button type="button" onclick="setRoute(document.getElementById('admin').value)" name="btnAdmin" id="admin" class="btn btn-secondary" value="admin"><small>Admin</small></button>
								<button type="button" onclick="setRoute(document.getElementById('dean').value)" name="btnDean" id="dean" class="btn btn-secondary" value="dean"><small>Dean</small></button>
								<button type="button" onclick="setRoute(document.getElementById('hod').value)" name="btnHod" id="hod" class="btn btn-secondary" value="hod"><small>HOD</small></button>
								<button type="button" onclick="setRoute(document.getElementById('ac').value)" name="btnAc" id="ac" class="btn btn-secondary" value="ac"><small>AC</small></button>
								<button type="button" onclick="setRoute(document.getElementById('ac-sup').value)" name="btnAc-sup" id="ac-sup" class="btn btn-secondary" value="ac-sup"><small>NON-AC</small></button>
							</div>
						</div>
					</div> -->


                    <div>
                        <?php echo '<p style="color:red;text-align:center;">'.$userNotFound.'</p>' ?>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" name="login_submit">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-100">
                        <small><a href="views/passwordResetEmail.php">Forgot Passowrd?</a></small>
                    </div>

                    <!-- <div class="text-center ">
                        <small>University Of Ruhuna</small>
                    </div> -->
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>