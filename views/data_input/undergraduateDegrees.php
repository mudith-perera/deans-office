<!--====================== Header PHP Start ===================-->

<?php include_once("../../includes/header.php"); headerHtml("academicDetails"); ?>

<!--====================== Header PHP End =====================-->



<section class="navigation">

    <!--====================== Dean Navbar PHP Start ===================-->

    <?php include_once("../../includes/02.Dean/deanNavbar.php"); ?>

    <!--====================== Dean Navbar PHP End ===================-->

</section>

<section class="content">

    <!--====================== Component PHP Strat ===================-->

    <?php require_once("../../includes/components.php") ?>

    <!--======================= Component PHP End ====================-->

    <form action="#" method="POST">
        <div class="container-fluid text-center  py-2 px-4">

            <h1>Newly Introduced Degree Programmes</h1>
            <hr style="border:1px solid black;background-color:black;">



            <!--==================== Input Fields start =========================== -->

            <!-- 01. name and year -->
            <div class="row p-4 mt-5">
                <div class="col-lg-2">
                    <?php label("name","Name") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php inputField("text","degree-name","Enter degree name here...","",""); ?>
                </div>
                <div class="col-lg-2">

                    <?php label("year","Year"); ?>
                </div>
                <div class="col-lg-4 ">
                    <?php inputField("number","year","Enter year here...","",""); ?>
                </div>


            </div>

            <!-- ---------------------------------------- -->

            <!-- 02. desc & Type -->
            <div class="row p-4 mt-5">
                <div class="col-lg-2">
                    <?php label("contribution","Description") ?>

                </div>
                <div class="col-lg-4 ">
                    <?php textarea("desc",30,5,"Enter  Description here...",""); ?>
                </div>

                <div class="col-lg-2">
                    <?php label("degree-type","Type") ?>


                </div>
                <div class="col-lg-2 ">

                    <!-- ########### radio Button Local ########-->
                    <?php customRadioButton("Undergraduate","type","checked","international"); ?>
                    <!-- ################################## -->

                </div>
                <div class="col-lg-2 ">

                    <!-- ########### radio Button Female ########-->
                    <?php customRadioButton("Postgraduate","type","","local"); ?>
                    <!-- ################################## -->

                </div>


            </div>

            <!-- ---------------------------------------- -->
            <!-- 03. benifisheries -->
            <div class="row p-4 mt-5">

                <div class="col-lg-2">

                    <?php label("benifisheries","Benifisheries"); ?>
                </div>
                <div class="col-lg-4 ">
                    <?php textarea("desc",30,5,"Enter  Benifisheries here...",""); ?>
                </div>


            </div>

            <!-- ---------------------------------------- -->














            <!--==================== Input Fields End =========================== -->

            <!--================== Submit & Reset Buttons Start ===================-->
            <div class="row mt-5">
                <div class="col-lg-2">
                    <button class="btn btn-danger mt-2 rounded-pill w-100">
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