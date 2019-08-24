<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 6/27/2019
 * Time: 5:26 AM
 */

if (isset($_POST['submit'])) {


    $quiz_id = $quizObj->getLatestConductedQuiz(1)->quiz_id;


    if($_POST['batch']){
        $batches = $_POST['batch'];
        $quizObj->insertStudentsForQuizByBatch($batches, $quiz_id);
    }elseif($_POST['student']){
        $students = $_POST['students'];
        $quizObj->insertStudentsForQuizByStudents($students, $quiz_id);
    }

//    header("Location: index.php?view-all-quizzes");

//    tabbed pane card ke piche se aan chaiye jab hover kiya

}

?>
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" href="#batch-tab" role="tab" data-toggle="tab"><h2>By Batch</h2></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#student-tab" role="tab" data-toggle="tab"><h2>By Students</h2></a>
    </li>
</ul>
<div class="card">
<!--    <div class="card-header">-->

<!--    </div>-->
    <div class="card-body">
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane animated fadeIn active" id="batch-tab">
                <form action="#" class="gray-form" method="post">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="" class="view-all-batches display table table-striped table-hover"
                                           style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th>Sr no</th>
                                            <th>Class</th>
                                            <th>Batch</th>
                                            <th>Add
                                                <div class="pull-right">
                                                    <label for="">Select all</label>
                                                    <input class="select-all-batch-ids" type="checkbox">
                                                </div>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="student-data">
                                        <?php
                                        $batches = $batchObj->getBatchBySubjectAndClass(4, 1);
                                        $index = 0;
                                        foreach ($batches as $batch) {
                                            $index++;
                                            echo <<<STUDENT
                            <tr>
                                <td>$index</td>
                                <td>$batch->class_name</td>
                                <td>$batch->batch_name</td>
                                <td><label for="batch[]" class="pr-3">Check here</label><input id="" name="batch[]" type="checkbox" class="select-batch-id"value="$batch->batch_id"></td>
                            </tr>
STUDENT;
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="form-group start-adding-question" align="center">
                            <button type="submit" class="btn btn-secondary" name="submit">Add Students</button>
                        </div>
                    </div>
                    <form>

                    </form>
                </form>
            </div>
            <div role="tabpanel" class="tab-pane animated fadeIn" id="student-tab"><form action="#" class="gray-form" method="post">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="" class="view-all-students display table table-striped table-hover"
                                           style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Student Name</th>
                                            <th>Class Name</th>
                                            <th>Batch Name</th>
                                            <th>Add</th>
                                        </tr>
                                        </thead>
                                        <tbody class="student-data">
                                        <?php
                                        $students = $studentObj->getStudentsByClass(2);
                                        foreach ($students as $student){
                                            echo <<<STUDENT
                                            <tr>
                                                <td>$student->student_id</td>
                                                <td>$student->name</td>
                                                <td>$student->class_name</td>
                                                <td>$student->batch_name</td>
                                                <td><label for="student[]" class="pr-3">Check here</label><input id="" name="student[]" type="checkbox" class="select-student-id"value="$student->student_id"></td>
                                            </tr>
STUDENT;

                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="form-group start-adding-question" align="center">
                            <button type="submit" class="btn btn-secondary" name="submit">Add Students</button>
                        </div>
                    </div>
                    <form>

                    </form>
                </form></div>

        </div>
        </div>
</div>

