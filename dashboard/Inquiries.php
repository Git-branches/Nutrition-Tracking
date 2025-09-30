

<div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column">
                <center><h3>Inquiry Status</h3></center>
                <div class="col-12">
              <div class="card recent-sales overflow-auto">

                

                <div class="card-body">
                  

                  <table class="table table-borderless ">
                    <thead>
                      <tr>
                        
                        <th scope="col">Subject</th>
                        <th scope="col">Status</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                        <?php 
                        include("./connection/conn.php");
                        $inq = "SELECT * FROM inquiries WHERE user_id = '$user_id'";
                        $inqqq = mysqli_query($conn, $inq);
                        while($inqq = $inqqq->fetch_assoc()){
                            $color = '';
                            if($inqq["status"] == "unread"){
                                $color = 'danger';
                            }if($inqq['status'] == 'read'){
                                $color = 'success';
                            }
                            echo "
                            <tr>
                            <td>".$inqq['subject']."</td>
                            <td><span class='badge bg-".$color."'>".$inqq['status']."</span></td>
                            </tr>
                            ";
                        }
                        ?>
                      
                      
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->
              <div class="row">
              
              
              <div class="col-lg-6 col-md-4">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inquiry">
                Create Inquiry
              </button>
            </div>
              </div>

                            
                            
                         

        </div>
   
            </div>

            <div class="modal fade" id="inquiry">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title"><b>Create Inquiry</b></h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
              
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="customer_dashboard.php">
                
                <div class="form-group">
                    <label for="edit_name" class="col-sm-3 control-label">Subject</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_name" name="subject" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_username" class="col-sm-3 control-label">Content</label>

                    <div class="col-sm-9">
                  
                    <textarea class="form-control" style="height: 100px" name="content"></textarea>
                  </div>
                    </div>
                    <div class="form-group">
                  

                    <div class="col-sm-9 mt-3">
                    <button type="button" class="btn btn-default btn-flat pull-left" data-bs-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
              <button type="submit" class="btn btn-success btn-flat" name="send"><i class="fa fa-check-square-o"></i>Send</button>
                    </div>
                </div>
                </div>
                
            </div>
            <div class="modal-footer">
            
              </form>
            </div>
        </div>
    </div>
</div>