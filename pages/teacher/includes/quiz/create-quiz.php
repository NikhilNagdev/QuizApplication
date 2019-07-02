<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 6/27/2019
 * Time: 5:26 AM
 */

if (isset($_POST['submit'])) {


    $subject_id = $_POST['quiz-subject'];//subject_id
    $quiz_name = $_POST['quiz-title'];//quiz_name
    $quiz_marks = $_POST['quiz-marks'];//quiz_marks
    $quiz_type = $_POST['quiz-type'];//quiz_type
    $group_type = $_POST['group-type'];//group_type
    $duration = $_POST['duration'];//duration
    $start_dt = $_POST['start_dt'];//start_dt
    $retest_ref_id = $_POST['retest-ref-id'];
    $status = "draft";//status
    $passing_marks = $_POST['passing-marks'];//passing_marks_percentage
    $negative_marks = $_POST['negative-marks'];//negative_marks
    $chapters = $_POST['quiz-chapter'];
    $difficulty = $_POST['quiz-difficulty'];

    echo $start_dt;

//    if($quiz->insert(array("subject_id" => $subject_id, "quiz_name" => $quiz_name, "quiz_marks" => $quiz_marks, "quiz_type" => $quiz_type, "group_type" => $group_type, "duration" => $duration, "start_dt" => $start_dt, "passing_marks_percentage" => $passing_marks, "retest_ref_id" => $retest_ref_id, "status" => $status, "negative_marks" => $negative_marks))){

        $quiz_id = $quiz->getLatestConductedQuiz(2)->quiz_id;
        $quiz->insertQuizChapters($quiz_id, $_POST['quiz-chapter']);
        $quiz->insertQuizDifficulty($quiz_id, $_POST['quiz-difficulty']);

        header("location: index.php?src=add-students");

//    }else{
//
//    }


}

?>
<div class="card">
    <div class="card-body">
        <form action="#" class="gray-form" method="post">

            <div class="form-group">
                <h3>Quiz Title</h3>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Enter title of quiz</label>
                        <input type="text" id="quiz-title" class="form-control" name="quiz-title" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <h3>Select Topic</h3>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <label for="quiz-subject">Subject</label>
                        <select class="" name="quiz-subject" id="quiz-subject" required>
                            <option value="" selected disabled></option>
                            <?php
                            $subjects = $subjectObj->getSubjectIdByTeacher(2);
                            echo $helper->getOptions($subjects);
                            ?>
                            <option value="5">2</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="quiz-chapter">Chapter</label>
                        <select name="quiz-chapter[]" id="quiz-chapter" multiple="multiple" >

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
                        <select name="quiz-difficulty[]" id="quiz-difficulty" class="" multiple="multiple">
                            <option value="1">Select difficulty here</option>
                            <option value="1">Easy</option>
                            <option value="2">Medium</option>
                            <option value="3">Hard</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="quiz-type">Quiz Type</label>
                        <select name="quiz-type" id="quiz-type" class="" required>
                            <option value="" selected disabled></option>
                            <option value="1">Quiz</option>
                            <option value="2">Retest Quiz</option>
                        </select>
                        <div class="retest-ref-id">
                            <input type="hidden" name="retest-ref-id">
                        </div>
                    </div>

                </div>
            </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="date-time">Start Date and Time</label>
                            <input class="datetime form-control" type='text' name="start_dt" required/>
                        </div>
                        <div class="col-md-6">
                            <label for="duration">Duration</label>
                            <input class="duration form-control" type="text" name="duration" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="neg-marks">Enter marks</label>
                            <input type="text" class="form-control" name="quiz-marks" required>
                        </div>
                        <div class="col-md-6">
                            <label for="neg-marks">Select group type</label>
                            <select name="group-type" id="group-type" class="" required>
                                <option value="" selected disabled></option>
                                <option value="1">Class</option>
                                <option value="2">Batch</option>
                                <option value="3">Student</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="neg-marks">Enter passing marks %</label>
                            <input type="text" class="form-control" name="passing-marks" required>
                        </div>
                        <div class="col-md-6">
                            <label for="total-time">Enter negative marks %</label>
                            <input type="text" class="form-control" name="negative-marks" required>
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

