<?php 
include("includes/session.php");
include("includes/header.html");
include("includes/navbar.html");

?>


<?php


if(isset($_POST["update"])){
  $id = $row["user_id"];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $address = $_POST['address'];
  $age = $_POST['age'];

  $sql = "UPDATE information SET fname='$fname', lname ='$lname', address ='$address', age='$age'
  WHERE user_id='$user_id'"; 

  $result = mysqli_query($conn, $sql);
 if($result){
  echo '<script type="text/javascript">';
  echo 'alert("Update successful!");';
  echo 'window.location.href = "./customer_dashboard.php";';
  echo '</script>';
 
 }
 

}

if(isset($_POST["pass"])){
  $id = $row["user_id"];

  $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sql = "UPDATE users SET password='$pass'
  WHERE user_id='$user_id'"; 

  $result = mysqli_query($conn, $sql);
 if($result){
  echo '<script type="text/javascript">';
  echo 'alert("Change successful!");';
  echo 'window.location.href = "./customer_dashboard.php";';
  echo '</script>';
 
 }
 

}


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
<main id="main" class="main">
  

<div class="pagetitle">
  <h1>Edit Profile</h1>
</div>

<section class="section">
    <div class="row">
      <!-- left -->
    <div class="col-lg-6">
      

      
      <div class="card">
            <div class="card-body">
              <h5 class="card-title">Profile</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3" action="editProfile.php" method="post">
                
                <div class="col-md-6">
                  <label  class="form-label">First name</label>
                  <input type="text" class="form-control" name="fname">
                </div>

                <div class="col-md-6">
                  <label  class="form-label">Last name</label>
                  <input type="text" class="form-control" name="lname">
                </div>
                
                <div class="col-12">
                  <label for="inputAddress5" class="form-label">Address</label>
                  <input type="text" class="form-control" id="inputAddres5s" placeholder="1234 Main St" name="address">
                </div>
                
                <div class="col-md-2">
                  <label for="inputCity" class="form-label">Age</label>
                  <input type="number" class="form-control" id="inputCity" name="age">
                </div>
              
             
                <div class="text-center">
                  <button type="submit" name="update" class="btn btn-primary" >Submit</button>
                  <button onclick="window.location.href = './customer_dashboard.php';" type="button" class="btn btn-secondary">Cancel</button>
                </div>
              </form>

            </div>
          </div>
      
    </div>

    <div class="col-lg-6">
      

      
      <div class="card">
            <div class="card-body">
              <h5 class="card-title">Password</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3" action="editProfile.php" method="post">
                
               
                
                <div class="col-12">
                  <label for="inputAddress5" class="form-label">New Password</label>
                  <input type="password" class="form-control" id="inputAddres5s" name="password">
                </div>
                
                
             
                <div class="text-center">
                  <button type="submit" name="pass" class="btn btn-primary">Submit</button>
                  <button onclick="window.location.href = './customer_dashboard.php';" type="button" class="btn btn-secondary">Cancel</button>
                </div>
              </form>

            </div>
          </div>
      
    </div>
    </div>
    
</section>
</main><!-- End #main -->



<script src="admin/js/jquery.js"></script>
<script src="admin/js/bootstrap.bundle.min.js"></script>

<script src="admin/js/alertify.min.js"></script>

<?php 
include("includes/footer.html");
?>