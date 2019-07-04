<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 6/27/2019
 * Time: 5:26 AM
 */

$quiz_id = "";
if (isset($_POST['select-quiz-submit'])) {
    $quiz_id = $_POST['quiz_id'];
}
if (isset($_POST['add-question-submit'])) {

    var_dump($_POST['questionIds']);
//    $quizObj->insertQuizQestions($_POST['questions']);
}

?>
<div class="card">
    <div class="card-body">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item pull-right">
                <a class="nav-link active" href="#batch-tab" role="tab" data-toggle="tab"><h2>Manually</h2></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#student-tab" role="tab" data-toggle="tab"><h2>Randomly</h2></a></li>
        </ul>


        <!-- Tab panes -->
        <div class="tab-content">

            <div role="tabpanel" class="tab-pane animated fadeIn active" id="batch-tab">
                <form action="#" class="gray-form" method="post">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="view-all-questions"
                                           class="view-all-questions display table table-striped table-hover"
                                           style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th>Sr no</th>
                                            <th>Question</th>
                                            <th>Chapter</th>
                                            <th>Marks</th>
                                            <th>Add
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="questions">
                                        <?php
                                        $questions = $questionObj->getQuestionsByQuiz($quiz_id);
                                        $index = 0;
                                        foreach ($questions as $question) {
                                            $index++;
                                            echo <<<STUDENT
                                                <tr>
                                                    <td>$index</td>
                                                    <td>$question->question</td>
                                                    <td>$question->chapter_name</td>
                                                    <td>$question->marks</td>
                                                    <td><label for="questions[]" class="pr-3">Check here</label><input id="select-question-id" name="questions[]" type="checkbox" class="select-question-id" value="$question->question_id"></td>
                                                </tr>
<input type="checkbox" name="questionIds[]" value="$question->question_id" hidden>
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
                        <div class="form-group" align="center">
                            <button name="add-question-submit" type="submit" class="btn btn-secondary" name="submit">Add
                                Questions
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div role="tabpanel" class="tab-pane animated fadeIn" id="student-tab">
                <form action="#" class="gray-form" method="post">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="view-all-questions"
                                           class="view-all-questions display table table-striped table-hover"
                                           style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th>Sr no</th>
                                            <th>Question</th>
                                            <th>Chapter</th>
                                            <th>Marks</th>
                                            <th>Add
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="questions">
                                        <?php
                                        $questions = $questionObj->getQuestionsByQuiz($quiz_id);
                                        $index = 0;
                                        foreach ($questions as $question) {
                                            $index++;
                                            echo <<<STUDENT
                                                <tr>
                                                    <td>$index</td>
                                                    <td>$question->question</td>
                                                    <td>$question->chapter_name</td>
                                                    <td>$question->marks</td>
                                                    <td><label for="questions[]" class="pr-3">Check here</label><input id="select-question-id" name="questions[]" type="checkbox" class="select-question-id" value="$question->question_id"></td>
                                                </tr>
<input type="checkbox" name="questionIds[]" value="$question->question_id" hidden>
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
                        <div class="form-group" align="center">
                            <button name="add-question-submit" type="submit" class="btn btn-secondary" name="submit">Add
                                Questions
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

