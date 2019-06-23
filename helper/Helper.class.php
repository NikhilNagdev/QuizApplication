<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 6/23/2019
 * Time: 5:33 AM
 */

class Helper{

    public function createCircles($circleNo, $maxValue, $marks, $passingValue){
        $circleNo = (int)$circleNo;
        $maxValue = (int)$maxValue;
        $marks = (int)$marks;
        $passingValue = (double)$passingValue;
        $passing = $maxValue * ($passingValue/100);
        if($marks < $passing){
            $color = '#F25961';
        }else{
            $color = '#2BB930';
        }
        echo<<<CIRCLE
        <script src="https://localhost/quizapplication/assets/js/core/jquery.3.2.1.min.js"></script>
<script>
$(document).ready(function(){
    Circles.create({
        id:'circles-{$circleNo}',
        radius:45,
        value:{$marks},
        maxValue:{$maxValue},
        width:7,
        text: "{$marks} / {$maxValue}",
        colors:['#F1F1F1', '{$color}'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true,
        fontSize: 1,
    })    ;
});

</script>
CIRCLE;

    }

}