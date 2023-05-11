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
    $course_name_staff_participate   = strtolower(strip_tags($_POST['course_name_staff_participate']));
    $year_staff_participate  = strtolower(strip_tags($_POST['year_staff_participate']));
    $from_staff_participate  = strtolower(strip_tags($_POST['from_staff_participate']));
    $to_staff_participate  = strtolower(strip_tags($_POST['to_staff_participate']));
    $type  = strtolower(strip_tags($_POST['type']));
    $institute_staff_participate  = strtolower(strip_tags($_POST['institute_staff_participate']));
    
    try{
        if($objCrud->insertParStDev($username,$course_name_staff_participate,$year_staff_participate,$from_staff_participate,$to_staff_participate,$type,$institute_staff_participate)){
            $_SESSION['SuccessMessage']="Added Successfully !";
        }else{
            $_SESSION['ErrorMessage']="Already exists !";
        }

     }catch(PDOException $e){
       echo $e->getMessage();
     }
}
if (isset($_POST['confirm'])){
    $name = strtolower(strip_tags($_POST['hiddenTxtArea']));
    
    try {     
        $objCrud->deleteParStDev($username,$name);
        $_SESSION['SuccessMessage']="Deleted  Successfully !";
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

    <form action="#" method="POST">
        <div class="container-fluid text-center  py-2 px-4">

            <h1>Participation in Staff Development Programs</h1>
            <hr style="border:1px solid black;background-color:black;">



            <!--==================== Input Fields start =========================== -->

            <!-- 01. Name & year -->
            <div class="row p-4 mt-5">
                <div class="col-lg-2">

                    <?php label("course-name","Name"); ?>
                </div>
                <div class="col-lg-4 ">
                    <?php inputField("text","course_name_staff_participate","Enter programme name here...","",""); ?>
                </div>

                <div class="col-lg-2">
                    <?php label("year","Participated Year") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php inputField("number","year_staff_participate","Enter  Year here...","",""); ?>
                </div>
            </div>

            <!-- ---------------------------------------- -->



            <!-- 02. Time period Year & Conducted Institute -->
            <div class="row p-4">
                <div class="col-lg-2">
                    <?php label("time-period","Time Period") ?>

                </div>

                <div class="col-lg-2 ">
                    <?php inputField("date","from_staff_participate","From","","");  ?> <br> <small
                        class="form-text text-muted">From</small>
                </div>

                <div class="col-lg-2 ">
                    <?php inputField("date","to_staff_participate","To","",""); ?> <br> <small
                        class="form-text text-muted">To</small>
                </div>

                <div class="col-lg-2">
                    <?php label("institue","Conducted Institute") ?>


                </div>
                <div class="col-lg-4 ">
                    <?php inputField("text","institute_staff_participate","Enter Conducted Institute here...","",""); ?>
                </div>

            </div>

            <!-- ---------------------------------------- -->
            <!-- 03. Activities -->
            <div class="row p-4">
                <div class="col-lg-2">
                    <?php label("unit-type","Type") ?>


                </div>
                <div class="col-lg-2 ">

                    <!-- ########### radio Button Local ########-->
                    <?php customRadioButton("International","type","checked","international"); ?>
                    <!-- ################################## -->

                </div>
                <div class="col-lg-2 ">

                    <!-- ########### radio Button Female ########-->
                    <?php customRadioButton("Local","type","","local"); ?>
                    <!-- ################################## -->

                </div>

                <div class="col-lg-2">

                </div>
                <div class="col-lg-4 ">

                </div>
                <div class="col-lg-4 ">
                    <input style="visibility:hidden;" type="text" id="hiddenTxtArea" value="" name="hiddenTxtArea">
                </div>
            </div>

            <!-- ---------------------------------------- -->




            <!-- ==================== History Table start =========================== -->




            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped my-5">
                        <thead class="bg-success text-light">
                            <?php participatedStaffDevHead(); ?>

                        </thead>
                        <tbody>

                            <?php
                                $data=$objCrud->getParStDev($username);
                                if($data){
                                    foreach($data as $row){?>
                            <tr>
                                <td><?php echo $row['name']?></td>
                                <td><?php echo $row['par_year']?></td>
                                <td><?php echo $row['start_date']?></td>
                                <td><?php echo $row['end_date']?></td>
                                <td><?php echo $row['type']?></td>
                                <td><?php echo $row['conduc_inst']?></td>
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
                <div class="col-lg-4">
                    <button id="confirm" name="confirm" style="visibility:hidden;"
                        class="btn btn-warning mt-2 rounded-pill w-100">
                        <h5> Confirm <i class="fas fa-check-circle"></i></h5>
                    </button>
                </div>

                <div class="col-lg-2">
                    <button name="submit" id="submit" class="btn btn-success mt-2 rounded-pill w-100">
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