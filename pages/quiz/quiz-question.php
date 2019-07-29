<?php

/**
 * Created by PhpStorm.
 * User: rp wadhwani
 * Date: 02-Jul-19
 * Time: 2:44 AM
 */
require_once "../../document_root.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Question.class.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Answer.class.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/pages/quiz/question-answer.php";

//$question = new Question();
//$answer = new Answer();
//session_start();
//$questionAnswer=array();
////$count=1;
//if(!isset($_SESSION['question_id'])) {
////we have to fetch the questions and their options for the quiz
////    $count++;
//
//    $question_no = "1";
//
////$questionText = "Which of these is not a bitwise operator?";
//
////$options = array("&", "&=", "^=", "<=");
//
//    $questionType = "multiplechoicequestion";
//
//    $quiz_id = 1;
//
//
//    $correctQA = $question->generateNextQuestion($quiz_id);
//    $ans = ($correctQA->fetchAll());
////print_r($ans);
//    $questionText = $ans[0]->question;
//    $_SESSION['question_id']=$ans[0]->question_id;
////    echo "$questionText";
//
//}else{
//    $question_no = "1";
//
////$questionText = "Which of these is not a bitwise operator?";
//
////$options = array("&", "&=", "^=", "<=");
//
//    $questionType = "multiplechoicequestion";
//
//    $quiz_id = 1;
//
//
//    $correctQA = $question->generateNextQuestion($quiz_id,$_SESSION['question_id']);
//    $ans = ($correctQA->fetchAll());
////print_r($ans);
//    $questionText = $ans[0]->question;
//    $_SESSION["question_id"]=$ans[0]->question_id;
////    echo "$questionText";
//}
//$questionAnswer["question"]=$questionText;
//$wrongAnswers = $answer->generateWrongOptions($quiz_id,$ans[0]->question_id)->fetchAll();
//$correctAnswers = $answer->generateCorrectOptions($quiz_id,$ans[0]->question_id)->fetchAll();
//
//foreach ($wrongAnswers as $wrongAnswer){
//    $questionAnswer[$wrongAnswer->answer_id]=$wrongAnswer->answer;
//}
//
//foreach ($correctAnswers as $correctAnswer){
//    $questionAnswer[$correctAnswer->answer_id]=$correctAnswer->answer;
//}


//if(isset($_SESSION['i'])) {
////    print_r($_SESSION['i']);
//    if(isset($_POST['val'])) {
////        die("<br>".$_POST['val']."<br>");
//        $val=$_POST['val'];
//        if($val==1)
//            $qa = generateQuestion($_SESSION['i'], 1);
//        else if($val==0){
//            $qa = generateQuestion($_SESSION['start'], 0);
//
//
//
////            die("<br>".$_SESSION['start']."<br>");
//        }
//
//    }
//}else
//    $qa=generateQuestion();
//print_r($qa);
//echo json_encode($qa);

//session_start();
//$result=array();
//$qa = array();

//if(!isset($_SESSION['index'])) {

//    $_SESSION['index']=-1;

//}

//if(isset($_POST['val'])) {
////        die("<br>".$_POST['val']."<br>");
//    $val=$_POST['val'];
//    global $result;
////    global $qa;
//    if($val==1) {
//        $index=($_SESSION['index']+1);
//        $result = getQuestionAnswer($index);
//
//    }
//    else if($val==0){
//        $index=($_SESSION['index']-1);
//        $result =  getQuestionAnswer($index);
//
//
//
////            die("<br>".$_SESSION['start']."<br>");
//    }
//    $_SESSION['index']=$index;
//
//}

echo json_encode(generateQuestionAnswer());
//print_r($qa);