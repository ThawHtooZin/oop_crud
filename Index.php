<?php
require "Resources/bootstrap.res.php";
require "Controller/queries.ctr.php";

$query = new queries();
$bootstrap = new bootstrap();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <?php
  $bootstrap->csslink();
  ?>
  <body>
    <div class="container mt-5">
      <h1 class="text-center">User Table</h1>
      <a href="add.php" class="btn btn-success float-end">Add</a>
      <table class="table table-striped table-dark table-hover">
        <tr>
          <th>#</th>
          <th>Username</th>
          <th>Password</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
        <?php
        $datas = $query->selectall();
        foreach ($datas as $data) {
        ?>
        <tr>
          <td><?php echo $data['id']; ?></td>
          <td><?php echo $data['username']; ?></td>
          <td><?php echo $data['password']; ?></td>
          <td><?php echo $data['email']; ?></td>
          <td>
            <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning text-light">Edit</a>
            <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a>
          </td>
        </tr>
        <?php
        }
        ?>
      </table>
    </div>
  </body>
</html>
