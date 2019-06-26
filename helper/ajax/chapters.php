<?php
require_once "../../document_root.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/models/Chapter.class.php";
if (isset($_GET['subject_id'])){
    $chapter = new Chapter();
    $chapters = $chapter->getChapters($_GET['subject_id']);
    $options = "<option value=\"\" selected disabled hidden>Select Subject Here</option>";
    foreach ($chapters as $chapter) {
              $options .= "<option value=$chapter->chapter_id>{$chapter->chapter_no}: {$chapter->chapter_name}</option>";
    }
    echo $options;
}

