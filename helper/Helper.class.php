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
        if(strcasecmp($sourceString, "view-all-quizzes.php") == 0){
            return "All Quizzes";
        }
        elseif(strcasecmp($sourceString, "create-quiz") == 0){
            return "Create a quiz";
        }elseif(strcasecmp($sourceString, "add-quiz-question") == 0){
            return "Add Questions For Quiz";
        }
    }

    public function getOptions($rs){
        $options = "";
        foreach ($rs as $row){
            $options .= "<option value=\"$row->id\">$row->name</option>";
        }
        return $options;
    }


}

