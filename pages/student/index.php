<!DOCTYPE html>
<html lang="en">
<?php
require_once "../../document_root.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Subject.class.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Quiz.class.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Chapter.class.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/helper/Helper.class.php";

$subject = new Subject();
$quiz = new Quiz();
$chapter = new Chapter();
$helper = new Helper();

include_once("../includes/header.php");
?>
<body>
<div class="loader-wrapper">
    <span class="loader-box"><span class="loader-inner"></span></span>
    <p class="loader-content">Getting your quiz ready!!!</p>
</div>
<div class="wrapper">
    <div class="main-header">
        <!-- Logo Header -->
        <?php
        include_once("../includes/logo-header.php");
        ?>
        <!-- End Logo Header -->

        <?php
        include_once("../includes/navbar.php");
        ?>
        <!-- End Navbar -->
    </div>

    <!-- Sidebar -->
    <?php
    include_once("includes/sidebar.php");
    ?>
    <!-- End Sidebar -->

    <div class="main-panel">
        <div class="content">
            <div class="panel-header bg-dark-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <?php
                            if(isset($_GET['src']))
                                $heading = $helper->getHeadingName($_GET['src']);
                            else
                                $heading = "Dashboard";
                            echo<<<END
<h2 class="text-white pb-2 fw-bold">{$heading}</h2>
END;
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-inner mt--5">
                <div class="row mt--2">
            <?php

            if(isset($_GET['src'])){
                $source = $_GET['src'];

                switch($source){
                    case "view-all-quizzes.php":
                        include_once "includes/pages/quiz/view-all-quizzes.php";
                }

            }else{
                include_once("includes/dashboard.php");
            }
            ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once "includes/practice-modal.php";
//   Core JS Files
include_once("../includes/core-scripts.php");
?>

</body>
</html>