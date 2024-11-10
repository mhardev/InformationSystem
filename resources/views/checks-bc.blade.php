@include('navbar-checks')
@include('checks-bc-modal')

<div class="pagetitle">
    <h1>Form BC - Curriculum Programs</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/checks') }}">CHECKS</a></li>
            <li class="breadcrumb-item active">Form BC</li>
        </ol>
    </nav>
</div>

<section class="section application">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="nav nav-pills flex-column flex-md-row mb-3 justify-content-between">
                        <div class="d-flex flex-row">
                            <label class="py-2 mb-0">Search:&nbsp;</label>
                            <input type="search" id="search" name="search" class="form-control float-end mx-2" style="width: 230px" placeholder="Search..."/>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Form BC Table</h5>
                            <table class="table table-hover" id="table-checks-bc">
                                <thead>
                                    <tr style="font-size: 14px">
                                        <th scope="col">#</th>
                                        <th scope="col">Level</th>
                                        <th scope="col">Program</th>
                                        <th scope="col">Major</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Serial</th>
                                        <th scope="col">Year</th>
                                        <th scope="col" style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="checksBCBody">
                                    @php $counter = 1; @endphp
                                    @foreach ($checksBC as $checks)
                                    <tr style="font-size: 14px">
                                        <th scope="row">{{ $counter++ }}</th>
                                        <td>{{ $checks->BS_AB}}</td>
                                        <td>{{ $checks->Discipline}}</td>
                                        <td>{{ $checks->Major }}</td>
                                        <td>{{ $checks->GPR }}</td>
                                        <td>{{ $checks->GP_GR_No }}</td>
                                        <td>{{ $checks->Date }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <button type="button" id="btnEdit.{{ $checks->ID }}"
                                                    class="btn btn-primary btn-sm edit-form" data-bs-toggle="modal"
                                                    data-bs-target="#CurriculumProgramModal">
                                                    <i class="ri-edit-2-line" style="font-size: 14px"></i>
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
</section>

@include('footer')
