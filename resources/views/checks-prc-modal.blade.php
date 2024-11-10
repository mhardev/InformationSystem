<!-- Adding a Graduated Student -->
<div class="modal fade" id="AddStudModal" tabindex="-1" aria-labelledby="AddStudModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddStudModalLabel">Add Gruaduate Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="needs-validation" id="formAddStudent" method="POST" novalidate>
                <div class="modal-body">
                    @csrf
                    <div class="col-xl-auto">
                        <div class="nav-align-top mb-4">
                            <input type="hidden" id="id" name="id">
                            <div class="row">
                                <div class="col-md-2 mb-3">
                                    <div class="box">
                                        <label class="form-label" for="add_student_id">Student ID</label>
                                        <div class="input-group has-validation mb-1">
                                            <input  type="text"
                                                    class="form-control required-field"
                                                    id="add_student_id" name="Student_ID"
                                                    placeholder="A00011980" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <div class="box">
                                        <label class="form-label" for="add_last_name">Last Name</label>
                                        <div class="input-group has-validation mb-1">
                                            <input oninput="this.value = this.value.toUpperCase()" type="text"
                                                    class="form-control required-field"
                                                    id="add_last_name" name="Last_name"
                                                    placeholder="DELA CRUZ" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <div class="box">
                                        <label class="form-label" for="add_first_name">First Name</label>
                                        <div class="input-group mb-1">
                                            <input oninput="this.value = this.value.toUpperCase()"
                                                    type="text" class="form-control required-field"
                                                    id="add_first_name" name="First_name"
                                                    placeholder="JUAN" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <div class="box">
                                        <label class="form-label" for="add_middle_name">Middle Name</label>
                                        <div class="input-group mb-1">
                                            <input oninput="this.value = this.value.toUpperCase()"
                                                    type="text" class="form-control required-field"
                                                    id="add_middle_name" name="Middle_name"
                                                    placeholder="VALDEZ" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 mb-3">
                                    <div class="box">
                                        <label class="form-label" for="add_sex">Sex</label>
                                        <div class="input-group mb-1">
                                            <select class="form-select required-field" id="add_sex" name="Sex" required>
                                                <option selected="true" disabled="disabled">Select</option>
                                                <option value="M">M</option>
                                                <option value="F">F</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <div class="box">
                                        <label class="form-label" for="add_date_of_birth">Date of birth</label>
                                        <div class="input-group mb-1">
                                            <input type="text" class="form-control required-field"
                                                    id="add_date_of_birth" name="Date_of_birth"
                                                    placeholder="10/25/2010" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <div class="box">
                                        <label class="form-label" for="add_dated_graduated">Date Graduated</label>
                                        <div class="input-group mb-1">
                                            <input type="text" class="form-control required-field"
                                                    id="add_date_graduated" name="Date_graduated"
                                                    placeholder="10/25/2024" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <div class="box">
                                        <h5 class="form-label mb-3">Program Details</h5>
                                        <div class="form-group row mb-2">
                                            <label for="add_program" class="col-sm-2 col-form-label">Program:</label>
                                            <div class="col-sm-10">
                                                <select class="form-select required-field" id="add_program" name="Program_ID" required>
                                                    <option selected="true" disabled="disabled">Select Program</option>
                                                    @foreach ($program as $item)
                                                        <option value="{{ $item->ID }}">{{ $item->Program }}
                                                            @if ($item->Program_Major == null)
                                                                <label></label>
                                                            @else
                                                                <label>{{ $item->Program_Major }}</label>
                                                            @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnSubmit_checksPRC">Submit</button>
                    <button id="btnUpdate_checksPRC" type="submit" class="btn btn-primary">Update changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Import modal
<div class="modal fade" id="ImportStudModal" tabindex="-1" aria-labelledby="ImportStudModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ImportStudModalLabel">Import Gruaduate Students Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formImportGradStud" method="POST">
                <div class="modal-body form-content">
                    @csrf
                    <div class="col-xl-auto">
                        <div class="nav-align-top mb-4">
                            <div class="row-form">
                                <span class="form-icon">
                                    <i class="bi bi-cloud-upload-fill"></i>
                                </span>
                                <label for="file-input" class="drop-container">
                                    <span class="drop-title">Drag and drop files here, or
                                        <a href="#">browse</a>&nbsp;files.
                                    </span>
                                    <input type="file" name="prc_import_file" id="prc-import-file" class="form-control" accept=".xlsx, .xls, .csv" required/>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnImport_checksPRC">Import</button>
                </div>
            </form>
        </div>
    </div>
</div> -->

<!-- Import Modal -->
<div class="modal fade" id="ImportStudModal" tabindex="-1" aria-labelledby="ImportStudModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ImportStudModalLabel">Import Graduate Students Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formImportGradStud" method="POST">
                <div class="modal-body form-content">
                    @csrf
                    <div class="col-xl-auto">
                        <div class="nav-align-top mb-4">
                            <div class="row-form">
                                <span class="form-icon">
                                    <i class="bi bi-cloud-upload-fill"></i>
                                </span>
                                <label for="file-input" class="drop-container">
                                    <span class="drop-title">Drag and drop files here, or
                                        <a href="#" onclick="document.getElementById('prc-import-file').click(); return false;">browse</a>&nbsp;files.
                                    </span>
                                    <input type="file" name="prc_import_file" id="prc-import-file" class="form-control d-none" accept=".xlsx, .xls, .csv" required onchange="showFileName(this)" />
                                    <!-- File name display -->
                                    <div id="file-name-display" class="text-white mt-2"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnImport_checksPRC">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Function to display the selected file name
    function showFileName(input) {
        const fileNameDisplay = document.getElementById('file-name-display');
        fileNameDisplay.textContent = input.files.length > 0 ? `Selected file: ${input.files[0].name}` : '';
    }
</script>
