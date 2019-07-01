<!DOCTYPE html>
<html lang="en">
<?php
include_once "../includes/header.php";
require_once "../../document_root.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Quiz.class.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Class.class.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Batch.class.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Subject.class.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Student.class.php";

$quiz = new Quiz();
$classObj = new ClassTable();
$batchObj = new Batch();
$subjectObj = new Subject();
$studentObj = new Student();


?>
<body>
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
                                include_once "includes/quiz/create-quiz.php";
                                break;
                            case "view-all-quizzes":
                                include_once "includes/quiz/view-all-quizzes.php";
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
include_once "includes/add-students-modal.php";
include_once("includes/core-scripts.php");//JS FILES
?>

</body>
</html>