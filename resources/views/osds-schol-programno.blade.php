@include('osds-navbar')
    <div class="pagetitle">
      <h1>Scholarship Program</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Scholarship Program</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section application">
    </div><!-- End Extra Large Modal-->
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Scholarship</h5>
                        <p>For custom Bootstrap form validation messages, you’ll need to add the <code>novalidate</code> boolean attribute to your <code>&lt;form&gt;</code>. This disables the browser default feedback tooltips, but still provides access to the form validation APIs in JavaScript. </p>

                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-10">
                                </div>
                                <div class="col-lg-2">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#InsertModal">Add
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th style = "display:none" scope="col">scholarship_id</th>
                                        <th scope="col">In-charge</th>
                                        <th scope="col">Code</th>
                                        <th scope="col">Scholarship Program</th>
                                        <th scope="col">Eligible</th>
                                        <th scope="col">Application Status</th>
                                        <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($result_schol as $scholarship)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <th>{{$scholarship->scholarship_id}}</th>
                                            <td>{{$scholarship->code}}</td>
                                            <td>{{$scholarship->scholarship_code}}</td>
                                            <td>{{$scholarship->scholarship}}</td>
                                            <td>{{$scholarship->eligible}}</td>
                                            <td>{{$scholarship->application_status}}</td>
                                            <td style="text-align: center;">
                                            <button type="button" id ="btnedit.{{$scholarship->scholarship_id}}" class="btn btn-primary edit-form" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="ri-edit-2-line"></i></button>
                                            <button type="button" id ="btndelete.{{$scholarship->scholarship_id}}" class="btn btn-danger delete-form"><i class="ri-delete-bin-5-line"></i></button>
                                            </td>
                                            <td></td>
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