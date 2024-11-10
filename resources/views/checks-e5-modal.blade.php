<!-- Adding a Faculty Member -->
<div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="AddModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddModalLabel">Add Faculty Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="needs-validation" id="formAddFaculty" method="POST" novalidate>
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
                                    data-bs-target="#navs-top-profile"
                                    aria-controls="navs-top-profile"
                                    aria-selected="true">
                                    Faculty Profile
                                    </button>
                                </li>
                                <li class="nav-item flex-fill">
                                    <button
                                    type="button"
                                    class="nav-link w-100"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#navs-top-educational_background"
                                    aria-controls="navs-top-educational_background"
                                    aria-selected="true">
                                    Educational Background
                                    </button>
                                </li>
                                <li class="nav-item flex-fill">
                                    <button
                                    type="button"
                                    class="nav-link w-100"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#navs-top-subject_taught"
                                    aria-controls="navs-top-subject_taught"
                                    aria-selected="true">
                                    Subject Taught
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="navs-top-profile" role="tabpanel">
                                    <input type="hidden" id="id" name="id">
                                    <!-- Name of Faculty -->
                                    <div class="row">
                                        <label class="mb-3" for="form-label">Name of Faculty Member&nbsp;<span><i>(Last Name, First Name Middle Initial)</i></span></label>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="add_last_name">Last Name</label>
                                                <div class="input-group has-validation mb-1">
                                                    <input oninput="this.value = this.value.toUpperCase()" type="text"
                                                            class="form-control required-field"
                                                            id="add_last_name" name="last_name"
                                                            placeholder="DELA CRUZ" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="add_first_name">First Name</label>
                                                <div class="input-group mb-1">
                                                    <input oninput="this.value = this.value.toUpperCase()" type="text"
                                                            class="form-control required-field"
                                                            id="add_first_name" name="first_name"
                                                            placeholder="JUAN" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="add_middle_initial">Middle Initial</label>
                                                <div class="input-group mb-1">
                                                    <input oninput="this.value = this.value.toUpperCase()"
                                                            onkeypress="return /[0-9a-zA-Z]/i.test(event.key)"
                                                            type="text" class="form-control required-field"
                                                            id="add_middle_initial" name="middle_initial"
                                                            maxlength="3" placeholder="V" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Type of Employment -->
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="add_member_type">Faculty Member Type</label>
                                                <div class="input-group mb-1">
                                                    <select class="form-select required-field" id="add_member_type" name="member_type" required>
                                                        <option selected="true" disabled="disabled">Select Faculty Member Type</option>
                                                        <option value="1">Faculty Member</option>
                                                        <option value="2">Not a Faculty Member</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="add_fulltime_parttime">Type of Employment</label>
                                                <div class="input-group mb-1">
                                                    <select class="form-select required-field" id="add_fulltime_parttime" name="ftpt_ID" required>
                                                        <option selected="true" disabled="disabled">Select Type of Employment</option>
                                                        @foreach ($ft_pt as $ftpt_code)
                                                            <option value="{{$ftpt_code->ID}}">{{$ftpt_code->description}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="add_gender">Gender</label>
                                                <div class="input-group mb-1">
                                                    <select class="form-select required-field" id="add_gender" name="gender" required>
                                                        <option selected="true" disabled="disabled">Select Gender</option>
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Primary Teaching Discipline -->
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="add_primary_teaching_discipline">Primary Teaching Discipline</label>
                                                <div class="input-group mb-1">
                                                    <select class="form-select required-field" id="add_primary_teaching_discipline" name="programcode_ID_1">
                                                        <option selected="true" disabled="disabled">Select Degree</option>
                                                        @foreach ($programs as $program_code)
                                                        <option value="{{$program_code->ID}}">{{$program_code->Program}}&nbsp;{{$program_code->Major}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="navs-top-educational_background" role="tabpanel">
                                    <div class="row">
                                        <label class="mb-3" for="form-label">Educational Credential Earned</label>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="add_highest_degree_attained">Highest Degree Attained</label>
                                                <div class="input-group mb-1">
                                                    <select class="form-select required-field" id="add_highest_degree_attained" name="hda_ID" required>
                                                        <option selected="true" disabled="disabled">Select Highest Degree Attained</option>
                                                        @foreach ($highest_degree_attained as $hda_code)
                                                        <option value="{{$hda_code->ID}}">{{$hda_code->description}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="add_bachelors_degree">Bachelor's Degree</label>
                                                <div class="input-group mb-1">
                                                    <select class="form-select required-field" id="add_bachelors_degree" name="programcode_ID_2">
                                                        <option selected="true" disabled="disabled">Select Degree</option>
                                                        @foreach ($programs as $program_code)
                                                        <option value="{{$program_code->ID}}">{{$program_code->Program}}&nbsp;{{$program_code->Major}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="add_masters_degree">Master's Degree</label>
                                                <div class="input-group mb-1">
                                                    <select class="form-select required-field" id="add_masters_degree" name="programcode_ID_3">
                                                        <option selected="true" disabled="disabled">Select Degree</option>
                                                        @foreach ($programs as $program_code)
                                                        <option value="{{$program_code->ID}}">{{$program_code->Program}}&nbsp;{{$program_code->Major}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="add_doctorate">Doctorate</label>
                                                <div class="input-group mb-1">
                                                    <select class="form-select required-field" id="add_doctorate" name="programcode_ID_4">
                                                        <option selected="true" disabled="disabled">Select Degree</option>
                                                        @foreach ($programs as $program_code)
                                                        <option value="{{$program_code->ID}}">{{$program_code->Program}}&nbsp;{{$program_code->Major}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="navs-top-subject_taught" role="tabpanel">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label class="form-label" for="add_prof_license">Professional License</label>
                                            <div class="input-group mb-1">
                                                <select class="form-select required-field" id="add_prof_license" name="pl_ID" required>
                                                    <option selected="true" disabled="disabled">Select Professional License</option>
                                                    @foreach ($prof_license as $pl_code)
                                                        <option value="{{$pl_code->ID}}">{{$pl_code->description}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <label class="form-label" for="add_tenure">Tenure of Employment</label>
                                            <div class="input-group mb-1">
                                                <select class="form-select required-field" id="add_tenure" name="tenure" required>
                                                    <option selected="true" disabled="disabled">Select Tenure</option>
                                                    <option value="1">Permanent</option>
                                                    <option value="2">Probationary</option>
                                                    <option value="3">Casual</option>
                                                    <option value="4">Contractual</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="add_faculty_rank">Faculty Rank</label>
                                                <div class="input-group mb-1">
                                                    <select class="form-select required-field" id="add_faculty_rank" name="fr_ID" required>
                                                        <option selected="true" disabled="disabled">Select Faculty Rank</option>
                                                        @foreach ($faculty_rank as $fr_code)
                                                            <option value="{{$fr_code->ID}}">{{$fr_code->description}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label" for="add_annual_salary">Annual Salary</label>
                                                <div class="input-group mb-1">
                                                    <select name="as_ID" id="add_annual_salary" class="form-select required-field" required>
                                                        <option selected="true" disabled="disabled">Select Annual Salary</option>
                                                        @foreach ($annual_salary as $as_code)
                                                            <option value="{{$as_code->ID}}">{{$as_code->description}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="subjectTaughtContainer">
                                        <div class="box">
                                            <label class="form-label" for="add_subject_taught">Subject Taught</label>
                                            <div class="d-flex flex-row-reverse input-group mb-1">
                                                <button type="button" class="btn btn-outline-primary me-2" id="addSubject">+ Add</button>
                                            </div>
                                            <table class="table table-hover table-bordered" data-bs-spy="scroll" id="subjectTaughtTable">
                                                <thead>
                                                    <tr>
                                                        <th class="row-index text-center">#</th>
                                                        <th class="row-index text-center" style="width: 80%">Subject (Description)</th>
                                                        <th class="row-index text-center">Unit</th>
                                                        <th class="row-index text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="add_subject_taught"></tbody>
                                            </table>
                                        </div>
                                        <input type="hidden" id="subject_taught" name="subject_taught" value="">
                                        <div class="box">
                                            <div class="d-flex flex-row-reverse input-group mb-1">
                                                <span class="fst-italic" id="total_units">Total units: 0</span>
                                                @foreach ($teaching_load as $tl_code)
                                                <input type="hidden" id="add_teaching_load" name="total_units" value="{{$tl_code->ID}}">
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnSubmit_checksE5">Submit</button>
                    <button id="btnUpdate_checksE5" type="submit" class="btn btn-primary">Update changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Import modal -->
<div class="modal fade" id="ImportModal" tabindex="-1" aria-labelledby="ImportModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ImportModalLabel">Import Faculty Members Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formImportFaculty" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="col-xl-auto">
                        <div class="nav-align-top mb-4">
                            <div class="row">
                                <div class="input-group">
                                    <input type="file" name="e5_import_file" id="e5-import-file" class="form-control" accept=".xlsx, .xls, .csv"/>
                                    <button type="submit" class="btn btn-primary" id="btnImport_checksE5">Import</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnSubmit_import">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
