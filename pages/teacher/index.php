<!DOCTYPE html>
<html lang="en">
<?php
ob_start();
include_once "../includes/header.php";
require_once "../../document_root.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Quiz.class.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Class.class.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Batch.class.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Subject.class.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Student.class.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/helper/Helper.class.php";

$quiz = new Quiz();
$classObj = new ClassTable();
$batchObj = new Batch();
$subjectObj = new Subject();
$studentObj = new Student();
$helper = new Helper();


?>
<body>
<div class="loader-wrapper">
    <span class="loader-box"><span class="loader-inner"></span></span>
    <p class="loader-content">Please wait while loading!!!</p>
</div>
<div class="wrapper">
    <div class="main-header">
        <!-- Logo Header -->
        <?php
        include_once ("../includes/logo-header.php");
        ?>
        <!-- End Logo Header -->

        <?php
        include_once("../includes/navbar.php");
        ?>
        <!-- End Navbar -->
    </div>

    <!-- Sidebar -->
    <?php
    include_once ("includes/sidebar.php");
    ?>
       <!-- End Sidebar -->

    <div class="main-panel">
        <div class="content">
            <div class="panel-header bg-dark-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-inner mt--5">

                <?php

                    if(isset($_GET['src'])){
                        $source = $_GET['src'];
                        switch($source){
                            case "create-quiz":
                                include_once "includes/quiz/add-students.php";
                                break;
                            case "view-all-quizzes":
                                include_once "includes/quiz/view-all-quizzes.php";
                                break;
                            case "add-students":
                                include_once "includes/quiz/add-students.php";
                        }

                    }else{
                        include_once("includes/dashboard.php");
                    }
                ?>


            </div>
        </div>
    </div>
</div>

<?php
include_once "includes/modals/add-students-modal.php";
include_once "includes/modals/retest-ref-modal.php";
include_once("includes/core-scripts.php");//JS FILES
?>

</body>
</html>