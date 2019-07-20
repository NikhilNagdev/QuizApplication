<?php
/**
 * Created by PhpStorm.
 * User: Aarti
 * Date: 6/18/2019
 * Time: 8:07 PM
 */

require_once $_SERVER['DOCUMENT_ROOT']."/database/core/CRUD.class.php";

class Answer{

    function __construct(){
        $this->answer = CRUD::table("answer");
    }
//    @return - NoOfWrongOptions,Frequency
    public function getNoOfWrongOptionsWithMostFrequency($quiz_id)
    {
        return Connection::connectToDB()->query("SELECT COUNT(no_of_wrong) as freq,no_of_wrong FROM (SELECT a.question_id,a.no_of_options,b.no_of_correct,a.no_of_options-b.no_of_correct as no_of_wrong FROM (SELECT no_of_options,question_id FROM quiz_question WHERE quiz_id=1 GROUP by question_id) as a LEFT OUTER JOIN (SELECT COUNT(*) as no_of_correct,question_id FROM correct_question_answer GROUP by question_id) as b on a.question_id=b.question_id) as t GROUP BY no_of_wrong ORDER by freq DESC LIMIT 1");
    }
    function array_push_assoc($array, $key, $value){
        $array[$key] = $value;
        return $array;
    }
    public function generateCorrectOptions($quiz_id,$question_id=-1){
        $this->correct_question_answer = CRUD::table("correct_question_answer");
//        return $this->correct_question_answer->select("correct_question_answer.answer_id", "answer.answer", "quiz_question.question_id", "question.question","quiz_question.no_of_options")->join("quiz_question", "quiz_question.question_id", "correct_question_answer.question_id")->join("question", "question.question_id", "quiz_question.question_id")->join("answer", "correct_question_answer.answer_id", "answer.answer_id")->where("quiz_question.quiz_id", $quiz_id)->andWhere("quiz_question.question_id",$question_id)->get();
        $obj = $this->correct_question_answer->select("correct_question_answer.answer_id", "answer.answer", "quiz_question.question_id", "question.question","quiz_question.no_of_options")->join("quiz_question", "quiz_question.question_id", "correct_question_answer.question_id")->join("question", "question.question_id", "quiz_question.question_id")->join("answer", "correct_question_answer.answer_id", "answer.answer_id")->where("quiz_question.quiz_id", $quiz_id)->get();
//        echo "<br><br>";
//        var_dump($obj->fetchAll());
        $returnArray = array();
        $answers = array();
        $tempQuestionId = -1;
//        for($i=0; $i<$obj;);mein khana khake aaya ok
        foreach ($obj as $o) {
            if($tempQuestionId == $o->question_id) {
                $answers[$tempQuestionId]=$this->array_push_assoc($answers[$tempQuestionId],$o->answer_id,$o->answer);
            }else{
                $tempQuestionId = $o->question_id;
                $answers[$tempQuestionId]=array($o->answer_id=>$o->answer);
            }

        }

//            $answers[$o->answer_id] = $o->answer;
//            $returnArray[$o->question_id] = $answers;
        return $answers;

    }

