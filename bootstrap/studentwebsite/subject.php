<div class="container-fluid">
  <div class="row g-3 mt-3 ms-3 me-3 mb-3">
    <?php

if (!isset($_SESSION['admin'])) {
  header("Location: index.php?page=login&error=fail");
}

if (!isset($_GET['subjectID'])) {
  header('Location: javascript:history.go()');
}
$subjectID = $_GET['subjectID'];

$subject_sql = "SELECT student.* FROM studentsubject JOIN student ON studentsubject.studentID
= student.studentID WHERE studentsubject.subjectID = $subjectID";
$subject_qry = mysqli_query($dbconnect, $subject_sql);


$subject = $_GET['subject'];

echo "<div class= 'page-header text-center'>";
echo "<h1>$subject</h1>";
echo "</div>";


if(mysqli_num_rows($subject_qry)==0) {
  echo "<p>No students exist in $subject</p>";
} else {
  $subject_aa = mysqli_fetch_assoc($subject_qry);

  do {
    $firstname = $subject_aa['firstname'];
    $lastname = $subject_aa['lastname'];
    $tutorgroupID = $subject_aa['tutorgroupID'];
    $image = $subject_aa['photo'];

    $tutor_sql = "SELECT tutorcode FROM tutorgroup WHERE tutorgroupID = $tutorgroupID";
    $tutor_qry = mysqli_query($dbconnect, $tutor_sql);
    $tutor_aa = mysqli_fetch_assoc($tutor_qry);

    $tutor = $tutor_aa['tutorcode'];
?>
  <div class="col-12 col-md-6 col-xl-4">
    <div class="card bg-custom">
      <img src='images/<?php echo $image; ?>' class="card-img-top" alt="Card image cap">
      <div class="card-body">
        <p class="card-text"><?php echo "$firstname $lastname"; ?></p>
        <p class="card-text">Tutor: <?php echo "$tutor"; ?></p>
    </div>
    </div>
  </div>

    <?php

  } while ($subject_aa = mysqli_fetch_assoc($subject_qry));
}
?>

</div>
</div>
