<?php include("includes/header.html");
include("includes/navbar.html");
include("includes/sidepanel.html");
session_start();
if(!isset($_SESSION['admin'])){
  header("location: index.php");
  exit();
}

?>



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <!-- End Sales Card -->

           

            <!-- Customers Card -->
            <div class="col-xxl-6 col-xl-12">

              <div class="card info-card customers-card">

               

                <div class="card-body">

                  <h5 class="card-title">Users</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      include("../connection/conn.php");
                      $query = "SELECT COUNT(user_id) AS count FROM information";
                      $result = $conn->query($query);
                      $row = $result->fetch_assoc();
                      $count = $row["count"];
                      ?>
                      <h6><?php echo $count; ?></h6>
                      <!--<span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>-->

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  
                </div>

                <div class="card-body">
                  <h5 class="card-title">User BMI Reports</h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                 <!-- Bar Chart -->
              <div id="barChart"></div>

              <?php 
          $under = "SELECT 
          SUM(CASE WHEN BMI < 18.5 THEN 1 ELSE 0 END) AS under,
          SUM(CASE WHEN BMI > 18.4 && BMI < 24.9 THEN 1 ELSE 0 END) AS norm,
          SUM(CASE WHEN BMI > 25.0 && BMI < 29.9 THEN 1 ELSE 0 END) AS pre,
          SUM(CASE WHEN BMI > 30.0 THEN 1 ELSE 0 END) AS obese
          FROM information
          ";
          $res = $conn->query($under);
          $bmi = $res->fetch_assoc();
          ?>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    new ApexCharts(document.querySelector("#barChart"), {
      series: [{
        data: [<?php 
          echo $bmi["under"].','.$bmi["norm"].','.$bmi["pre"].','.$bmi["obese"];
          ?>]
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
        categories: ['Underweight', 'Normal weight ', 'Pre-obsesity', 'Obese'
        ],
      }
    }).render();
  });
</script>
<!-- End Bar Chart --> 

                </div>

              </div>
            </div><!-- End Reports -->


           

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        

      </div>
    </section>

  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>