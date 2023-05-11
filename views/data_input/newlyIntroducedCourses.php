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
    $unit_name   = strtolower(strip_tags($_POST['unit_name']));
    $unit_creditAmount  = strtolower(strip_tags($_POST['unit_creditAmount']));
    $unit_code  = strtolower(strip_tags($_POST['unit_code']));
    $type  = strtolower(strip_tags($_POST['type']));
    $year  = strtolower(strip_tags($_POST['year']));
    $desc  = strtolower(strip_tags($_POST['desc']));
    $grant_benifisheries  = strtolower(strip_tags($_POST['grant_benifisheries']));
    
    try{
        if($objCrud->insertNewInCo($username,$unit_name,$unit_creditAmount,$unit_code,$type,$year,$desc,$grant_benifisheries)){
            $_SESSION['SuccessMessage']=" Course Added Successfully !";
        }else{
            $_SESSION['ErrorMessage']=" Course already exists !";
        }

     }catch(PDOException $e){
       echo $e->getMessage();
     }
}
if (isset($_POST['confirm'])){
    $name = strtolower(strip_tags($_POST['hiddenTxtArea']));
    
    try {     
        $objCrud->deleteNewInCo($username,$name);
        $_SESSION['SuccessMessage']=" Activity Deleted  Successfully !";
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

            <h1>Newly Introduced Course Units</h1>
            <hr style="border:1px solid black;background-color:black;">



            <!--==================== Input Fields start =========================== -->

            <!-- 01. Course Unit Name & Credit Amount -->
            <div class="row p-4 mt-5">
                <div class="col-lg-2">

                    <?php label("unit-name","Course Unit Name"); ?>
                </div>
                <div class="col-lg-4 ">
                    <?php inputField("text","unit_name","Enter Course Unit Name here...","",""); ?>
                </div>

                <div class="col-lg-2">
                    <?php label("unit-creditAmount","No of Credits") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php inputField("number","unit_creditAmount","Enter No of credits here...","",""); ?>
                </div>
            </div>

            <!-- ---------------------------------------- -->







            <!-- 02. Unit code & Type -->
            <div class="row p-4">
                <div class="col-lg-2">
                    <?php label("unit-code","Unit Code") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php inputField("text","unit_code","Enter unit code...","",""); ?>
                </div>

                <div class="col-lg-2">
                    <?php label("unit-type","Type") ?>


                </div>
                <div class="col-lg-2 ">

                    <!-- ########### radio Button Local ########-->
                    <?php customRadioButton("Compulsary","type","checked","compulsary"); ?>
                    <!-- ################################## -->

                </div>
                <div class="col-lg-2 ">

                    <!-- ########### radio Button Female ########-->
                    <?php customRadioButton("Optional","type","","optional"); ?>
                    <!-- ################################## -->

                </div>


            </div>

            <!-- ---------------------------------------- -->

            <!-- 03. Benifisheries & Description -->
            <div class="row p-4">
                <div class="col-lg-2">
                    <?php label("year","Introduced Year") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php inputField("text","year","Enter Introduced Year here...","",""); ?>
                </div>


                <div class="col-lg-2">
                    <?php label("desc","Description") ?>


                </div>
                <div class="col-lg-4 ">
                    <?php textarea("desc",30,5,"Enter description here...",""); ?>
                </div>



            </div>

            <!-- ---------------------------------------- -->

            <!-- 02. Introduced Year ------>
            <div class="row p-4">
                <div class="col-lg-2">
                    <?php label("grant-benifisheries","Benifisheries") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php textarea("grant_benifisheries",30,5,"Enter course unit benifisheries here...",""); ?>
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
                    <table class="table table-striped my-5">
                        <thead class="bg-success text-light">
                            <?php courseUnitsHead(); ?>

                        </thead>
                        <tbody>

                            <?php
                                $data=$objCrud->getNewInCo($username);
                                if($data){
                                    foreach($data as $row){?>
                            <tr>
                                <td><?php echo $row['co_name']?></td>
                                <td><?php echo $row['credits']?></td>
                                <td><?php echo $row['unit_code']?></td>
                                <td><?php echo $row['type']?></td>
                                <td><?php echo $row['intro_year']?></td>
                                <td><?php echo $row['description']?></td>
                                <td><?php echo $row['benifisheries']?></td>
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