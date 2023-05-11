<!--====================== DB Config Start ===================-->
<?php
require_once("./../../includes/sessions.php");
// Show PHP errors
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once '../../classes/crud.php';

$objCrud = new Crud();


$old_username="";
$name ="";
$user_type="User Type";
$user_department="Department";
$user_email="";
$user_email="";
$epf_no="";
$user_Nid="";
$user_mobile="";
$user_address="Enter address here...";
$user_gender="";
$option1="checked";
$option2="";
if(isset($_POST['update_search'])){
    $username   = strip_tags($_POST['username_search']);
    $old_username = $objCrud->getUsername($username);
    $name = ucwords($objCrud->getName($username));
    $user_type = $objCrud->getUserType($username);
    $user_department = $objCrud->getUserDepartment($username);
    $user_email = $objCrud->getUserEmail($username);
    $epf_no = $objCrud->getEpfNo($username);
    $user_Nid = $objCrud->getUserNationalId($username);
    $user_mobile = $objCrud->getUserMobile($username);
    $user_address = $objCrud->getUserAddress($username);
    $user_gender = $objCrud->getUserGender($username);

    if ($user_gender == "male") {
        $option1="checked";
    }else{
        $option2="checked";
    }
    if($old_username==""){
        $_SESSION['ErrorMessage']=" User doesn't exists ! ";
    }
}


