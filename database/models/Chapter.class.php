<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 6/17/2019
 * Time: 4:38 AM
 */

require_once $_SERVER['DOCUMENT_ROOT']."/database/core/CRUD.class.php";
require_once $_SERVER['DOCUMENT_ROOT']."/database/models/Subject.class.php";

class Chapter{

    function __construct(){
        $this->chapterObj = CRUD::table("chapter");
    }

    public function getChapterID($subject_name, $chapterNo){
        echo "<br>".$subject_name."<br>".$chapterNo;
        $subject = new Subject();
        return $this->chapterObj->where("subject_id",$subject->getSubjectID($subject_name))
            ->andWhere("chapter_no", $chapterNo)
            ->select("chapter_id")
            ->get()
            ->fetch()->chapter_id;
    }

    public function getChapters($subject_id){
        return $this->chapterObj->select("chapter_id", "chapter_no", "chapter_name")
            ->where("subject_id", $subject_id)
            ->get()
            ->fetchAll();
    }

    private $chapterObj;

}