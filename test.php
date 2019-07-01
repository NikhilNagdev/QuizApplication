<?php
/**
 * Created by PhpStorm.
 * User: Aarti
 * Date: 6/18/2019
 * Time: 5:52 PM
 */


//require_once $_SERVER['DOCUMENT_ROOT']."database/models/Question.class.php";
//require_once $_SERVER['DOCUMENT_ROOT']."database/models/Answer.class.php";
//
//$question = new Question();
//print_r($question->getRandomQuestionsByChapterNo(2, "java", 1));
//
//$answer = new Answer();
//$ans = json_encode($answer->generate()->fetchAll(PDO::FETCH_ASSOC));
//echo "<Br>";
//echo $ans;
//echo "<Br>";
//echo "<Br>";
//echo "<Br>";
//print_r(json_decode($ans));
//
//foreach ($ans as $a){
//    echo "<br>".$a->question_id;
//    echo "  ".$a->no_of_options;
//    echo "  ".$a->count;
//}
//
//require_once $_SERVER['DOCUMENT_ROOT']."/database/models/Subject.class.php";

require_once $_SERVER['DOCUMENT_ROOT']."/quizapplication/helper/ajax/AjaxHelper.php";

echo (AjaxHelper::getStudentsByClass(1));
