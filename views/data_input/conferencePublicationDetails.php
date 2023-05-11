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
// changed input variable names papertitle,year,mainauthor 2021/06/03
if(isset($_POST['submit'])){
    $paper_title    = strtolower(strip_tags($_POST['paper_title_conference']));
    $year  = strtolower(strip_tags($_POST['year_conference']));
    $main_author  = strtolower(strip_tags($_POST['main_author_conference']));
    $co_author  = strtolower(strip_tags($_POST['co_author']));
    $event_type  = strtolower(strip_tags($_POST['event_type']));
    $status  = strtolower(strip_tags($_POST['status']));
    
    try{
        if($paper_title == null){
            $_SESSION['ErrorMessage']=" Please Enter Activity !";
        }else{
            if($objCrud->insertPublicationC($username,$paper_title,$main_author,$co_author,$year,$event_type,$status)){
                $_SESSION['SuccessMessage']=" Activity Added Successfully !";
            }else{
                $_SESSION['ErrorMessage']=" Activity already exists !";
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
            
            $objCrud->deletePublicationC($username,$name);
            $_SESSION['SuccessMessage']=" Activity Deleted  Successfully !";
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

            <h1>Publication Details (Conference)</h1>
            <hr style="border:1px solid black;background-color:black;">



            <!--==================== Input Fields start =========================== -->

            <!-- 01. Paper title & Credit Year -->
            <div class="row p-4 mt-5">
                <div class="col-lg-2">

                    <?php label("paper-title","Paper Title"); ?>
                </div>
                <div class="col-lg-4 ">
                    <?php inputField("text","paper_title_conference","Enter Paper title here...","",""); ?>
                </div>

                <div class="col-lg-2">
                    <?php label("year","Published Year") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php inputField("number","year_conference","Enter Published Year here...","",""); ?>
                </div>
            </div>

            <!-- ---------------------------------------- -->



            <!-- 02. Main author & Journal name -->
            <div class="row p-4">
                <div class="col-lg-2">
                    <?php label("mainauthor","Main Author") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php inputField("text","main_author_conference","Enter Main Author here...","",""); ?>
                </div>

                <div class="col-lg-2">
                    <?php label("type","Select Type") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php 
            dropdownHead("Conference-type","event_type","event_type","","");
        ?>

                    <a class="dropdown-item" onclick="setEventType('Full Paper')" href="#">Full Paper</a>
                    <a class="dropdown-item" onclick="setEventType('Abstract')" href="#">Abstract</a>
                    <a class="dropdown-item" onclick="setEventType('Seminar')" href="#">Seminar</a>




                    <?php
            dropdownFooter();


        ?>

                    <script>
                    function setEventType(event) {
                        document.getElementById("event_type").value = event;

                    }
                    </script>
                </div>



            </div>

            <!-- ---------------------------------------- -->



            <!-- 03. Co authors & Status -->
            <div class="row p-4">
                <div class="col-lg-2">
                    <?php label("co-auther","Co Authors") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php textarea("co_author",30,5,"Enter co authors here...",""); ?>
                </div>

                <div class="col-lg-2">
                    <?php label("status","Status") ?>


                </div>
                <div class="col-lg-2 ">

                    <!-- ########### radio Button Local ########-->
                    <?php customRadioButton("Local","status","checked","Local"); ?>
                    <!-- ################################## -->

                </div>
                <div class="col-lg-2 ">

                    <!-- ########### radio Button Female ########-->
                    <?php customRadioButton("International","status","","International"); ?>
                    <!-- ################################## -->

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
                            <?php publicationConferenceHead();?>

                        </thead>
                        <tbody>

                            <?php
                                $data=$objCrud->getPublicationC($username);
                                if($data){
                                    foreach($data as $row){?>
                            <tr>
                                <td><?php echo $row['c_paper_title']?></td>
                                <td><?php echo $row['c_main_author']?></td>
                                <td><?php echo $row['c_co_author']?></td>
                                <td><?php echo $row['c_publish_yr']?></td>
                                <td><?php echo $row['c_type']?></td>
                                <td><?php echo $row['c_status']?></td>
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