<?php
include "../config/db.php";
$user=$_POST['username'];
$pass=$_POST['password'];
$q=$conn->query("SELECT * FROM users WHERE username='$user'");
$d=$q->fetch_assoc();
if($d && password_verify($pass,$d['password'])){
  $_SESSION['admin']=$user;
  header("Location: ../index.php");
}else{
  echo "Login gagal";
}
?>