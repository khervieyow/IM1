<div class="modal fade" id="editModal<?php echo $row->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModal">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container">

  <form action="" method="POST" class="row g-12">
  <div class="row">

    <input type="hidden" name="id" value="<?php echo $row->id?>">

  <div class="col">
  <label for="last_name" class="form-label">First Name</label>
    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $row->first_name?>" required>
  </div>

  <div class="col">
  <label for="last_name" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $row->last_name?>" required>
  </div>

  <div class="col">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row->email?>" required>
  </div>

</div>
<div class="col">
    <label for="gender" class="form-label">Gender</label>
    <select id="gender" class="form-select" name="gender" value="<?php echo $row->gender?>" required>
      <option selected>Male</option>
      <option>Female</option>
    </select>
  </div>

  <div class="col">
    <label for="birth" class="form-label">Birthdate</label>
    <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?php echo $row->birthdate?>" required>
  </div>
  
  <div class="col">
    <label for="address" class="form-label">Address</label>
    <input type="text" class="form-control" id="address" name="address" value="<?php echo $row->address?>" placeholder="1234 Main St" required>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
        <button type="submit" class="btn btn-primary" name="editStudent">Save changes</button>
</form>
      </div>
    </div>
  </div>
</div>