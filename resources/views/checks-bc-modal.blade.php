<!-- Adding a Faculty Member -->
<div class="modal fade" id="CurriculumProgramModal" tabindex="-1" aria-labelledby="CurriculumProgramModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CurriculumProgramModalLabel">Curriculum Program</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="needs-validation" id="formCurriculumProgram" method="POST" novalidate>
                <div class="modal-body">
                    @csrf
                    <div class="col-xl-auto">
                        <div class="nav-align-top mb-4">
                            <ul class="nav nav-tabs nav-tabs-bordered d-flex mb-4" role="tablist">
                                <li class="nav-item flex-fill">
                                    <button
                                    type="button"
                                    class="nav-link w-100 active"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#navs-top-program-info"
                                    aria-controls="navs-top-program-info"
                                    aria-selected="true">
                                    Program Information
                                    </button>
                                </li>
                                <li class="nav-item flex-fill">
                                    <button
                                    type="button"
                                    class="nav-link w-100"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#navs-top-enrollees"
                                    aria-controls="navs-top-enrollees"
                                    aria-selected="true">
                                    Enrollees
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="navs-top-program-info" role="tabpanel">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="main_program">Main Program/Course</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control"
                                                            id="program" name="program"
                                                            placeholder="Bachelor of Science in Business Administration" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="code">Code</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control"
                                                            id="program_code" name="program_code"
                                                            placeholder="504014" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="major">Major</label><div class="input-group mb-1">
                                                    <input type="text" class="form-control"
                                                            id="major" name="major"
                                                            placeholder="Marketing Management" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="code">Code</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control"
                                                            id="major_code" name="major_code"
                                                            placeholder="504014" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="thesis_dissertation">Thesis/Dissertation</label>
                                                <div class="input-group mb-1">
                                                    <select class="form-select required-field" id="thesis_dissertation" name="gender" required>
                                                        <option selected="true" disabled="disabled">Select Thesis/Dissertation</option>
                                                        <option value="1">1 - Yes</option>
                                                        <option value="2">2 - No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="program_status">Program Status</label>
                                                <div class="input-group mb-1">
                                                    <select class="form-select required-field" id="program_status" name="gender" required>
                                                        <option selected="true" disabled="disabled">Select Code</option>
                                                        <option value="CO">CO - Program currently offered and accepting students.
                                                        </option>
                                                        <option value="PO">PO - Program is being phased out but still has students.
                                                        </option>
                                                        <option value="DO">PO - Program has been discontinued and has no students.
                                                        </option>
                                                        <option value="NO">PO - Program has not been officially discontinued but has no students.
                                                        </option>
                                                        <option value="NA">NA - Not applicable, program is not operated by the institution.
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="authority_to_offer_code">Code</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control"
                                                            id="category" name="category"
                                                            placeholder="GR" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="authority_to_offer_serial">Serial</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control"
                                                            id="serial" name="serial"
                                                            placeholder="001" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="authority_to_offer_year">Year</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control"
                                                            id="year" name="year"
                                                            placeholder="2001" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="program_mode">Code</label>
                                                <div class="input-group mb-1">
                                                    <select class="form-select required-field" id="add_gender" name="gender" required>
                                                        <option selected="true" disabled="disabled">Select Code</option>
                                                        <option value="SE">Semestrial</option>
                                                        <option value="TR">Trimestrial</option>
                                                        <option value="SD">Semestral-Distance education delivery mode</option>
                                                        <option value="TD">Trimestral-Distance education delivery mode</option>
                                                        <option value="DE">Distance education at student's pace</option>
                                                        <option value="OT">Others, please specify</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="authority_to_offer">Program</label>
                                                <div class="input-group mb-1">
                                                    <select class="form-select required-field" id="add_gender" name="gender" required>
                                                        <option selected="true" disabled="disabled">Select Program</option>
                                                        <option value="SE">Semestrial</option>
                                                        <option value="TR">Trimestrial</option>
                                                        <option value="SD">Semestral-Distance education delivery mode</option>
                                                        <option value="TD">Trimestral-Distance education delivery mode</option>
                                                        <option value="DE">Distance education at student's pace</option>
                                                        <option value="OT">Others, please specify</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="normal_length">Normal Length (In Years)</label>
                                                <div class="input-group mb-1">
                                                    <input type="number" class="form-control required-field"
                                                            id="normal_length" name="normal_length"
                                                            maxlength="3" placeholder="4" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="program_credit">Program Credit (In Units)</label>
                                                <div class="input-group mb-1">
                                                    <input type="number" class="form-control required-field"
                                                            id="program_credit" name="program_credit"
                                                            maxlength="5" placeholder="150" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="tuition_per_unit">Tuition per Unit (In Peso)</label>
                                                <div class="input-group mb-1">
                                                    <input type="number" class="form-control required-field"
                                                            id="tuition_per_unit" name="tuition_per_unit"
                                                            placeholder="690" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="program_fee">Program Fee (In Peso)</label>
                                                <div class="input-group mb-1">
                                                    <input type="number" class="form-control required-field"
                                                            id="program_fee" name="program_fee"
                                                            placeholder="150,000" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="remarks">Remarks</label>
                                                <div class="input-group mb-1">
                                                    <textarea class="form-control" name="remarks" id="remarks" placeholder="Enter remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="navs-top-enrollees" role="tabpanel"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
