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
    $event_name   = strtolower(strip_tags($_POST['event_name']));
    $event_type  = strtolower(strip_tags($_POST['event_type']));
    $event_date  = strtolower(strip_tags($_POST['event_date']));
    $type  = strtolower(strip_tags($_POST['type']));
    $role  = strtolower(strip_tags($_POST['event_role']));
    $desc  = strtolower(strip_tags($_POST['desc']));
    
    try{
        if($objCrud->insertEventConOrg($username,$event_name,$event_type,$event_date,$type,$role,$desc)){
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
        $objCrud->deleteEventConOrg($username,$name);
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

            <h1>Events Conducted or Organized</h1>
            <hr style="border:1px solid black;background-color:black;">



            <!--==================== Input Fields start =========================== -->

            <!-- 01. Type & name -->
            <div class="row p-4 mt-5">
                <div class="col-lg-2">

                    <?php label("event-name","Event Name"); ?>
                </div>
                <div class="col-lg-4 ">
                    <?php inputField("text","event_name","Enter event name here...","",""); ?>
                </div>

                <div class="col-lg-2">
                    <?php label("type","Select Type") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php 
            dropdownHead("Evennt-type","event_type","event-type","","");
        ?>

                    <a class="dropdown-item" onclick="setEventType('Symphosium')" href="#">Symphosium</a>
                    <a class="dropdown-item" onclick="setEventType('Workshop')" href="#">Workshop</a>
                    <a class="dropdown-item" onclick="setEventType('Seminar')" href="#">Seminar</a>
                    <a class="dropdown-item" onclick="setEventType('Other')" href="#">Other</a>



                    <?php
            dropdownFooter();


        ?>

                    <script>
                    function setEventType(event) {
                        document.getElementById("event-type").value = event;

                    }
                    </script>
                </div>
            </div>

            <!-- ---------------------------------------- -->


            <!-- 02. date & Type -->
            <div class="row p-4">
                <div class="col-lg-2">
                    <?php label("event-date","Event Date") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php inputField("date","event_date","","",""); ?>
                </div>

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


            </div>

            <!-- ---------------------------------------- -->

            <!-- 03. Description  and role-->
            <div class="row p-4">
                <div class="col-lg-2">
                    <?php label("user-role","Role"); ?>
                </div>
                <div class="col-lg-4 ">
                    <?php inputField("text","event_role","Enter User Role  here...","",""); ?>
                </div>
                <div class="col-lg-2">
                    <?php label("desc","Description") ?>


                </div>
                <div class="col-lg-4 ">
                    <?php textarea("desc",30,5,"Enter Event description here...",""); ?>
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
                            <?php eventsConductedHead(); ?>

                        </thead>
                        <tbody>

                            <?php
                                $data=$objCrud->getEventConOrg($username);
                                if($data){
                                    foreach($data as $row){?>
                            <tr>
                                <td><?php echo $row['event_name']?></td>
                                <td><?php echo $row['event_type']?></td>
                                <td><?php echo $row['event_date']?></td>
                                <td><?php echo $row['type']?></td>
                                <td><?php echo $row['role']?></td>
                                <td><?php echo $row['description']?></td>
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