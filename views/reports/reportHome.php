<!--====================== Header PHP Start ===================-->

<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include_once("../../includes/header.php"); headerHtml("report"); ?>

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
    
    
    
    // POST
    $nextFileName="";
    if(isset($_POST['next'])){

        
        // $nextFileName=$_POST['report-type']."Report.php";
        // $_SESSION['x']=$nextFileName;
        // print_r($_POST);
        
    }
    // print_r($_SESSION);

    include_once("../../includes/".$folder."/".$navbar."");
     ?>


    <!--======================  Navbar PHP End ===================-->

</section>

<section class="content">

    <!--====================== Component PHP Strat ===================-->

    <?php require_once("../../includes/components.php") ?>

    <!--======================= Component PHP End ====================-->

    <form action="reportPreview.php" method="POST">


        <div class="container-fluid text-center  py-2 px-4">

            <h1>Reports</h1>
            <hr style="border:1px solid black;background-color:black;">



            <!--==================== Input Fields start =========================== -->

            <!-- 01. Type & name -->
            <div class="row p-4 mt-5">
                <div class="col-lg-2">

                    <?php label("report-name","Report Name"); ?>
                </div>
                <div class="col-lg-4 ">
                    <?php inputField("text","report-name","Enter report name here...","",""); ?>
                </div>

                <div class="col-lg-2">
                    <?php label("type","Select Type") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php 
            dropdownHead("Report-type","report_type","report-type","","");
        ?>

                    <a class="dropdown-item" onclick="setAchievementType('achievements')" href="#">Achievements</a>
                    <a class="dropdown-item" onclick="setAchievementType('Commities')" href="#">Commities</a>
                    <a class="dropdown-item" onclick="setAchievementType('Community Services')" href="#">Community
                        Services</a>
                    <a class="dropdown-item" onclick="setAchievementType('Knowledge Dissamination')"
                        href="#">Dissamination of
                        Knowlegde</a>
                    <a class="dropdown-item" onclick="setAchievementType('Conference Publications')"
                        href="#">Publications
                        (Conference)</a>
                    <a class="dropdown-item" onclick="setAchievementType('Journal Publications')" href="#">Publications
                        (Journal)</a>
                    <a class="dropdown-item" onclick="setAchievementType('National Contributions')"
                        href="#">Contributions
                        (National)</a>
                    <a class="dropdown-item" onclick="setAchievementType('International Contributions')"
                        href="#">Contributions
                        (International)</a>
                    <a class="dropdown-item" onclick="setAchievementType('Introduced External Courses')"
                        href="#">Introduced External
                        Courses</a>
                    <a class="dropdown-item" onclick="setAchievementType('Introduced Course Units')" href="#">Introduced
                        Course
                        Units</a>
                    <a class="dropdown-item" onclick="setAchievementType('Conducted Staff Dev Programmes')"
                        href="#">Staff Dev
                        Programmes (Conducted)</a>
                    <a class="dropdown-item" onclick="setAchievementType('Participated Staff Dev Programmes')"
                        href="#">Staff Dev
                        Programmes (Participated)</a>
                    <a class="dropdown-item" onclick="setAchievementType('Outreach Activities')" href="#">Outreach
                        Activities</a>
                    <a class="dropdown-item" onclick="setAchievementType('Grants')" href="#">Grants</a>
                    <a class="dropdown-item" onclick="setAchievementType('Events Conducted')" href="#">Events
                        Conducted</a>



                    <?php
            dropdownFooter();


        ?>

                    <script>
                    function setAchievementType(report) {
                        document.getElementById("report-type").value = report;
                    }
                    </script>
                </div>
            </div>

            <!-- ---------------------------------------- -->




            <!-- 02. Activities -->
            <div class="row p-4">

                <div class="col-lg-2">
                    <?php label("time-period","Time Period") ?>

                </div>

                <div class="col-lg-2 ">
                    <?php inputField("date","year_from","From","","");  ?> <br> <small
                        class="form-text text-muted">From</small>
                </div>

                <div class="col-lg-2 ">
                    <?php inputField("date","year_to","To","",""); ?> <br> <small
                        class="form-text text-muted">To</small>
                </div>

                <div class="col-lg-2">
                    <?php label("type","Department") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php 
            dropdownHead("Department","dept","dept","","");
        ?>

                    <a class="dropdown-item" onclick="setDeptType('Mathematics')" href="#">Mathematics</a>
                    <a class="dropdown-item" onclick="setDeptType('Physics')" href="#">Physics</a>
                    <a class="dropdown-item" onclick="setDeptType('Computer Science')" href="#">Computer
                        Science</a>
                    <a class="dropdown-item" onclick="setDeptType('Chemistry')" href="#">Chemistry</a>
                    <a class="dropdown-item" onclick="setDeptType('Botany')" href="#">Botany</a>
                    <a class="dropdown-item" onclick="setDeptType('Zoology')" href="#">Zoology</a>



                    <?php
            dropdownFooter();
            if($_SESSION['userType']=='department head'){

                echo "
                <script>
                document.getElementById(\"dept\").value = '".$_SESSION['userDept']."';
                
                </script>
                ";
            }else if($_SESSION['userType']=='dean'){
                echo "
                <script>
                function setDeptType(dept) {
                    document.getElementById(\"dept\").value = dept;
                }
                </script>
                ";
            }

        ?>


                </div>





            </div>

            <!-- ---------------------------------------- -->
            <!-- 02. Activities -->
            <div class="row p-4">



                <div class="col-lg-2">
                    <?php label("desc","Description") ?>


                </div>

                <div class="col-lg-4 ">
                    <?php textarea("desc",30,5,"Enter report description here...",""); ?>
                </div>





            </div>

            <!-- ---------------------------------------- -->









            <!--==================== Input Fields End =========================== -->

            <!--================== Submit & Reset Buttons Start ===================-->
            <div class="row mt-5">
                <div class="col-lg-2">
                    <!-- <button class="btn btn-danger mt-2 rounded-pill w-100" onclick="location.href='/';">
                        <h5><i class="fas fa-arrow-left"></i> Back</h5>
                    </button> -->
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
                    <?php submitButton("next","fas fa-chevron-right","Next "); ?>

                </div>
            </div>
            <!--================== Submit & Reset Buttons End ===================-->
        </div>
    </form>


</section>



<!--====================== Footer PHP Start ===================-->
<?php include_once("../../includes/footer.php"); ?>

<!--====================== Footer PHP End ===================-->