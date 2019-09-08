<?php

/**
 * Created by PhpStorm.
 * User: rp wadhwani
 * Date: 24-Jul-19
 * Time: 1:28 AM
 */


/**
 * Created by PhpStorm.
 * User: rp wadhwani
 * Date: 02-Jul-19
 * Time: 2:44 AM
 */
require_once "../../document_root.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Question.class.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Answer.class.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/pages/quiz/test.php";



$qa= array();
function generateQuestionAnswer(){
    global $qa;
//    $qa=array();
    for ($i = 0; ; $i++) {
        if (isset($_SESSION['i']))
            $returnArray = generateQuestion($_SESSION['i'], 1);
        else
            $returnArray = generateQuestion();

        $qa[$i] = $returnArray;
        if (array_key_exists("end", $returnArray) && $returnArray["end"] == "true") {
            break;
        }
//        print_r("oo");
    }
//    print_r("kkkoo");
    return $qa;

}

function getQuestionAnswer($index){
    global $qa;
    unset($_SESSION['i']);
    generateQuestionAnswer();
    return $qa[$index];
//    return $qa[$index];
}
//generateQuestionAnswer();
//print_r($qa);
//print_r(getQuestionAnswer(0));
//
//print_r(getQuestionAnswer(1));
//print_r(getQuestionAnswer(2));
//print_r(getQuestionAnswer(5));
