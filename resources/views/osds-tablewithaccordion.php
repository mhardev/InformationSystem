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
            <form class="row g-10">
              <div class="col-md-3">
                <div class="form-floating mb-3">
                  <select class="form-select" id="floatingSelect" aria-label="State">
                    <option selected>All</option>
                    <option value="1">All</option>
                    <option value="1">Region I</option>
                    <option value="2">Region II</option>
                    <option value="2">Region III</option>
                    <option value="2">Region IV-A</option>
                    <option value="2">MIMAROPA</option>
                    <option value="2">Region V</option>
                    <option value="2">Region VI</option>
                    <option value="2">Region VII</option>
                    <option value="2">Region VIII</option>
                    <option value="2">Region IX</option>
                    <option value="2">Region X</option>
                    <option value="2">Region XI</option>
                    <option value="2">Region XII</option>
                    <option value="2">CARAGA</option>
                    <option value="2">BARMM</option>
                    <option value="2">CAR</option> 
                    <option value="2">NCR</option>
                  </select>
                  <label for="floatingSelect">Region</label>
                </div>
              </div>
            </form><!-- End floating Labels Form -->
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

                  <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Region</th>
                                <th scope="col">Total Slots</th>
                                <th scope="col">Alloted Budget</th>
                                <th scope="col">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                              <tr data-bs-toggle="collapse"  data-bs-target="#demo1" class="accordion collapsed">
                                <th scope="row">2</th>
                                <td>Region I</td>
                                <td>350</td>
                                <td>13,350,000.00</td>
                                <td><button type="button" class="btn btn-primary"><i class="bi bi-check-circle"></i></button></td>
                              </tr>
			
                              <tr>
                                <td colspan="12" class="hiddenRow">
                                  <div class="accordian-body collapse" id="demo1"> 
                                  <table class="table table-striped">
                                          
                                    <tbody>
                                      <tr data-toggle="collapse"  class="accordion-toggle" data-target="#demo10">
                                        <td>1</td>
                                        <td>Full Merit</td>
                                        <td>55</td>
                                        <td>900,000.00</td>
                                        <td><button type="button" class="btn btn-primary"><i class="bi bi-check-circle"></i></button></td>
                                      </tr>
                                            
                                      <tr>
                                <td colspan="12" class="hiddenRow">
                                  <div class="accordian-body collapse" id="demo10"> 
                                  <table class="table table-striped">
                                          <thead>
                                            <tr>
                                              <td><a href="#"> XPTO 1</a></td>
                                              <td>XPTO 2</td>
                                              <td>Obs</td>
                                            </tr>
                                            <tr>
                                              <th>item 1</th>
                                              <th>item 2</th>
                                              <th>item 3 </th>
                                              <th>item 4</th>
                                              <th>item 5</th>
                                              <th>Actions</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>item 1</td>
                                              <td>item 2</td>
                                              <td>item 3</td>
                                              <td>item 4</td>
                                              <td>item 5</td>
                                              <td>
                                                  <a href="#" class="btn btn-default btn-sm">
                                                    <i class="glyphicon glyphicon-cog"></i>
                                                  </a>
                                              </td>
                                            </tr>
                                          </tbody>
                                    </table>
                                  
                                  </div> 
                              </td>
                            </tr>

       

                            </tbody>
                        </table>
                </div>
              </div>
            </div>
            <!-- End Scholarship Payment Status Card -->

          </div>
        </div><!-- End Left side columns -->


        <div class="col-lg-8">
          <div class="row">
            <!-- Scholarship Payment Status Card -->
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Slots Distribution</h5>

                  <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Region</th>
                                <th scope="col">Total Slots</th>
                                <th scope="col">Alloted Budget</th>
                                <th scope="col">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Region I</td>
                                    <td>350</td>
                                    <td>350,000.00</td>
                                    <td>
                                        <button type="button" class="btn btn-primary"><i class="bi bi-check-circle"></i></button>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">2</th>
                                    <td>Region II</td>
                                    <td>350</td>
                                    <td>350,000.00</td>
                                    <td>
                                        <button type="button" class="btn btn-primary"><i class="bi bi-check-circle"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                <th scope="row">3</th>
                                <td>Region III</td>
                                <td>450</td>
                                <td>350,000.00</td>
                                <td>
                                    <button type="button" class="btn btn-primary"><i class="bi bi-check-circle"></i></button>
                                </td>
                                </tr>
                                <tr>
                                <th scope="row">4</th>
                                <td>Region IV-A</td>
                                <td>500</td>
                                <td>350,000.00</td>
                                <td>
                                    <button type="button" class="btn btn-primary"><i class="bi bi-check-circle"></i></button>
                                </td>
                                </tr>
                                <tr>
                                <th scope="row">5</th>
                                <td>MIMAROPA</td>
                                <td>500</td>
                                <td>350,000.00</td>
                                <td>
                                    <button type="button" class="btn btn-primary"><i class="bi bi-check-circle"></i></button>
                                </td>
                                </tr>

                                <tr>
                                <th scope="row">6</th>
                                <td>Region VI</td>
                                <td>900</td>
                                <td>350,000.00</td>
                                <td>
                                    <button type="button" class="btn btn-primary"><i class="bi bi-check-circle"></i></button>
                                </td>
                                </tr>

                                <tr>
                                <th scope="row">7</th>
                                <td>Region VII</td>
                                <td>600</td>
                                <td>350,000.00</td>
                                <td>
                                    <button type="button" class="btn btn-primary"><i class="bi bi-check-circle"></i></button>
                                </td>
                                </tr>
                                <tr>
                                <th scope="row">8</th>
                                <td>Region VIII</td>
                                <td>680</td>
                                <td>350,000.00</td>
                                <td>
                                    <button type="button" class="btn btn-primary"><i class="bi bi-check-circle"></i></button>
                                </td>
                                </tr>
                                <tr>
                                <th scope="row">9</th>
                                <td>Region IX</td>
                                <td>350</td>
                                <td>350,000.00</td>
                                <td>
                                    <button type="button" class="btn btn-primary"><i class="bi bi-check-circle"></i></button>
                                </td>
                                </tr>
                                <tr>
                                <th scope="row">10</th>
                                <td>Region X</td>
                                <td>500</td>
                                <td>350,000.00</td>
                                <td>
                                    <button type="button" class="btn btn-primary"><i class="bi bi-check-circle"></i></button>
                                </td>
                                </tr>

                                <tr>
                                <th scope="row">11</th>
                                <td>Region XI</td>
                                <td>700</td>
                                <td>350,000.00</td>
                                <td>
                                    <button type="button" class="btn btn-primary"><i class="bi bi-check-circle"></i></button>
                                </td>
                                </tr>

                                <tr>
                                <th scope="row">12</th>
                                <td>145</td>
                                <td>1,500</td>
                                <td>350,000.00</td>
                                <td>
                                    <button type="button" class="btn btn-primary"><i class="bi bi-check-circle"></i></button>
                                </td>
                                </tr>
                                
                                <tr>
                                <th scope="row">13</th>
                                <td>CARAGA</td>
                                <td>780</td>
                                <td>350,000.00</td>
                                <td>
                                    <button type="button" class="btn btn-primary"><i class="bi bi-check-circle"></i></button>
                                </td>
                                </tr>

                                <tr>
                                <th scope="row">14</th>
                                <td>BARMM</td>
                                <td>450</td>
                                <td>350,000.00</td>
                                <td>
                                    <button type="button" class="btn btn-primary"><i class="bi bi-check-circle"></i></button>
                                </td>
                                </tr>

                                <tr>
                                <th scope="row">15</th>
                                <td>National Capital Region</td>
                                <td>860</td>
                                <td>350,000.00</td>
                                <td>
                                    <button type="button" class="btn btn-primary"><i class="bi bi-check-circle"></i></button>
                                </td>
                                </tr>
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