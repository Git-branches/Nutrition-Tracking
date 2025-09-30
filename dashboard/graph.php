<?php 
include("./connection/conn.php");

$que = "SELECT
MONTH(date) AS Month,
AVG(bmi) AS bmi
FROM
history
WHERE
user_id = '$user_id'
GROUP BY
MONTH(date)
ORDER BY
Month DESC";

$res = mysqli_query($conn, $que);
?>

<div class="col-lg-11">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">BMI Change History</h5>

              <!-- Line Chart -->
              <div id="lineChart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#lineChart"), {
                    series: [{
                      name: "BMI",
                      data: [<?php 
                        while($data = $res->fetch_assoc()){
                            echo "".$data['bmi'].",";
                        }
                      ?>]
                    }],
                    chart: {
                      height: 350,
                      type: 'line',
                      zoom: {
                        enabled: false
                      }
                    },
                    dataLabels: {
                      enabled: false
                    },
                    stroke: {
                      curve: 'straight'
                    },
                    grid: {
                      row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                      },
                    },
                    xaxis: {
                      categories: [<?php 
                        while($data = $res->fetch_assoc()){
                            echo "".$data['Month'].",";
                        }
                      ?>],
                    }
                  }).render();
                });
              </script>
              <!-- End Line Chart -->
                <div class="row">
                  <div class="col-5"></div>
                  <div class="col-5">Months Count</div>
                </div>
            </div>
          </div>
        </div>