<?php
/**
 * Created by PhpStorm.
 * User: Aarti
 * Date: 6/18/2019
 * Time: 5:52 PM
 */

//require_once "database/models/Question.class.php";
//require_once "database/models/Answer.class.php";
require_once "database/core/CRUD.class.php";
require_once "database/models/Quiz.class.php";
//
//$question = new Question();
//print_r($question->getRandomQuestionsByChapterNo(2, "java", 1));
//
//$answer = new Answer();
//while ($ans = $answer->generateOptions(1, 1)->fetchAll()){
//    echo "<br>".$ans->question_id;
//    echo "<br>".$ans->no_of_options;
//}

$quiz = new Quiz();
$answer = $quiz->getQuestionAnswer(2);
foreach ($answer as $x=>$values){
    echo $x;
    echo " ";
    echo $values;
    echo"<br>";
}