    public function getNoOfWrongOptionsForAllQuestions($quiz_id){
        return Connection::connectToDB()->query("(SELECT a.question_id,a.no_of_options,b.no_of_correct,a.no_of_options-b.no_of_correct as no_of_wrong FROM (SELECT no_of_options,question_id FROM quiz_question WHERE quiz_id=1 GROUP by question_id) as a LEFT OUTER JOIN (SELECT COUNT(*) as no_of_correct,question_id FROM correct_question_answer GROUP by question_id) as b on a.question_id=b.question_id)");
    }
    public function getQuestion_idWithNotNoOfWrongOptions($quiz_id){
        return Connection::connectToDB()->query("SELECT * FROM (SELECT a.question_id,a.no_of_options,b.no_of_correct,a.no_of_options-b.no_of_correct as no_of_wrong FROM (SELECT no_of_options,question_id FROM quiz_question WHERE quiz_id=$quiz_id GROUP by question_id) as a LEFT OUTER JOIN (SELECT COUNT(*) as no_of_correct,question_id FROM correct_question_answer GROUP by question_id) as b on a.question_id=b.question_id) as t WHERE no_of_wrong!=$this->noOfWrongOption");
    }
    public function generate($quiz_id){

        $obj = $this->generateWrongOptions($quiz_id)->fetchAll();

        $obj1 = $this->getQuestion_idWithNotNoOfWrongOptions($quiz_id,$this->noOfWrongOption);
//        var_dump($obj);


//        foreach ($obj as $item){
//            print_r($item);
//            echo "<br>";
//        }
//        $i=0;
        foreach ($obj1 as $item){
//            echo "<br>";
            $q_id =  $item->question_id;
//            print_r($item->question_id);
            $obj2 = $this->generateWrongOptions($quiz_id,$q_id);
//            if($obj2 != false) {

//                echo "<br>";
                $ans = $obj2->fetchAll();

//                var_dump($ans);
//            }
            foreach ($ans as $a){
//                print_r($a);
                array_push($obj,$a);
//                echo "<br>";
            }
//            $i++;

        }
        $i=0;
//        var_dump($obj);


//        foreach ($obj as $obj1) {
//            echo "<br>";
//            echo "$i  ";
//
//
//            $i++;
//        }
//        print_r($obj);
        return $obj;
    }
    public function generateWrongOptions($quiz_id,$question_id=-1){
//        $this->answer->where("quiz_question.quiz_id", $quiz_id)->select("answer.answer_id","quiz_question.question_id", "answer", "question")->join("quiz_question", "quiz_question.question_id", "answer.question_id")->join("question","quiz_question.question_id ","question.question_id")->groupBy("quiz_question.question_id")->get();

        //for all questions-wrong options with limit
//        SELECT quiz_id, question_id, question, answer_id,answer FROM (SELECT quiz_question.quiz_id, quiz_question.question_id, question.question, answer_id,answer ,@rn := IF(@prev = quiz_question.question_id, @rn + 1, 1) as rn, @prev := quiz_question.question_id FROM quiz INNER JOIN quiz_question ON quiz.quiz_id = quiz_question.quiz_id AND quiz.deleted = 0 AND quiz.quiz_id = 1 INNER JOIN question ON quiz_question.question_id = question.question_id INNER JOIN (SELECT * FROM answer WHERE answer.answer_id NOT IN (SELECT answer_id FROM correct_question_answer) ORDER BY RAND()) as answers ON answers.question_id = quiz_question.question_id JOIN (SELECT @prev := NULL, @rn := 0) AS vars) as final WHERE rn <= 3



        //it means u have to generate wrong options for all questions with limit of NoOfWrongOptionsWithMostFrequency
        if($question_id==-1){
        $resultSet = $this->getNoOfWrongOptionsWithMostFrequency($quiz_id);
        $noOfWrongOptions = ($resultSet->fetchAll());
//print_r($ans);
        $this->noOfWrongOption = $noOfWrongOptions[0]->no_of_wrong;
//        return Connection::connectToDB()->query("SELECT quiz_id, question_id, question, answer_id,answer FROM (SELECT quiz_question.quiz_id, quiz_question.question_id, question.question, answer_id,answer ,@rn := IF(@prev = quiz_question.question_id, @rn + 1, 1) as rn, @prev := quiz_question.question_id FROM quiz INNER JOIN quiz_question ON quiz.quiz_id = quiz_question.quiz_id AND quiz.deleted = 0 AND quiz.quiz_id = $quiz_id and question_id INNER JOIN question ON quiz_question.question_id = question.question_id INNER JOIN (SELECT * FROM answer WHERE answer.answer_id NOT IN (SELECT answer_id FROM correct_question_answer) ORDER BY RAND()) as answers ON answers.question_id = quiz_question.question_id JOIN (SELECT @prev := NULL, @rn := 0) AS vars) as final WHERE rn <= $this->noOfWrongOption");

            return Connection::connectToDB()->query("SELECT quiz_id, question_id, question, answer_id,answer FROM (SELECT quiz_question.quiz_id, quiz_question.question_id, question.question, answer_id,answer ,@rn := IF(@prev = quiz_question.question_id, @rn + 1, 1) as rn, @prev := quiz_question.question_id FROM quiz INNER JOIN quiz_question ON quiz.quiz_id = quiz_question.quiz_id AND quiz.deleted = 0 AND quiz.quiz_id = $quiz_id and question_id not in (SELECT question_id FROM (SELECT a.question_id,a.no_of_options,b.no_of_correct,a.no_of_options-b.no_of_correct as no_of_wrong FROM (SELECT no_of_options,question_id FROM quiz_question WHERE quiz_id=$quiz_id GROUP by question_id) as a LEFT OUTER JOIN (SELECT COUNT(*) as no_of_correct,question_id FROM correct_question_answer GROUP by question_id) as b on a.question_id=b.question_id) as t WHERE no_of_wrong!=$this->noOfWrongOption) INNER JOIN question ON quiz_question.question_id = question.question_id INNER JOIN (SELECT * FROM answer WHERE answer.answer_id NOT IN (SELECT answer_id FROM correct_question_answer) ORDER BY RAND()) as answers ON answers.question_id = quiz_question.question_id JOIN (SELECT @prev := NULL, @rn := 0) AS vars) as final WHERE rn <=$this->noOfWrongOption");
        }

        //else u have to generate wrong option for particular question
        $resultSet = $this->getNoOfWrongOptions($quiz_id,$question_id);
        $noOfWrongOptions = ($resultSet->fetchAll());
//print_r($ans);
        $noOfWrongOption = $noOfWrongOptions[0]->noOfWrongOption;
        return Connection::connectToDB()->query("SELECT
    quiz_question.quiz_id,quiz_question.question_id,question,answer.answer_id,answer
FROM
    answer
JOIN quiz_question ON quiz_question.question_id = answer.question_id
JOIN question ON quiz_question.question_id = question.question_id
WHERE
    quiz_question.quiz_id =$quiz_id  AND quiz_question.question_id=$question_id AND answer.answer_id NOT IN(
    SELECT
        answer_id
    FROM
        correct_question_answer
    JOIN quiz_question ON quiz_question.question_id = correct_question_answer.question_id
    WHERE
        quiz_id = $quiz_id
    GROUP BY
        quiz_question.question_id

) ORDER BY RAND() LIMIT $noOfWrongOption");
    }
    private function getNoOfWrongOptions($quizId,$question_id){
        return Connection::connectToDB()->query("SELECT ((SELECT no_of_options FROM quiz_question WHERE question_id=$question_id and quiz_id=$quizId) - (SELECT COUNT(*) FROM correct_question_answer WHERE question_id=$question_id )) as noOfWrongOption");
}

    public function generateOptions($questionId, $quiz_id, $noOfOptions=4){

    }

//    public function generate(){
//        return $this->answer->pdo->query("SELECT * FROM (SELECT
//    question_id,
//    question,
//    answer_id,
//    answer
//FROM
//(
//    SELECT
//        quiz_question.question_id,
//        question.question,
//        answer.answer,
//        answer.answer_id,
//        @rn := IF(
//@prev = quiz_question.question_id,
//            @rn + 1,
//            1
//        ) AS rn,
//        @prev := quiz_question.question_id
//    FROM
//        quiz_question
//    INNER JOIN question ON quiz_question.quiz_id = 1 AND quiz_question.question_id = question.question_id
//    INNER JOIN(
//    SELECT
//    *
//    FROM
//            answer
//        WHERE
//            answer.answer_id NOT IN(
//    SELECT
//                answer_id
//            FROM
//                correct_question_answer
//        )
//    ) AS answer
//ON
//    answer.question_id = quiz_question.question_id
//JOIN(
//    SELECT
//    @prev := NULL,
//    @rn := 0
//) AS vars
//) AS final
//WHERE
//rn <= 3
//UNION ALL
//SELECT
//	question.question_id,
//    question.question,
//	answer.answer_id,
//    answer.answer
//FROM
//    correct_question_answer
//JOIN quiz_question ON quiz_question.question_id = correct_question_answer.question_id
//JOIN question ON question.question_id = quiz_question.question_id
//JOIN answer ON correct_question_answer.answer_id = answer.answer_id
//WHERE
//    quiz_question.quiz_id = 1
//GROUP BY
//    answer.answer_id)AS tp ORDER by tp.question_id");
//    }

//select count(*), quiz_question.question_id, no_of_options from answer JOIN quiz_question ON quiz_question.question_id = answer.question_id WHERE quiZ_id=1 GROUP BY quiz_question.question_id

    private $answer;

}

//SELECT answer.answer_id,answer.answer from answer JOIN quiz_question ON quiz_question.question_id = answer.question_id where quiz_question.quiz_id = 1
//

//wrong answers
//SELECT
//    answer.answer_id,quiz_question.question_id,answer, question
//FROM
//    answer
//JOIN quiz_question ON quiz_question.question_id = answer.question_id
//JOIN question ON quiz_question.question_id = question.question_id
//WHERE
//    quiz_question.quiz_id = 1 AND answer.answer_id NOT IN(
//    SELECT
//        answer_id
//    FROM
//        correct_question_answer
//    JOIN quiz_question ON quiz_question.question_id = correct_question_answer.question_id
//    WHERE
//        quiz_id = 1
//    GROUP BY
//        quiz_question.question_id
//)

//correct answer
//SELECT
//    correct_question_answer.answer_id, answer.answer, quiz_question.question_id, question.question
//FROM
//    correct_question_answer
//JOIN quiz_question ON quiz_question.question_id = correct_question_answer.question_id
//JOIN question ON question.question_id = quiz_question.question_id
//JOIN answer ON correct_question_answer.answer_id = answer.answer_id
//WHERE
//    quiz_question.quiz_id = 1
//GROUP by correct_question_answer.answer_id
//
//
//
////combined query
//
//(SELECT
//	answer.answer_id,
//    answer.answer,
//    question
//FROM
//    answer
//JOIN quiz_question ON quiz_question.question_id = answer.question_id
//JOIN question ON quiz_question.question_id = question.question_id
//WHERE
//    quiz_question.quiz_id = 1 AND answer.answer_id NOT IN(
//    SELECT
//        answer_id
//    FROM
//        correct_question_answer
//    JOIN quiz_question ON quiz_question.question_id = correct_question_answer.question_id
//    WHERE
//        quiz_id = 1
//)
//LIMIT 3)
//UNION ALL
//SELECT
//	  answer.answer_id,
//    answer.answer,
//    question.question
//FROM
//    correct_question_answer
//JOIN quiz_question ON quiz_question.question_id = correct_question_answer.question_id
//JOIN question ON question.question_id = quiz_question.question_id
//JOIN answer ON correct_question_answer.answer_id = answer.answer_id
//WHERE
//    quiz_question.quiz_id = 1
//GROUP BY
//    quiz_question.question_id

//SELECT * FROM (SELECT
//    question_id,
//    question,
//    answer_id,
//    answer
//FROM
//(
//    SELECT
//        quiz_question.question_id,
//        question.question,
//        answer.answer,
//        answer.answer_id,
//        @rn := IF(
//@prev = quiz_question.question_id,
//            @rn + 1,
//            1
//        ) AS rn,
//        @prev := quiz_question.question_id
//    FROM
//        quiz_question
//    INNER JOIN question ON quiz_question.quiz_id = 1 AND quiz_question.question_id = question.question_id
//    INNER JOIN(
//    SELECT
//    *
//    FROM
//            answer
//        WHERE
//            answer.answer_id NOT IN(
//    SELECT
//                answer_id
//            FROM
//                correct_question_answer
//        )
//    ) AS answer
//ON
//    answer.question_id = quiz_question.question_id
//JOIN(
//    SELECT
//    @prev := NULL,
//    @rn := 0
//) AS vars
//) AS final
//WHERE
//rn <= 3
//UNION ALL
//SELECT
//	question.question_id,
//    question.question,
//	answer.answer_id,
//    answer.answer
//FROM
//    correct_question_answer
//JOIN quiz_question ON quiz_question.question_id = correct_question_answer.question_id
//JOIN question ON question.question_id = quiz_question.question_id
//JOIN answer ON correct_question_answer.answer_id = answer.answer_id
//WHERE
//    quiz_question.quiz_id = 1
//GROUP BY
//    answer.answer_id)AS tp ORDER by tp.question_id

//SELECT * FROM (SELECT
//    *,
//    @rownum := IF(@prev = question_id, @rownum + 1, 1) AS rownum,
//    @prev := question_id
//FROM
//    question_marks,
//    (
//    SELECT
//    @rownum := 0,
//    @prev := 0
//) AS t
//ORDER BY
//    question_id ASC, `w.e.f` DESC) AS tp
//WHERE tp.rownum = 1


//SELECT *, @markss:= IF(@markss!=20, @markss + marks, @status := 'f')  FROM(SELECT
//    *
//    FROM
//    (
//        SELECT
//        *,
//        @rownum := IF(
//@prev = question_id,
//            @rownum + 1,
//            1
//        ) AS rownum,
//        @prev := question_id
//    FROM
//        question_marks,
//        (
//        SELECT
//        @rownum := 0,
//        @prev := 0
//    ) AS t
//ORDER BY
//    question_id ASC,
//    `w.e.f`
//DESC
//) AS tp
//WHERE
//    tp.rownum = 1) as n, (SELECT @markss := 0, @status:= 't') as m

//SELECT * FROM (SELECT *, @markss:= IF(@markss <= 30, @markss + marks, 31) as mark  FROM(SELECT
//    *
//    FROM
//    (
//        SELECT
//        *,
//        @rownum := IF(
//@prev = question_id,
//            @rownum + 1,
//            1
//        ) AS rownum,
//        @prev := question_id
//    FROM
//        question_marks,
//        (
//        SELECT
//        @rownum := 0,
//        @prev := 0
//    ) AS t
//ORDER BY
//    question_id ASC,
//    `w.e.f`
//DESC
//) AS tp
//WHERE
//    tp.rownum = 1 ORDER BY RAND()) as n, (SELECT @markss := 0, @status:= 't') as m)as a HAVING mark <=30



