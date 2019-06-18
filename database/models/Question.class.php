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
            $pdoStmt = $this->questionObj->where()
                ->where("difficulty", $difficulty)
                ->orderBy("RAND()")
                ->limit($noOfQuestions)
                ->select("question")
                ->get();
        }
        if($difficulty!==""){

        }

        $questions = $pdoStmt->fetchAll();
        foreach ($questions as $question)
            $returnArray[$i++] = $question->question;
        return $returnArray;
    }

    public function __call($name, $arguments){
        if(preg_match('/^getRandomQuestionsBy(.+)$/', $name,$matches)){
            if ($matches[1]==="ChapterNo")
                return $this->getRandomQuestions($arguments[0], $arguments[1],$arguments[2]);
            return $this->getRandomQuestions($arguments[0], $arguments[1],"",$arguments[2]);
        }
    }


    private $questionObj;
}

/*SELECT question.question FROM question JOIN chapter ON question.chapter_id=chapter.chapter_id JOIN subject ON subject.subject_id = chapter.subject_id WHERE subject.subject_name="java" AND question.difficulty = "hard" ORDER BY RAND() limit 5*/