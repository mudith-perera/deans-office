<!--====================== DB Config start ===================-->
<?php

require_once("./../../includes/sessions.php");


// Show PHP errors
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once '../../classes/crud.php';

$objCrud = new Crud();

//POST
if(isset($_POST['add-user'])){
    $username   = strtolower(strip_tags($_POST['username']));
    $password  = strtolower(strip_tags($_POST['password']));
    $fullname  = strtolower(strip_tags($_POST['name']));
    $user_type  = strtolower(strip_tags($_POST['user_type']));
    $user_department  = strtolower(strip_tags($_POST['department']));
    $user_email  = strtolower(strip_tags($_POST['email']));
    $epf_no  = strtolower(strip_tags($_POST['epf']));
    $user_national_id  = strtolower(strip_tags($_POST['id']));
    $user_mobile  = strtolower(strip_tags($_POST['mobile']));
    $user_address  = strtolower(strip_tags($_POST['address']));
    $user_gender  = strtolower(strip_tags($_POST['sex']));
    try{
        if($username == null){
            $_SESSION['SuccessMessage']=" Please Enter Username !";
        }else{
            if($objCrud->insert($username, $password, $fullname, $user_type, $user_department, $user_email, $epf_no, $user_national_id, $user_mobile, $user_address, $user_gender)){
                $_SESSION['SuccessMessage']=" User Added Successfully !";
            }else{
                $_SESSION['ErrorMessage']=" User already exists ! ";
            }
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}


?>
<!--====================== DB Config End ===================-->


<!--====================== Header PHP Start ===================-->

<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
}  
include_once("../../includes/header.php"); headerHtml("addUser"); ?>

<!--====================== Header PHP End =====================-->



<section class="navigation">

    <!--====================== Admin Navbar PHP Start ===================-->

    <?php include_once("../../includes/01.Admin/adminNavbar.php"); ?>

    <!--====================== Admin Navbar PHP End ===================-->

    <?php require_once("../../includes/components.php") ?>

</section>

<section class="content">
    <?php 
        echo SuccessMessage();
        echo ErrorMessage();
    
    ?>
    <form action="#" method="POST">

        <div class="container-fluid text-center  py-2 px-4">
            <!--==================== Input Fields start =========================== -->

            <!--==================== modal start ======================== -->
            <!-- Modal -->
            <div class="modal fade" id="passwordErr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h3 class="text-danger">Passwords doesn't match <i class="fas fa-exclamation-triangle"></i>
                            </h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>

            <!--==================== modal end ======================== -->



            <!-- 01. LOGIN USERNAME & NAME OF THE USER -->
            <div class="row p-4">
                <div class="col-lg-2">

                    <?php label("username","Login UserName") ?>
                </div>
                <div class="col-lg-4 ">
                    <?php inputField("text","username","Enter Login Username here...","",""); ?>
                </div>

                <div class="col-lg-2">
                    <?php label("name","Name") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php inputField("text","name","Enter Name here...","",""); ?>
                </div>
            </div>

            <!-- ---------------------------------------- -->

            <!-- 02. Password & Retype Password -->
            <div class="row p-4">
                <div class="col-lg-2">
                    <?php label("password","Password") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php inputField("password","password","Enter Password here...",""," id='psw' "); ?>
                </div>

                <div class="col-lg-2">

                    <?php label("retype_password","Retype Password") ?>
                </div>
                <div class="col-lg-4 ">
                    <?php inputField("password","retype_password","Retype Password here...",""," id='rePsw' "); ?>
                </div>
            </div>

            <!-- ---------------------------------------- -->

            <!-- 03. User Type & User Departmrnt -->
            <div class="row p-4">
                <div class="col-lg-2">

                    <?php label("user_type","User Type") ?>
                </div>
                <div class="col-lg-4 ">
                    <?php 
                        dropdownHead("User Type","user_type","userType","","");
                    ?>

                    <a class="dropdown-item" onclick="setUserType('Admin')" href="#">Admin</a>
                    <a class="dropdown-item" onclick="setUserType('Dean')" href="#">Dean</a>
                    <a class="dropdown-item" onclick="setUserType('Department Head')" href="#">Department Head</a>
                    <a class="dropdown-item" onclick="setUserType('Academic')" href="#">Academic</a>
                    <a class="dropdown-item" onclick="setUserType('Academic Support')" href="#">Academic Support</a>

                    <?php
                        dropdownFooter();
                    ?>
                </div>

                <div class="col-lg-2">
                    <?php label("department","Department") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php 
                        dropdownHead("Department","department","dept","","");
                    ?>

                    <a class="dropdown-item" onclick="setDepartment('Computer Science')" href="#">Computer Science</a>
                    <a class="dropdown-item" onclick="setDepartment('Mathematics')" href="#">Mathematics</a>
                    <a class="dropdown-item" onclick="setDepartment('Physics')" href="#">Physics</a>
                    <a class="dropdown-item" onclick="setDepartment('Chemistry')" href="#">Chemistry</a>
                    <a class="dropdown-item" onclick="setDepartment('Botny')" href="#">Botany</a>
                    <a class="dropdown-item" onclick="setDepartment('Zoology')" href="#">Zoology</a>

                    <?php
                        dropdownFooter();
                    ?>
                </div>
            </div>

            <!-- ---------------------------------------- -->

            <!-- 04. Email & EPF Number -->
            <div class="row p-4">
                <div class="col-lg-2">
                    <?php label("email","Email") ?>
                </div>
                <div class="col-lg-4 ">
                    <?php inputField("email","email","Enter Email here...","",""); ?>
                </div>

                <div class="col-lg-2">
                    <?php label("epf","EPF No") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php inputField("number","epf","Enter EPF No here...","",""); ?>
                </div>
            </div>

            <!-- ---------------------------------------- -->
            <!-- 05. National ID & Mobile -->
            <div class="row p-4">
                <div class="col-lg-2">
                    <?php label("id","National Id") ?>
                </div>
                <div class="col-lg-4 ">
                    <?php inputField("text","id","Enter National ID No here...","",""); ?>
                </div>

                <div class="col-lg-2">
                    <?php label("mobile","Mobile") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php inputField("number","mobile","Enter Mobile No here...","",' maxlength="10"'); ?>
                </div>
            </div>

            <!-- ---------------------------------------- -->
            <!-- 06. Address & Sex -->
            <div class="row p-4">
                <div class="col-lg-2">
                    <?php label("address","Address") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php textarea("address",30,5,"Enter address here...",""); ?>
                </div>

                <div class="col-lg-2">
                    <?php label("sex","Sex") ?>


                </div>
                <div class="col-lg-2 ">

                    <!-- ########### radio Button Male ########-->
                    <?php customRadioButton("Male","sex","checked","male"); ?>
                    <!-- ################################## -->

                </div>
                <div class="col-lg-2 ">

                    <!-- ########### radio Button Female ########-->
                    <?php customRadioButton("Female","sex","","female"); ?>
                    <!-- ################################## -->

                </div>


            </div>

            <!-- ---------------------------------------- -->



            <!--==================== Input Fields End =========================== -->

            <!--================== Submit & Reset Buttons Start ===================-->
            <div class="row mt-5">
                <div class="col-lg-4"></div>
                <div class="col-lg-2">
                    <?php submitButton("add-user","fas fa-user-plus","Add "); ?>
                </div>
                <div class="col-lg-2">
                    <?php resetButton("clear","fas fa-times","Clear"); ?>
                </div>
                <div class="col-lg-4"></div>
            </div>
            <!--================== Submit & Reset Buttons End ===================-->
        </div>

    </form>
</section>



<!--====================== Footer PHP Start ===================-->

<?php include_once("../../includes/footer.php"); ?>

<!--====================== Footer PHP End ===================-->