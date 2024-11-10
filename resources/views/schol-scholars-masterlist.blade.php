@include('schol-navbar')
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

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Scholars Masterlist</h5>
                <p>For custom Bootstrap form validation messages, you’ll need to add the <code>novalidate</code> boolean attribute to your <code>&lt;form&gt;</code>.</p>

               
                <div class = "row">
                  <div class="col-md-4">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingName" placeholder="Search">
                      <label for="floatingName">Search</label>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="floatingSelect" aria-label="State">
                        <option selected>Academic Year Grant</option>
                        <option value="1">Oregon</option>
                        <option value="2">DC</option>
                      </select>
                      <label for="floatingSelect">Academic Year Grant</label>
                    </div>
                  </div>
                  <div class="col-md-2">
                      <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="State">
                          <option selected>Scholarship</option>
                          <option value="1">Oregon</option>
                          <option value="2">DC</option>
                        </select>
                        <label for="floatingSelect">Scholarship</label>
                      </div>
                    </div>
                  
                </div>



                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col" >#</th>
                      <th scope="col" style="display:none;">id</th>
                      <th scope="col">Image</th>
                      <th scope="col">Region</th>
                      <th scope="col">AY Grant</th>
                      <th scope="col" style="display:none;">SP ID</th>
                      <th scope="col">Scholarship</th>
                      <th scope="col">Fullname</th>
                      <th scope="col" style="display:none;">HEI ID</th>
                      <th scope="col">HIE Name</th>
                      <th scope="col" style="display:none;">PRG ID</th>
                      <th scope="col">Program</th>
                      <th scope="col">Major</th>
                      <th scope="col">Year</th>
                      <th scope="col">Status</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($scholars as $scholar)
                      <tr class="content">
                        <th scope="row">{{ $loop->iteration }} </th> 
                        <td style="display:none;">{{  $scholar->id }}</td>
                        <td><img src="assets/img/product-1.jpg" alt="Profile" width="35" height="35" class="rounded-circle"></td>
                        <td>{{  $scholar->region }}</td>
                        <td>{{  $scholar->ay_grant }}</td>
                        <td style="display:none;">{{  $scholar->sp_id  }} </td>
                        <td>{{  $scholar->code  }}</td>
                        <td>{{  $scholar->fullname    }}</td>
                        <td style="display:none;">{{  $scholar->heis_id  }}</td>
                        <td>{{  $scholar->heis_name   }}</td>
                        <td style="display:none;">{{  $scholar->program_id   }}</td>
                        <td>{{  $scholar->program_name   }}</td>
                        <td>{{  $scholar->program_major   }}</td>
                        <td>{{  $scholar->yearlevel   }}</td>
                        @if($scholar->status=='Active') 
                          <td style="text-align: center;"><span class="badge bg-primary">Active</span></td>
                        @else
                          <td style="text-align: center;"><span class="badge bg-danger">Not active</span></td>
                        @endif

                        <td style="text-align: center;">
                          <button type="button" class="btn btn-primary sprogram-edit-form"><i class="ri-eye-2-line"></i></button>
                        </td>
                        <td></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $scholars->onEachSide(1)->links() }}
                <!-- End Table with hoverable rows -->
              </div>
            </div>
          </div>
        </div>
    </section>

@include('footer')
<!-- <script src="assets/js/osds-schol-program.js"></script> -->