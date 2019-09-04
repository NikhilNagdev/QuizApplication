<!DOCTYPE html>
<html lang="en">

<?php
require_once "../../document_root.php";

require_once $_SERVER['DOCUMENT_ROOT']."/database/models/Subject.class.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Answer.class.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Question.class.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/pages/quiz/includes/header.php";
//require_once $_SERVER['DOCUMENT_ROOT']."";
//$questionObj = new Question();

?>

<body>
<?php
$questionType="multiplechoicequestion";
$question_no=1;
//echo "$questionText";

//echo "<br>".$ans[0]->question_id;
//echo "<br>".$ans[0]->question;
//echo "<br>".$ans[0]->answer_id;
//echo "<br>".$ans[0]->answer;
//echo "<br>".$ans[0]->no_of_options;
//foreach ($ans as $a){
//    echo "<br>".$a->question_id;
//    echo " ".$a->question;
//    echo " ".$a->answer_id;
//    echo " ".$a->answer;
//    echo " ".$a->no_of_options;
////    echo "  ".$a->no_of_options;
////    echo "  ".$a->count;
//}
//print_r($options);
?>

<!--<div class="loader-wrapper">-->
<!--    <span class="loader-box"><span class="loader-inner"></span></span>-->
<!--    <p class="loader-content">Getting your quiz ready!!!</p>-->
<!--</div>-->

<div class="container-fluid">
    <div class="full-page">
<!--        <div class="header">SUBJECT NAME : --><?php //echo $_POST['subject_name'] ?><!--</div>-->

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





