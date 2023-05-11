<!--====================== DB Config Start ===================-->
<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$s_uername="";
if(isset($_POST['staff_username_search'])){
    $s_username = strip_tags($_POST['username_search']);
    $_SESSION['s_username']= $s_username;
    header("Location: searchResultByUsername.php");
	die();
}
$user_type="";
$department="";
if(isset($_POST['staff_search'])){
    $user_type = strip_tags($_POST['user-type']);
    $department = strip_tags($_POST['department']);
    $_SESSION['s_user_type']= $user_type;
    $_SESSION['s_department']= $department;
    header("Location: searchResultsByDept&Type.php");
	die();
}
// print_r($_SESSION);
?>

<!--====================== DB Config End ===================-->


<!--====================== Header PHP Start ===================-->

<?php include_once("../../includes/header.php"); headerHtml("staffDetails"); ?>

<!--====================== Header PHP End =====================-->


<!--====================== Component PHP Strat ===================-->

<?php require_once("../../includes/components.php"); ?>

<!--======================= Component PHP End ====================-->



<section class="navigation">

    <!--====================== Dean Navbar PHP Start ===================-->

    <?php include_once("../../includes/02.Dean/deanNavbar.php"); ?>

    <!--====================== Dean Navbar PHP End ===================-->

</section>

<section class="content">

    <!--==================== Search by dept & usertype start =========================== -->
    <form action="" method="POST">
        <div class="row p-4">

            <div class="col-lg-4 mt-2">
                <?php 
                        dropdownHead("User Type","user-type","userType","","");
                    ?>

                <a class="dropdown-item" onclick="setUserType('Admin')" href="#">Admin</a>
                <a class="dropdown-item" onclick="setUserType('Dean')" href="#">Dean</a>
                <a class="dropdown-item" onclick="setUserType('Department Head')" href="#">Department Head</a>
                <a class="dropdown-item" onclick="setUserType('Academic')" href="#">Academic</a>
                <a class="dropdown-item" onclick="setUserType('Academic Support')" href="#">Academic Support</a>


                <?php
                        dropdownFooter();
                    ?>
            </div>

            <div class="col-lg-1"></div>
            <div class="col-lg-4 mt-2">
                <?php 
                        dropdownHead("Department","department","dept","","");
                    ?>

                <a class="dropdown-item" onclick="setDepartment('Computer Science')" href="#">Computer Science</a>
                <a class="dropdown-item" onclick="setDepartment('Mathematics')" href="#">Mathematics</a>
                <a class="dropdown-item" onclick="setDepartment('Physics')" href="#">Physics</a>
                <a class="dropdown-item" onclick="setDepartment('Chemistry')" href="#">Chemistry</a>
                <a class="dropdown-item" onclick="setDepartment('Botny')" href="#">Botny</a>
                <a class="dropdown-item" onclick="setDepartment('Zoology')" href="#">Zoology</a>

                <?php
                        dropdownFooter();
                    ?>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-2 mt-2"><?php searchButton("staff_search"); ?></div>
        </div>
        <!--==================== Search by dept & usertype End =========================== -->

        <div class="row ">
            <h1 class="mx-auto my-5">OR</h1>
        </div>
    </form>
    <form action="#" method="POST">
        <!--==================== Search by username start =========================== -->
        <div class="row mb-5">
            <div class="col-lg-3"></div>
            <div class="col-lg-4">
                <?php inputField("text","username_search","Enter Login Username to search","",""); ?>

            </div>
            <div class="col-lg-2">
                <?php searchButton("staff_username_search"); ?>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <!--==================== Search by username End =========================== -->
</section>

</from>

<!--====================== Footer PHP Start ===================-->
<?php include_once("../../includes/footer.php"); ?>

<!--====================== Footer PHP End ===================-->