if(isset($_POST['update_user'])){
    $username   = strtolower(strip_tags($_POST['username']));
    $old_username = $objCrud->getUsername($username);
    //$password  = strip_tags($_POST['password']);
    $fullname  = strtolower(strip_tags($_POST['name']));
    $user_type  = strtolower(strip_tags($_POST['user_type']));
    $user_department  = strtolower(strip_tags($_POST['department']));
    $user_email  = strtolower(strip_tags($_POST['email']));
    $epf_no  = strtolower(strip_tags($_POST['epf']));
    $user_national_id  = strtolower(strip_tags($_POST['id']));
    $user_mobile  = strtolower(strip_tags($_POST['mobile']));
    $user_address  = strtolower(strip_tags($_POST['address']));
    $user_gender  = strtolower(strip_tags($_POST['sex']));

    if ($username != null) {
        if ($objCrud->adminUpdate($username,$fullname,$user_type,$user_department,$user_email,$epf_no,$user_national_id,$user_mobile,$user_address,$user_gender)) {
            //add an alert "success"

            $_SESSION['SuccessMessage']=" User Updated Successfully !";
           // header('Location: '.$_SERVER['REQUEST_URI']);
            $page = $_SERVER['PHP_SELF'];
            $sec = "3";
            header("Refresh: $sec; url=$page");
        }else{
            //add an alert "error"
            
            $_SESSION['ErrorMessage']=" User update  error ! ";
        }
    }else{
        //add an alert "please enter username"
        
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

include_once("../../includes/header.php"); headerHtml("updateUser"); ?>

<!--====================== Header PHP End =====================-->



<section class="navigation">

    <!--====================== Admin Navbar PHP Start ===================-->

    <?php include_once("../../includes/01.Admin/adminNavbar.php"); ?>

    <!--====================== Admin Navbar PHP End ===================-->

</section>
<!--====================== Component PHP Strat ===================-->

<?php require_once("../../includes/components.php") ?>

<!--======================= Component PHP End ====================-->

<section class="content">
    <?php 
        echo SuccessMessage();
        echo ErrorMessage();
    
    ?>
    <!--==================== modal start ======================== -->

    <!--############### search box start ###################-->
    <form action="" method="POST">
        <div class="row mb-5">
            <div class="col-lg-3"></div>
            <div class="col-lg-4">
                <?php inputField("text","username_search","Enter Login Username to search","",""); ?>

            </div>
            <div class="col-lg-2">
                <?php searchButton("update_search"); ?>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </form>
    <!--############### search box end ###################-->

    <form action="#" method="POST">

        <div class="container-fluid text-center  py-2 px-4">



            <!--==================== Input Fields start =========================== -->

            <!-- 01. LOGIN USERNAME & NAME OF THE USER -->
            <div class="row p-4 mt-5">
                <div class="col-lg-2">

                    <?php label("username","Login UserName") ?>
                </div>
                <div class="col-lg-4 ">
                    <?php inputField("text","username","Enter Login Username here...",$old_username,"readonly"); ?>
                </div>

                <div class="col-lg-2">
                    <?php label("name","Name") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php inputField("text","name","Enter Name here...",$name,""); ?>
                </div>
            </div>

            <!-- ---------------------------------------- -->

            <!-- 02. Password & Retype Password -->


            <!-- ---------------------------------------- -->

            <!-- 03. User Type & User Departmrnt -->
            <div class="row p-4">
                <div class="col-lg-2">

                    <?php label("user_type","User Type") ?>
                </div>
                <div class="col-lg-4 ">
                    <?php 
                        dropdownHead("User Type","user_type","userType","userType",$user_type);
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
                        dropdownHead("department","department","dept","",$user_department);
                    ?>

                    <a class="dropdown-item" onclick="setDepartment('Computer Science')" href="#">Computer Science</a>
                    <a class="dropdown-item" onclick="setDepartment('Mathematics')" href="#">Mathematics</a>
                    <a class="dropdown-item" onclick="setDepartment('Physics')" href="#">Physics</a>
                    <a class="dropdown-item" onclick="setDepartment('Chemistry')" href="#">Chemistry</a>
                    <a class="dropdown-item" onclick="setDepartment('Botny')" href="#">Botny</a>
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
                    <?php inputField("email","email","Enter Email here...",$user_email,""); ?>
                </div>

                <div class="col-lg-2">
                    <?php label("epf","EPF No") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php inputField("number","epf","Enter EPF No here...",$epf_no,""); ?>
                </div>
            </div>

            <!-- ---------------------------------------- -->
            <!-- 05. National ID & Mobile -->
            <div class="row p-4">
                <div class="col-lg-2">
                    <?php label("id","National Id") ?>
                </div>
                <div class="col-lg-4 ">
                    <?php inputField("text","id","Enter National ID No here...",$user_Nid,""); ?>
                </div>

                <div class="col-lg-2">
                    <?php label("mobile","Mobile") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php inputField("number","mobile","Enter Mobile No here...",$user_mobile, 'maxlength="10"'); ?>
                </div>
            </div>

            <!-- ---------------------------------------- -->
            <!-- 06. Address & Sex -->
            <div class="row p-4">
                <div class="col-lg-2">
                    <?php label("address","Address") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php textarea("address",30,5,$user_address,""); ?>
                </div>

                <div class="col-lg-2">
                    <?php label("sex","Sex") ?>


                </div>
                <div class="col-lg-2 ">

                    <!-- ########### radio Button Male ########-->
                    <?php customRadioButton("Male","sex",$option1,"male"); ?>
                    <!-- ################################## -->

                </div>
                <div class="col-lg-2 ">

                    <!-- ########### radio Button Female ########-->
                    <?php customRadioButton("Female","sex",$option2,"female"); ?>
                    <!-- ################################## -->

                </div>


            </div>

            <!-- ---------------------------------------- -->



            <!--==================== Input Fields End =========================== -->


            <!--================== update  Button Start ===================-->
            <div class="row mt-5">
                <div class="col-lg-5"></div>
                <div class="col-lg-2">
                    <?php submitButton("update_user","fas fa-user-edit"," Update "); ?>
                </div>
                <div class="col-lg-5"></div>
            </div>
            <!--================== update Buttons End ===================-->
        </div>

    </form>
</section>



<!--====================== Footer PHP Start ===================-->

<?php include_once("../../includes/footer.php"); ?>

<!--====================== Footer PHP End ===================-->