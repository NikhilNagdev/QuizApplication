<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="view-all-quizzes" class="display table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Question</th>
                        <th>No of options</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $questions = $question->getQiuzQuestions();
                    foreach($questions as $question){
                        echo<<<TABLEDATA
                        <tr>
                            
                            <td>$questoin->question</td>
                            <td class="text-center"><form action="">
                            <input type="hidden" name="quiz_id" value={$question->question_id}>
</form>
<a href="" role="button" class="btn btn-primary"><i class="fa fa-2x fa-edit"></i></a>
</td>
                        </tr>
TABLEDATA;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

