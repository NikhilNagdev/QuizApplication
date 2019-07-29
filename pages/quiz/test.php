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
$wa=$ans->generate(2);
//die();
$ra=$ans->generateCorrectOptions(2);

//print_r($ra);
//echo "<br><br>";

//print_r($wa);
function generateQuestion($currentQuestion=0,$increment=1){

    global $wa,$ra;
    $tempQuestion = null;
    $tempQuestionId = -1;
    $returnArray = array();
    $i=$currentQuestion;
    $tempArr=array();
    $_SESSION['start']=$i;
    if($currentQuestion==0){
        $returnArray["start"]="true";
    }
    $tempQuestion = $wa[$currentQuestion];
    $tempQuestionId= $tempQuestion->question_id;
    if($increment==1) {
//        print("<br>if - {$_SESSION['i']}");

        for ($i = $currentQuestion; ; $i++) {
            if ($i < count($wa)) {
                $tempQuestion = $wa[$i];
//            echo "if<br>";
            } else
                break;
//        $returnArray[$wa[$i]->answer_id] = $tempQuestion->answer;
            if ($tempQuestion->question_id != $tempQuestionId) {
                break;
            } else {
                if ($i == $currentQuestion) {
//                echo "h.$i. .$currentQuestion";

                    $returnArray['question'] = array($tempQuestionId => $wa[$i]->question);
//                $tempQuestionId = $tempQuestion->question_id;
                }
//            if($i<count($wa))
                $returnArray[$wa[$i]->answer_id] = $tempQuestion->answer;

            }
        }
        if($i==count($wa)){
            $returnArray["end"]="true";
        }
    }else if($increment==0) {
        $_SESSION['i']=$currentQuestion;
        $tempQuestion = $wa[$currentQuestion-1];
        $tempQuestionId= $tempQuestion->question_id;
//        print("<br>else - {$_SESSION['start']}");

        for ($i = ($currentQuestion-1); ; $i--) {
            if ($i >= 0) {
                $tempQuestion = $wa[$i];
//            echo "if<br>";
            } else
                break;
//        $returnArray[$wa[$i]->answer_id] = $tempQuestion->answer;

            if ($tempQuestion->question_id != $tempQuestionId) {
                break;
            } else {
                if ($i == ($currentQuestion-1)) {
//                echo "h.$i. .$currentQuestion";

                    $tempArr['question'] = array($tempQuestionId => $wa[$i]->question);
//                $tempQuestionId = $tempQuestion->question_id;
                }
//            if($i<count($wa))
                $tempArr[$wa[$i]->answer_id] = $tempQuestion->answer;

            }
        }
        $_SESSION['start']=($i+1);

        if($i==-1) {
            $returnArray["start"] = "true";
        }
    }
    if($increment==0)
        $returnArray=array_reverse($tempArr,1);

    $right = $ra[$tempQuestionId];
    foreach ($right as $key=>$value){
        $returnArray[$key]=$value;
//echo "$key=$value<br>";
    }
//    print_r($returnArray);
//    session_start();
    if($increment==1)
        $_SESSION['i']=$i;
//    echo "<br><br><br><br>";
//    print_r($returnArray);
    return $returnArray;

}

//generateQuestion($_SESSION['start'],0);
//echo "<br><br>";
//print_r(generateQuestion());
//echo "<br><br>";
//print_r(generateQuestion($_SESSION['i']));
//echo "<br><br>";
//print_r(generateQuestion($_SESSION['i']));
//echo "<br><br>";
//print_r(generateQuestion($_SESSION['start'],0));
//echo "<br><br>";
//print_r(generateQuestion($_SESSION['i']));