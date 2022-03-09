<?php
// Check to see if user is logged in

if (!isset($_SESSION['admin'])) {
  header("Location: index.php?page=login&error=fail");
}

if (!isset($_POST['firstname'])) {
  header("Location: index.php?page=updatestudent&error=error");
}

$studentID = $_GET['student'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$tutorgroupID = $_POST['tutorcode'];

$image_sql = "SELECT photo FROM student WHERE studentID = $studentID";
$image_qry = mysqli_query($dbconnect, $image_sql);
$image_aa = mysqli_fetch_assoc($image_qry);

$photo = $image_aa['photo'];
$file_path = "images/".$photo;
  unlink("$file_path");


  $target_dir = "images/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      $uploadOk = 0;
    }
  }

  // Check if file already exists
  if (file_exists($target_file)) {
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 5000000) {
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "jpeg" ) {
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $image = $_FILES["fileToUpload"]["name"];
      $update_sql = "UPDATE student SET firstname = '$firstname', lastname = '$lastname', tutorgroupID = $tutorgroupID, photo = '$image' WHERE student.studentID = $studentID";
      $update_qry = mysqli_query($dbconnect, $update_sql);
      header("Location:index.php?page=adminpanel&success=studentupdated");
    } else {
      header('Location:index.php?page=selectstudent&error=error');
    }
  }



 ?>
