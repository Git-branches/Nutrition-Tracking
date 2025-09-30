<?php 
include("includes/header.html");
include("includes/session.php");
include("includes/navbar.html");
include("includes/sidepanel.html");
?>
<main id="main" class="main">
<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Tasks</h4>
             
              <!-- Table with stripped rows -->


              <table id="myTable" class="table">
                <thead>
                  <tr>
                    <th>Status</th>
                    <th>
                      Task name
                    </th>
                    <th>Type</th>
                    <th>Description</th>
                    <th></th>
                    <th>Action</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                <tbody>
               
                  <?php
                    include("connection/conn.php");
                    
                    $sql = " SELECT task.taskName, task.description, task.type, assign.status, assign.ass_id FROM users JOIN assign ON users.user_id = assign.user_id JOIN task 
                    ON task.task_id = assign.task_id
                    WHERE assign.user_id='$user_id'";
                    $query = mysqli_query($conn, $sql);
                    
                    while($row = $query->fetch_assoc()){
                      echo"<tr>";
                      if($row["status"] == "Pending"){
                        echo "<td><span class='badge bg-danger'>".$row['status']."</span></td>";
                      }else{
                        echo "<td><span class='badge bg-success'>".$row['status']."</span></td>";
                      }
   
                      echo "
                        
                          <td>".$row['taskName']."</td>
                          <td>".$row['type']."</td>
                          <td>".$row['description']."</td>
                          <td></td>
                          <td>
                          
                          <button type='button' class='info btn btn-primary btn-sm btn-flat' data-id='".$row['ass_id']."'>Done</button>
                          <button type='button' class='del btn btn-danger btn-sm btn-flat' data-id='".$row['ass_id']."'>Remove</button>
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
</main>



<div class="modal fade" id="inquiry">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title"><b>Confirmation</b></h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
              
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="ass.php">
              <input type="hidden" class="id" name="id">
             
                
              <div class="row">
              <div class="col">
                Are you sure you are done?
              </div>
                
                  
                </div>
                
               
                
                  

                    <div class="col-sm-9 mt-3">
                    
              <button type="submit" class="btn btn-secondary btn-flat" name="read"><i class="fa fa-check-square-o"></i>Yes</button>
                    </div>
                </div>
              
                
            
            <div class="modal-footer">
            
              </form>
            </div>
        </div>
    </div>
    </div>



    <div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title"><b>Deleting...</b></h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
              
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="ass.php">
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p>Remove Assigned Task?</p>
                    <h2 class="bold fullname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>


<script src="admin/js/jquery.js"></script>
<script src="admin/js/alertify.min.js"></script>




<script>
$(function(){
  $(document).on('click', '.del', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  $(document).on('click', '.info', function(e){
    e.preventDefault();
    $('#inquiry').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
})
function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'ass.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.ass_id);
      $('.status').val(response.status);
      
    }
  });
}
  </script>
 
<?php 


include("includes/footer.html");

?>