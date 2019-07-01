<?php
/**
 * Created by PhpStorm.
 * User: Aarti
 * Date: 6/18/2019
 * Time: 8:04 PM
 */

require_once $_SERVER['DOCUMENT_ROOT']."/database/core/CRUD.class.php";

class Student{

    function __construct(){
        $this->student = CRUD::table("student");
        $this->student_details = CRUD::table("student_details");
    }

    public function getStudentsByClass($class_id){
        //SELECT student_details.student_id, user.name, batch.batch_id, batch.batch_name, class.class_id, class.class_name FROM `student_details` JOIN batch ON batch.batch_id = student_details.batch_id JOIN class ON class.class_id = batch.class_id JOIN student ON student.student_id = student_details.student_id JOIN user ON student.user_id = user.user_id WHERE class.class_id = 1 GROUP BY student.student_id

        return $this->student_details->select("student_details.student_id", "user.name", "batch.batch_id", "batch.batch_name", "class.class_id", "class.class_name")
            ->join("batch", "batch.batch_id", "student_details.batch_id")
            ->join("class", "class.class_id", "batch.class_id")
            ->join("student", "student.student_id","student_details.student_id")
            ->join("user", "student.user_id", "user.user_id")
            ->where("class.class_id", $class_id)
//            ->groupBy("student.student_id")
            ->get()
            ->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getStudentsByBatch($batch_id){
        //SELECT student_details.student_id, user.name, batch.batch_id, batch.batch_name, class.class_id, class.class_name FROM `student_details` JOIN batch ON batch.batch_id = student_details.batch_id JOIN class ON class.class_id = batch.class_id JOIN student ON student.student_id = student_details.student_id JOIN user ON student.user_id = user.user_id WHERE batch.batch_id = 2 GROUP BY student.student_id

        return $this->student_details->select("student_details.student_id", "user.name", "batch.batch_id", "batch.batch_name", "class.class_id", "class.class_name")
            ->join("batch", "batch.batch_id", "student_details.batch_id")
            ->join("class", "class.class_id", "batch.class_id")
            ->join("student", "student.student_id","student_details.student_id")
            ->join("user", "student.user_id", "user.user_id")
            ->where("batch.batch_id", $batch_id)
            ->groupBy("student.student_id")
            ->get()
            ->fetchAll();

    }


    private $student;
    private $student_details;

}
