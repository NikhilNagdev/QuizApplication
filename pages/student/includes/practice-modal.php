<div class="rounded-border modal animated" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Want to give a practice quiz?</h5>
                <button type="button" class="close" data-custom-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../quiz/quiz.php" method="post" class="form-group">
                    <label for="pillSelect">Select Subject </label>
                    <select class="subject-select form-control input-pill" id="subject-select pillSelect" name="subject_name" required>
                        <option value="" selected disabled hidden>Select Subject Here</option>
                        <?php
                        foreach ($subjects as $sub){
                            echo<<<SUBJECT
                                <option value="{$sub->subject_id}">{$sub->subject_name}</option>
SUBJECT;
                        }
                        ?>
                    </select>
                    <br>
                    <label for="pillSelect">Select Chapter</label>
                    <select class="chapter-select form-control input-pill" id="chapter-select pillSelect" name="subject_name" disabled required>
                        <option value="" selected disabled hidden>Please select subject first</option>
                        <?php
                            if(isset($_GET['subject_id'])) {
//                                die(var_dump($_GET));
                                echo "wasspppp";
                                $chapters = $chapter->getChapters($_GET['subject_id']);
                                foreach ($chapters as $chapter) {
                                    echo <<<SUBJECT
                                    <option value="{$chapter->chapter_id}">{$chapter->chapter_no}: {$chapter->chapter_name}</option>
SUBJECT;
                            }
                        }
                        ?>
                    </select>
                    <br>
                    <label for="pillSelect">Select Marks</label>
                    <select class="form-control input-pill" id="pillSelect" name="marks" required>
                        <option value="" selected disabled hidden>Select Marks Here</option>
                        <option value=20>20</option>
                        <option value=40>40</option>
                    </select>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-custom-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Proceed</button>
            </div>
            </form>
        </div>
    </div>
</div>