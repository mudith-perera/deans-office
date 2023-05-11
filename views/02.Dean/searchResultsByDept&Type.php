<!--====================== DB Config Start ===================-->
<?php
// Show PHP errors
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);


if(!isset($_SESSION)) 
{ 
    session_start(); 
}


require_once '../../classes/crud.php';

$objCrud = new Crud();
$user_type =  $_SESSION['s_user_type'];
$department =  $_SESSION['s_department'];

?>
<!--====================== DB Config End ===================-->

<!--====================== Header PHP Start ===================-->

<?php include_once("../../includes/header.php"); headerHtml("staffDetails"); ?>

<!--====================== Header PHP End =====================-->



<section class="navigation">

    <!--====================== Dean Navbar PHP Start ===================-->

    <?php include_once("../../includes/02.Dean/deanNavbar.php"); ?>

    <!--====================== Dean Navbar PHP End ===================-->

</section>
<!--====================== Component PHP Strat ===================-->

<?php require_once("../../includes/components.php") ?>

<!--======================= Component PHP End ====================-->

<section class="content">


    <form action="#" method="POST">

        <div class="container-fluid text-center  py-2 px-4">



            <!--==================== Detail Table start =========================== -->

            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped">
                        <thead class=" bg-success text-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Id</th>
                                <th scope="col">Email</th>
                                <th scope="col">EPF</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Address</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $objCrud->getRowData($user_type,$department);
                        ?>
                            

                        </tbody>
                    </table>
                </div>
            </div>





            <!--==================== Detail Fields End =========================== -->


        </div>

    </form>
</section>



<!--====================== Footer PHP Start ===================-->

<?php include_once("../../includes/footer.php"); ?>

<!--====================== Footer PHP End ===================-->