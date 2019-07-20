<?php
/**
 * Created by PhpStorm.
 * User: rp wadhwani
 * Date: 15-Jul-19
 * Time: 8:56 PM
 */

require_once "../../document_root.php";

//require_once $_SERVER['DOCUMENT_ROOT']."/database/models/Subject.class.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Answer.class.php";
$ans = new Answer();
$wa=$ans->generate(1);
//die();
$ra=$ans->generateCorrectOptions(1);

//print_r($ra);
//echo "<br><br>";
//
//print_r($wa);
function generateQuestion($currentQuestion=0){

    global $wa,$ra;
    $tempQuestion = null;
    $tempQuestionId = -1;
    $returnArray = array();

    $tempQuestion = $wa[$currentQuestion];
    $tempQuestionId= $tempQuestion->question_id;
    for($i=$currentQuestion; ;$i++){
        if ($i<count($wa)) {
            $tempQuestion = $wa[$i];
//            echo "if<br>";
        }
        else
            break;
//        $returnArray[$wa[$i]->answer_id] = $tempQuestion->answer;
        if($tempQuestion->question_id != $tempQuestionId){
            break;
        }else{
            if($i == $currentQuestion) {
//                echo "h.$i. .$currentQuestion";

                $returnArray['question'] = array($tempQuestionId=> $wa[$i]->question);
//                $tempQuestionId = $tempQuestion->question_id;
            }
//            if($i<count($wa))
            $returnArray[$wa[$i]->answer_id] = $tempQuestion->answer;

        }
    }

    $right = $ra[$tempQuestionId];
    foreach ($right as $key=>$value){
        $returnArray[$key]=$value;

    }
//    print_r($returnArray);
//    session_start();
    $_SESSION['i']=$i;
//    echo "<br><br>{$_SESSION['i']}<br><br>";
//    print_r($returnArray);
    return $returnArray;

}
generateQuestion(0);
generateQuestion(57);
//echo "<br><br>";
//print_r(generateQuestion());
//print_r(generateQuestion($i));
//print_r(generateQuestion($i));