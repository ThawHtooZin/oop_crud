<?php

require 'connecttodb.pdo.php';

class queries
{
  public function insert($username, $password, $email)
  {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO users(username, password, email) VALUES('$username','$password', '$email')");
    $stmt->execute();
    if($stmt){
      header('location:Index.php?error=none');
    }
  }

  public function selectall()
  {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt->execute();
    return $stmt->fetchall();
  }

  public function select($id)
  {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id=$id");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function update($username, $password, $email, $id)
  {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE users SET username='$username', password='$password', email='$email' WHERE id=$id");
    $stmt->execute();
    if($stmt){
      header('location:index.php?error=none');
    }
  }
  public function delete($id)
  {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM users WHERE id=$id");
    $stmt->execute();
    if($stmt){
      header('location:index.php?error=none');
    }
  }
}

?>
