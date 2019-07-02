<div class="modal animated" id="retest-ref-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Enter the reference quiz</h5>
                <button type="button" class="close" data-custom-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <select name="" id="retest-ref-id-value">
                    <?php
                        $quizzes  = $quiz->getPublishedQuiz(1);
                        echo "<option value=\"\" selected disabled>Select here</option>";
                        echo $helper->getOptions($quizzes);
                    ?>
                </select>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-custom-dismiss="modal">Close</button>
                    <button id="submit-retest-modal" class=" btn btn-primary" type="button">Proceed</button>
                </div>
            </div>
        </div>
    </div>
</div>