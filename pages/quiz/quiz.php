<!DOCTYPE html>
<html lang="en">

<?php
require_once "../../document_root.php";
require_once $_SERVER['DOCUMENT_ROOT']."/database/models/Subject.class.php";
require_once $_SERVER['DOCUMENT_ROOT']."/pages/quiz/includes/header.php";
?>

<body>

<?php

    //we have to fetch the questions and their options for the quiz

    $question_no = "1";

    $question = "Which of these is not a bitwise operator?";

    $options = array("&", "&=", "^=", "<=");

    $questionType = "multiplechoicequestion";
?>

<section id="multiple-choice">
    <div class="container-fluid">
        <div class="full-page">
            <div class="header">SUBJECT NAME : <?php echo $_POST['subject_name']?></div>

            <?php
            include_once("left-panel.php");
            ?>

            <?php
            if(strcasecmp($questionType, "multiplechoicequestion") == 0){
                include_once $_SERVER['DOCUMENT_ROOT']."/pages/quiz/includes/multi-choice.php";
            }elseif (strcasecmp($questionType, "multiplecorrectanswer") == 0){
                include_once $_SERVER['DOCUMENT_ROOT']."includes/multi-correct.php";
            }elseif (strcasecmp($questionType, "truefalse") == 0){
                include_once $_SERVER['DOCUMENT_ROOT']."includes/true-false.php";
            }
            ?>


            <?php
            include_once("right-panel.php");
            ?>

        </div>
    </div>
    <!--END OF .container-->
</section>
<!--END OF /MULTIPLE-CHOICE SECTION-->


<?php
require_once "includes/core-scripts.php";
?>
</body>

</html>





