<div class="modal animated" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Want to give a practice quiz?</h5>
                <button type="button" class="close" data-custom-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="hello.php" method="post" class="form-group">
                    <label for="pillSelect">Select Subject </label>
                    <select class="form-control input-pill" id="pillSelect" name="subject_name">
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
                    <label for="pillSelect">Select Marks</label>
                    <select class="form-control input-pill" id="pillSelect" name="marks">
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