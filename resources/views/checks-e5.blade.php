@include('navbar-checks')
@include('checks-e5-modal')

<div class="pagetitle">
    <h1>Form E5 - Faculty Profile</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/checks') }}">CHECKS</a></li>
            <li class="breadcrumb-item active">Form E5</li>
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
                            <label for="e5-search" class="py-2 mb-0">Search:</label>
                            <input type="search" id="e5-search" name="search" class="form-control float-end mx-2" style="width: 230px" placeholder="Search..."/>
                            <label for="faculty-type" class="py-2 mb-0">Member Type:</label>
                            <div class="input-group float-end mx-2 w-auto">
                                <select class="form-select" name="faculty_type" id="faculty-type">
                                    <option selected>All</option>
                                    <option value="1">Faculty Member</option>
                                    <option value="2">Not a Faculty Member</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex flex-row">
                            <button type="button" class="btn btn-outline-primary me-2" id="btnAdd" data-bs-toggle="modal" data-bs-target="#AddModal"><i class="bi bi-plus-circle"></i>&nbsp;Add</button>
                            <!--<button type="button" class="btn btn-outline-success me-2" id="btnImport" data-bs-toggle="modal" data-bs-target="#ImportModal"><i class="bi bi-file-earmark-arrow-down"></i>&nbsp;Import</button>-->
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Form E5 Table</h5>
                            <!-- Table with hoverable rows -->
                            <table class="table table-hover" id="table-checks-e5">
                                <thead>
                                    <tr style="font-size: 14px">
                                        <th scope="col">#</th>
                                        <th scope="col" class="sorting" data-sorting_type="asc" data-column_name="full_name" style="cursor: pointer">Name of Faculty&nbsp;<span id="full_name_icon"></span></th>
                                        <th scope="col" class="sorting" data-sorting_type="asc" data-column_name="ftpt_code" style="cursor: pointer">Type of Employment&nbsp;<span id="ftpt_code_icon"></span></th>
                                        <th scope="col" class="sorting" data-sorting_type="asc" data-column_name="gender" style="cursor: pointer">Sex&nbsp;<span id="gender_icon"></span></th>
                                        <th scope="col" class="sorting" data-sorting_type="asc" data-column_name="hda_code" style="cursor: pointer">HIGHEST DEGREE ATTAINED&nbsp;<span id="hda_code_icon"></span></th>
                                        <th scope="col" class="sorting" data-sorting_type="asc" data-column_name="ptd_code" style="cursor: pointer">Primary Teaching Discipline&nbsp;<span id="ptd_code_icon"></span></th>
                                        <th scope="col" style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="checksE5Body">
                                    @php $counter = ($checksE5->currentPage() - 1) * $checksE5->perPage() + 1; @endphp
                                    @foreach ($checksE5 as $checks)
                                    <tr style="font-size: 14px">
                                        <td style="display:none;">{{ $checks->ID }}</td>
                                        <th scope="row">{{ $counter++ }}</th>
                                        <td>
                                            <div>
                                                @if($checks->image_url)
                                                    <img src="{{ Storage::url('photos/' . $checks->image_url) }}" width="128px" style="border-radius: 50%;">
                                                @else
                                                    <img src="{{ asset('/public/storage/photos/image.png') }}" width="32px" style="border-radius: 50%;"> {{-- Fallback image --}}
                                                @endif
                                                {{ $checks->full_name }}
                                            </div>
                                        </td>
                                        <td>{{ $checks->ftpt_code }}</td>
                                        <td>
                                            @if ($checks->gender == '1')
                                                <label>Male</label>
                                            @elseif ($checks->gender == '2')
                                                <label>Female</label>
                                            @endif
                                        </td>
                                        <td>{{ $checks->hda_code }}</td>
                                        <td>{{ $checks->ptd_code }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <button type="button" id="btnEdit.{{ $checks->ID }}"
                                                    class="btn btn-primary btn-sm edit-form" data-bs-toggle="modal"
                                                    data-bs-target="#AddModal">
                                                    <i class="ri-edit-2-line" style="font-size: 14px"></i>
                                                </button>
                                                <button type="button" id="btnDelete.{{ $checks->ID }}"
                                                    class="btn btn-danger btn-sm delete-form">
                                                    <i class="ri-delete-bin-5-line" style="font-size: 14px"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3" id="e5-pagination">
                            {!! $checksE5->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('footer')
