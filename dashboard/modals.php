<!-- Edit Student Modal -->
<div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateUser" >
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="user_id" id="user_id" >

                <div class="mb-3">
                    <label for="">First name</label>
                    <input type="text" name="fname" id="fname" class="form-control" />
                </div>

                <div class="mb-3">
                    <label for="">Last name</label>
                    <input type="text" name="lname" id="lname" class="form-control" />
                </div>

                <div class="mb-3">
                    <label for="">Address</label>
                    <input type="text" name="address" id="address" class="form-control" />
                </div>

                <div class="mb-3">
                    <label for="">Username</label>
                    <input type="number" name="age" id="age" class="form-control" />
                </div>

              
                
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update User</button>
            </div>
        </form>
        </div>
    </div>
</div>

