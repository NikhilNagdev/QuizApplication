<?php
/**
 * Created by PhpStorm.
 * User: Aarti
 * Date: 6/18/2019
 * Time: 8:04 PM
 */

require_once $_SERVER['DOCUMENT_ROOT'] . "/database/core/CRUD.class.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Student.class.php";

class Quiz
{

    function __construct()
    {
        $this->quiz = CRUD::table("quiz");
    }

    public function getTotalConductedQuiz($teacher)
    {

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

    public function getLatestQuiz($noOfQuizzes, $student_id)
    {
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
        return $this->quiz->select("quiz.quiz_name", "quiz.quiz_marks", "quiz.passing_marks_percentage", "student_quiz_marks.marks")
            ->join("student_quiz_marks", "quiz.quiz_id", "student_quiz_marks.quiz_id")
            ->where("student_quiz_marks.student_id", $student_id)
            ->orderBy("student_quiz_marks.submission_dt DESC")
            ->limit($noOfQuizzes)
            ->get()
            ->fetchAll();
    }

    public function getAllAttemptedQuiz($student_id)
    {
//        SELECT subject_name, quiz_name, quiz_marks, student_quiz_marks.marks, quiz_type, student_quiz_marks.submission_dt FROM `quiz` JOIN student_quiz_marks ON quiz.quiz_id = student_quiz_marks.quiz_id JOIN subject ON subject.subject_id = quiz.subject_id WHERE student_id = 1

        return $this->quiz->select("quiz.quiz_id", "subject_name", "quiz_name", "quiz_marks", "student_quiz_marks.marks", "quiz_type", "student_quiz_marks.submission_dt")
            ->join("student_quiz_marks", "quiz.quiz_id", "student_quiz_marks.quiz_id")
            ->join("subject", "subject.subject_id", "quiz.subject_id")
            ->where("student_id", $student_id)
            ->get()
            ->fetchAll();
    }


    public function getPublishedQuiz($teacher_id)
    {
//        SELECT * FROM quiz WHERE created_by = 1 AND status='published'
        return $this->quiz->select("*")
            ->where("created_by", $teacher_id)
            ->andWhere("status", "published")
            ->andWhere("deleted", 0)
            ->get()
            ->fetchAll();
    }

    public function getDraftedQuizzes($teacher_id){
        //       SELECT quiz.quiz_id, quiz.quiz_name, subject.subject_name, quiz.created_at, status FROM quiz JOIN subject ON subject.subject_id = quiz.subject_id WHERE quiz.created_by = 1 AND status='draft' AND quiz.deleted = 0
        return $this->quiz->select("quiz.quiz_id as id", "quiz.quiz_name as name", "subject.subject_name", "quiz.created_at")
            ->join("subject", "subject.subject_id", "quiz.subject_id")
            ->where("quiz.created_by", $teacher_id)
            ->andWhere("status", "draft")
            ->andWhere("quiz.deleted", 0)
            ->get()
            ->fetchAll();
    }

    public function getLatestConductedQuiz($teacher_id)
    {
        //SELECT * FROM `quiz` WHERE created_by =  ORDER BY created_at DESC
        return $this->quiz->select("quiz_id")
            ->where("created_by", $teacher_id)
            ->orderBy("created_at DESC")
            ->limit(1)
            ->get()
            ->fetch();
    }

    public function getQuizDifficulty($quiz_id){

        return CRUD::table("quiz_difficulty")
            ->select("difficulty")
            ->where("quiz_id", $quiz_id)
            ->get()
            ->fetchAll();
    }

    /**********************************************************************/
    //INSERTING FUNCTIONS
    /************************************************************************/
    public function insertQuizChapters($quiz_id, $chapters)
    {
        $quizChapter = CRUD::table("quiz_chapter");
        foreach ($chapters as $chapter) {
            echo $quizChapter->insert(array("quiz_id" => $quiz_id, "chapter_id" => $chapter));
        }
    }

    public function insertQuizDifficulty($quiz_id, $difficulty)
    {
        $quizDifficulty = CRUD::table("quiz_difficulty");
        foreach ($difficulty as $str) {
            echo $quizDifficulty->insert(array("quiz_id" => $quiz_id, "difficulty" => $str));
        }
    }

    public function insertStudentsForQuizByBatch($batches, $quiz_id)
    {
        $studentObj = new Student();
        $quiz_assigned_to = CRUD::table("quiz_assigned_to");
        foreach ($batches as $batch) {
            $students = $studentObj->getStudentsByBatch($batch);
            foreach ($students as $student) {
                $quiz_assigned_to->insert(array("quiz_id" => $quiz_id, "id" => $student->student_id));
            }
        }
    }

    public function insertStudentsForQuizByStudents($students, $quiz_id)
    {
        $quiz_assigned_to = CRUD::table("quiz_assigned_to");
        foreach ($students as $student) {
            $quiz_assigned_to->insert(array("quiz_id" => $quiz_id, "id" => $student->student_id));
        }
    }

    public function insertQuizQuestions($quiz_id, $questions)
    {
        $quiz_question = CRUD::table("quiz_question");
        foreach ($questions as $question)
            $quiz_question->insert(array("quiz_id"=>$quiz_id, "question_id"=>$question));
    }

    public function insert($values)
    {
        return $this->quiz->insert($values);
    }
    /**********************************************************************/
    //ENDING OF INSERTING FUNCTIONS
    /************************************************************************/


    private $quiz;

}