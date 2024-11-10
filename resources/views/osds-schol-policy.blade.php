@include('osds-navbar')
    <div class="pagetitle">
      <h1>Scholarship Policy</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Scholarship Policy Details</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section application">

      <div class="modal fade" id="AddModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="card-title">Add Scholarship program</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <p>Student-applicants must be incoming freshmen/first year students who are eligible for enrollment in college, with at least 96% or its equivalent for the Full Merit Program and 93% to 95% or its equivalent for the Half Merit Program and must enroll in recognized priority programs in private Higher Education Institutions ...<br>
              <br>
              <div class="col-lg-12">
                <div class="row">
                  <!-- Begin 1st column -->
                  <div class="col-lg-6">
                    <div class="row">

                      <input type="hidden" class="form-control" id="spolicy_id" name="spolicy_id">


                      <div class="col-md-12">
                        <div class="form-floating mb-3">
                          <select class="form-select" id="" aria-label="Under Scholarship">
                            @foreach($result_schol as $scholarship)
                            <option value="{{$scholarship->scholarship_id}}" selected>{{$scholarship->scholarship}}</option>
                            @endforeach
                          </select>
                          <label for="add_scholarship">Under scholarship</label>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-floating mb-3">
                          <select class="form-select" id="add_ay" aria-label="Academic Year">
                            @foreach($result_ay as $ay)
                            <option value="{{$ay->ay}}" selected>{{$ay->ay}}</option>
                            @endforeach
                          </select>
                          <label for="add_ay">AY Application</label>
                        </div>
                      </div>

                      <div class="col-md-8"> 
                        <div class="form-floating mb-3">
                          <select class="form-select" id="add_scholarship_program" aria-label="Sub-Scholarship Name">
                            <option value="" disabled="disabled" selected>Please select scholarship</option>
                          </select>
                          <label for="add_scholarship_program">Sub-Scholarship Name</label>
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <select class="form-select" id="add_heitype" aria-label="State">
                            <option selected>Any</option>
                            <option value="Private">Private</option>
                            <option value="SUC">SUC</option>
                            <option value="LUC">LUC</option>
                            <option value="SUC & LUC">SUC & LUC</option>
                          </select>
                          <label for="add_heitype">Intended School Type</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <select class="form-select" id="add_defernment" aria-label="State">
                            <option value="1" selected>One Term</option>
                            <option value="2">Two Term</option>
                            <option value="3">Three Term</option>
                            <option value="4">Fourth Term</option>
                          </select>
                          <label for="add_defernment">No. of Term Defernment</label>
                        </div>
                      </div>

                      <p>Grade Requirements in Percentage (%)</p><br>

                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="add_grade_new" placeholder="75 to 100">
                          <label for="add_grade_new">New</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="add_grade_ongoing" placeholder="75 to 100">
                          <label for="add_grade_ongoing">ongoing</label>
                        </div>
                      </div>
                        
                      <p>Allowance</p><br>

                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="add_apy" placeholder="">
                          <label for="add_apy">Allowance Per Year</label>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="add_slots" placeholder="">
                          <label for="add_slots">Total Slots</label>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-floating mb-3">
                          <select class="form-select" id="add_fund" aria-label="State">
                            <option value="101" selected>101</option>
                            <option value="151">151</option>
                          </select>
                          <label for="add_fund">Fund</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End of 1st column -->
                  <!-- Begin 2nd column -->
                  <div class="col-lg-6">
                    
                    
                    <div class="col-md-12">
                      <h5 class="card-title">Required Attachments</h5>
                      <ul class="list-group">
                      @foreach($result_req as $req)
                        <li class="list-group-item">
                          <input class="form-check-input me-1" type="checkbox" value="" aria-label="..." checked>{{$req->requirements}}
                        </li>
                      @endforeach
                      </ul><!-- End List Checkboxes and radios -->
                    </div>
                  </div>
                  <p>put some label here. . . .</p>
                  <!-- End of 2nd column -->
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button id="btnsubmit_spolicy" name = "btnsubmit_spolicy" type="button" class="btn btn-primary">Save changes</button>
              <button id="btnupdate_spolicy" name = "btnupdate_spolicy" type="button" class="btn btn-primary">Update changes</button>
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
                        <select class="form-select" id="filter_ay" aria-label="State">
                          <option value="All" selected>All</option>
                          @foreach($result_ay as $ay)
                          <option value="{{$ay->ay}}">{{$ay->ay}}</option>
                          @endforeach
                        </select>
                        <label for="floatingSelect">Academic Year</label>
                      </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-floating mb-3">
                          <select class="form-select" id="filter_scholarship" aria-label="State">
                            <option value="All" selected>All</option>
                            @foreach($result_scholtype as $scholtype)
                            <option value="{{$scholtype->stype_id}}">{{$scholtype->scholarship_type}}</option>
                            @endforeach
                          </select>
                          <label for="floatingSelect">Scholarship Type</label>
                        </div>
                    </div>
                    <div class="col-lg-6">
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
                      <th scope="col" rowspan="2" colspan="1" style="text-align: center">#</th>
                      <th scope="col" rowspan="2" colspan="1" style="display:none; text-align: center;">spolicy_id</th>
                      <th scope="col" rowspan="2" colspan="1" style="text-align: center;">AY</th>
                      <th scope="col" rowspan="2" colspan="1" style="display:none; text-align: center;">sp_id</th>
                      <th scope="col" rowspan="2" colspan="1" style="display:none;  text-align: center;">scholarship_id</th>
                      <th scope="col" rowspan="2" colspan="1" style="text-align: center;">Scholarship</th>
                      <th scope="col" rowspan="2" colspan="1" style="text-align: center;">Code</th>
                      <th scope="col" rowspan="2" colspan="1" style="text-align: center;">Scholarship Program</th>
                      <th scope="col" rowspan="2" colspan="1" style="text-align: center;">HEI Type</th>
                      <th scope="col" rowspan="1" colspan="2" style="text-align: center;">Grade Requirements</th>

                      <th scope="col" rowspan="2" colspan="1" style="text-align: center;">Fund</th>
                      <th scope="col" rowspan="2" colspan="1" style="text-align: center;">APY</th>
                      <th scope="col" rowspan="2" colspan="1" style="display:none; text-align: center;">Defernment</th>
                      <th scope="col" rowspan="2" colspan="1" style="display:none; text-align: center;">Slots</th>
                      <th scope="col" rowspan="2" colspan="1" style="text-align: center;">Actions</th>
                      <th scope="col" rowspan="2" colspan="1" style="display:none; text-align: center;">stype_id</th>
                    </tr>
                    <tr>
                      <th scope="col" rowspan="1" colspan="1" style="text-align: center;">New</th>
                      <th scope="col" rowspan="1" colspan="1" style="text-align: center;">Ongoing</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($result_policy as $policy)
                      <tr class="content">
                        <th scope="row">{{$policy->spolicy_id}}</th>
                        <td style="display:none;">{{$policy->spolicy_id}}</td>
                        <td>{{$policy->ay}}</td>
                        <td style="display:none;">{{$policy->sp_id}}</td>
                        <td style="display:none;">{{$policy->scholarship_id}}</td>
                        <td>{{$policy->scholarship_code}}</td>
                        <td>{{$policy->code}}</td>
                        <td>{{$policy->scholarship_program}}</td>
                        <td style="text-align: center;">{{$policy->hei_type}}</td>
                        <td style="text-align: center;">{{$policy->min_grade}}</td>
                        <td style="text-align: center;">{{$policy->ongoing_min_grade}}</td>
                        <td style="text-align: center;">{{$policy->fund}}</td>
                        <td>{{$policy->amount_per_year}}</td>
                        <td style="display:none;">{{$policy->no_defernment}}</td>
                        <td style="display:none;">{{$policy->slots}}</td>
                        <td style="display:none;">{{$policy->stype_id}}</td>

                        <td style="text-align: center;">
                          <button type="button" id ="btnedit.{{$policy->spolicy_id}}" class="btn btn-primary policy-edit-form" data-bs-toggle="modal" data-bs-target="#AddModal"><i class="ri-edit-2-line"></i></button>
                          <button type="button" id ="btndelete.{{$policy->spolicy_id}}" class="btn btn-danger policy-delete-form"><i class="ri-delete-bin-5-line"></i></button>
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

        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Scholarship name</h5>
                    <p>For custom Bootstrap form validation messages, you’ll need to add the <code>novalidate</code> boolean attribute to your <code>&lt;form&gt;</code>. This disables the browser default feedback tooltips, but still provides access to the form validation APIs in JavaScript. </p>

                    <div class="col-lg-12">

                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Scholarship name</h5>
                    <p>For custom Bootstrap form validation messages, you’ll need to add the <code>novalidate</code> boolean attribute to your <code>&lt;form&gt;</code>. This disables the browser default feedback tooltips, but still provides access to the form validation APIs in JavaScript. </p>

                    <div class="col-lg-12">

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>

@include('footer')
<!-- <script src="assets/js/osds-schol-policy.js"></script> -->