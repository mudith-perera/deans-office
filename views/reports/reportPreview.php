<?php
require_once '../../classes/crud.php';
$objCrud = new Crud();

if(!isset($_SESSION)) 
{ 
    session_start(); 
}

if($_SESSION["userType"]!="dean" && $_SESSION["userType"]!="department head" ){
    header("location: ../../login.php");
}
// print_r($_SESSION);
// print_r($_POST);

?>

<!--====================== Component PHP Strat ===================-->

<?php require_once("../../includes/components.php") ?>

<!--======================= Component PHP End ====================-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates&family=Montserrat:wght@300&family=Ubuntu:wght@700&display=swap"
        rel="stylesheet">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="./../../css/reportStyles.css">

    <title>Report</title>
</head>

<body>
    <div class="row">
        <div class="col-lg-12 ">
            <p class="report_heading">Report Name: </p>
            <p class="report_text"> <?php echo $_POST['report-name'] ?></p>
        </div>
        <div class="col-lg-12 ">
            <p class="report_heading">Report Type: </p>
            <p class="report_text"> <?php echo $_POST['report_type'] ?></p>
        </div>
        <div class="col-lg-12 ">
            <p class="report_heading">Department: </p>
            <p class="report_text"> <?php echo $_POST['dept'] ?></p>
        </div>
        <div class="col-lg-12 ">
            <p class="report_heading">Report From: </p>
            <p class="report_text"> <?php echo $_POST['year_from'] ?></p>
        </div>
        <div class="col-lg-12 ">
            <p class="report_heading">Report To: </p>
            <p class="report_text"> <?php echo $_POST['year_to'] ?></p>
        </div>
        <div class="col-lg-12 ">
            <p class="report_heading">Report Description: </p>
            <p class="report_text"> <?php echo $_POST['desc'] ?></p>
        </div>
    </div>

    <!-- REPORT TABLE -->
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped my-5">
                <thead class="bg-success text-light">
                    <?php
                    switch ($_POST['report_type']) {
                        case 'achievements':
                            achievementTableHeadReport();
                            break;
                        case 'Commities':
                            committeTableHeadReport();
                            break;
                        case 'Community Services':
                            communityServicesHeadReport();
                            break;
                        case 'Knowledge Dissamination':
                            dissminationKnowledgeHeadReport();
                            break;
                        case 'Conference Publications':
                            publicationConferenceHeadReport();
                            break;
                        case 'Journal Publications':
                            publicationJournalHeadReport();
                            break;
                        case 'National Contributions':
                            contributionNationalHeadReport();
                            break;
                        case 'International Contributions':
                            contributionInterNationalHeadReport();
                            break;
                        case 'Introduced External Courses':
                            externalCoursesHeadReport();
                            break;
                        case 'Introduced Course Units':
                            courseUnitsHeadReport();
                            break;
                        case 'Conducted Staff Dev Programmes':
                            conductedStaffDevHeadReport();
                            break;
                        case 'Participated Staff Dev Programmes':
                            participatedStaffDevHeadReport();
                            break;
                        case 'Outreach Activities':
                            outreachHeadReport();
                            break;
                        case 'Grants':
                            grantsHeadReport();
                            break;
                        case 'Events Conducted':
                            eventsConductedHeadReport();
                            break;
                        
                        default:
                            # code...
                            break;
                    }
                    
                    // committeTableHead();
                    
                    ?>

                </thead>
                <?php
                    $department=$_POST['dept'];
                    $fromDate=$_POST['year_from'];
                    $toDate=$_POST['year_to'];


                    if($_SESSION['userType']=='department head'){
                        $department=$_SESSION['userDept'];
                    }

                    switch ($_POST['report_type']) {
                        case 'achievements':
                            
                            // ===== This is for rendering table rows =========
                            
                            $data=$objCrud->getReportData($department,$fromDate,$toDate,"achievements");
                            
                            // if($data){
                            //     foreach($data as $row){
                            //         achievementTableRowReport($row['user_name'],$row['achiev_name'],$row['achiev_type'],$row['achiev_descrip']);
                            //     }
                            // }
                            
                            achievementTableRowReport("data_1","data_2","data_3","data_4");

                            break;
                        case 'Commities':
                            $data=$objCrud->getReportData($department,$fromDate,$toDate,"commities");
                            // if($data){
                            //     foreach($data as $row){
                            //         achievementTableRowReport($row['user_name'],$row['achiev_name'],$row['achiev_type'],$row['achiev_descrip']);
                            //     }
                            // }
                            
                            committeTableRowReport("data_1","data_2","data_3","data_4","data_5","data_6");
                            break;
                        case 'Community Services':
                            $data=$objCrud->getReportData($department,$fromDate,$toDate,"comm_services");
                            // if($data){
                            //     foreach($data as $row){
                            //         achievementTableRowReport($row['user_name'],$row['achiev_name'],$row['achiev_type'],$row['achiev_descrip']);
                            //     }
                            // }
                            
                            communityServicesRowReport("data_1","data_2","data_3");
                            break;
                        
                            case 'Knowledge Dissamination':
                                dissminationKnowledgeRowReport("data_1","data_2","data_3");
                                break;
                            case 'Conference Publications':
                                publicationConferenceRowReport("data_1","data_2","data_3","data_4","data_5","data_6","data_7");
                                break;
                            case 'Journal Publications':
                                publicationJournalRowReport("data_1","data_2","data_3","data_4","data_5","data_6","data_7");
                                publicationJournalRowReport("data_1","data_2","data_3","data_4","data_5","data_6","data_7");
                                publicationJournalRowReport("data_1","data_2","data_3","data_4","data_5","data_6","data_7");
                                publicationJournalRowReport("data_1","data_2","data_3","data_4","data_5","data_6","data_7");
                                publicationJournalRowReport("data_1","data_2","data_3","data_4","data_5","data_6","data_7");
                                publicationJournalRowReport("data_1","data_2","data_3","data_4","data_5","data_6","data_7");
                                publicationJournalRowReport("data_1","data_2","data_3","data_4","data_5","data_6","data_7");
                                publicationJournalRowReport("data_1","data_2","data_3","data_4","data_5","data_6","data_7");
                                publicationJournalRowReport("data_1","data_2","data_3","data_4","data_5","data_6","data_7");
                                publicationJournalRowReport("data_1","data_2","data_3","data_4","data_5","data_6","data_7");
                                publicationJournalRowReport("data_1","data_2","data_3","data_4","data_5","data_6","data_7");
                                publicationJournalRowReport("data_1","data_2","data_3","data_4","data_5","data_6","data_7");
                                publicationJournalRowReport("data_1","data_2","data_3","data_4","data_5","data_6","data_7");
                                publicationJournalRowReport("data_1","data_2","data_3","data_4","data_5","data_6","data_7");
                                publicationJournalRowReport("data_1","data_2","data_3","data_4","data_5","data_6","data_7");
                                publicationJournalRowReport("data_1","data_2","data_3","data_4","data_5","data_6","data_7");
                                publicationJournalRowReport("data_1","data_2","data_3","data_4","data_5","data_6","data_7");
                                publicationJournalRowReport("data_1","data_2","data_3","data_4","data_5","data_6","data_7");
                                break;
                            case 'National Contributions':
                                contributionNationalRowReport("data_1","data_2","data_3");
                                break;
                            case 'International Contributions':
                                contributionInterNationalRowReport("data_1","data_2","data_3");
                                break;
                            case 'Introduced External Courses':
                                externalCoursesRowReport("data_1","data_2","data_3","data_4","data_5","data_6");
                                break;
                            case 'Introduced Course Units':
                                courseUnitsRowReport("data_1","data_2","data_3","data_4","data_5","data_6","data_7","data_8");
                                break;
                            case 'Conducted Staff Dev Programmes':
                                conductedStaffDevRowReport("data_1","data_2","data_3","data_4","data_5","data_6","data_7","data_8");
                                break;
                            case 'Participated Staff Dev Programmes':
                                participatedStaffDevRowReport("data_1","data_2","data_3","data_4","data_5","data_6","data_7");
                                break;
                            case 'Outreach Activities':
                                outreachRowReport("data_1","data_2","data_3");
                                break;
                            case 'Grants':
                                grantsRowReport("data_1","data_2","data_3","data_4","data_5","data_6","data_7","data_8");
                                break;
                            case 'Events Conducted':
                                eventsConductedRowReport("data_1","data_2","data_3","data_4","data_5","data_6","data_7");
                                break;

                        default:
                            # code...
                            break;
                    }
                    
                    // committeTableHead();
                    
                    ?>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <button id="print_btn" class="btn btn-success"
                onclick="document.getElementById('print_btn').style.display = 'none';window.print();">Print</button>

        </div>
    </div>
</body>

</html>