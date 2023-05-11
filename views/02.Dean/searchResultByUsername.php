<!--====================== DB Config Start ===================-->
<?php
// Show PHP errors
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);


if(!isset($_SESSION)) 
{ 
    session_start(); 
}


require_once '../../classes/crud.php';

$objCrud = new Crud();


$username="";
$name ="";
$user_email="";
$epf_no="";
$user_Nid="";
$user_mobile="";
$user_address="Enter address here...";


$username = $_SESSION['s_username'];
$name = $objCrud->getName($username);
$user_email = $objCrud->getUserEmail($username);
$epf_no = $objCrud->getEpfNo($username);
$user_Nid = $objCrud->getUserNationalId($username);
$user_mobile = $objCrud->getUserMobile($username);
$user_address = $objCrud->getUserAddress($username);


?>
<!--====================== DB Config End ===================-->

<!--====================== Header PHP Start ===================-->

<?php include_once("../../includes/header.php"); headerHtml("staffDetails"); ?>

<!--====================== Header PHP End =====================-->



<section class="navigation">

    <!--====================== Dean Navbar PHP Start ===================-->

    <?php include_once("../../includes/02.Dean/deanNavbar.php"); ?>

    <!--====================== Dean Navbar PHP End ===================-->

</section>
<!--====================== Component PHP Strat ===================-->

<?php require_once("../../includes/components.php") ?>

<!--======================= Component PHP End ====================-->

<section class="content">


    <form action="#" method="POST">

        <div class="container-fluid text-center  py-2 px-4">



            <!--==================== Input Fields start =========================== -->

            <!-- 01. National ID & NAME OF THE USER -->
            <div class="row p-4 mt-5">


                <div class="col-lg-2">
                    <?php label("name","Name") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php inputField("text","name","Enter Name here...",$name,"readonly"); ?>
                </div>

                <div class="col-lg-2">
                    <?php label("id","National Id") ?>
                </div>
                <div class="col-lg-4 ">
                    <?php inputField("text","id","Enter National ID No here...",$user_Nid,"readonly"); ?>
                </div>
            </div>

            <!-- ---------------------------------------- -->





            <!-- 04. Email & EPF Number -->
            <div class="row p-4">
                <div class="col-lg-2">
                    <?php label("email","Email") ?>
                </div>
                <div class="col-lg-4 ">
                    <?php inputField("email","email","Enter Email here...",$user_email,"readonly"); ?>
                </div>

                <div class="col-lg-2">
                    <?php label("epf","EPF No") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php inputField("number","epf","Enter EPF No here...",$epf_no,"readonly"); ?>
                </div>
            </div>

            <!-- ---------------------------------------- -->
            <!-- 05. Address ID & Mobile -->
            <div class="row p-4">
                <div class="col-lg-2">
                    <?php label("address","Address") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php textarea("address",30,5,$user_address," readonly"); ?>
                </div>

                <div class="col-lg-2">
                    <?php label("mobile","Mobile") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php inputField("number","mobile","Enter Mobile No here...",$user_mobile,"readonly"); ?>
                </div>
            </div>

            <!-- ---------------------------------------- -->




            <!--==================== Input Fields End =========================== -->


        </div>

    </form>
</section>



<!--====================== Footer PHP Start ===================-->

<?php include_once("../../includes/footer.php"); ?>

<!--====================== Footer PHP End ===================-->