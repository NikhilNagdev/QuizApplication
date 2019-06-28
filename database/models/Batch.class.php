<?php
/**
 * Created by PhpStorm.
 * User: Aarti
 * Date: 6/18/2019
 * Time: 8:07 PM
 */

require_once $_SERVER['DOCUMENT_ROOT']."/database/core/CRUD.class.php";

class Batch{

    function __construct(){
        $this->batch = CRUD::table("batch");
    }

    public function getBatchByTeacherAndClass($teacher_id, $class_id){

        //SELECT batch.batch_id, batch.batch_name FROM batch JOIN class ON class.class_id = batch.class_id
        //JOIN teaches ON teaches.batch_id = batch.batch_id WHERE class.class_id = 1 AND teaches.teacher_id = 2 AND teaches.is_teaching = 0
        return $this->batch->select("batch.batch_id", "batch.batch_name")
            ->join("class", "class.class_id", "batch.class_id")
            ->join("teaches", "teaches.batch_id", "batch.batch_id")
            ->where("class.class_id = 1", $class_id)
            ->andWhere("teaches.teacher_id", $teacher_id)
            ->andWhere("teaches.is_teaching", 0)
            ->get()
            ->fetchAll();
    }

    public function getBatchByTeacher($teacher_id){
        return $this->batch->select("batch.batch_id", "batch.batch_name")
            ->join("class", "class.class_id", "batch.class_id")
            ->join("teaches", "teaches.batch_id", "batch.batch_id")
            ->where("teaches.teacher_id", $teacher_id)
            ->andWhere("teaches.is_teaching", 0)
            ->get()
            ->fetchAll();
    }

    private $batch;

}




