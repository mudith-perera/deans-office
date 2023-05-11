<!--====================== Header PHP Start ===================-->

<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
}  

include_once("../../includes/header.php"); headerHtml(""); 

?>

<!--====================== Header PHP End =====================-->



<section class="navigation">

    <!--====================== Dean Navbar PHP Start ===================-->

    <?php
    //  print_r($_SESSION);
      include_once("../../includes/02.Dean/".$_SESSION['userType']."Navbar.php"); 
    ?>

    <!--====================== Dean Navbar PHP End ===================-->

</section>

<section class="content">

    <!--==================== Action Buttons start =========================== -->
    <div class="container p-5">

        <?php  require_once("../../includes/components.php") ?>
        <div class="row text-center py-4">
            <div class="col-lg-6">
                <?php panelButton("btn-outline-success","Enter Academic Details","submit-data","fas fa-database"," './../data_input/content.php' ") ?>
            </div>

            <div class="col-lg-6">
                <?php panelButton("btn-outline-warning","Staff Details","get-staff-details","fas fa-users","'staffSearch.php'") ?>
            </div>
        </div>
        <div class="row text-center py-4">
            <div class="col-lg-6">
                <?php panelButton("btn-outline-info","Update Personal Info","update-info","fas fa-user-edit","'updatePersonalInfoDean.php'") ?>
            </div>

            <div class="col-lg-6">
                <?php panelButton("btn-outline-dark","Report","get-report","fas fa-list-alt","'./../reports/reportHome.php'") ?>
            </div>
        </div>


    </div>
    <!--==================== Action Buttons End =========================== -->
</section>



<!--====================== Footer PHP Start ===================-->
<?php include_once("../../includes/footer.php"); ?>

<!--====================== Footer PHP End ===================-->