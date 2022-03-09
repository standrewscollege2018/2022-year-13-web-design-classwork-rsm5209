<div class="container-fluid">
  <div class="row g-3 mt-3 ms-3 me-3 mb-3">

<?php

  $all_sql = "SELECT student.*, tutorgroup.tutorcode FROM student JOIN tutorgroup ON student.tutorgroupID=tutorgroup.tutorgroupID";
  $all_qry = mysqli_query($dbconnect, $all_sql);

  if(mysqli_num_rows($all_qry)==0) {
    echo "<p>No students exist</p>";
  } else {
    $all_aa = mysqli_fetch_assoc($all_qry);

    do {
      $firstname = $all_aa['firstname'];
      $lastname = $all_aa['lastname'];
      $photo = $all_aa['photo'];
      $tutor = $all_aa['tutorcode']

?>
    <div class="col-12 col-md-6 col-xl-4">
      <div class="card bg-custom">
        <img src='images/<?php echo $photo; ?>' class="card-img-top" alt="Card image cap">
        <div class="card-body">
          <p class="card-text"><?php echo "$firstname $lastname"; ?></p>
          <p class="card-text">Tutor:<?php echo "$tutor"; ?></p>
      </div>
      </div>
    </div>

      <?php

    } while ($all_aa = mysqli_fetch_assoc($all_qry));
  }


?>
</div>
</div>
