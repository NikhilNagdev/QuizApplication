<!DOCTYPE html>
<html lang="en">

<?php
require_once "../../document_root.php";

require_once $_SERVER['DOCUMENT_ROOT']."/database/models/Subject.class.php";
require_once $_SERVER['DOCUMENT_ROOT']."/pages/includes/header.php";
require_once $_SERVER['DOCUMENT_ROOT']."/pages/includes/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Subject.class.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Question.class.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/pages/quiz/includes/header.php";

$questionObj = new Question();

?>

<body>

<?php

//we have to fetch the questions and their options for the quiz

$question_no = "1";

$questionText = "Which of these is not a bitwise operator?";

$options = array("&", "&=", "^=", "<=");

    if(strcasecmp($questionType, "multiplechoicequestion") == 0){
        include_once $_SERVER['DOCUMENT_ROOT']."/pages/quiz/includes/multi-choice.php";
    }elseif (strcasecmp($questionType, "multiplecorrectanswer") == 0){
        include_once $_SERVER['DOCUMENT_ROOT']."/pages/quiz/includes/multi-correct.php";
    }elseif (strcasecmp($questionType, "truefalse") == 0){
        include_once $_SERVER['DOCUMENT_ROOT']."/pages/quiz/includes/true-false.php";
    }

$questionType = "multiplechoicequestion";

?>

<!--<div class="loader-wrapper">-->
<!--    <span class="loader-box"><span class="loader-inner"></span></span>-->
<!--    <p class="loader-content">Getting your quiz ready!!!</p>-->
<!--</div>-->

<div class="container-fluid">
    <div class="full-page">
        <div class="header">SUBJECT NAME : <?php echo $_POST['subject_name'] ?></div>

        <?php
        include_once("left-panel.php");
        ?>

        <?php
        if (strcasecmp($questionType, "multiplechoicequestion") == 0) {
            include_once $_SERVER['DOCUMENT_ROOT'] . "/pages/quiz/includes/multi-choice.php";
        } elseif (strcasecmp($questionType, "multiplecorrectanswer") == 0) {
            include_once $_SERVER['DOCUMENT_ROOT'] . "includes/multi-correct.php";
        } elseif (strcasecmp($questionType, "truefalse") == 0) {
            include_once $_SERVER['DOCUMENT_ROOT'] . "includes/true-false.php";
        }
        ?>


        <?php
        include_once("right-panel.php");
        ?>

    </div>
</div>
<!--END OF .container-->

<!--END OF /MULTIPLE-CHOICE SECTION-->


<?php
require_once "includes/core-scripts.php";
?>
</body>

</html>





