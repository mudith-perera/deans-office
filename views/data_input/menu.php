<!--====================== Header PHP Start ===================-->

<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
}  

include_once("../../includes/header.php"); headerHtml("academicDetails"); 

?>

<!--====================== Header PHP End =====================-->



<section class="navigation">

    <!--======================  Navbar PHP Start ===================-->

    <?php
    $navbar="";
    $folder="";
    if($_SESSION['userType']=='dean'){
        $navbar="deanNavbar.php";
        $folder="02.Dean";
    }else if($_SESSION['userType']=='department head'){
        $navbar="deptHeadNavbar.php";
        $folder="03.Dept Head";
    }
    else if($_SESSION['userType']=='academic'){
        $navbar="academicNavbar.php";
        $folder="04.Academic & Acc Supp";
    }elseif ($_SESSION['userType']=='academic support'){
        $navbar="academicSuppNavbar.php";
        $folder="04.Academic & Acc Supp";
    }

    include_once("../../includes/".$folder."/".$navbar.""); ?>

    <!--======================  Navbar PHP End ===================-->

</section>

<section class="content">

    <!--==================== Action Buttons start =========================== -->
    <div class="container p-5">

        <?php  require_once("../../includes/components.php") ?>
        <div class="row text-center py-4">
            <div class="col-lg-6">
                <?php panelButton("btn-outline-success w-100","Enter  Academic Details","submit-data","fas fa-database"," './../data_input/content.php' ") ?>
            </div>


            <div class="col-lg-6">
                <?php panelButton("btn-outline-dark w-100","Update Academic Details","get-report","fas fa-list-alt","'./../data_input/academicUpdate.php'") ?>
            </div>
        </div>



    </div>
    <!--==================== Action Buttons End =========================== -->
</section>



<!--====================== Footer PHP Start ===================-->
<?php include_once("../../includes/footer.php"); ?>

<!--====================== Footer PHP End ===================-->