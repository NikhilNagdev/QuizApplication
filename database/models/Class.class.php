<?php
/**
 * Created by PhpStorm.
 * User: Aarti
 * Date: 6/18/2019
 * Time: 8:07 PM
 */

require_once $_SERVER['DOCUMENT_ROOT']."/database/core/CRUD.class.php";

class ClassTable{

    function __construct(){
        $this->class = CRUD::table("class");
        $this->teaches = CRUD::table("teaches");
    }

    public function getClassByTeacher($teacher_id){

        //SELECT class.class_id, class.class_name FROM `teaches` JOIN batch ON batch.batch_id = teaches.batch_id JOIN class ON class.class_id = batch.class_id WHERE teaches.teacher_id = 2 AND class.deleted = 0 AND batch.deleted = 0 AND teaches.is_teaching = 0 GROUP BY class.class_id
        return $this->teaches->select("class.class_id", "class.class_name")
            ->join("batch", "batch.batch_id", "teaches.batch_id")
            ->join("class", "class.class_id", "batch.class_id")
            ->where("teaches.teacher_id", $teacher_id)
            ->andWhere("class.deleted", 0)
            ->andWhere("batch.deleted", 0)
            ->andWhere("teaches.is_teaching", 0)
            ->groupBy("class.class_id")
            ->get()
            ->fetchAll();

    }

    private $class;
    private $teaches;

}


