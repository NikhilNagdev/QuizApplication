<div class="modal animated" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Want to give a practice quiz?</h5>
                <button type="button" class="close" data-custom-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-student-body">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="view-all-students" class="display table table-striped table-hover" style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th>Student id</th>
                                            <th>Student Name</th>
                                            <th>Class</th>
                                            <th>Batch</th>
                                            <th>Add</th>
                                        </tr>
                                        </thead>
                                        <tbody class="student-data">
                                        <?php
                                        ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-custom-dismiss="modal">Close</button>
                    <button class="proceed btn btn-primary" type="button">Proceed</button>
                </div>
            </div>
        </div>
    </div>
</div>