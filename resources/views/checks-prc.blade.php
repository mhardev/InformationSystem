@include('navbar-checks')
@include('checks-prc-modal')

<div class="pagetitle">
    <h1>List of Graduates</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/checks') }}">CHECKS</a></li>
            <li class="breadcrumb-item active">List of Graduates</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section application">
    <div class="col-lg-12">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <div class="nav nav-pills flex-column flex-md-row mb-3 justify-content-between">
                        <div class="d-flex flex-row">
                            <label for="prc-search" class="py-2 mb-0">Search:</label>
                            <input type="search" id="prc-search" name="search" class="form-control float-end mx-2" style="width: 230px" placeholder="Search..."/>
                            <!--<label class="py-2 mb-0">AY:</label>
                            <div class="input-group float-end mx-2 w-auto">
                                <select class="form-select" name="academicYear" id="academicYear">
                                    <option selected>All</option>
                                    <option value="2024-2025">2019-2020</option>
                                    <option value="2024-2025">2020-2021</option>
                                    <option value="2024-2025">2021-2022</option>
                                    <option value="2024-2025">2022-2023</option>
                                    <option value="2024-2025">2023-2024</option>
                                    <option value="2024-2025">2024-2025</option>
                                </select>
                            </div>-->
                            <label for="program-level" class="py-2 mb-0">Level:</label>
                            <div class="input-group float-end mx-2 w-auto">
                                <select class="form-select" name="program_level" id="program-level">
                                    <option selected>All</option>
                                    <option value="Pre-Baccalaureate">Pre-Baccalaureate</option>
                                    <option value="Baccalaureate">Baccalaureate</option>
                                    <option value="Post-Baccalaureate">Post-Baccalaureate</option>
                                    <option value="Master">Master</option>
                                    <option value="Doctorate">Doctorate</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex flex-row">
                            <button type="button" class="btn btn-outline-primary me-2" id="btnAddStud" data-bs-toggle="modal" data-bs-target="#AddStudModal"><i class="bi bi-plus-circle"></i>&nbsp;Add</button>
                            <button type="button" class="btn btn-outline-success me-2" id="btnImportStud" data-bs-toggle="modal" data-bs-target="#ImportStudModal"><i class="bi bi-file-earmark-arrow-down"></i>&nbsp;Import</button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Form List of Graduates Table</h5>
                            <!-- Table with hoverable rows -->
                            <table class="table table-hover" id="table-checks-prc">
                                <thead>
                                    <tr style="font-size: 14px">
                                        <th scope="col">#</th>
                                        <th scope="col" class="sorting" data-sorting_type="asc" data-column_name="student_id" style="cursor: pointer" width="10%">Student ID&nbsp;<span id="student_id_icon"></span></th>
                                        <th scope="col" class="sorting" data-sorting_type="asc" data-column_name="Full_name" style="cursor: pointer">Full name&nbsp;<span id="Full_name_icon"></span></th>
                                        <th scope="col" class="sorting" data-sorting_type="asc" data-column_name="Date_of_birth" style="cursor: pointer">Date of birth&nbsp;<span id="Date_of_birth_icon"></span></th>
                                        <th scope="col" class="sorting" data-sorting_type="asc" data-column_name="Sex" style="cursor: pointer">Sex&nbsp;<span id="Sex_icon"></span></th>
                                        <th scope="col" class="sorting" data-sorting_type="asc" data-column_name="Program" style="cursor: pointer">Program&nbsp;<span id="Program_icon"></span></th>
                                        <th scope="col" class="sorting" data-sorting_type="asc" data-column_name="Major" style="cursor: pointer">Major&nbsp;<span id="Major_icon"></span></th>
                                        <th scope="col" style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="checksPRCBody">
                                    @php $counter = ($checksPRC->currentPage() - 1) * $checksPRC->perPage() + 1; @endphp
                                    @foreach ($checksPRC as $prc)
                                    <tr style="font-size: 14px">
                                        <td style="display:none;">{{ $prc->ID }}</td>
                                        <th scope="row">{{ $counter++ }}</th>
                                        <td>{{ $prc->Student_ID }}</td>
                                        <td>{{ $prc->full_name }}</td>
                                        <td>{{ $prc->Date_of_birth }}</td>
                                        <td>{{ $prc->Sex }}</td>
                                        <td>{{ $prc->Program }}</td>
                                        <td>
                                            @if ($prc->Major == null)
                                                <label>-</label>
                                            @else
                                                {{ $prc->Major }}
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <button type="button" id="btnPRCEdit.{{ $prc->ID }}"
                                                    class="btn btn-primary btn-sm prc-edit-form" data-bs-toggle="modal"
                                                    data-bs-target="#AddStudModal">
                                                    <i class="ri-edit-2-line" style="font-size: 14px"></i>
                                                </button>
                                                <button type="button" id="btnPRCDelete.{{ $prc->ID }}"
                                                    class="btn btn-danger btn-sm prc-delete-form">
                                                    <i class="ri-delete-bin-5-line" style="font-size: 14px"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3" id="prc-pagination">
                            {!! $checksPRC->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('footer')
