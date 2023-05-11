<!--====================== Header PHP Start ===================-->

<?php

require_once("./../../includes/sessions.php");
include_once("../../includes/header.php"); headerHtml("academicDetails");

if(!isset($_SESSION)) 
{ 
    session_start(); 
}

// Show PHP errors
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once '../../classes/crud.php';

$objCrud = new Crud();
$username = $_SESSION['username'];
//POST
if(isset($_POST['submit'])){
    $achievement_name   = strtolower(strip_tags($_POST['achievement_name']));
    $achievement_type  = strtolower(strip_tags($_POST['achievement_type']));
    $desc  = strtolower(strip_tags($_POST['desc']));
    
    try{
        if($achievement_name == null){
            $_SESSION['SuccessMessage']=" Please Enter Achievment name !";
        }else{
            if($objCrud->insertAchievements($username,$achievement_name, $achievement_type, $desc)){
                $_SESSION['SuccessMessage']=" User Added Successfully !";
            }else{
                $_SESSION['ErrorMessage']=" User already exists ! ";
            }
        }
     }catch(PDOException $e){
       echo $e->getMessage();
     }
}
if (isset($_POST['confirm'])){

    $name = strtolower(strip_tags($_POST['hiddenTxtArea']));

    try {
        if ($name!=null) {
            $objCrud->deleteAchievementsData($username,$name);
            $_SESSION['SuccessMessage']=" User Deleted  Successfully !";
        }
    }catch(PDOException $e){
        echo $e->getMessage();
      }
}
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
    <?php 
        echo SuccessMessage();
        echo ErrorMessage();
    
    ?>
    <!--====================== Component PHP Strat ===================-->

    <?php require_once("../../includes/components.php") ?>

    <!--======================= Component PHP End ====================-->

    <form name="academic" action="#" method="POST">
        <div class="container-fluid text-center  py-2 px-4">

            <h1>Achievements ( Patents,Awards,Special Achievements )</h1>
            <hr style="border:1px solid black;background-color:black;">



            <!--==================== Input Fields start =========================== -->

            <!-- 01. Type & name -->
            <div class="row p-4 mt-5">
                <div class="col-lg-2">

                    <?php label("achievement_name","Achievement Name"); ?>
                </div>
                <div class="col-lg-4 ">
                    <?php inputField("text","achievement_name","Enter Achievement name here...","",""); ?>
                </div>

                <div class="col-lg-2">
                    <?php label("type","Select Type") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php 
            dropdownHead("Achievement_type","achievement_type","achievement_type","","");
        ?>

                    <a class="dropdown-item" onclick="setAchievementType('Award')" href="#">Award</a>
                    <a class="dropdown-item" onclick="setAchievementType('Patent')" href="#">Patent</a>
                    <a class="dropdown-item" onclick="setAchievementType('Special Achievement')" href="#">Special
                        Achievement</a>



                    <?php
            dropdownFooter();


        ?>

                    <script>
                    function setAchievementType(achievement) {
                        document.getElementById("achievement_type").value = achievement;
                    }
                    </script>
                </div>
            </div>

            <!-- ---------------------------------------- -->




            <!-- 02. Activities -->
            <div class="row p-4">
                <div class="col-lg-2">
                    <?php label("desc","Description") ?>


                </div>
                <div class="col-lg-4 ">
                    <?php textarea("desc",30,5,"Enter achievement description here...",""); ?>
                </div>
                <div class="col-lg-2">

                </div>
                <div class="col-lg-4 ">
                    <input style="visibility:hidden;" type="text" id="hiddenTxtArea" value="" name="hiddenTxtArea">
                </div>




            </div>

            <!-- ---------------------------------------- -->

            <!-- ==================== History Table start =========================== -->

            <div class="row">
                <div class="col-lg-12">
                    <table id="table" class="table table-striped my-5">
                        <thead class="bg-success text-light">
                            <?php achievementTableHead(); ?>

                        </thead>
                        <tbody>
                            <?php
                                    $data=$objCrud->getAchievementsData($username);
                                    if($data){
                                        foreach($data as $row){?>
                            <tr>
                                <td><?php echo $row['achiev_name']?></td>
                                <td><?php echo $row['achiev_type']?></td>
                                <td><?php echo $row['achiev_descrip']?></td>
                                <td><i id="trash" style="color:black;cursor:pointer" class="fas fa-trash alt"></i></td>
                            </tr>
                            <?php
                                        }
                                    }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!--==================== History Fields End ===========================-->







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
                    <button id="confirm" name="confirm" style="visibility:hidden;"
                        class="btn btn-warning mt-2 rounded-pill w-100">
                        <h5> Confirm <i class="fas fa-check-circle"></i></h5>
                    </button>
                </div>
                <div class="col-lg-2">
                    <!-- <button id="confirm" style="visibility:hidden;" name="Confirm" class="btn btn-info mt-2 rounded-pill w-100">
                        <h5>Confirm <i class="fas fa-check-circle" ></i></h5>
                    </button> -->
                </div>
                <div class="col-lg-2">
                    <button id="submit" name="submit" class="btn btn-success mt-2 rounded-pill w-100">
                        <h5>Submit <i class="fas fa-check-circle"></i></h5>
                    </button>
                </div>
            </div>
            <!--================== Submit & Reset Buttons End ===================-->
        </div>
    </form>


</section>

<!--====================== Script Start ===================-->
<script src="../../js/main.js"></script>
<!--====================== Script End =================== -->

<!--====================== Footer PHP Start ===================-->
<?php include_once("../../includes/footer.php"); ?>

<!--====================== Footer PHP End ===================-->