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
<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Task Creator</h4>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#task">
                Create a Task
              </button>
              <!-- Table with stripped rows -->


              <table id="myTable" class="table">
                <thead>
                  <tr>
                    <th>
                      Task name
                    </th>
                    <th>Type</th>
                    <th>Description</th>
                    
                  </tr>
                </thead>
                <tbody>
                <tbody>
               
                  <?php
                    include("../connection/conn.php");
                    $sql = " SELECT * FROM task";
                    $query = mysqli_query($conn, $sql);
                    
                    
                    while($row = $query->fetch_assoc()){
                      
   
                      echo "
                        <tr>
                          <td>".$row['taskName']."</td>
                          <td>".$row['type']."</td>
                          <td>".$row['description']."</td>
                        
                         
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

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Assigned Task Monitoring</h4>
              
              
              <!-- Table with stripped rows -->
              <table id="myTable" class="table">
                <thead>
                  <tr>
                    <th>
                      <b>N</b>ame
                    </th>
                    <th>Task Name</th>
                    <th>Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <tbody>
                  <?php
                    
                    $sql = "SELECT information.fname, information.lname, task.taskName, assign.status FROM users JOIN assign ON users.user_id = assign.user_id 
                    JOIN task ON task.task_id = assign.task_id JOIN information ON users.user_id = information.user_id";
                    $query = mysqli_query($conn, $sql);
                    
                    while($row = $query->fetch_assoc()){
                      
                      echo "
                        <tr>
                          <td>".$row['fname'].' '.$row['fname']."</td>
                          <td>".$row['taskName']."</td>
                          
                        
    
                      ";

                      if($row["status"] == "Pending"){
                        echo "<td><span class='badge bg-danger'>".$row['status']."</span></td>";
                      }else{
                        echo "<td><span class='badge bg-success'>".$row['status']."</span></td>";
                      }

                      echo "</tr>";
                      
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
</main>

<?php 
if(isset($_POST["create"])){
    $tname = $_POST["tname"];
    $type = $_POST["type"];
    $desc = $_POST["content"];
    

    $createQ = mysqli_query($conn,"INSERT INTO `task`(`task_id`, `taskName`, `type`, `description`) VALUES ('','$tname','$type','$desc')");

    echo "<meta http-equiv='refresh' content='0'>";
}
?>


<div class="modal fade" id="task">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title"><b>Content</b></h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
              
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="task.php">
              <div class="row mb-3">
              <div class="form-group">
                    <label for="edit_name" class="col-sm-3 control-label">Task Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_name" name="tname" required>
                    </div>
                </div>
                
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Type of Task</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="type">
                     
                      <option value="Exercise">Exercise</option>
                      <option value="Meal">Meal</option>
                     
                    </select>
                  </div>
                </div>

                <div class="row">
                <label class="col-sm-2 col-form-label">Description</label>
                <textarea class="form-control" style="height: 100px" name="content" required></textarea>
                </div>
                    <div class="col-sm-9 mt-3">
                    
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="create" class="btn btn-primary">Create</button>
                    </div>
                </div>
              
                
            
            <div class="modal-footer">
            
              </form>
            </div>
        </div>
    </div>
    </div>


  


<script src="js/jquery.js"></script>
<script src="js/alertify.min.js"></script>


<?php 


include("includes/footer.html");

?>