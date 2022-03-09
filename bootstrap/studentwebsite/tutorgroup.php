<div class="container-fluid">
  <div class="row g-3">


<?php
if(!isset($_GET['tutorgroupID'])) {
  header("Location: index.php");
} else {
  $tutorcode = $_GET['tutorcode'];
  $tutorgroupID = $_GET['tutorgroupID'];
  $tutor_sql = "SELECT * FROM student WHERE tutorgroupID=$tutorgroupID";
  $tutor_qry = mysqli_query($dbconnect, $tutor_sql);

  if(mysqli_num_rows($tutor_qry)==0) {
    echo "<p>No students in $tutorcode</p>";
  } else {
    $tutor_aa = mysqli_fetch_assoc($tutor_qry);
    echo "<div class= 'page-header text-center'>";
    echo "<h1>$tutorcode</h1>";
    echo "</div>";
    do {
      $firstname = $tutor_aa['firstname'];
      $lastname = $tutor_aa['lastname'];
      $photo = $tutor_aa['photo'];

?>
<div class="col-12 col-md-6 col-xl-4">
  <div class="card bg-custom">
    <img src='images/<?php echo $photo; ?>' class="card-img-top" alt="Card image cap">
    <div class="card-body">
      <p class="card-text"><?php echo "$firstname $lastname"; ?></p>
  </div>
  </div>
</div>

      <?php

    } while ($tutor_aa = mysqli_fetch_assoc($tutor_qry));
  }
}

?>
</div>
</div>
