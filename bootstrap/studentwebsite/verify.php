<?php
session_start();
include ('dbconnect.php');
  if(!isset($_POST['username']) or !isset($_POST['password'])) {
    header("Location: index.php");
  }
$username = $_POST['username'];
$password = $_POST['password'];

  $username_get = mysqli_real_escape_string($dbconnect, $username);
  $username_sql = "SELECT * FROM admin WHERE username = '$username_get'";
  $username_qry = mysqli_query($dbconnect, $username_sql);

  if(mysqli_num_rows($username_qry)==0) {
    header('Location:index.php?page=login&error=loginerror');
  }  else {
      $username_aa = mysqli_fetch_assoc($username_qry);

      $hashed_password = $username_aa['password'];
      if (password_verify($password, $hashed_password)) {
        $_SESSION['admin']=$username;
        header('Location:index.php?page=adminpanel');
      } else {
        header('Location:index.php?page=login&error=fail');
      }



    }




?>
