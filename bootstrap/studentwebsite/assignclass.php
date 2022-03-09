<?php
if (!isset($_SESSION['admin'])) {
  header("Location: index.php?page=login&error=fail");
}
if (!isset($_POST['student'])) {
  header("Location: index.php?page=selectstudent&type=classes&error=error");
}

$studentID = $_POST['student'];

$subject_sql = "SELECT * FROM subject";
$subject_qry = mysqli_query($dbconnect, $subject_sql);
$subject_aa = mysqli_fetch_assoc($subject_qry);
 ?>
<div class="container-fluid">

<form class="" action="index.php?page=submitclass&student=<?php echo $studentID;?>" method="post">
  <?php

  do {
    $subjectID = $subject_aa['subjectID'];
    $subject = $subject_aa['subject'];


    $check_sql = "SELECT * FROM studentsubject WHERE studentID = $studentID AND subjectID = $subjectID";
    $check_qry = mysqli_query($dbconnect, $check_sql);

    if(mysqli_num_rows($check_qry) != 0) {
      echo "<div class='form-check'>";
    echo "<input type='checkbox' class='form-check-input' name='subjectID[]' value='$subjectID' id='$subject' checked=checked>";
    echo "<label class='form-check-label' for='$subject'>$subject</label>";
    echo "</div>";
    }
    else {
      echo "<div class='form-check'>";
      echo "<input type='checkbox' class='form-check-input' name='subjectID[]' value='$subjectID' id='$subject'>";
      echo "<label class='form-check-label' for='$subject'>$subject</label>";
      echo "</div>";
    }
  } while ($subject_aa = mysqli_fetch_assoc($subject_qry));
  ?>
  </div>
  <button type="submit" name="button" class="btn btn-primary">Go</button>



</form>

</div>
