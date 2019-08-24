<div class="modal animated" id="quiz-reports-modal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Select a quiz first</h5>
                <button type="button" class="close" data-custom-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-student-body">
                <form action="index.php?src=add-quiz-question" method="post">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="view-all-drafted-quizzes" class="display table table-striped table-hover"
                                           style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th>Sr no</th>
                                            <th>Quiz Name</th>
                                            <th>Subject</th>
                                            <th>Date Created</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="student-data">
                                        <?php
                                        $quizzes = $quizObj->getPublishedQuiz(1);
                                        $index = 0;
                                        foreach ($quizzes as $quiz) {
                                            $index++;
                                            echo <<<QUIZ
                                            <tr>
                                                <td>{$index}</td>
                                                <td>{$quiz->name}</td>
                                                <td>{$quiz->subject_name}</td>
                                                <td>{$quiz->created_at}</td>
                                                <td><input name = "quiz_id" id="select-quiz-id" type="checkbox" value="{$quiz->id}"></td>
                                            </tr>
QUIZ;
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-custom-dismiss="modal">Close</button>
                        <button id="select-quiz-submit" class="proceed btn btn-primary" type="submit" name="select-quiz-submit">Proceed</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>