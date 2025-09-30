<?php 
include("includes/session.php");
include("includes/header.html");
include("includes/navbar.html");
include("includes/sidepanel.html");
?>

<main id="main" class="main">
<section class="section">
      <div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Personal Information Form </h5>

              <!-- Multi Columns Form -->
              <form class="row g-3" method="post" >
                <div class="col-md-4">
                  <label for="inputfname5" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="inputfname5" name="fname">
                </div>
                <div class="col-md-4">
                  <label for="inputlname5" class="form-label">Last Name</label>
                  <input type="password" class="form-control" id="inputlname5" name="lname">
                </div>

                <div class="col-md-4">
                  <label for="inputGender" class="form-label">Gender</label>
                  <select id="inputGender" class="form-select" name="gender">
                    <option value="female">Male</option>
                    <option value="male">Female</option>
                  </select>
                </div>

                <div class="col-12">
                  <label for="inputAddress5" class="form-label">Address</label>
                  <input type="text" class="form-control" id="inputAddres5s" placeholder="Prk., Brgy., (City, Municipality), Province" name="address">
                </div>
                
                <h5 class="card-title">Health and Diet Form</h5>
                
                <div class="col-md-1">
                  <label for="inputage5" class="form-label">Age</label>
                  <input type="number" class="form-control" id="inputage5" name="age">
                </div>

                <div class="col-md-1">
                  <label for="inputHeight5" class="form-label">Height</label>
                  <input type="number" class="form-control" id="inputHeight5" name="height" placeholder="Meters">
                </div>

                <div class="col-md-2">
                  <label for="inputWeight5" class="form-label">Weight</label>
                  <input type="number" class="form-control" id="inputWeight5" name="weight" placeholder="Kilograms">
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

                <div class="col-md-4">
                  <label for="inputBfast" class="form-label">Breakfast</label>
                  <select id="inputBfast" class="form-select" name="breakfast">
                    <option value="1">Often</option>
                    <option value="2">Moderate</option>
                    <option value="3">always</option>
                  </select>
                </div>

                <div class="col-md-4">
                  <label for="inputlunch" class="form-label">Lunch</label>
                  <select id="inputlunch" class="form-select" name="lunch">
                    <option value="1">Often</option>
                    <option value="2">Moderate</option>
                    <option value="3">always</option>
                  </select>
                </div>

                <div class="col-md-4">
                  <label for="inputDinner" class="form-label">Dinner</label>
                  <select id="inputDinner" class="form-select" name="dinner">
                    <option value="1">Often</option>
                    <option value="2">Moderate</option>
                    <option value="3">always</option>
                  </select>
                </div>


               
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                      Check me out
                    </label>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>
            </div>
            </div>
        </section>
       </main>

       
<?php 
include("includes/footer.html");
?>