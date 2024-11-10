@include('osds-navbar')
    <div class="pagetitle">
      <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
    </div><!-- End Page Title -->


    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-11">
          <div class="row">

              <div class="col-md-2">
                <div class="form-floating mb-3">
                  <select class="form-select" id="floatingSelect" aria-label="State">
                    <option selected>Academic Year</option>
                      <option value="All" selected>All</option>
                      @foreach($result_ay as $ay)
                      <option value="{{$ay->ay}}">{{$ay->ay}}</option>
                      @endforeach
                  </select>
                  <label for="floatingSelect">Academic Year</label>
                </div>
              </div>

<!-- 
              <div class="col-md-2">
                <div class="form-floating mb-3">
                  <select class="form-select" id="region" aria-label="State">
                    <option selected>Region</option>
                      <option value="All" selected>All</option>
                      @foreach($result_region as $result_region)
                      <option value="{{$result_region->region}}">{{$result_region->region}}</option>
                      @endforeach
                  </select>
                  <label for="region">Region</label>
                </div>
              </div> -->

              <div class="col-md-2">
                <div class="form-floating mb-3">
                  <select class="form-select" id="scholarship_id" aria-label="State">
                    <option selected>Under Scholarship</option>
                      <option value="All" selected>All</option>
                      @foreach($result_schol as $result_schol)
                      <option value="{{$result_schol->scholarship_id}}">{{$result_schol->scholarship_code}}</option>
                      @endforeach
                  </select>
                  <label for="scholarship_id">Under Scholarship</label>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-floating mb-3">
                  <select class="form-select" id="scholarship_id" aria-label="State">
                    <option selected>Scholarship Type</option>
                      <option value="All" selected>All</option>
                      @foreach($result_scholtype as $result_scholtype)
                      <option value="{{$result_scholtype->stype_id}}">{{$result_scholtype->scholarship_type}}</option>
                      @endforeach
                  </select>
                  <label for="scholarship_id">Scholarship type</label>
                </div>
              </div>

          </div>
        </div>
        <!-- Left side columns -->


        <div class="col-lg-8">
          <div class="row">
            <!-- Scholarship Payment Status Card -->
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Slots Distribution</h5>
                  <p>For custom Bootstrap form validation messages, you’ll need to add the <code>novalidate</code> boolean attribute to your <code>&lt;form&gt;</code>. This disables the browser default feedback tooltips, but still provides access to the form validation APIs in JavaScript. </p>

                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col" style="display:none;">slot_id</th>
                        <th scope="col" style="display:none;">sp_id</th>
                        <th scope="col" >Academic Year</th>
                        <th scope="col" style="display:none;">region_id</th>
                        <th scope="col" >Region</th>
                        <th scope="col" style="display:none;">scholarship_id</th>
                        <th scope="col">Scholarship</th>
                        <th scope="col">Total Slots</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($result_slots_distribution as $slots_distribution)
                      <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td style="display:none;">{{$slots_distribution->slot_id}}</td>
                        <td style="display:none;">{{$slots_distribution->sp_id}}</td>
                        <td>{{$slots_distribution->ay}}</td>
                        <td style="display:none;">{{$slots_distribution->region_id}}</td>
                        <td>{{$slots_distribution->region}}</td>
                        <td style="display:none;">{{$slots_distribution->scholarship_id}}</td>
                        <td>{{$slots_distribution->scholarship}}</td>
                        <td>{{$slots_distribution->slots}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- End Scholarship Payment Status Card -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Application Status Pie Chart -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Regional Slots <span>| AY 2023-2024</span></h5>

                        <!-- Bar Chart -->
                        <div id="barChart" style="min-height: 500px;"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#barChart"), {
                                series: [{
                                data: [400, 70, 540, 580, 690, 1100, 1200, 1380, 690, 400, 430, 448, 470, 540, 580, 690, 1100, 690]
                                }],
                                chart: {
                                type: 'bar',
                                height: 350
                                },
                                plotOptions: {
                                bar: {
                                    borderRadius: 4,
                                    horizontal: true,
                                }
                                },
                                dataLabels: {
                                enabled: false
                                },
                                xaxis: {
                                categories: ['Region I', 'Region II', 'Region III', 'Region IV-A', 'MIMAROPA', 'Region V', 'Region VI',
                                    'Region VII', 'Region VIII', 'Region IV', 'Region X', 'Region XI', 'Region XII', 'Region XIII', 'CARAGA','BARMM','CAR','NCR'
                                ],
                                }
                            }).render();
                            });
                        </script>
                        <!-- End Bar Chart -->

            </div>
          </div><!-- End Application Status Pie Chart -->

          <!-- Budget Report -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Scholarship Slots <span>| AY 2023-2024</span></h5>

              <!-- Polar Area Chart -->
              <div id="polarAreaChart" style="min-height: 400px;" class="echart"></div>


              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#polarAreaChart")).setOption({
                    angleAxis: {
                      type: 'category',
                      data: ['Region I', 'Region II', 'Region III', 'Region IV-A', 'MIMAROPA', 'Region V', 'Region VI',
                                    'Region VII', 'Region VIII', 'Region IV', 'Region X', 'Region XI', 'Region XII', 'Region XIII', 'CARAGA','BARMM','CAR','NCR'
                                ]
                    },
                    radiusAxis: {},
                    polar: {},
                    series: [{
                        type: 'bar',
                        data: [1, 2, 3, 4, 3, 5, 4, 2, 3, 4, 3, 5, 1,1, 2, 3, 4, 3],
                        coordinateSystem: 'polar',
                        name: 'FSSP',
                        stack: 'a',
                        emphasis: {
                          focus: 'series'
                        }
                      },
                      {
                        type: 'bar',
                        data: [2, 4, 6, 1, 3, 2, 1,2, 4, 6, 1, 3, 2, 1,2, 4, 6, 1, 3],
                        coordinateSystem: 'polar',
                        name: 'HSSP',
                        stack: 'a',
                        emphasis: {
                          focus: 'series'
                        }
                      },
                      {
                        type: 'bar',
                        data: [1, 2, 3, 4, 1, 2, 5,1, 2, 3, 4, 1, 2, 5,1, 2, 3, 4, 1],
                        coordinateSystem: 'polar',
                        name: 'PESFA',
                        stack: 'a',
                        emphasis: {
                          focus: 'series'
                        }
                      },
                      {
                        type: 'bar',
                        data: [1, 2, 3, 4, 1, 2, 5,1, 2, 3, 4, 1, 2, 5,1, 2, 3, 4, 1],
                        coordinateSystem: 'polar',
                        name: 'HPESFA',
                        stack: 'a',
                        emphasis: {
                          focus: 'series'
                        }
                      },
                      {
                        type: 'bar',
                        data: [1, 2, 3, 4, 1, 2, 5,1, 2, 3, 4, 1, 2, 5,1, 2, 3, 4, 1],
                        coordinateSystem: 'polar',
                        name: 'TD',
                        stack: 'a',
                        emphasis: {
                          focus: 'series'
                        }
                      }
                    ],
                    legend: {
                      show: true,
                      data: ['FSSP', 'HSSP', 'PESFA','HPESFA','TD']
                    }
                  });
                });
              </script>
                <!-- End Polar Area Chart -->
            </div>
          </div><!-- End Budget Report -->


        </div><!-- End Right side columns -->

      </div>
    </section>

@include('footer')