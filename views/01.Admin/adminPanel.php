<!--====================== Header PHP Start ===================-->

<?php 

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

include_once("../../includes/header.php"); headerHtml(""); ?>

<!--====================== Header PHP End =====================-->



<section class="navigation">

    <!--====================== Admin Navbar PHP Start ===================-->

    <?php  include_once("../../includes/01.Admin/adminNavbar.php");
    // print_r($_SESSION); ?>

    <!--====================== Admin Navbar PHP End ===================-->

</section>

<section class="content">

    <!--==================== Action Buttons start =========================== -->
    <div class="container p-5">

        <?php require_once("../../includes/components.php") ?>

        <div class="row text-center py-4">
            <div class="col-lg-6">
                <?php panelButton("btn-outline-success","Add User","add-user","fas fa-user-plus"," 'addUser.php' ") ?>
            </div>

            <div class="col-lg-6">
                <?php panelButton("btn-outline-warning","Update User","update-user","fas fa-user-edit","'updateUser.php'") ?>
            </div>
        </div>
        <div class="row text-center py-4">
            <div class="col-lg-6">
                <?php panelButton("btn-outline-danger","Delete User","delete-user","fas fa-user-slash","'deleteUser.php'") ?>
            </div>

            <div class="col-lg-6">
                <?php panelButton("btn-outline-dark","Report","get-report","fas fa-list-alt","#") ?>
            </div>
        </div>
        <div class="row text-center py-4">
            <div class="col-lg-3">

            </div>
            <div class="col-lg-6">
                <?php panelButton("btn-outline-primary","Reset Password","reset-password","fas fa-user-edit","'./../passwordResetEmail.php'") ?>
            </div>

            <div class="col-lg-3">

            </div>
        </div>

    </div>
    <!--==================== Action Buttons End =========================== -->
</section>



<!--====================== Footer PHP Start ===================-->
<?php include_once("../../includes/footer.php"); ?>

<!--====================== Footer PHP End ===================-->