<?php
if (!isset($_SESSION['admin'])) {
  header("Location: index.php?page=login&error=fail");
}

if (!isset($_POST['student'])) {
  header("Location: index.php?page=selectstudent&type=delete&error=error");
}
$studentID = $_POST['student'];

$student_sql = "SELECT * FROM student WHERE studentID = $studentID";
$student_qry = mysqli_query($dbconnect, $student_sql);
$student_aa = mysqli_fetch_assoc($student_qry);

$studentID = $student_aa['studentID'];
$firstname = $student_aa['firstname'];
$lastname = $student_aa['lastname'];
$image = $student_aa['photo'];
$tutorgroupID = $student_aa['tutorgroupID'];
?>
<div class="container-fluid">

  <div class="row">

    <div class="col p-3">

      <p class="display-2">Delete student</p>

      <div class="col-12 col-md-6 col-xl-3">
    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="images/<?php echo $image; ?>" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Delete <?php echo $firstname . " " . $lastname; ?></h5>
        <p class="card-text">Are you sure you want to delete this student? This cannot be reversed</p>
        <a href="index.php?page=adminpanel" class="btn btn-danger">No</a>
        <a href="index.php?page=deletestudent&student=<?php echo $studentID ?>" class="btn btn-success">Yes</a>
      </div>
      </div>
    </div>
    </div>

  </div>

</div>
