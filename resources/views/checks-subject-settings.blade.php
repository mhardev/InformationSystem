@include('navbar-checks')
@include('checks-subject-settings-modal')

<div class="pagetitle">
    <h1>Subject settings</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="">Settings</a></li>
            <li class="breadcrumb-item active">Subject settings</li>
        </ol>
    </nav>
</div>

<div class="section application">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="nav nav-pills flex-column flex-md-row mb-3 justify-content-between">
                        <div class="d-flex flex-row">
                            <label for="prc-search" class="py-2 mb-0">Search:</label>
                            <input type="search" id="prc-search" name="search" class="form-control float-end mx-2" style="width: 230px" placeholder="Search..."/>
                        </div>
                        <div class="d-flex flex-row">
                            <button type="button" class="btn btn-outline-primary me-2" id="btnAddSubject" data-bs-toggle="modal" data-bs-target="#AddSubjectModal"><i class="bi bi-plus-circle"></i>&nbsp;Add</button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Subjects settings</div>
                            <table class="table table-hover" id="table-subjects">
                                <thead>
                                    <tr style="font-size: 14px">
                                        <th scope="col">#</th>
                                        <th scope="col">Code</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">No. of fields</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $counter = 1; @endphp
                                    @foreach ($checksSubjects as $subject)
                                    <tr style="font-size: 14px">
                                        <td style="display:none;">{{ $subject->ID }}</td>
                                        <th scope="row">{{ $counter++ }}</th>
                                        <td>{{ $subject->CODE }}</td>
                                        <td>{{ $subject->Description }}</td>
                                        <td>{{ $subject->No_fields }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <button type="button" id="btnSubjectEdit.{{ $subject->ID }}"
                                                    class="btn btn-primary btn-sm subject-edit-form" data-bs-toggle="modal"
                                                    data-bs-target="#AddSubjectModal">
                                                    <i class="ri-edit-2-line" style="font-size: 14px"></i>
                                                </button>
                                                <button type="button" id="btnSubjectDelete.{{ $subject->ID }}"
                                                    class="btn btn-danger btn-sm subject-delete-form">
                                                    <i class="ri-delete-bin-5-line" style="font-size: 14px"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')
