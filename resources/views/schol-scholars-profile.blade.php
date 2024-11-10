@include('schol-navbar')
    <div class="pagetitle">
      <h1>Scholars Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Scholarship Program</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-3">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
              <h2>Kevin Anderson</h2>
              <h3>Web Designer</h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <label for="floatingName">Scholarship</label>
                <label for="floatingName">AY Grant</label>
                <label for="floatingName">Allowance Per Year</label>
                <label for="floatingName">Congressional District</label>
                
            </div>
          </div>

        </div>

        <div class="col-xl-9">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#allowamce-history">Allowance History</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#bank-account">Bank Account</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#scholarship-status">Scholarship Status</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <h5 class="card-title">Profile Details</h5>
                    <form class="row g-3">
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingName" placeholder="Your Name">
                                <label for="floatingName">Firstname</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingName" placeholder="Your Name">
                                <label for="floatingName">Middlename</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingName" placeholder="Your Name">
                                <label for="floatingName">Lastname</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingName" placeholder="Your Name">
                                <label for="floatingName">Suffix</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingName" placeholder="Your Name">
                                <label for="floatingName">Fullname</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingName" placeholder="Your Name">
                                <label for="floatingName">Birthday</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" aria-label="State">
                                <option value="1" selected>Male</option>
                                <option value="2">Female</option>
                                </select>
                                <label for="floatingSelect">Sex</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingName" placeholder="Your Name">
                                <label for="floatingName">Contact No.</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingName" placeholder="Your Name">
                                <label for="floatingName">Email Address</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingName" placeholder="Your Name">
                                <label for="floatingName">Complete Address</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" aria-label="State">
                                <option value="1" selected>Male</option>
                                <option value="2">Female</option>
                                </select>
                                <label for="floatingSelect">City</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" aria-label="State">
                                <option value="1" selected>Male</option>
                                <option value="2">Female</option>
                                </select>
                                <label for="floatingSelect">Province</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingName" placeholder="Your Name">
                                <label for="floatingName">HEI Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingName" placeholder="Your Name">
                                <label for="floatingName">Course</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingName" placeholder="Your Name">
                                <label for="floatingName">Major</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" aria-label="State">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="2">3</option>
                                <option value="2">4</option>
                                <option value="2">5</option>
                                <option value="2">6</option>
                                </select>
                                <label for="floatingSelect">Year Level</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Add some remarks here" id="floatingTextarea" style="height: 100px;"></textarea>
                                <label for="floatingTextarea">Remarks</label>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="tab-pane fade allowamce-history pt-3" id="allowamce-history">

                    <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                        <th scope="col" >#</th>
                        <th scope="col" style="display:none;">id</th>
                        <th scope="col">Control No.</th>
                        <th scope="col">Term</th>
                        <th scope="col">AY</th>
                        <th scope="col">Status</th>
                        <th scope="col">Remarks</th>
                        <th scope="col">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allowances as $allowance)
                        <tr class="content">
                            <th scope="row">{{ $loop->iteration }} </th> 
                            <td style="display:none;">{{  $allowance->id }}</td>
                            <td>{{  $allowance->control_no }}</td>
                            <td>{{  $allowance->term }}</td>
                            <td>{{  $allowance->ay }}</td>
                            @if($allowance->status=='Pending') 
                                <td style="text-align: center;"><span class="badge bg-warning">Pending</span></td>
                            @elseif($allowance->status=='Cancelled') 
                                <td style="text-align: center;"><span class="badge bg-danger">Cancelled</span></td>
                            @else
                                <td style="text-align: center;"><span class="badge bg-primary">{{  $allowance->status  }}</span></td>
                            @endif
                                <td>{{  $allowance->remarks    }}</td>

                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary sprogram-edit-form"><i class="ri-eye-2-line"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>


                </div>

                <div class="tab-pane fade bank-account pt-3" id="bank-account">
                </div>

                <div class="tab-pane fade scholarship-status pt-3" id="scholarship-status">
                </div>
              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

@include('footer')
<!-- <script src="assets/js/osds-schol-program.js"></script> -->