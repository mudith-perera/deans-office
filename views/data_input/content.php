<!--====================== Header PHP Start ===================-->

<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
// print_r($_SESSION);
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

    <!--====================== Component PHP Strat ===================-->

    <?php require_once("../../includes/components.php") ?>

    <!--======================= Component PHP End ====================-->


    <div class="container-fluid text-center  py-2 px-4">


        <!-- <hr style="border:1px solid black;background-color:black;"> -->



        <!--==================== Content Fields start =========================== -->

        <!-- -------------- row 1 --------------------->
        <div class="row p-4 mt-5 border-bottom-3">
            <div class="col-lg-3">
                <h4 class="mt-2">Achievements</h4>
            </div>
            <div class="col-lg-2">
                <button class="btn btn-success mt-2 rounded-pill w-100" onclick="location.href='./achievements.php';">

                    <h5>Go to &nbsp; <i class="fas fa-arrow-right content__arrow"></i></h5>

                </button>

            </div>

            <div class="col-lg-2">

            </div>

            <div class=" col-lg-3">

                <h4 class="mt-2">Commities</h4>
            </div>
            <div class="col-lg-2 ">
                <button class="btn btn-success mt-2 rounded-pill w-100" onclick="location.href='./commities.php';">
                    <h5>Go to &nbsp; <i class="fas fa-arrow-right content__arrow"></i></h5>
                </button>
            </div>
        </div>

        <!-- ---------------------------------------- -->
        <!-- -------------- row 2 --------------------->
        <div class="row p-4 mt-5 border-bottom-3">
            <div class="col-lg-3">
                <h4 class="mt-2">Community Services</h4>
            </div>
            <div class="col-lg-2">
                <button class="btn btn-success mt-2 rounded-pill w-100"
                    onclick="location.href='./communityServices.php';">
                    <h5>Go to &nbsp; <i class="fas fa-arrow-right content__arrow"></i></h5>
                </button>
            </div>

            <div class="col-lg-2">

            </div>

            <div class=" col-lg-3">

                <h4 class="mt-2">Dissamination of Knowlegde</h4>
            </div>
            <div class="col-lg-2 ">
                <button class="btn btn-success mt-2 rounded-pill w-100"
                    onclick="location.href='./dissaminationOfKnowledge.php';">
                    <h5>Go to &nbsp; <i class="fas fa-arrow-right content__arrow"></i></h5>
                </button>
            </div>
        </div>

        <!-- ---------------------------------------- -->
        <!-- -------------- row 3 --------------------->
        <div class="row p-4 mt-5 border-bottom-3">
            <div class="col-lg-3">
                <h4 class="mt-2">Publications<br>(Conference)</h4>
            </div>
            <div class="col-lg-2">
                <button class="btn btn-success mt-2 rounded-pill w-100"
                    onclick="location.href='./conferencePublicationDetails.php';">
                    <h5>Go to &nbsp; <i class="fas fa-arrow-right content__arrow"></i></h5>
                </button>
            </div>

            <div class="col-lg-2">

            </div>

            <div class=" col-lg-3">

                <h4 class="mt-2">Publications (Journal)</h4>
            </div>
            <div class="col-lg-2 ">
                <button class="btn btn-success mt-2 rounded-pill w-100"
                    onclick="location.href='./journalPublicationDetails.php';">
                    <h5>Go to &nbsp; <i class="fas fa-arrow-right content__arrow"></i></h5>
                </button>
            </div>
        </div>

        <!-- ---------------------------------------- -->
        <!-- -------------- row 4 --------------------->
        <div class="row p-4 mt-5 border-bottom-3">
            <div class="col-lg-3">
                <h4 class="mt-2">Contributions<br>(National)</h4>
            </div>
            <div class="col-lg-2">
                <button class="btn btn-success mt-2 rounded-pill w-100"
                    onclick="location.href='./contributionNational.php';">
                    <h5>Go to &nbsp; <i class="fas fa-arrow-right content__arrow"></i></h5>
                </button>
            </div>

            <div class="col-lg-2">

            </div>

            <div class=" col-lg-3">

                <h4 class="mt-2">Contributions (International)</h4>
            </div>
            <div class="col-lg-2 ">
                <button class="btn btn-success mt-2 rounded-pill w-100"
                    onclick="location.href='./contributionInternational.php';">
                    <h5>Go to &nbsp; <i class="fas fa-arrow-right content__arrow"></i></h5>
                </button>
            </div>
        </div>

        <!-- ---------------------------------------- -->
        <!-- -------------- row 5 --------------------->
        <div class="row p-4 mt-5 border-bottom-3">
            <div class="col-lg-3">
                <h4 class="mt-2">Introduced External Courses</h4>
            </div>
            <div class="col-lg-2">
                <button class="btn btn-success mt-2 rounded-pill w-100"
                    onclick="location.href='./externalCourses.php';">
                    <h5>Go to &nbsp; <i class="fas fa-arrow-right content__arrow"></i></h5>
                </button>
            </div>

            <div class="col-lg-2">

            </div>

            <div class=" col-lg-3">

                <h4 class="mt-2">Introduced Course Units</h4>
            </div>
            <div class="col-lg-2 ">
                <button class="btn btn-success mt-2 rounded-pill w-100"
                    onclick="location.href='./newlyIntroducedCourses.php';">
                    <h5>Go to &nbsp; <i class="fas fa-arrow-right content__arrow"></i></h5>
                </button>
            </div>
        </div>

        <!-- ---------------------------------------- -->
        <!-- -------------- row 6 --------------------->
        <div class="row p-4 mt-5 border-bottom-3">
            <div class="col-lg-3">
                <h4 class="mt-2">Staff Development Programmes&nbsp;(<em>Conducted</em>)</h4>
            </div>
            <div class="col-lg-2">
                <button class="btn btn-success mt-2 rounded-pill w-100"
                    onclick="location.href='./staffDevelopmentConducted.php';">
                    <h5>Go to &nbsp; <i class="fas fa-arrow-right content__arrow"></i></h5>
                </button>
            </div>

            <div class="col-lg-2">

            </div>

            <div class=" col-lg-3">

                <h4 class="mt-2">Staff Development Programmes&nbsp;(<em>Participated</em>)</h4>
            </div>
            <div class="col-lg-2 ">
                <button class="btn btn-success mt-2 rounded-pill w-100"
                    onclick="location.href='./staffDevelopmentParticipation.php';">
                    <h5>Go to &nbsp; <i class="fas fa-arrow-right content__arrow"></i></h5>
                </button>
            </div>
        </div>

        <!-- ---------------------------------------- -->
        <!-- -------------- row 7 --------------------->
        <div class="row p-4 mt-5 border-bottom-3">
            <div class="col-lg-3">
                <h4 class="mt-2">Outreach Activities</h4>
            </div>
            <div class="col-lg-2">
                <button class="btn btn-success mt-2 rounded-pill w-100"
                    onclick="location.href='./outreachActivities.php';">
                    <h5>Go to &nbsp; <i class="fas fa-arrow-right content__arrow"></i></h5>
                </button>
            </div>

            <div class="col-lg-2">

            </div>

            <div class=" col-lg-3">

                <h4 class="mt-2">Grants</h4>
            </div>
            <div class="col-lg-2 ">
                <button class="btn btn-success mt-2 rounded-pill w-100" onclick="location.href='./grants.php';">
                    <h5>Go to &nbsp; <i class="fas fa-arrow-right content__arrow"></i></h5>
                </button>
            </div>
        </div>

        <!-- ---------------------------------------- -->
        <!-- -------------- row 8 --------------------->
        <div class="row p-4 mt-5 border-bottom-3">
            <div class="col-lg-3">
                <h4 class="mt-2">Events Conducted </h4>
            </div>
            <div class="col-lg-2">
                <button class="btn btn-success mt-2 rounded-pill w-100"
                    onclick="location.href='./eventsConductedorOragnized.php';">
                    <h5>Go to &nbsp; <i class="fas fa-arrow-right content__arrow"></i></h5>
                </button>
            </div>

            <div class="col-lg-2">

            </div>

            <div class=" col-lg-3">
                <!-- <h4 class="mt-2">Password Reset </h4> -->

            </div>
            <div class="col-lg-2 ">
                <button class="btn btn-success mt-2 rounded-pill w-100"
                    onclick="location.href='./../passwordReset.php';">
                    <h5>Go to &nbsp; <i class="fas fa-arrow-right content__arrow"></i></h5>
                </button>
            </div>
        </div>

        <!-- ---------------------------------------- -->
        <!--==================== Content Fields End =========================== -->


    </div>



</section>



<!--====================== Footer PHP Start ===================-->
<?php include_once("../../includes/footer.php"); ?>

<!--====================== Footer PHP End ===================-->