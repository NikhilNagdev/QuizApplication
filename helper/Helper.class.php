<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 6/23/2019
 * Time: 5:33 AM
 */

class Helper
{

    public function createCircles($circleNo, $maxValue, $marks, $passingValue)
    {
        $circleNo = (int)$circleNo;
        $maxValue = (int)$maxValue;
        $marks = (int)$marks;
        $passingValue = (double)$passingValue;
        $passing = $maxValue * ($passingValue / 100);
        if ($marks < $passing) {
            $color = '#F25961';
        } else {
            $color = '#2BB930';
        }
        return <<<CIRCLE
        <script>
            $(document).ready(function(){
                addCircle({$circleNo}, {$maxValue}, {$marks}, '{$color}');
            });
        </script>
CIRCLE;
    }

    public function getHeadingName($sourceString){
        if(strcasecmp($sourceString, "view-all-quizzes.php" == 0)){
            return "All Quizzes";
        }
    }

}