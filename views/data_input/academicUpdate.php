<!--====================== Header PHP Start ===================-->

<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
print_r($_POST);
// print_r($academic_type);
include_once("../../includes/header.php"); headerHtml("academicDetails"); 

require_once '../../classes/crud.php';

$objCrud = new Crud();
// $user_type =  $_SESSION['s_user_type'];
// $department =  $_SESSION['s_department'];
// $acadamicPageName=$_SESSION['academic-type']

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

    include_once("../../includes/".$folder."/".$navbar."");
     ?>


    <!--======================  Navbar PHP End ===================-->

</section>

<section class="content">

    <!--====================== Component PHP Strat ===================-->

    <?php require_once("../../includes/components.php") ?>

    <!--======================= Component PHP End ====================-->

    <!--############### search box start ###################-->
    <form action="" method="POST">
        <!-- 01. Type & name -->
        <div class="row p-4 mt-5">

            <div class="col-lg-1">


            </div>
            <div class="col-lg-3">
                <?php label("type","Select Academic Type") ?>

            </div>
            <div class="col-lg-6 ">
                <?php 
            dropdownHead("Academic-type","academic_type","academic_type","","");
        ?>

                <a class="dropdown-item" onclick="setAchievementType('Achievements')" href="#">Achievements</a>
                <a class="dropdown-item" onclick="setAchievementType('Commities')" href="#">Commities</a>
                <a class="dropdown-item" onclick="setAchievementType('Community Services')" href="#">Community Services
                </a>
                <a class="dropdown-item" onclick="setAchievementType('Dissamination of Knowlegde')"
                    href="#">Dissamination of Knowlegde</a>
                <a class="dropdown-item" onclick="setAchievementType('Publications-Conference')"
                    href="#">Publications-Conference</a>
                <a class="dropdown-item" onclick="setAchievementType('Publications-Journal')"
                    href="#">Publications-Journal</a>
                <a class="dropdown-item" onclick="setAchievementType('Contributions-National')"
                    href="#">Contributions-National</a>
                <a class="dropdown-item" onclick="setAchievementType('Contributions-International')"
                    href="#">Contributions-International</a>
                <a class="dropdown-item" onclick="setAchievementType('Introduced External Courses')" href="#">Introduced
                    External Courses</a>
                <a class="dropdown-item" onclick="setAchievementType('Introduced Course Units')" href="#">Introduced
                    Course Units</a>
                <a class="dropdown-item" onclick="setAchievementType('Staff Development Programmes (Conducted)')"
                    href="#">Staff Development Programmes (Conducted)</a>
                <a class="dropdown-item" onclick="setAchievementType('Staff Development Programmes (Participated)')"
                    href="#">Staff Development Programmes (Participated)</a>
                <a class="dropdown-item" onclick="setAchievementType('Outreach Activities')" href="#">Outreach
                    Activities</a>
                <a class="dropdown-item" onclick="setAchievementType('Grants')" href="#">Grants</a>
                <a class="dropdown-item" onclick="setAchievementType('Events Conducted')" href="#">Events Conducted</a>



                <?php
            dropdownFooter();


        ?>

                <script>
                function setAchievementType(academic) {
                    document.getElementById("academic_type").value = academic;
                }
                </script>
            </div>
            <div class="col-lg-2">
                <?php searchButton("academicUpdate_search"); ?>

            </div>
        </div>

        <!-- ---------------------------------------- -->
    </form>
    <form action="#" method="POST">
        <div class="container-fluid text-center  py-2 px-4">


            <!--############### search box end ###################-->



            <!--==================== Table start =========================== -->
            <div class="row">
                <div class="col-lg-12">


                    <table class="table table-striped">

                        <?php
                        
                        if($academic_type=='Achievements'){
                             achievementTableHead();

                        }else if($academic_type=='Commities'){

                            committeTableHead();
                        }

                        // communityServicesHead();
                        // dissminationKnowledgeHead();
                        // publicationConferenceHead();
                        // publicationJournalHead();
                        // contributionNationalHead();
                        // contributionInterNationalHead();
                        // externalCoursesHead();
                        // courseUnitsHead();
                        // conductedStaffDevHead();
                        // participatedStaffDevHead();
                        // outreachHead();
                        // grantsHead();
                        
                        eventsConductedHead();
                        ?>
                        <tbody>

                            <?php
                            // $objCrud->getRowData($user_type,$department);
                            if(academic-type=='Achievements'){
                               achievementTableRow('ach_1','award','Desc_1');
   
                           }else if(academic-type=='Commities'){
   
                               committeTableRow('welfare','chairman','2015','2016','desc_1');
                           }
                            // achievementTableRow('ach_1','award','Desc_1');
                            // committeTableRow('welfare','chairman','2015','2016','desc_1');
                            // communityServicesRow('activity_1','2020');
                            // dissminationKnowledgeRow('activity_1','2015');
                            // publicationConferenceRow('title_1','2021','author_1','a1,a2,a3,a4','Full Paper','Local');
                            // publicationJournalRow('title_1','2021','author_1','a1,a2,a3,a4','Journal test','Indexed');
                            // contributionNationalRow('activity_1','2017');
                            // contributionInterNationalRow('activity_1','2013');
                            // externalCoursesRow('coures_1','2019','2019/1/1','2019/3/31','test audience');
                            // courseUnitsRow('test course unit','2','SCS1242','compulsary','2010','test desc','undergraduates');
                            // conductedStaffDevRow('prog_1','2019','2019/8/1','2019/10/30','coordinator','local','institute_1');
                            // participatedStaffDevRow('prog_1','2019','2019/8/1','2019/10/30','local','institute_1');
                            // outreachRow('activity_1','2011');
                            // grantsRow('grant_1','1,000,000','coordinator','research','undergraduates','Local','-');

                            eventsConductedRow('event_1','workshop','2020/01/20','local','coordinator','test event');
                            ?>


                        </tbody>
                    </table>

                </div>
            </div>
            <!--==================== Table end =========================== -->





            <!-- ---------------------------------------- -->









            <!--==================== Input Fields End =========================== -->

            <!--================== Submit & Reset Buttons Start ===================-->
            <div class="row mt-5">
                <div class="col-lg-2">
                    <button class="btn btn-danger mt-2 rounded-pill w-100" onclick="location.href='./content.php';">
                        <h5><i class="fas fa-arrow-left"></i> Back</h5>
                    </button>
                </div>
                <div class="col-lg-4"></div>
                <div class="col-lg-2">
                    <!-- <button class="btn btn-warning mt-2 rounded-pill w-100">
                        <h5>Skip <i class="fas fa-forward"></i></h5>
                    </button> -->
                </div>
                <div class="col-lg-2">
                    <!-- <button class="btn btn-info mt-2 rounded-pill w-100">
                        <h5>Add <i class="fas fa-plus"></i></h5>
                    </button> -->
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-success mt-2 rounded-pill w-100">
                        <h5>Submit <i class="fas fa-check-circle"></i></h5>
                    </button>
                </div>
            </div>
            <!--================== Submit & Reset Buttons End ===================-->
        </div>
    </form>


</section>



<!--====================== Footer PHP Start ===================-->
<?php include_once("../../includes/footer.php"); ?>

<!--====================== Footer PHP End ===================-->