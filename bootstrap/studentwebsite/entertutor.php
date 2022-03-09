<?php


  if(!isset($_POST['tutor'])) {
    header("Location: index.php");
  }
else {
  $tutor_aa = mysqli_real_escape_string($dbconnect, $_POST['tutor']);
  $tutorcode_aa = mysqli_real_escape_string($dbconnect, $_POST['tutorcode']);
  $tutorcode_upper = strtoupper($tutorcode_aa);
  $insert_sql = "INSERT INTO tutorgroup (tutor, tutorcode) VALUES ('$tutor_aa', '$tutorcode_upper')";
  $insert_qry = mysqli_query($dbconnect, $insert_sql);
  header("Location: index.php?page=adminpanel&success=newtutor")

}

 ?>
