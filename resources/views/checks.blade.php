@include('navbar-checks')
    <div class="pagetitle">
      <h1>CHECKS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">CHECKS</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section application">
      <div class="col-lg-12">
        <div class="row" style="flex-wrap: nowrap">
          <!-- Left side columns -->
          <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">FORM A</h5>
                    <h6>Dean's Profile</h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia alias iure aliquid cupiditate neque ex, assumenda deserunt cum dolor non nostrum, est suscipit sequi facilis molestiae esse! Deserunt, voluptates fugiat.</p>
                    <div class="d-flex flex-nowrap">
                        <h5 class="card-title" style="padding: 5px 0px 0px">STATUS:&nbsp;<span>PENDING</span></h5>
                        <a type="button" class="btn btn-sm btn-outline-primary" style="margin-left:auto; ">View Details</a>
                    </div>
                </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">FORM B-C</h5>
                    <h6>Curriculum Programs</h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia alias iure aliquid cupiditate neque ex, assumenda deserunt cum dolor non nostrum, est suscipit sequi facilis molestiae esse! Deserunt, voluptates fugiat.</p>
                    <div class="d-flex flex-nowrap">
                        <h5 class="card-title" style="padding: 5px 0px 0px">STATUS:&nbsp;<span>PENDING</span></h5>
                        <a type="button" class="btn btn-sm btn-outline-primary" style="margin-left:auto; ">View Details</a>
                    </div>
                </div>
            </div>
          </div>
          <!-- End Left side columns -->
      </div>
      <div class="col-lg-12">
        <div class="row" style="flex-wrap: nowrap">
          <!-- Left side columns -->
          <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">FORM E5</h5>
                    <h6>Faculty Profile</h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia alias iure aliquid cupiditate neque ex, assumenda deserunt cum dolor non nostrum, est suscipit sequi facilis molestiae esse! Deserunt, voluptates fugiat.</p>
                    <div class="d-flex flex-nowrap">
                        <h5 class="card-title" style="padding: 5px 0px 0px">STATUS:&nbsp;<span>PENDING</span></h5>
                        <a href="{{url('/form-e5')}}" type="button" class="btn btn-sm btn-outline-primary" style="margin-left:auto; ">View Details</a>
                    </div>
                </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">FORM PRC</h5>
                    <h6>List of Graduates</h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia alias iure aliquid cupiditate neque ex, assumenda deserunt cum dolor non nostrum, est suscipit sequi facilis molestiae esse! Deserunt, voluptates fugiat.</p>
                    <div class="d-flex flex-nowrap">
                        <h5 class="card-title" style="padding: 5px 0px 0px">STATUS:&nbsp;<span>PENDING</span></h5>
                        <a type="button" class="btn btn-sm btn-outline-primary" style="margin-left:auto; ">View Details</a>
                    </div>
                </div>
            </div>
          </div>
          <!-- End Left side columns -->
      </div>
    </section>

@include('footer')
