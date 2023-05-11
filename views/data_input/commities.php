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
    $Committee_name   = strtolower(strip_tags($_POST['Committee_name']));
    $post  = strtolower(strip_tags($_POST['post']));
    $year_from  = strtolower(strip_tags($_POST['year_from']));
    $year_to  = strtolower(strip_tags($_POST['year_to']));
    $desc  = strtolower(strip_tags($_POST['desc']));
    
    try{
        if($Committee_name == null){
            $_SESSION['ErrorMessage']=" Please Enter Achievment name !";
        }else{
            if($objCrud->insertCommities($username,$Committee_name, $post, $year_from,$year_to,$desc)){
                $_SESSION['SuccessMessage']=" Achievment Added Successfully !";
            }else{
                $_SESSION['ErrorMessage']=" Achievment already exists !";
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
            $objCrud->deleteCommitiesData($username,$name);
            $_SESSION['SuccessMessage']=" Achievment Deleted  Successfully !";
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

    <form action="#" method="POST">
        <div class="container-fluid text-center  py-2 px-4">

            <h1>Committees</h1>
            <hr style="border:1px solid black;background-color:black;">



            <!--==================== Input Fields start =========================== -->

            <!-- 01. Name & post -->
            <div class="row p-4 mt-5">
                <div class="col-lg-2">

                    <?php label("Committee_name","Committee Name"); ?>
                </div>
                <div class="col-lg-4 ">
                    <?php inputField("text","Committee_name","Enter Committee name here...","",""); ?>
                </div>

                <div class="col-lg-2">
                    <?php label("post","Post") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php inputField("text","post","Enter Post held  here...","",""); ?>
                </div>
            </div>

            <!-- ---------------------------------------- -->



            <!-- 02. Introduced Year & Target audience -->
            <div class="row p-4">
                <div class="col-lg-2">
                    <?php label("year","Enter Year") ?>

                </div>

                <div class="col-lg-2 ">
                    <?php inputField("number","year_from","From","From",""); ?>
                </div>

                <div class="col-lg-2 ">
                    <?php inputField("number","year_to","To","",""); ?>
                </div>

                <div class="col-lg-2">
                    <?php label("desc","Description") ?>


                </div>
                <div class="col-lg-4 ">
                    <?php textarea("desc",30,5,"Enter Description here...",""); ?>
                </div>
                <div class="col-lg-4 ">
                    <input style="visibility:hidden;"  type="text" id="hiddenTxtArea" value="" name="hiddenTxtArea">
                </div>


            </div>

            <!-- ---------------------------------------- -->

            <!-- ==================== History Table start =========================== -->

            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped my-5">
                        <thead class="bg-success text-light">
                            <?php committeTableHead();?>

                        </thead>
                        <tbody>
                        <?php
                            $data=$objCrud->getCommitiesData($username);
                            if($data){
                                foreach($data as $row){?>
                                    <tr>
                                            <td><?php echo $row['comm_name']?></td>
                                            <td><?php echo $row['comm_post']?></td>
                                            <td><?php echo $row['comm_start_year']?></td>
                                            <td><?php echo $row['comm_end_year']?></td>
                                            <td><?php echo $row['comm_decrip']?></td>
                                            <td ><i id="trash" style="color:black;cursor:pointer" class="fas fa-trash alt"></i></td>
                                    </tr>
                                <?php
                                }
                            }
                        ?>
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
                <button id="confirm" name="confirm" style="visibility:hidden;" class="btn btn-warning mt-2 rounded-pill w-100">
                        <h5> Confirm <i class="fas fa-check-circle"></i></h5>
                    </button>
                </div>
                <div class="col-lg-2">
                    <!-- <button class="btn btn-info mt-2 rounded-pill w-100">
                        <h5>Add <i class="fas fa-plus"></i></h5>
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