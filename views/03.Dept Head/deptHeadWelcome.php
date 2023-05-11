<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
}  
// print_r($_SESSION);
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once '../../classes/crud.php';
$objCrud = new Crud();
$current_user = $objCrud->getCurrentUser();

?>

<!--====================== Header PHP Start ===================-->

<?php include_once("../../includes/header.php"); headerHtml(""); ?>

<!--====================== Header PHP End =====================-->



<section class="navigation">

    <!--====================== Department Head Navbar PHP Start ===================-->

    <?php include_once("../../includes/03.Dept Head/deptHeadNavbar.php"); ?>

    <!--====================== Department Head Navbar PHP End ===================-->

</section>

<section class="content">

    <!--====================== Component PHP Strat ===================-->

    <?php require_once("../../includes/components.php") ?>

    <!--======================= Component PHP End ====================-->

    <!--==================== Action Buttons start =========================== -->
    <div class="container p-5">



        <div class="row text-center py-4">
            <div class="col-lg-4">
                <?php panelButton("btn-outline-success w-100","Enter Academic Details","submit-data","fas fa-database"," './../data_input/content.php' ") ?>
            </div>
            <div class="col-lg-4 p-0">
                <?php panelButton("btn-outline-info w-100","Update Personal Info","update-info","fas fa-user-edit","'updatePersonalInfoDeptHead.php'") ?>
            </div>

            <div class="col-lg-4">
                <?php panelButton("btn-outline-dark w-100","Report","get-report","fas fa-list-alt","'./../reports/reportHome.php'") ?>
            </div>
        </div>


    </div>

    <!--==================== Action Buttons End =========================== -->




</section>



<!--====================== Footer PHP Start ===================-->
<?php include_once("../../includes/footer.php"); ?>

<!--====================== Footer PHP End ===================-->