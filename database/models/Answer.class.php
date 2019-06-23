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
    private function generateCorrectOptions($quiz_id){
        $this->answer->select("correct_question_answer.answer_id", "answer.answer", "quiz_question.question_id", "question.question")->join("quiz_question", "quiz_question.question_id", "correct_question_answer.question_id")->join("question", "question.question_id", "quiz_question.question_id")->join("answer", "correct_question_answer.answer_id", "answer.answer_id")->where("quiz_question.quiz_id", $quiz_id)->groupBy("quiz_question.question_id")->get();


    }
    private function generateWrongOptions($quiz_id){
        $this->answer->where("quiz_question.quiz_id", $quiz_id)->select("answer.answer_id","quiz_question.question_id", "answer", "question")->join("quiz_question", "quiz_question.question_id", "answer.question_id")->join("question","quiz_question.question_id ","question.question_id")->groupBy("quiz_question.question_id")->get();

    }

    public function generateOptions($questionId, $quiz_id, $noOfOptions=4){

    }

    public function generate(){
        return $this->answer->pdo->query("SELECT * FROM (SELECT
    question_id,
    question,
    answer_id,
    answer
FROM
(
    SELECT
        quiz_question.question_id,
        question.question,
        answer.answer,
        answer.answer_id,
        @rn := IF(
@prev = quiz_question.question_id,
            @rn + 1,
            1
        ) AS rn,
        @prev := quiz_question.question_id
    FROM
        quiz_question
    INNER JOIN question ON quiz_question.quiz_id = 1 AND quiz_question.question_id = question.question_id
    INNER JOIN(
    SELECT
    *
    FROM
            answer
        WHERE
            answer.answer_id NOT IN(
    SELECT
                answer_id
            FROM
                correct_question_answer
        )
    ) AS answer
ON
    answer.question_id = quiz_question.question_id
JOIN(
    SELECT
    @prev := NULL,
    @rn := 0
) AS vars
) AS final
WHERE
rn <= 3
UNION ALL
SELECT
	question.question_id,
    question.question,
	answer.answer_id,
    answer.answer
FROM
    correct_question_answer
JOIN quiz_question ON quiz_question.question_id = correct_question_answer.question_id
JOIN question ON question.question_id = quiz_question.question_id
JOIN answer ON correct_question_answer.answer_id = answer.answer_id
WHERE
    quiz_question.quiz_id = 1
GROUP BY
    answer.answer_id)AS tp ORDER by tp.question_id");
    }

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