<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 6/27/2019
 * Time: 5:26 AM
 */

if (isset($_POST['submit'])) {

//quiz_id
//subject_id
//quiz_name
//quiz_marks
//quiz_type
//group_type
//duration
//start_dt
//end_dt
//passing_marks_percentage
//retest_ref_id
//status
//negative_marks
//deleted
//created_at
//updated_at
//deleted_at
//created_by
//updated_by
//deleted_by

    $subject_id = $_POST['quiz-subject'];
    $quiz_name = $_POST['quiz-title'];
    $quiz_marks = $_POST['quiz-marks'];
    $quiz_type = $_POST['quiz-type'];
    $group_type = $_POST['group-type'];
    $duration = $_POST['duration'];
    $start_dt = $_POST['start_dt'];
    $status = "draft";
    $passing_marks = $_POST['passing-marks'];
    $negative_marks = $_POST['negative-marks'];



    $quiz->insert(array("subject" => $subject_id, "quiz_name" => $quiz_name, "quiz_marks" => $quiz_marks, "$quiz_type" => $quiz_type, "group_type" => $group_type, "duration" => $duration, "start_dt" => $start_dt, "passing_marks_percentage" => $passing_marks, "retest_ref_id" => $retest_ref_id, "status" => $status, "negative_marks" => $negative_marks));


}

?>
<div class="card">
    <div class="card-body">
        <form action="#" class="gray-form" method="post">
            <div class="form-group">
                <h3>Quiz Title</h3>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" id="quiz-title" class="form-control" name="quiz-title">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <h3>Assign Quiz To</h3>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <label for="quiz-class">Class</label>
                        <select class="quiz-class form-control" name="quiz-class" id="quiz-class" multiple="multiple">
                        <?php
                            $classes = $classObj->getClassByTeacher(2);
                            foreach ($classes as $classRS){
                                echo<<<CLASS
                                <option value="{$classRS->class_id}">{$classRS->class_name}</option>

CLASS;
                            }
                        ?>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="batch">Batch</label>
                        <select class="quiz-batch form-control" name="quiz-batch" id="quiz-batch" multiple="multiple">
                            <?php
                            $batches = $batchObj->getBatchByTeacher(2);
                            foreach ($batches as $batch){
                                echo<<<CLASS
                                <option value="{$batch->batch_id}">{$batch->batch_name}</option>
CLASS;
                            }
                            ?>
                        </select>
                    </div>
                    <br>
                    <div class="col-md-6">
                        <button class="add-students form-control" type="button">
                            Add students here
                        </button>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <h3>Select Topic</h3>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <label for="quiz-subject">Subject</label>
                        <select class="quiz-subject form-control" name="quiz-subject" id="quiz-subject">
                            <?php
                            $subjects = $subjectObj->getSubjectIdByTeacher(2);
                            foreach ($subjects as $subject){
                                echo<<<SUBJECT
                                <option value="{$subject->subject_id}">{$subject->subject_name}</option>
SUBJECT;
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="quiz-chapter">Chapter</label>
                        <select name="quiz-chapter" class="quiz-chapter form-control" multiple="multiple">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <h3>Quiz Settings</h3>
                <hr>
                <div class="row">
                    <div class="col-md-6 ">
                        <label for="quiz-difficulty">Difficulty Level</label>
                        <select name="quiz-difficulty" id="quiz-difficulty" class="form-control">
                            <option value="1">Easy</option>
                            <option value="2">Medium</option>
                            <option value="3">Hard</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="quiz-type">Quiz Type</label>
                        <select name="quiz-type" id="quiz-type" class="form-control">
                            <option value="1">Quiz</option>
                            <option value="2">Retest Quiz</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="date-time">Start Date and Time</label>
                        <input class="datetime form-control" type='text' name="start_dt"/>
                    </div>
                    <div class="col-md-6">
                        <label for="duration">Duration</label>
                        <input class="duration form-control" type="text" name="duration">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="neg-marks">Enter marks</label>
                        <input type="text" class="form-control" name="quiz-marks">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="neg-marks">Enter passing marks %</label>
                        <input type="text" class="form-control" name="passing-marks">
                    </div>
                    <div class="col-md-6">
                        <label for="total-time">Enter negative marks %</label>
                        <input type="text" class="form-control" name="negative-marks">
                    </div>
                </div>
            </div>

            <div class="form-group start-adding-question" align="center">
                <button type="submit" class="btn btn-secondary" name="submit">Create</button>
<!--                <button type="submit" class="btn btn-primary">Start Adding Questions</button>-->
            </div>
        </form>
    </div>
</div>

