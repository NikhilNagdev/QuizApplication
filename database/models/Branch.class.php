<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 6/17/2019
 * Time: 5:22 AM
 */

require_once $_SERVER['DOCUMENT_ROOT']."/database/core/CRUD.class.php";

class Branch{

    function __construct(){
        $this->branchObj = CRUD::table("branch");
    }

    public function getBranchID($branch){
        return $this->branchObj->where("branch_name", $branch)
            ->select("branch_id")
            ->get()
            ->fetch()->branch_id;
    }

    public function __call($name, $arguments){
//        if(preg_match())
    }

    private $branchObj;

}