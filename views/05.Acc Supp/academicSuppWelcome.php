<!--====================== Header PHP Start ===================-->

<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
}  

include_once("../../includes/header.php"); headerHtml(""); ?>

<!--====================== Header PHP End =====================-->



<section class="navigation">

    <!--====================== Department Head Navbar PHP Start ===================-->

    <?php include_once("../../includes/04.Academic & Acc Supp/academicSuppNavbar.php"); ?>

    <!--====================== Department Head Navbar PHP End ===================-->

</section>

<section class="content">

    <!--====================== Component PHP Strat ===================-->

    <?php require_once("../../includes/components.php") ?>

    <!--======================= Component PHP End ====================-->

    <!--==================== Action Buttons start =========================== -->
    <div class="container p-5">



        <div class="row text-center py-4">
            <div class="col-lg-6">
                <?php panelButton("btn-outline-success w-100","Academic Details","submit-data","fas fa-database"," './../data_input/menu.php' ") ?>
            </div>
            <div class="col-lg-6 p-0">
                <?php panelButton("btn-outline-info w-100","Update Personal Info","update-info","fas fa-user-edit","'updatePersonalInfoAcademicSupp.php'") ?>
            </div>


        </div>


    </div>

    <!--==================== Action Buttons End =========================== -->




</section>



<!--====================== Footer PHP Start ===================-->
<?php include_once("../../includes/footer.php"); ?>

<!--====================== Footer PHP End ===================-->