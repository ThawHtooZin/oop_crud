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
    $id = $_GET['id'];
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
        $query->update($username, $password, $email, $id);
      }
    }
    $data = $query->select($id);
    ?>
    <div class="container">
      <div class="card">
        <div class="card-header">
          <h2 class="d-inline">Update Data</h2>
          <a href="index.php" class="btn btn-secondary float-end">Back</a>
        </div>
        <div class="card-body">
          <form action="" method="post">
            <label>Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $data['username']; ?>">
            <p class="text-danger"><?php if(!empty($usererror)){ echo $usererror; } ?></p>
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $data['password']; ?>">
            <p class="text-danger"><?php if(!empty($passerror)){ echo $passerror; } ?></p>
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $data['email']; ?>">
            <p class="text-danger"><?php if(!empty($emailerror)){ echo $emailerror; } ?></p>
            <br>
            <button type="submit" class="btn btn-warning w-100">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
