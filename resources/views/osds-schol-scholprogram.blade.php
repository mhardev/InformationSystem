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

      <div class="modal fade" id="AddModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="card-title">Add Scholarship Program</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <p>Student-applicants must be incoming freshmen/first year students who are eligible for enrollment in college, with at least 96% or its equivalent for the Full Merit Program and 93% to 95% or its equivalent for the Half Merit Program and must enroll in recognized priority programs in private Higher Education Institutions ...<br>
              <br>
              <div class="col-lg-12">
                <div class="row">
                  <!-- Begin 1st column -->

                      <input type="hidden" class="form-control" id="sp_id" name="sp_id">

                      <div class="col-md-4">
                        <div class="form-floating mb-3">
                          <select class="form-select" id="stype_id" aria-label="">
                            @foreach($result_scholarship_type as $scholarship_type)
                            <option value="{{$scholarship_type->stype_id}}" selected>{{$scholarship_type->scholarship_type}}</option>
                            @endforeach
                          </select>
                          <label for="stype_id">Scholarship Type</label>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-floating mb-3">
                          <select class="form-select" id="scholarship_id" aria-label="Under Scholarship">
                            @foreach($result_scholarship as $result_scholarship)
                            <option value="{{$result_scholarship->scholarship_id}}" selected>{{$result_scholarship->scholarship}}</option>
                            @endforeach
                          </select>
                          <label for="scholarship_id">Under Scholarship</label>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="scholarship_code" placeholder="Code">
                          <label for="scholarship_code">Code</label>
                        </div>
                      </div>

                      <div class="col-md-8">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="scholarship_program" placeholder="scholarship_program">
                          <label for="scholarship_program">Scholarship Program Name</label>
                        </div>
                      </div>

                  <!-- End of 1st column -->
                </div>
                <p>Student-applicants must be incoming freshmen/first year students who are eligible for enrollment in college, with at least 96% or its equivalent for the Full Merit Program and 93% to 95% or its equivalent for the Half Merit Program and must enroll in recognized priority programs in private Higher Education Institutions ...<br>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button id="btnsubmit_sprogram" name = "btnsubmit_sprogram" type="button" class="btn btn-primary">Save changes</button>
              <button id="btnupdate_sprogram" name = "btnupdate_sprogram" type="button" class="btn btn-primary">Update changes</button>
            </div>
          </div>
        </div>
      </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">List</h5>
                <p>For custom Bootstrap form validation messages, you’ll need to add the <code>novalidate</code> boolean attribute to your <code>&lt;form&gt;</code>.</p>
                <!-- Start Academic year filter -->
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-2">
                        <div class="form-floating mb-3">
                          <select class="form-select" id="filter_scholarship" aria-label="State">
                            <option value="All" selected>All</option>
                            @foreach($result_scholarship_type as $scholarship_type)
                            <option value="{{$scholarship_type->stype_id}}">{{$scholarship_type->scholarship_type}}</option>
                            @endforeach
                          </select>
                          <label for="filter_scholarship">Scholarship Type</label>
                        </div>
                    </div>
                    <div class="col-lg-8">
                    </div>
                    <div class="col-lg-2">
                        <button type="button" id ="btnadd" class="btn btn-primary" >Add Scholarship Program</button>
                    </div>
                  </div>  
                </div>
                <!-- End Academic year filter -->
                
                <!-- Table with hoverable rows -->
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col" >#</th>
                      <th scope="col" style="display:none;">sp_id</th>
                      <th scope="col" style="display:none;">stype_id</th>
                      <th scope="col" >Scholarship Type</th>
                      <th scope="col" style="display:none;">scholarship_id</th>
                      <th scope="col" >Scholarship</th>
                      <th scope="col" style="display:none;">scholarship</th>
                      <th scope="col" >Code</th>
                      <th scope="col" >Scholarship Program</th>
                      <th scope="col" style="text-align: center;">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($result_scholarship_program as $scholarship_program)
                      <tr class="content">
                        <th scope="row">{{ $loop->iteration }} </th>
                        <td style="display:none;">{{  $scholarship_program->sp_id }}</td>
                        <td style="display:none;">{{  $scholarship_program->stype_id }}</td>
                        <td>{{  $scholarship_program->stype_code  }} </td>
                        <td style="display:none;">{{  $scholarship_program->scholarship_id  }}</td>
                        <td>{{  $scholarship_program->scholarship_code    }}</td>
                        <td style="display:none;"> {{  $scholarship_program->scholarship  }}</td>
                        <td>{{  $scholarship_program->code   }}</td>
                        <td>{{  $scholarship_program->scholarship_program  }}</td>

                        <td style="text-align: center;">
                          <button type="button" class="btn btn-primary sprogram-edit-form"><i class="ri-edit-2-line"></i></button>
                          <button type="button" class="btn btn-danger sprogram-delete-form"><i class="ri-delete-bin-5-line"></i></button>
                        </td>
                        <td></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <!-- End Table with hoverable rows -->
              </div>
            </div>
          </div>
        </div>
    </section>

@include('footer')
<!-- <script src="assets/js/osds-schol-program.js"></script> -->