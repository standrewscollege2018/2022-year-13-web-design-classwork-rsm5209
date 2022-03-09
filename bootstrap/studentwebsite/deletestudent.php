<?php
if (!isset($_SESSION['admin'])) {
  header("Location: index.php?page=login&error=fail");
}

if (!isset($_GET['student'])) {
  header("Location: index.php?page=selectstudent&error=error");
}
$studentID = $_GET['student'];

$image_sql = "SELECT photo FROM student WHERE studentID = $studentID";
$image_qry = mysqli_query($dbconnect, $image_sql);
$image_aa = mysqli_fetch_assoc($image_qry);

$image = $image_aa['photo'];

$file_path = "images/".$image;
  unlink("$file_path");

$delete_sql = "DELETE FROM student WHERE studentID = $studentID";
$delete_qry = mysqli_query($dbconnect, $delete_sql);
header("Location:index.php?page=adminpanel&success=studentdelete");
?>
