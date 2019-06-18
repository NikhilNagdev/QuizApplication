<?php
/**
 * Created by PhpStorm.
 * User: Aarti
 * Date: 6/18/2019
 * Time: 8:07 PM
 */

require_once "database/core/CRUD.class.php";

class Answer{

    function __construct(){
        $this->answer = CRUD::table("answer");
    }

    public function generateOptions($questionId, $quiz_id, $noOfOptions=4){

        return $this->answer->where("quiz_id", $quiz_id)->select("count(*)", "quiz_question.question_id", "no_of_options")->join("quiz_question", "quiz_question.question_id", "answer.question_id")->get();

    }

//select count(*), quiz_question.question_id, no_of_options from answer JOIN quiz_question ON quiz_question.question_id = answer.question_id WHERE quiZ_id=1 GROUP BY quiz_question.question_id

    private $answer;

}