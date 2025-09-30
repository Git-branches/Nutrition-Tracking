<?php 
include("./connection/conn.php");
if(isset($_POST["update"])){
  $id = $_POST["id"];
  $height = $_POST["height"];
  $weight= $_POST["weight"];
  $newHeight = $height ** 2;
  $bmi = $weight / $newHeight;
  $date = date('Y-m-d');
 

  $kiloQ = "UPDATE information SET height = '$height', weight = '$weight', bmi = '$bmi' WHERE user_id = $id";
  $hisQ = "INSERT INTO history VALUES ('','$id', '$bmi', '$date')";
  mysqli_query($conn, $hisQ);


  $kiloRes = mysqli_query($conn, $kiloQ );
  if($kiloRes){
    echo '<script type="text/javascript">';
    echo 'alert("Success!");';
    echo 'window.location.href = "./customer_dashboard.php";';
    echo '</script>';
  }

}
?>

<div class="col-xxl-4 col-md-6">
              <div class="card info-card">

                <div class="card-body">

                <div class="row">
                  <div class="col-lg-6">

               
                      
                      
                    
                  <form action="" method="post">
                  <input type="hidden" name="id" value="<?php echo $row['user_id']; ?>">
                  <h5 class="card-title">Height (m)</h5>
                  <input type="number" name="height" class="form-control" value="<?php echo $info['height'];  ?>" step=".01" required>
                      <div class="invalid-feedback">Please enter your height</div>
                 
                  </div>
                  <div class="col-lg-6">
                  <h5 class="card-title">Weight (kg)</h5>
                  <input type="number" name="weight" class="form-control" value="<?php echo $info['weight'];  ?>" step=".01" required>
                      <div class="invalid-feedback">Please enter your weight</div>
</div>
<div class="row mt-3">
  <div class="col text-center">
  
  <button type='submit' name="update" class='btn btn-primary btn-sm btn-flat'>save</button>
  </div>
</div>
                  
                 
                  </form>
                </div>
                  
                  
                </div>

              </div>
            </div>

            