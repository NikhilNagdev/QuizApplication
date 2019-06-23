<!DOCTYPE html>
<html lang="en">

<?php
require_once "../../document_root.php";
require_once $_SERVER['DOCUMENT_ROOT']."/database/models/Subject.class.php";
require_once $_SERVER['DOCUMENT_ROOT']."includes/header.php";
?>

<body>

<?php

    //we have to fetch the questions and their options for the quiz

    $question_no = "1";

    $question = "Which of these is not a bitwise operator?";

    $options = array("&", "&=", "^=", "<=");

    $questionType = "multiplechoicequestion";

    if(strcasecmp($questionType, "multiplechoicequestion") == 0){
        include_once $_SERVER['DOCUMENT_ROOT']."includes/multi-choice.php";
    }elseif (strcasecmp($questionType, "multiplecorrectanswer") == 0){
        include_once $_SERVER['DOCUMENT_ROOT']."includes/multi-correct.php";
    }elseif (strcasecmp($questionType, "truefalse") == 0){
        include_once $_SERVER['DOCUMENT_ROOT']."includes/true-false.php";
    }
?>

<?php
require_once "includes/core-scripts.php";
?>
</body>

</html>





