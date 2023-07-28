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
    <?php
    if($_POST){
      if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])){
        if(empty($_POST['username'])){
          $usererror = "The Username field is required";
        }
        if(empty($_POST['password'])){
          $passerror = "The Password field is required";
        }
        if(empty($_POST['email'])){
          $emailerror = "The Email field is required";
        }
      }else{
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $query->insert($username, $password, $email);

      }
    }
    ?>
    <div class="container">
      <div class="card">
        <div class="card-header">
          <h2 class="d-inline">Add Data</h2>
          <a href="index.php" class="btn btn-secondary float-end">Back</a>
        </div>
        <div class="card-body">
          <form action="add.php" method="post">
            <label>Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username">
            <p class="text-danger"><?php if(!empty($usererror)){ echo $usererror; } ?></p>
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
            <p class="text-danger"><?php if(!empty($passerror)){ echo $passerror; } ?></p>
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email">
            <p class="text-danger"><?php if(!empty($emailerror)){ echo $emailerror; } ?></p>
            <br>
            <button type="submit" class="btn btn-success w-100">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
