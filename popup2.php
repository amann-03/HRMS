<div id="Modal2" class="modal fade" role="dialog" >
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title" style="padding-left: 2vh;">Edit Details</h5>
      </div>
      <form action="" method="post">
        <div class="modal-body">
          <div>
            <label>Name</label>
          </div>
          <div>
            <input type="text" class="input_div" name="name" value="<?php echo $user->first_name ?>" required>
          </div>
           <div>
            <label>DOB</label>
          </div>
          <div>
            <input type="date"  class="input_div" name="dob" value="<?php echo $user->dob ?>" required>
          <div>
            <label>Gender</label>
          </div>
          <div>
            <input type="text"  class="input_div" name="gender" value="<?php echo $user->last_name ?>" required>
          </div>
          <div>
            <label>Email</label>
          </div>
          <div>
            <input type="email" class="input_div" name="email" value="<?php echo $user->email_id ?>" required>
          </div>
          <div>
            <label>Contact Number</label>
          </div>
          <div>
            <input type="text"  class="input_div" name="contact_number" value="<?php echo $user->contact_number ?>" required>
          </div>
          </div>
          <div>
            <label>Address</label>
          </div>
          <div>
            <input type="text" class="input_div" name="address" value="<?php echo $user->doj ?>" required>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-secondary" name="update_details" value="Update">
        </div>
      </form>
    </div>
  </div>
</div>
<div>