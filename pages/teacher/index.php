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
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Question.class.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/helper/Helper.class.php";

$quizObj = new Quiz();
$classObj = new ClassTable();
$batchObj = new Batch();
$subjectObj = new Subject();
$studentObj = new Student();
$helper = new Helper();
$questionObj = new Question();

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
                    <div class="d-flex flex-column flex-md-row">
                        <div>
                            <?php
                            $source = "";
                            if (isset($_GET['src'])){
                                $source = $_GET['src'];
                                echo "<h2 class=\"text-white pb-2 fw-bold\">{$helper->getHeadingName($_GET['src'])}</h2><h2 class=\"pull-right\"></h2>";}
                            ?>
                        </div>
                        <div class="text-white total-marks " style="margin-left: auto">
                            <h2 class="pull-right">Marks: <span class="marks-text"></span></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-inner mt--5">
                <?php
                switch ($source) {
                    case "create-quiz":
                        include_once "includes/quiz/create-quiz.php";
                        break;
                    case "view-all-quizzes":
                        include_once "includes/quiz/view-all-quizzes.php";
                        break;
                    case "add-students":
                        include_once "includes/quiz/add-students.php";
                        break;
                    case "add-quiz-question":
                        include_once "includes/quiz/add-quiz-questions.php";
                        break;
                    default:
                        include_once("includes/dashboard.php");

                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
include_once "includes/modals/add-questions-modal.php";
include_once "includes/modals/retest-ref-modal.php";
include_once "includes/modals/quiz-reports-modal.php";
include_once("includes/core-scripts.php");//JS FILES
?>

</body>
</html>