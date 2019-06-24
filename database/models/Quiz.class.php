<?php
/**
 * Created by PhpStorm.
 * User: Aarti
 * Date: 6/18/2019
 * Time: 8:04 PM
 */
require_once "database/core/CRUD.class.php";
class Quiz{
    public function getTotalConductedQuiz($teacher){

    }
    public function getQuestionAnswer($quiz_id){
        $condition = array("question_id"=>1,"question_id"=>1);
//        $join = ;
        $rs = CRUD::table("correct_question_answer")->select("DISTINCT *")->innerQuery("quiz_question","","","question_id",array("question_id","no_of_options"),"IN")->get();
        $row = $rs->fetchAll(PDO::FETCH_KEY_PAIR);
        return $row;
    }
}
