<div class="modal fade" id="AddSubjectModal" tabindex="-1" aria-labelledby="AddSubjectModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddSubjectModalLabel">Add Subject Taught</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="needs-validation" id="formAddSubject" method="POST" novalidate>
                <div class="modal-body">
                    @csrf
                    <div class="col-xl-auto">
                        <div class="nav-align-top mb-4">
                            <input type="hidden" id="id" name="id">
                            <div class="row">
                                <div class="col">
                                    <div class="box">
                                        <label class="form-label" for="add_subject_code">Code</label>
                                        <div class="input-group has-validation mb-1">
                                            <input  type="text"
                                                    class="form-control required-field"
                                                    id="add_subject_code"
                                                    name="CODE"
                                                    placeholder="WB1"
                                                    required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="box">
                                        <label class="form-label" for="add_no_field">No. of field</label>
                                        <div class="input-group has-validation mb-1">
                                            <input  type="number"
                                                    class="form-control required-field"
                                                    id="add_no_field"
                                                    name="No_fields"
                                                    placeholder="1"
                                                    required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="box">
                                    <label class="form-label" for="add_subject_des">Description</label>
                                    <div class="input-group has-validation mb-1">
                                        <input  type="text"
                                                class="form-control required-field"
                                                id="add_subject_des"
                                                name="Description"
                                                placeholder="Web Development"
                                                required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnSubmit_subjects">Submit</button>
                    <button id="btnUpdate_subjects" type="submit" class="btn btn-primary">Update changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
