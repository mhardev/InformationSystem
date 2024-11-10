@include('navbar-scholarship-unit')
    <div class="pagetitle">
      <h1>CMSP Application</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Application</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section application">
      <div class="col-lg-12">
        <div class="row">

          <!-- Left side columns -->
          <div class="col-lg-9">
            <div class="row">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Application Table</h5>

                <!-- Table with hoverable rows -->
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">RANK</th>
                      <th scope="col">Region</th>
                      <th scope="col">Name</th>
                      <th scope="col">City</th>
                      <th scope="col">School</th>
                      <th scope="col">Program</th>
                      <th scope="col">Points</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>13</td>
                      <td>Brandon Jacob</td>
                      <td>Caloocan City</td>
                      <td>Adamson University</td>
                      <td>Bachelor of Science in Hotel and Restaurant Management</td>
                      <td>99.9</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>13</td>
                      <td>Bridie Kessler</td>
                      <td>Quezon City</td>
                      <td>Philippine School of Business Administration, Manila</td>
                      <td>Bachelor of Science in Internal Auditing</td>
                      <td>98.9</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>13</td>
                      <td>Ashleigh Langosh</td>
                      <td>Quezon City</td>
                      <td>Adamson University</td>
                      <td>Bachelor of Science in Office Administration</td>
                      <td>96.9</td>
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td>13</td>
                      <td>Angus Grady</td>
                      <td>Makati City</td>
                      <td>Polytechnic University of the Philippines</td>
                      <td>Bachelor of Arts in Communication</td>
                      <td>95.01</td>
                    </tr>
                    <tr>
                      <th scope="row">5</th>
                      <td>13</td>
                      <td>Raheem Lehner</td>
                      <td>Makati City</td>
                      <td>University of the Philippines, Diliman</td>
                      <td>Master of Arts in Transformational Leadership</td>
                      <td>94.9</td>
                    </tr>
                    <tr>
                      <th scope="row">5</th>
                      <td>13</td>
                      <td>Raheem Lehner</td>
                      <td>Mandaluyong City</td>
                      <td>University of the Philippines, Diliman</td>
                      <td>Bachelor of Science in Hotel and Restaurant Management</td>
                      <td>93.9</td>
                    </tr>
                    
                  </tbody>
                </table>
                <!-- End Table with hoverable rows -->

              </div>
            </div>
            </div>
          </div><!-- End Left side columns -->

        @include('application-rigth')

      </div>
    </section>

@include('footer')