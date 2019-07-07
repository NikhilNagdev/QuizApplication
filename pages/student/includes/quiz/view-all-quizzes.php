<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="view-all-quizzes" class="display table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Subject Name</th>
                        <th>Quiz Name</th>
                        <th>Quiz Marks</th>
                        <th>Your Marks</th>
                        <th>Quiz Type</th>
                        <th>Submission Date</th>
                        <th>View Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $attemptedQuizzes = $quiz->getAllAttemptedQuiz(1);
                    foreach($attemptedQuizzes as $attemptedQuiz){
                        echo<<<TABLEDATE
                        <tr>
                            <td>$attemptedQuiz->subject_name</td>
                            <td>$attemptedQuiz->quiz_name</td>
                            <td>$attemptedQuiz->quiz_marks</td>
                            <td>$attemptedQuiz->marks</td>
                            <td>$attemptedQuiz->quiz_type</td>
                            <td>$attemptedQuiz->submission_dt</td>
                            <td class="text-center"><form action="">
                            <input type="hidden" name="quiz_id" value={$attemptedQuiz->quiz_id}>
</form>
<a href="" role="button" class="btn btn-primary"><i class="fa fa-2x fa-info-circle"></i></a>
</td>
                        </tr>
TABLEDATE;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

