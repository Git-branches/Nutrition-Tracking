


<div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column">
                <center><h3>Profile</h3></center>
              <h5 class="card-title"><?php echo $info['fname']." ".$info['lname'];?></h5>
              <div class="row">
                <div class="col-lg-3 col-md-4 label"><b>Gender:</b></div>
                <div class="col-lg-9 col-md-8"><?php echo $info['gender'];?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label"><b>Address:</b></div>
                <div class="col-lg-9 col-md-8"><?php echo $info['address'];?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label"><b>Age:</b></div>
                <div class="col-lg-9 col-md-8"><?php echo $info['age'];?></div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-3 col-md-4 label"><b>Email:</b></div>
                <div class="col-lg-9 col-md-8"><?php echo $row['email'];?></div>
              </div>

              <div class="row">
              
              
              <div class="col-lg-6 col-md-4">
              <button type='button' onclick="window.location.href = './editProfile.php';" class='editBtn btn btn-primary btn-sm delete btn-flat' ><i class='fa fa-trash'></i>Edit Info</button>
            </div>
              </div>

                            
                            
                         

        </div>
   
            </div>




