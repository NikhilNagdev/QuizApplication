<?php
/**
 * Created by PhpStorm.
 * User: Aarti
 * Date: 6/18/2019
 * Time: 8:04 PM
 */

require_once $_SERVER['DOCUMENT_ROOT']."/database/core/CRUD.class.php";

class Quiz{

    function __construct(){
        $this->quiz = CRUD::table("quiz");
    }

    public function getTotalConductedQuiz($teacher){

    }

    public function getLatestQuiz($noOfQuizzes, $student_id){
//SELECT
//    quiz.quiz_name
//FROM
//    quiz
//JOIN student_quiz_marks ON quiz.quiz_id = student_quiz_marks.quiz_id
//WHERE
//    student_quiz_marks.student_id = 1
//ORDER BY
//    student_quiz_marks.submission_dt
//DESC
//LIMIT 2
        return $this->quiz->select("quiz.quiz_name", "quiz.quiz_marks", "quiz.passing_marks_percentage" ,"student_quiz_marks.marks")
            ->join("student_quiz_marks", "quiz.quiz_id", "student_quiz_marks.quiz_id")
            ->where("student_quiz_marks.student_id", $student_id)
            ->orderBy("student_quiz_marks.submission_dt DESC")
            ->limit($noOfQuizzes)
            ->get()
            ->fetchAll();
    }

    public function getAllAttemptedQuiz($student_id){
//        SELECT subject_name, quiz_name, quiz_marks, student_quiz_marks.marks, quiz_type, student_quiz_marks.submission_dt FROM `quiz` JOIN student_quiz_marks ON quiz.quiz_id = student_quiz_marks.quiz_id JOIN subject ON subject.subject_id = quiz.subject_id WHERE student_id = 1

        return $this->quiz->select("quiz.quiz_id","subject_name", "quiz_name", "quiz_marks", "student_quiz_marks.marks", "quiz_type", "student_quiz_marks.submission_dt")
            ->join("student_quiz_marks", "quiz.quiz_id", "student_quiz_marks.quiz_id")
            ->join("subject", "subject.subject_id", "quiz.subject_id")
            ->where("student_id", $student_id)
            ->get()
            ->fetchAll();
    }

    public function insert($values){

    }

    private $quiz;

}