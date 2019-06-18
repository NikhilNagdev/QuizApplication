<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 6/17/2019
 * Time: 3:53 AM
 */
require_once "database/core/CRUD.class.php";
require_once "database/models/Chapter.class.php";

class Question{

    function __construct(){
        $this->questionObj = CRUD::table("question");
    }

    /*public function getQuestion($subject, $chapterNo, $difficulty){
        $chapter = new Chapter();
        return $this->questionObj->where("chapter_id", $chapter
            ->getChapterID($subject, $chapterNo))
            ->andWhere("marks", $marks)->andWhere("difficulty", $difficulty)
            ->orderBy("RAND()")
            ->limit("1")
            ->select("question")
            ->get()
            ->fetch()->question;
    }*/

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

    private $questionObj;
}


//select DISTINCT question.question_id, question.question from question JOIN question_marks ON question_marks.question_id = question.question_id WHERE question_marks.marks = 2 ORDER BY RAND() limit 2

