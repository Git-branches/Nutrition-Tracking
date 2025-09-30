<!-- Description -->
<div class="modal fade" id="info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title"><b><span class="fullname"></span></b></h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
              
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Gender:</div>
                  <div class="col-lg-9 col-md-8 gender"></div>
                </div>
                <div class="row">
                <div class="col-lg-3 col-md-4 label">Address:</div>
                  <div class="col-lg-9 col-md-8 address"></div>
                </div>
                <div class="row">
                <div class="col-lg-3 col-md-4 label">Age:</div>
                  <div class="col-lg-9 col-md-8 age"></div>
                </div>
                <div class="row">
                <div class="col-lg-3 col-md-4 label">Height:</div>
                  <div class="col-lg-9 col-md-8 height"></div>
                </div>
                <div class="row">
                <div class="col-lg-3 col-md-4 label">Weight:</div>
                  <div class="col-lg-9 col-md-8 weight"></div>
                </div>
                <div class="row mb-3">
                <div class="col-lg-3 col-md-4 label">B.M.I. :</div>
                  <div class="col-lg-9 col-md-8 bmi"></div>
                </div>
                <div class="row mb-3">
                <div class="col-lg-6 col-md-4 label">Current Medical Condition:</div>
                  <div class="col-lg-9 col-md-8 curmed"></div>
                </div>
                <div class="row mb-3">
                <div class="col-lg-3 col-md-4 label">Medications:</div>
                  <div class="col-lg-9 col-md-8 med"></div>
                </div>
                <div class="row">
                <div class="col-lg-4 col-md-4 label">Eating Habits:</div>
                  <div class="col-lg-9 col-md-8 habits"></div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>



<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title"><b>Edit User</b></h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
              
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="user_edit.php">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="edit_name" class="col-sm-3 control-label">Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_name" name="name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_username" class="col-sm-3 control-label">Username</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_username" name="username" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="edit_password" name="password" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title"><b>Deleting...</b></h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
              
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="delete.php">
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p>DELETE USER</p>
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




     