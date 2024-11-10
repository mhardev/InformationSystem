@include('osds-navbar')
    <div class="pagetitle">
      <h1>Scholarship</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Scholarship</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section application">
      <div class="row">
            <div class="modal fade" id="InsertModal" tabindex="-1">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Add Scholarship Program</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="card-body">
                      <h5 class="card-title">Scholarship Program</h5>
                      <p>Student-applicants must be incoming freshmen/first year students who are eligible for enrollment in college, with at least 96% or its equivalent for the Full Merit Program and 93% to 95% or its equivalent for the Half Merit Program and must enroll in recognized priority programs in private Higher Education Institutions ...</p>
                      <div class="col-lg-12">
                        <div class="row">
                          <form class="row g-3 needs-validation">
                            @csrf        
                            <div class="col-md-6">
                              <label for="add_unit_id" class="form-label">Unit In-charge</label>
                              <select class="form-select" id="add_unit_id" name="add_unit_id" required>
                                  <option selected disabled value="">Choose...</option>
                                  @foreach($result_unit as $unit)
                                  <option value="{{$unit->unit_id}}">{{$unit->unit}}</option>
                                  @endforeach
                              </select>
                            </div>
                            <div class="col-md-9">
                              <label for="add_Scholarship" class="form-label">Scholarship</label>
                              <input type="text" class="form-control" id="add_Scholarship" name = "add_Scholarship" placeholder="" required>
                              <div class="valid-tooltip">
                                Looks good!
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="add_code" class="form-label">Code</label>
                              <input type="text" class="form-control" id="add_code" name = "add_code" placeholder="" required>
                              <div class="valid-tooltip">
                                  Looks good!
                              </div>
                            </div>
                            <div class="col-md-8">
                              <label for="add_eligible" class="form-label">Application Only for</label>
                              <select class="form-select" id="add_eligible" name="add_eligible" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="Post-Baccalaureate">Post-Baccalaureate</option>
                                <option value="Pre-Baccalaureate">Pre-Baccalaureate</option>
                                <option value="Undergraduate">Incoming/Ongoing Undergraduate programs</option>
                                <option value="Graduate">Incoming/Ongoing Graduate programs</option>
                              </select>
                            </div>
                            <p>Some label put here...</p>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id = "btnsubmit" type="button" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </div>
            </div><!-- End Extra Large Modal-->

            <div class="modal fade" id="EditModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit Scholarship Program</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                      <div class="modal-body">
                          <div class="card-body">
                              <h5 class="card-title">Scholarship Program</h5>
                              <p>Student-applicants must be incoming freshmen/first year students who are eligible for enrollment in college, with at least 96% or its equivalent for the Full Merit Program and 93% to 95% or its equivalent for the Half Merit Program and must enroll in recognized priority programs in private Higher Education Institutions ...</p>
                              <div class="col-lg-12">
                                  <div class="row">
                                  <form class="row g-3 needs-validation" id="edit-form">
                                  @csrf        
                                  <div class="col-md-6">
                                              <label for="edit_unit_id" class="form-label">Unit In-charge</label>
                                              <select class="form-select" id="edit_unit_id" name="edit_unit_id" required>
                                                  <option selected disabled value="">Choose...</option>
                                                    @foreach($result_unit as $unit)
                                                      <option value="{{$unit->unit_id}}">{{$unit->unit}}</option>
                                                    @endforeach
                                              </select>
                                          </div>
                                          <div class="col-md-9">
                                              <label for="edit_Scholarship" class="form-label">Scholarship</label>
                                              <input type="text" class="form-control" id="edit_Scholarship" name = "edit_Scholarship" placeholder="" required>
                                              <div class="valid-tooltip">
                                              Looks good!
                                              </div>
                                          </div>
                                          <div class="col-md-3">
                                              <label for="edit_code" class="form-label">Code</label>
                                              <input type="text" class="form-control" id="edit_code" name = "edit_code" placeholder="" required>
                                              <div class="valid-tooltip">
                                              Looks good!
                                              </div>
                                          </div>
                                          <div class="col-md-8">
                                            <label for="edit_eligible" class="form-label">Application Only for</label>
                                                <select class="form-select" id="edit_eligible" name="edit_eligible" required>
                                                    <option selected disabled value="">Choose...</option>
                                                    <option value="Post-Baccalaureate">Post-Baccalaureate</option>
                                                    <option value="Pre-Baccalaureate">Pre-Baccalaureate</option>
                                                    <option value="Undergraduate">Incoming/Ongoing Undergraduate programs</option>
                                                    <option value="Graduate">Incoming/Ongoing Graduate programs</option>
                                                </select>
                                          </div>
                                          <p>Some label put here...</p>
                                        </form>
                                  </div>
                              </div>
                          </div>
                          
                              
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="btnupdate" name="btnupdate" type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
            </div><!-- End Extra Large Modal-->


        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">List</h5>
                <p>For custom Bootstrap form validation messages, you’ll need to add the <code>novalidate</code> boolean attribute to your <code>&lt;form&gt;</code>. This disables the browser default feedback tooltips, but still provides access to the form validation APIs in JavaScript. </p>
                    
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-10">
                    </div>
                    <div class="col-lg-2">
                      <div class="row">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#InsertModal">Add
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Table with hoverable rows -->
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">In-charge</th>
                      <th scope="col">Code</th>
                      <th scope="col">Scholarship Program</th>
                      <th scope="col">Eligible</th>
                      <th scope="col" style="text-align: center;">Application Status</th>
                      <th scope="col" style="text-align: center;">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($result_schol as $scholarship)
                      <tr>
                        <th scope="row">{{$scholarship->scholarship_id}}</th>
                        <td>{{$scholarship->code}}</td>
                        <td>{{$scholarship->scholarship_code}}</td>
                        <td>{{$scholarship->scholarship}}</td>
                        <td>{{$scholarship->eligible}}</td>
                        @if($scholarship->application_status=='Open') 
                          <td style="text-align: center;"><span class="badge bg-primary">{{$scholarship->application_status}}</span></td>
                        @else
                          <td style="text-align: center;"><span class="badge bg-danger">{{$scholarship->application_status}}</span></td>
                        @endif
                        <td style="text-align: center;">
                          <button type="button" id ="btnedit.{{$scholarship->scholarship_id}}" class="btn btn-primary edit-form" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="ri-edit-2-line"></i></button>
                          <button type="button" id ="btndelete.{{$scholarship->scholarship_id}}" class="btn btn-danger delete-form"><i class="ri-delete-bin-5-line"></i></button>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <!-- End Table with hoverable rows -->
              </div>
            </div>
          </div>
        </div><!-- End Left side columns -->
      </div>
    </section>

@include('footer')
<!-- <script src="assets/js/osds-schol.js"></script> -->