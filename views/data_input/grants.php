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
    $grant_name   = strtolower(strip_tags($_POST['grant_name']));
    $grant_amount  = strtolower(strip_tags($_POST['grant_amount']));
    $grant_role  = strtolower(strip_tags($_POST['grant_role']));
    $grant_purpose  = strtolower(strip_tags($_POST['grant_purpose']));
    $grant_benifisheries  = strtolower(strip_tags($_POST['grant_benifisheries']));
    $type  = strtolower(strip_tags($_POST['type']));
    $other  = strtolower(strip_tags($_POST['other']));
    
    try{
        if($objCrud->insertGrants($username,$grant_name,$grant_amount,$grant_role,$grant_purpose,$grant_benifisheries,$type,$other)){
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
        $objCrud->deleteGrants($username,$name);
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

            <h1>Grant Details</h1>
            <hr style="border:1px solid black;background-color:black;">



            <!--==================== Input Fields start =========================== -->

            <!-- 01. Grant Name & Amount -->
            <div class="row p-4 mt-5">
                <div class="col-lg-2">

                    <?php label("grant-name","Grant Name"); ?>
                </div>
                <div class="col-lg-4 ">
                    <?php inputField("text","grant_name","Enter Grant Name here...","",""); ?>
                </div>

                <div class="col-lg-2">
                    <?php label("grant-amount","Amount(Rs.)") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php inputField("number","grant_amount","Enter Amount here...","",""); ?>
                </div>
            </div>

            <!-- ---------------------------------------- -->
            <!-- 02. Role & Purpose -->
            <div class="row p-4 ">
                <div class="col-lg-2">

                    <?php label("grant-name","Role"); ?>
                </div>
                <div class="col-lg-4 ">
                    <?php inputField("text","grant_role","Enter User Role  here...","",""); ?>
                </div>

                <div class="col-lg-2">
                    <?php label("grant-purpose","Purpose") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php textarea("grant_purpose",30,5,"Enter grant purpose here...",""); ?>
                </div>
            </div>

            <!-- ---------------------------------------- -->







            <!-- 03. Purpose & Type -->
            <div class="row p-4">
                <div class="col-lg-2">
                    <?php label("grant-benifisheries","Benifisheries") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php textarea("grant_benifisheries",30,5,"Enter grant benifisheries here...",""); ?>
                </div>
                <div class="col-lg-2">
                    <?php label("grant-type","Type") ?>

                </div>
                <div class="col-lg-2 ">

                    <!-- ########### radio Button Local ########-->
                    <?php customRadioButton("Local","type","checked","local"); ?>
                    <!-- ################################## -->

                </div>
                <div class="col-lg-2 ">

                    <!-- ########### radio Button Female ########-->
                    <?php customRadioButton("International","type","","international"); ?>
                    <!-- ################################## -->

                </div>


            </div>

            <!-- ---------------------------------------- -->
            <!-- 04. Benifisheries & Other -->
            <div class="row p-4">


                <div class="col-lg-2">
                    <?php label("other","Other") ?>


                </div>
                <div class="col-lg-4 ">
                    <?php textarea("other",30,5,"Enter grant other details here...",""); ?>
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
                            <?php grantsHead(); ?>

                        </thead>
                        <tbody>

                            <?php
                                $data=$objCrud->getGrants($username);
                                if($data){
                                    foreach($data as $row){?>
                            <tr>
                                <td><?php echo $row['grant_name']?></td>
                                <td><?php echo $row['amount']?></td>
                                <td><?php echo $row['role']?></td>
                                <td><?php echo $row['purpose']?></td>
                                <td><?php echo $row['benifisheries']?></td>
                                <td><?php echo $row['type']?></td>
                                <td><?php echo $row['other']?></td>
                                <td><i id="trash" style="color:black;cursor:pointer" class="fas fa-trash alt"></i></td>
                            </tr>
                            <?php
                                    }
                                }
                            ?>
                        </tbody>
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