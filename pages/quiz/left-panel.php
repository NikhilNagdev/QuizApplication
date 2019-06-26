<?php
/**
 * Created by PhpStorm.
 * User: DHairya
 * Date: 21-06-2019
 * Time: 14:08
 */

$questions = $questionObj->getQuestions();

?>
<div class="side left-panel">

    <?php
        $i = 0;
        foreach ($questions as $question){
            $i++;
            echo<<<QUESTION
                <div id="question" class="left-question">
                    <p class="question-no">Q{$i}</p>
                    <i class="fa fa-square-o"></i>
                    <a class="question-text gist" href="">{$question->question}</a>
                    <p class="marks">({$question->marks}M)</p>
                </div>
QUESTION;
        }
    ?>
    <!--GIST OF QUESTIONS-->
<!--    <div class="left-question">-->
<!--        <p class="question-no">Q1</p>-->
<!--        <i class="fa fa-check-square"></i>-->
<!--        <a class="gist" href="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque, nam.</a>-->
<!--        <p class="marks">(5m)</p>-->
<!--    </div>-->
    <!--<hr class="question-under">-->

<!--    <div class="left-question">-->
<!--        <p class="question-no">Q2</p>-->
<!--        <i class="fa fa-square-o"></i>-->
<!--        <a class="gist" href="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque, nam.</a>-->
<!--        <p class="marks">(5m)</p>-->
<!--    </div>-->
    <hr class="question-under">

<!--    <div class="left-question">-->
<!--        <p class="question-no">Q3</p>-->
<!--        <i class="fa fa-square-o"></i>-->
<!--        <a class="gist" href="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque, nam.</a>-->
<!--        <p class="marks">(5m)</p>-->
<!--    </div>-->

<!--    <div class="left-question">-->
<!--        <p class="question-no">Q4</p>-->
<!--        <i class="fa fa-check-square"></i>-->
<!--        <a class="gist" href="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque, nam.</a>-->
<!--        <p class="marks">(5m)</p>-->
<!--    </div>-->
    <!--<hr class="question-under">-->
</div>
<?php
?>
