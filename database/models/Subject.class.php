<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 6/17/2019
 * Time: 4:39 AM
 */

require_once $_SERVER['DOCUMENT_ROOT']."/database/core/CRUD.class.php";
require_once $_SERVER['DOCUMENT_ROOT']."/database/models/Branch.class.php";

class Subject{

    function __construct(){
        $this->subjectObj = CRUD::table("subject");
    }

    public function getSubjectID($subjectName, $sem="", $branch_name=""){
        $branch = new Branch();
        if($sem === '' && $branch_name === ''){
            return $this->subjectObj->where("subject_name", $subjectName)
                                    ->select("subject_id")
                                    ->get()->fetch()->subject_id;
        }elseif ($sem !== '' && $branch_name === ''){
            return $this->subjectObj->where("subject_name", $subjectName)
                                    ->andWhere("sem_no", $sem)
                                    ->select("subject_id")
                                    ->get();
        }elseif ($sem === '' && $branch_name !== ''){
            return $this->subjectObj->where("subject_name", $subjectName)
                                    ->andWhere("branch", $branch->getBranchID($branch_name))
                                    ->select("subject_id")
                                    ->get();
        }
        return $this->subjectObj->where("subject_name", $subjectName)
                                ->andWhere("sem_no", $sem)
                                ->andWhere("branch", $branch->getBranchID($branch_name))
                                ->select("subject_id")
                                ->get();

    }

    public function getSubjectsBySemAndBranch($semNo, $branch_id){

        return $this->subjectObj->select("subject_name")
            ->join("branch", "subject.branch_id", "branch.branch_id")
            ->where("subject.branch_id", $branch_id)
            ->andWhere("subject.sem_no", $semNo)
            ->get()
            ->fetchAll();


//        SELECT
//    subject_name
//FROM
//    `subject`
//JOIN branch ON
//    subject.branch_id = branch.branch_id
//WHERE
//    subject.branch_id = 1 AND SUBJECT.sem_no = 4


    }

    private $subjectObj;

}
