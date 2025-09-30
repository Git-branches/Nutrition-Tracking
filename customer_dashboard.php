<?php 
include("includes/session.php");
include("includes/header.html");
include("includes/navbar.html");



?>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php
$formSql = "SELECT user_id FROM information WHERE user_id = '$user_id'";
$formQuery = $conn->query($formSql);
if($formQuery->num_rows < 1){
  ?>
  <main id="main" class="main">
  <section class="section">
      <div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Personal Information Form </h5>

              <!-- Multi Columns Form -->
              <form class="row g-3" method="post" action="customer_dashboard.php">
                <div class="col-md-4">
                  <label for="inputfname5" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="inputfname5" name="fname">
                </div>
                <div class="col-md-4">
                  <label for="inputlname5" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="inputlname5" name="lname">
                </div>

                <div class="col-md-4">
                  <label for="inputGender" class="form-label">Gender</label>
                  <select id="inputGender" class="form-select" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>
                </div>

                <div class="col-12">
                  <label for="inputAddress5" class="form-label">Address</label>
                  <input type="text" class="form-control" id="inputAddres5s" placeholder="Prk., Brgy., (City, Municipality), Province" name="address">
                </div>
                
                <h5 class="card-title">Health and Diet Form</h5>
                
                <div class="col-md-1">
                  <label for="inputage5" class="form-label">Age</label>
                  <input type="number" class="form-control" id="inputage5" name="age" min="2" max="100">
                </div>

                <div class="col-md-1">
                  <label for="inputHeight5" class="form-label">Height</label>
                  <input type="number" class="form-control" id="inputHeight5" name="height" placeholder="Meters" step=".01">
                </div>

                <div class="col-md-2">
                  <label for="inputWeight5" class="form-label">Weight</label>
                  <input type="number" class="form-control" id="inputWeight5" name="weight" placeholder="Kilograms" step=".01">
                </div>

                <h6 class="card-title">Health History</h6>

                <div class="col-md-4">
                  <label for="inputCMC5" class="form-label">Current Medical Conditions</label>
                  <input type="text" class="form-control" id="inputCMC5" name="curMedCon" placeholder="Type None if no Medical Conditions">
                </div>

                <div class="col-md-4">
                  <label for="inputMeds5" class="form-label">Medications currently being taken</label>
                  <input type="text" class="form-control" id="inputMeds5" name="meds" placeholder="Type None if no Medications">
                </div>

                <h6 class="card-title">Eating Habits</h6>
                <h5 class="col-form-label col-sm-2 pt-0 mb-3">Check only one</h5>
                <fieldset class="row mb-3">
               
                  <div class="col-sm-10 mx-5">
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="1" >
                      <label class="form-check-label" for="gridRadios1">
                      trying to control your weight by not eating enough food, exercising too much, or doing both
                      </label>
                    </div>

                    <div class="form-check mb-2">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="2">
                      <label class="form-check-label" for="gridRadios2">
                      losing control over how much you eat and then taking drastic action to not put on weight
                      </label>
                    </div>

                    <div class="form-check mb-2">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="3">
                      <label class="form-check-label" for="gridRadios3">
                      eating large portions of food until you feel uncomfortably full
                      </label>
                    </div>

                    <div class="form-check ">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios4" value="0">
                      <label class="form-check-label" for="gridRadios4">
                      I have a normal eating habits
                      </label>
                    </div>
                  </div>
                </fieldset>
                <div class="text-center">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>
            </div>
            </div>
        </section>
        <?php
				    	}
				    	else{
                include("includes/sidepanel.html");
				    		?>
<!-- Dashboard -->
<main id="main" class="main">
<div class="pagetitle">
      <h1>Dashboard</h1>
    </div>
    <section class="section">
    <div class="row">
      <!-- left -->
    <div class="col-lg-8">
      <div class="row">
    <?php 
      include("dashboard/metrics.php");
      include("dashboard/kiloEdit.php");
      include("dashboard/habits.php");
     
     
      
      ?>  
      <div class="row">
      <?php 
      
      include("dashboard/graph.php");
     
      
      ?>
      </div>
</div>
    </div>
     <!-- right -->
    <div class="col-lg-4">
      <?php 
      include("dashboard/info.php");
      include("dashboard/inquiries.php");
      ?>
      </div>

    </div>
    </section>
<?php

include("dashboard/modals.php");
              }
?>

</main>

<?php 
if(isset($_POST['submit'])){
  $fname = $_POST ['fname'];
  $lname = $_POST ['lname'];
  $gender = $_POST ['gender'];
  $address = $_POST ['address'];
  $age = $_POST ['age'];
  $height= $_POST ['height'];
  $weight = $_POST ['weight'];
  $curMedCon = $_POST ['curMedCon'];
  $meds = $_POST ['meds'];
  $habit = $_POST ['gridRadios'];
  $date = date('Y-m-d');

  $newHabit = '';
  switch ($habit) {
    case 1:
      $newHabit = 'Anorexia nervosa';
      break;
    case 2:
      $newHabit = 'bulimia';
      break;
      case 3:
        $newHabit = 'binge eating disorder';
          break; 
          case 0:
            $newHabit = 'healthy habits!';
            break;
  }
  
  
  $newHeight = $height ** 2;
  $bmi = $weight / $newHeight;

  $infoSql = "INSERT INTO information (`info_id`, `user_id`, `fname`, `lname`, `gender`, `address`, `age`, `height`, `weight`, 
  `BMI`, `curMedCon`, `meds`, `habits`) VALUES ('','$user_id','$fname','$lname','$gender','$address','$age',
  '$height','$weight','$bmi','$curMedCon',' $meds','$newHabit')";

  $hisQ = "INSERT INTO history VALUES ('','$user_id', '$bmi', '$date')";
  mysqli_query($conn, $hisQ);

  $infoQuery = $conn->query($infoSql);

  echo "<meta http-equiv='refresh' content='0'>";
}
?>

<?php 
if(isset($_POST["send"])){
  $subject = $_POST ["subject"];
  $content = $_POST ["content"];
  $time = date("Y-m-d h:i:sa");
  $status = 'unread';

  $inqQ = "INSERT INTO inquiries (`inq_id`, `user_id`, `subject`, `content`, `time`, `status`) VALUES ('','$user_id','$subject',' $content','$time','$status')";
  $inqQ = $conn->query($inqQ);

  echo "<meta http-equiv='refresh' content='0'>";

}
?>

<?php 
include("includes/footer.html");
?>