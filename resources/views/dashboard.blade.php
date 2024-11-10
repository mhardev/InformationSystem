@include('navbar-scholarship-unit')
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
        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">
            <!-- Applicants Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

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

                <div class="card-body">
                  <h5 class="card-title">Applicants <span>| AY 2023-2024</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>8,095</h6>
                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase from the previous application</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Applicants Card -->

            <!-- Evaluated Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

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

                <div class="card-body">
                  <h5 class="card-title">Evaluated <span>| AY 2023-2024</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>3,264</h6>
                      <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1"> over applicants</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Evaluated Card -->

            <!-- Deficiency Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

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

                <div class="card-body">
                  <h5 class="card-title">Deficiency <span>| AY 2023-2024</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1,244</h6>
                      <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">over applicants</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Deficiency Card -->

            <!-- Scholarship Payment Status Card -->
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Payment Status</h5>

                  <!--Scholarship Payment Status  Stacked Bar Chart -->
                  <canvas id="stakedBarChart" style="max-height: 400px;"></canvas>
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new Chart(document.querySelector('#stakedBarChart'), {
                        type: 'bar',
                        data: {
                          labels: ['Full Merit', 'Half Merit', 'PESFA', 'Half PESFA', 'Tulong Dunong', 'SMART'],
                          datasets: [{
                              label: 'Released',
                              data: [10, 12, 2, 35, 35, 40, 20],
                              backgroundColor: 'rgba(2, 108, 185)'
                            },
                            {
                              label: 'Disbursed',
                              data: [16, 15, 8, 40, 40, 45, 35],
                              backgroundColor: 'rgba(10, 140, 235,0.8)',
                              borderColor: 'rgb(54, 162, 235)',
                            },
                            {
                              label: 'Obligated',
                              data: [25, 20, 10, 40, 40, 50, 40],
                              backgroundColor: 'rgba(10, 140, 235,0.6)',
                              borderColor: 'rgb(54, 162, 235)',
                            },
                            {
                              label: 'Processed',
                              data: [29, 35, 20, 45, 40, 78, 50],
                              backgroundColor: 'rgba(10, 140, 235,0.4)',
                              borderColor: 'rgb(54, 162, 235)',
                            },
                            {
                              label: 'Un-processed',
                              data: [31, 40, 30, 51, 42, 82, 56],
                              backgroundColor: 'rgb(10, 140, 235,0.2)',
                              borderColor: 'rgb(54, 162, 235)',
                            },
                          ]
                        },
                        options: {
                          plugins: {
                            title: {
                              display: true,
                              text: '-----'
                            },
                          },
                          responsive: true,
                          scales: {
                            x: {
                              stacked: true,
                            },
                            y: {
                              stacked: true
                            }
                          }
                        }
                      });
                    });
                  </script>
                  <!-- End Scholarship Payment Status Stacked Bar Chart -->

                </div>
              </div>
            </div>
            <!-- End Scholarship Payment Status Card -->

            <!-- Graduates -->
            <div class="col-12">
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

                <div class="card-body">
                  <h5 class="card-title">Graduates by Scholarship Program</h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Full Merit',
                          data: [31, 40, 30, 51, 42]
                        }, {
                          name: 'Half Merit',
                          data: [29, 35, 20, 45, 40]
                        }, {
                          name: 'PESFA',
                          data: [25, 20, 10, 40, 40]
                        }, {
                          name: 'Half PESFA',
                          data: [16, 15, 8, 40, 40]
                        }, {
                          name: 'Tulong Dunong',
                          data: [10, 12, 2, 35, 35]
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'Text',
                          categories: ["2019-2020", "2020-2021", "2021-2022", "2022-2023", "2023-2024"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Graduates -->

            <!-- News & Updates Traffic -->
            <div class="col-12">
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
                  <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

                  <div class="news">
                    <div class="post-item clearfix">
                      <img src="assets/img/news-1.jpg" alt="">
                      <h4><a href="#">Announcements #1</a></h4>
                      <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
                    </div>

                    <div class="post-item clearfix">
                      <img src="assets/img/news-2.jpg" alt="">
                      <h4><a href="#">Announcements #2</a></h4>
                      <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona nande...</p>
                    </div>

                    <div class="post-item clearfix">
                      <img src="assets/img/news-3.jpg" alt="">
                      <h4><a href="#">Announcements #3</a></h4>
                      <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et totam...</p>
                    </div>

                    <div class="post-item clearfix">
                      <img src="assets/img/news-4.jpg" alt="">
                      <h4><a href="#">Announcements #4</a></h4>
                      <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum cuder...</p>
                    </div>

                    <div class="post-item clearfix">
                      <img src="assets/img/news-5.jpg" alt="">
                      <h4><a href="#">Announcements #5</a></h4>
                      <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae dignissimos eius...</p>
                    </div>

                  </div><!-- End sidebar recent posts-->

                </div>
              </div><!-- End News & Updates -->
            </div>

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
              <h5 class="card-title">Application Status <span>| AY 2023-2024</span></h5>

              <div id="trafficChart" style="min-height: 350px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [{
                          value: 1048,
                          name: 'Evaluated'
                        },
                        {
                          value: 735,
                          name: 'Awarded'
                        },
                        {
                          value: 580,
                          name: 'Deficiency'
                        },
                        {
                          value: 484,
                          name: 'Rejected'
                        }
                      ]
                    }]
                  });
                });
              </script>

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
              <h5 class="card-title">Budget Report <span>| This Month</span></h5>

              <div id="budgetChart" style="min-height: 350px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                    legend: {
                      data: ['Allocated Budget', 'Actual Payment']
                    },
                    radar: {
                      // shape: 'circle',
                      indicator: [{
                          name: 'F-Merit',
                          max: 6500
                        },
                        {
                          name: 'H-Merit',
                          max: 16000
                        },
                        {
                          name: 'PESFA',
                          max: 30000
                        },
                        {
                          name: 'H-PESFA',
                          max: 38000
                        },
                        {
                          name: 'TD',
                          max: 52000
                        },
                        {
                          name: '',
                          max: 25000
                        }
                      ]
                    },
                    series: [{
                      name: 'Budget vs Payment',
                      type: 'radar',
                      data: [{
                          value: [4200, 3000, 20000, 35000, 50000, 18000],
                          name: 'Allocated Budget'
                        },
                        {
                          value: [5000, 14000, 28000, 26000, 42000, 21000],
                          name: 'Actual Payment'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Budget Report -->

          <!-- Recent Activity -->
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

            <div class="card-body">
              <h5 class="card-title">Recent Activity <span>| Today</span></h5>

              <div class="activity">

                <div class="activity-item d-flex">
                  <div class="activite-label">32 min</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">56 min</div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
                    Voluptatem blanditiis blanditiis eveniet
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 hrs</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    Voluptates corrupti molestias voluptatem
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">1 day</div>
                  <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                  <div class="activity-content">
                    Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 days</div>
                  <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                  <div class="activity-content">
                    Est sit eum reiciendis exercitationem
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">4 weeks</div>
                  <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                  <div class="activity-content">
                    Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                  </div>
                </div><!-- End activity item-->

              </div>

            </div>
          </div><!-- End Recent Activity -->

        </div><!-- End Right side columns -->

      </div>
    </section>

@include('footer')
