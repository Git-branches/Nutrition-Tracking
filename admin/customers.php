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
<?php 
include("modals.php");
?>

<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              
              <h4 class="card-title">Users</h4>
              <!-- Table with stripped rows -->
              <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
              <table id="myTable" class="table">
                <thead>
                  <tr>
                    <th>
                      <b>N</b>ame
                    </th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Date Register</th>
                    <th>User Information</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                
                <tbody>
               
                  <?php
                    include("../connection/conn.php");
                   /* $sql = "SELECT * FROM users INNER JOIN information ON users.user_id=information.user_id";
                    $query = mysqli_query($conn, $sql);
                    while($row = $query->fetch_assoc()){
                      
                      echo "
                        <tr>
                          <td>".$row['name']."</td>
                          <td>".$row['email']."</td>
                          <td>".$row['username']."</td>
                          <td>".$row['dateReg']."</td>
                          <td><button type='button' class='info btn btn-primary btn-sm btn-flat' data-id='".$row['user_id']."' >View</button>
                          </td>
                          <td>
                          
                            <button type='button' class='edit btn btn-success btn-sm edit btn-flat' data-id='".$row['user_id']."' >Edit</button>
                            <button type='button' class='delete btn btn-danger btn-sm delete btn-flat' data-id ='".$row['user_id']."'>Delete</button>
                            
                          </td>
                        </tr>
                      ";
                    }
                  ?>*/
                  if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM users INNER JOIN information ON users.user_id=information.user_id 
                                        WHERE CONCAT(fname, lname, email) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['fname']; ?> <?= $items['lname']; ?></td>
                                                    <td><?= $items['email']; ?></td>
                                                    <td><?= $items['username']; ?></td>
                                                    <td><?= $items['dateReg']; ?></td>
                                                    <td><button type='button' class='info btn btn-primary btn-sm btn-flat' data-id='<?= $items['user_id']; ?>' >View</button>
                                                    </td>
                                                    <td>
                          
                            <button type='button' class='edit btn btn-success btn-sm edit btn-flat' data-id='<?= $items['user_id']; ?>' >Edit</button>
                            <button type='button' class='delete btn btn-danger btn-sm delete btn-flat' data-id ='<?= $items['user_id']; ?>'>Delete</button>
                            
                          </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                 
                </tbody>
                  

                
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Assigned Task</h4>
              
              
              <!-- Table with stripped rows -->
              <table id="myTable" class="table">
                <thead>
                  <tr>
                    <th>
                      <b>N</b>ame
                    </th>
                    <th>BMI</th>
                    <th>Eating Habits</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <tbody>
                  <?php
                    include("../connection/conn.php");
                    $sql = "SELECT * FROM information ";
                    $query = mysqli_query($conn, $sql);
                    
                    while($row = $query->fetch_assoc()){
                      
                      echo "
                        <tr>
                          <td>".$row['fname'].' '.$row['lname']."</td>
                          <td>".$row['BMI']."</td>
                          <td>".$row['habits']."</td>
                        
                          <td><button type='button' class='ass btn btn-primary btn-sm btn-flat' data-id='".$row['user_id']."'>Assign Task</button>
                          </td>
                          
                        </tr>
                      ";
                      
                    }
                  ?>
                </tbody>
                  

                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

    

    <!-- Delete -->
<div class="modal fade" id="ass">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title"><b>Select a task</b></h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
              
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="inq.php">
                <input type="hidden" class="id" name="id">
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Type of Task</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="type">
                    <?php
                    include("../connection/conn.php");
                    $sql = "SELECT * FROM task";
                    $query = mysqli_query($conn, $sql);
                    
                    while($row = $query->fetch_assoc()){
                      
                      echo "
                      <option value=".$row['task_id'].">".$row['taskName']."</option>
                      ";
                      
                    }
                  ?>
                    
                     
                    </select>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-warning btn-flat" name="assign"><i class="fa fa-trash"></i>Assign</button>
              </form>
            </div>
        </div>
    </div>
</div>
</main>
<script src="js/jquery.js"></script>


<script src="js/alertify.min.js"></script>





<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.ass', function(e){
    e.preventDefault();
    $('#ass').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.info', function(e){
    e.preventDefault();
    $('#info').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'infoQ.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.user_id);
      $('#edit_name').val(response.name);
      $('#edit_username').val(response.username);
      $('#edit_password').val(response.password);
      $('.fullname').html(response.fname+' '+response.lname);
      $('.gender').html(response.gender);
      $('.address').html(response.address);
      $('.age').html(response.age);
      $('.height').html(response.height);
      $('.weight').html(response.weight);
      $('.bmi').html(response.BMI);
      $('.curmed').html(response.curMedCon);
      $('.med').html(response.meds);
      $('.habits').html(response.habits);
    }
  });
}
</script>

<?php 
include("includes/footer.html");
?>
