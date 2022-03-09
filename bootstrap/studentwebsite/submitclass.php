<?php

if (!isset($_SESSION['admin'])) {
  header("Location: index.php?page=login&error=fail");
}

$studentID = $_GET['student'];

$deletesubject_sql = "DELETE FROM studentsubject WHERE studentID = $studentID";
$deletesubject_qry = mysqli_query($dbconnect, $deletesubject_sql);

if (!isset($_POST['subjectID'])) {
  header("Location:index.php?page=adminpanel&success=subjectdelete");
}

$subjectlist = $_POST['subjectID'];

foreach($subjectlist as $subjectID) {
  $sql = "INSERT INTO studentsubject (studentID, subjectID) VALUES ($studentID, $subjectID)";
  $qry = mysqli_query($dbconnect, $sql);
}

header("Location:index.php?page=adminpanel&success=subjectupdate")

 ?>
