<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 6/17/2019
 * Time: 4:39 AM
 */

require_once "database/core/CRUD.class.php";
require_once "database/models/Branch.class.php";

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

    private $subjectObj;

}
