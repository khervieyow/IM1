<?php
require_once('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php 
      $newconnection->addStudent();
      $newconnection->deleteStudent();
      $newconnection->editStudent();
 ?>

  <div class="container">
  <form action="" method="POST" class="row g-12">
  <div class="row">
  <div class="col">
  <label for="last_name" class="form-label">First Name</label>
    <input type="text" class="form-control" id="first_name" name="first_name" required>
  </div>

  <div class="col">
  <label for="last_name" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="last_name" name="last_name" required>
  </div>

  <div class="col">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>


<div class="col">
    <label for="gender" class="form-label">Gender</label>
    <select id="gender" class="form-select" name="gender" required>
      <option selected>Male</option>x
      <option>Female</option>
    </select>
  </div>

  <div class="col">
    <label for="birth" class="form-label">Birthdate</label>
    <input type="date" class="form-control" id="birthdate" name="birthdate" required>
  </div>
  
  <div class="col">
    <label for="address" class="form-label">Address</label>
    <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary float-end" name ="addstudent"
    style="margin-bottom:50px;margin-top:10px;">Add</button>
  </div>

</form>
<br>
<table class="table table-info">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Birthdate</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
      <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody>
  <?php

$connection = $newconnection->openConnection();

$stmt = $connection->prepare("SELECT * FROM tableni");
$stmt->execute();
$result = $stmt->fetchAll();

if($result){
    foreach($result as $row){
?>
    <tr>
      <td><?php echo $row->id?></td>
      <td><?php echo $row->first_name?></td>
      <td><?php echo $row->last_name?></td>
      <td><?php echo $row->email?></td>
      <td><?php echo $row->gender?></td>
      <td><?php echo $row->birthdate?></td>
      <td><?php echo $row->address?></td>

      <td><button type="button" class="btn btn-warning"data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row->id?>">Edit</button></td>
      <?php include('edit_modal.php');?>

      <form action="" method="post">
      <td><button type="submit" class="btn btn-danger" value="<?php echo $row->id?>"
      name="delete_student">Delete</button>
      </form>

    </td>
    </tr>
<?php
    }
}
?>
  </tbody>
</table>
</div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>