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
              <h4 class="card-title">inquiries</h4>
              
              <!-- Table with stripped rows -->
              <table id="myTable" class="table ">
                <thead>
                  <tr>
                    <th>
                      <b>N</b>ame
                    </th>
                    <th>Date and Time</th>
                    <th>Subject</th>
                    <th>View Content</th>
                  </tr>
                </thead>
                <tbody>
                <tbody>
               
                  <?php
                    include("../connection/conn.php");
                    $sql = "SELECT B.*, A.fname, A.lname FROM inquiries B INNER JOIN information A ON B.user_id=A.user_id WHERE status = 'unread'";
                    $query = mysqli_query($conn, $sql);
                    
                    while($row = $query->fetch_assoc()){
                      
                      echo "
                        <tr>
                          <td>".$row['fname'].' '.$row['lname']."</td>
                          <td>".$row['time']."</td>
                          <td>".$row['subject']."</td>
                          
                          <td>
                          
                          <button type='button' class='info btn btn-primary btn-sm btn-flat' data-id='".$row['inq_id']."' >View</button>
                       
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title"><b>Content</b></h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
              
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="inq.php">
              <input type="hidden" class="id" name="id">
             
                
              <div class="row">
              <div class="content"></div>
                <p></p>
                  
                </div>
                
               
                
                  

                    <div class="col-sm-9 mt-3">
                    
              <button type="submit" class="btn btn-secondary btn-flat" name="read"><i class="fa fa-check-square-o"></i>Close</button>
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

<script>
$(function(){
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
    url: 'inq.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.inq_id);
      $('.status').val(response.status);
      $('.content').html(response.content);
    }
  });
}
  </script>
<?php 
include("includes/footer.html");
?>