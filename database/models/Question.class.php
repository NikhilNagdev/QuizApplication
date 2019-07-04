<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 6/17/2019
 * Time: 3:53 AM
 */
require_once $_SERVER['DOCUMENT_ROOT'] ."/database/core/CRUD.class.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/database/models/Chapter.class.php";

class Question{

    function __construct(){
        $this->questionObj = CRUD::table("question");
    }

    public function getQuestion($subject, $chapterNo, $difficulty){
        $chapter = new Chapter();
    }

    public function getRandomQuestions($noOfQuestions, $subject, $chapterNo="", $difficulty=""){
        $chapter = new Chapter();
        $returnArray = array();
        $i = 0;
        if ($chapterNo !== "" && $difficulty!=="") {
            $pdoStmt = $this->questionObj->where("chapter_id", $chapter->getChapterID($subject, $chapterNo))
                ->/*andWhere("marks", $marks)->*/
                andWhere("difficulty", $difficulty)
                ->orderBy("RAND()")
                ->limit($noOfQuestions)
                ->select("question")
                ->get();
        }else if($chapterNo !== "" && $difficulty===""){
            $pdoStmt = $this->questionObj->where("chapter_id", $chapter->getChapterID($subject, $chapterNo))
                ->orderBy("RAND()")
                ->limit($noOfQuestions)
                ->select("question")
                ->get();
        }
        else if($chapterNo==="" && $difficulty!==""){
            $pdoStmt = $this->questionObj->where("subject.subject_name", $subject)
                ->andWhere("question.difficulty", $difficulty)
                ->orderBy("RAND()")
                ->limit($noOfQuestions)
                ->select("question.question")
                ->join("chapter", "question.chapter_id", "chapter.chapter_id")
                ->join("subject", "subject.subject_id", "chapter.subject_id")
                ->get();
//SELECT question.question FROM question JOIN chapter ON question.chapter_id = chapter.chapter_id JOIN subject ON subject.subject_id = chapter.subject_id WHERE subject.subject_name = '$subject_name' AND question.difficulty = difficulty ORDER BY RAND() LIMIT 2
        }
        elseif($difficulty==="" && $chapterNo===""){
            $pdoStmt = $this->questionObj->where("subject.subject_name", $subject)
                ->orderBy("RAND()")
                ->limit($noOfQuestions)
                ->select("question.question")
                ->join("chapter", "question.chapter_id", "chapter.chapter_id")
                ->join("subject", "subject.subject_id", "chapter.subject_id")
                ->get();
//SELECT question.question FROM question JOIN chapter ON question.chapter_id = chapter.chapter_id JOIN subject ON subject.subject_id = chapter.subject_id WHERE subject.subject_name = 'java' ORDER BY RAND() LIMIT 2
        }
        $questions = $pdoStmt->fetchAll();
        foreach ($questions as $question)
            $returnArray[$i++] = $question->question;
        return $returnArray;
    }

    public function getQuestions(){
//        SELECT a.question_id, question, mark FROM (SELECT *, @markss:= IF(@markss <= 20, @markss + marks, 31) as mark FROM(SELECT * FROM ( SELECT *, @rownum := IF( @prev = question_id, @rownum + 1, 1 ) AS rownum, @prev := question_id FROM question_marks, ( SELECT @rownum := 0, @prev := 0 ) AS t ORDER BY question_id ASC, `w.e.f` DESC ) AS tp WHERE tp.rownum = 1 ORDER BY RAND()) as n, (SELECT @markss := 0, @status:= 't') as m)as a JOIN question ON question.question_id = a.question_id HAVING mark <=20

        return $this->questionObj->executeQuery(" SELECT a.question_id, question, mark, marks, question_type FROM (SELECT *, @markss:= IF(@markss <= 20, @markss + marks, 31) as mark FROM(SELECT * FROM ( SELECT *, @rownum := IF( @prev = question_id, @rownum + 1, 1 ) AS rownum, @prev := question_id FROM question_marks, ( SELECT @rownum := 0, @prev := 0 ) AS t ORDER BY question_id ASC, `w.e.f` DESC ) AS tp WHERE tp.rownum = 1 ORDER BY RAND()) as n, (SELECT @markss := 0, @status:= 't') as m)as a JOIN question ON question.question_id = a.question_id HAVING mark <=20");
    }

    public function __call($name, $arguments){
        if(preg_match('/^getRandomQuestionsBy(.+)$/', $name,$matches)){
            if (strcasecmp($matches[1], "chapterno") == 0)
                return $this->getRandomQuestions($arguments[0], $arguments[1],$arguments[2]);
            elseif (strcasecmp($matches[1], "subject") == 0){
                return $this->getRandomQuestions($arguments[0], $arguments[1]);
            }
            elseif (strcasecmp($matches[1], "marks") == 0){

            }
            return $this->getRandomQuestions($arguments[0], $arguments[1],"",$arguments[2]);
        }
    }

    public function getQuestionsByQuiz($quiz_id){
        return $this->questionObj->executeQuery("SELECT question.question_id, question.question, tp.marks, tp.`w.e.f`, chapter.chapter_name, chapter.chapter_no FROM (SELECT *, @rownum := IF( @prev = question_id,@rownum + 1,1) AS rownum, @prev := question_id FROM question_marks, (SELECT @rownum := 0, @prev := 0) AS t ORDER BY question_id ASC, `w.e.f` DESC) AS tp JOIN question ON tp.question_id = question.question_id JOIN chapter ON question.chapter_id = chapter.chapter_id JOIN quiz_chapter ON quiz_chapter.chapter_id = chapter.chapter_id JOIN subject ON chapter.subject_id = subject.subject_id WHERE tp.rownum = 1 AND question.deleted = 0 AND chapter.deleted = 0 AND subject.deleted = 0 AND quiz_chapter.quiz_id = ?", $quiz_id)->fetchAll();
    }

    private $questionObj;
}


//select DISTINCT question.question_id, question.question from question JOIN question_marks ON question_marks.question_id = question.question_id WHERE question_marks.marks = 2 ORDER BY RAND() limit 2

//SELECT question.question_id, question.question, tp.marks, tp.`w.e.f`, chapter.chapter_name, chapter.chapter_no FROM (SELECT *, @rownum := IF( @prev = question_id,@rownum + 1,1) AS rownum, @prev := question_id FROM question_marks, (SELECT @rownum := 0, @prev := 0) AS t ORDER BY question_id ASC, `w.e.f` DESC) AS tp JOIN question ON tp.question_id = question.question_id JOIN chapter ON question.chapter_id = chapter.chapter_id JOIN quiz_chapter ON quiz_chapter.chapter_id = chapter.chapter_id JOIN subject ON chapter.subject_id = subject.subject_id WHERE tp.rownum = 1 AND question.deleted = 0 AND chapter.deleted = 0 AND subject.deleted = 0 AND quiz_chapter.quiz_id = 3
