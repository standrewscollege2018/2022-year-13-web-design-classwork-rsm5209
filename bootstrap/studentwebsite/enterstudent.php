<?php
if (!isset($_SESSION['admin'])) {
  header("Location: index.php?page=login&error=fail");
}

if(!isset($_POST['firstname'])) {
  header("Location: index.php");
}

$firstname = mysqli_real_escape_string($dbconnect, $_POST['firstname']);
$lastname = mysqli_real_escape_string($dbconnect, $_POST['lastname']);
$addtutorcode = mysqli_real_escape_string($dbconnect, $_POST['tutorcode']);
$image = $_FILES["fileToUpload"]["name"];


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
    $insert_sql = "INSERT INTO student (firstname, lastname, tutorgroupID, photo) VALUES ('$firstname', '$lastname', $addtutorcode,'$image')";
    $insert_qry = mysqli_query($dbconnect, $insert_sql);
    header('Location:index.php?page=adminpanel&success=newstudent');
  } else {
    header('Location:index.php?page=addstudent&error=error');
  }
}
?>
