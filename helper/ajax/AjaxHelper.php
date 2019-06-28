<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 6/28/2019
 * Time: 6:48 AM
 */

if(isset($_POST['call'])){
    $ajaxHelper = new AjaxHelper();
    $ajaxHelper->$_POST['call']();
}

include_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Batch.class.php";


class AjaxHelper{

    public function getBatches($teacher_id){
        $batchObj = new Batch();
        $batches = $batchObj->getBatchByTeacher($teacher_id);
        $options = "";
        foreach ($batches as $batch){
            $options.="<option value=\"$batch->batch_id\">{$batch->batch_name}</option>";
        }
        return $options;
    }

}