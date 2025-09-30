        <?php 
        $bmi = $info['BMI'];
        $color = '';
        $category = '';
        if ($bmi < 18.5) {
            $color = 'primary';
            $category = 'Underweight';
        }
        if ($bmi > 18.4 && $bmi < 24.9) {
            $color = 'success';
            $category = 'Healthy weight';

        } 
        if ($bmi > 25.0 && $bmi < 29.9) {
            $color = 'warning';
            $category = 'Pre-obesity';
        }
        if ($bmi > 30.0 && $bmi < 34.9) {
            $color = 'danger';
            $category = 'Obesity class I';
        }
        if ($bmi > 35.0 && $bmi < 39.9) {
            $color = 'danger';
            $category = 'Obesity class II';
        }
        if ($bmi > 40.0){
            $color = 'danger';
            $category = 'Obesity class III';
        }

        ?>
        
        <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                
                <div class="card-body">
                  <h5 class="card-title">Your BMI score <a href="#" type="button" data-bs-toggle="dropdown" class="ri ri-information-line btn btn-light btn-sm delete btn-flat"></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow p-2">
                    <li class="dropdown-header text-start">
                      <h6>Info</h6>
                    </li>

                    <li ><h6>The result is an estimate and should be considered as a rough guide
                         only as it does not take into account age, gender, ethnicity or body composition</h6></li>
                         <li >   
                            <ul style ="list-style-type: none;">
                                <li class="text-primary">
                                &#x2022; Underweight
                                </li>
                                <li class="text-success">
                                &#x2022; Healthy weight
                                </li>
                                <li class="text-warning">
                                &#x2022; Pre-obesity
                                </li>
                                <li class="text-danger">
                                &#x2022; Obesity class I
                                </li>
                                <li class="text-danger">
                                &#x2022; Obesity class II
                                </li>
                                <li class="text-danger">
                                &#x2022; Obesity class III
                                </li>

                            </ul>

                         </li>
                  </ul>
                </h5>  
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      
                    </div>
                    <div class="ps-4">
                      <h2><?php echo $bmi;?></h2>
                      <h3><span class="text-<?php echo $color; ?> small pt-1 fw-bold"> <h5> &#x2022; <?php echo $category; ?></h5></span> </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            