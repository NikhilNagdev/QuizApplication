<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 6/28/2019
 * Time: 6:48 AM
 */

include_once "../../document_root.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Batch.class.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Subject.class.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Chapter.class.php";


class AjaxHelper{

    public static function getBatchesByTeacher($teacher_id){
        $batchObj = new Batch();
        $batches = $batchObj->getBatchByTeacher($teacher_id);
        $options = "";
        foreach ($batches as $batch){
            $options.="<option value=\"$batch->batch_id\">{$batch->batch_name}</option>";
        }
        return $options;
    }

    public static function getBatchesByTeacherAndClass($teacher_id, $class_id){
        $batchObj = new Batch();
        $batches = $batchObj->getBatchByTeacherAndClass($teacher_id, $class_id);
        $options = "";
        foreach ($batches as $batch){
            $options.="<option value=\"$batch->batch_id\">{$batch->batch_name}</option>";
        }
        return $options;
    }

    public static function getSubjectsByTeacherAndBatch($teacher_id, $batch_id){
        $subject = new Subject();
        $subjects = $subject->getSubjectByTeacherAndBatch($teacher_id, $batch_id);
        $options = "";
        foreach ($subjects as $subject){
            $options.="<option value=\"$subject->subject_id\">{$subject->subject_name}</option>";
        }
        return $options;
    }

    public static function getSubjectsByTeacher($teacher_id){
        $subject = new Subject();
        $subjects = $subject->getSubjectIdByTeacher($teacher_id);
        $options = "";
        foreach ($subjects as $subject){
            $options.="<option value=\"$subject->subject_id\">{$subject->subject_name}</option>";
        }
        return $options;
    }

    public static function getChapters($subject_id){
        $chapter = new Chapter();
        $chapters = $chapter->getChapters($subject_id);
//        $options = "<option value=\"\" selected disabled hidden>Select Chapter Here</option>";
        $options = "";
        foreach ($chapters as $chapter) {
            $options .= "<option value=$chapter->chapter_id>{$chapter->chapter_no}: {$chapter->chapter_name}</option>";
        }
        return $options;
    }

}

if(isset($_GET['call'])){

    if(strcasecmp("getbatches()", $_GET['call']) == 0){
        if(isset($_POST['class_id'])){
            $call = substr($_GET['call'], 0, -2)."ByTeacherAndClass";
            echo AjaxHelper::$call(2, $_POST['class_id'][0]);
        }else{
            $call = substr($_GET['call'], 0, -2)."ByTeacher";
            echo AjaxHelper::$call(2);
        }
    }
    elseif (strcasecmp("getSubjects()", $_GET['call']) == 0){
        if(isset($_POST['batch_id'])){
            $call = substr($_GET['call'], 0, -2)."ByTeacherAndBatch";
            echo AjaxHelper::$call(2, $_POST['batch_id'][0]);
        }else{
            $call = substr($_GET['call'], 0, -2)."ByTeacher";
            echo AjaxHelper::$call(2);
        }
    }
    elseif (strcasecmp("getChapters()", $_GET['call']) == 0){
        if(isset($_POST['subject_id'])){
            echo AjaxHelper::getChapters($_POST['subject_id'][0]);
        }
    }
}