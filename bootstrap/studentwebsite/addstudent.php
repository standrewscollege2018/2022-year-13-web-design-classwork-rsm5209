<?php

// Check to see if user is logged in

if (!isset($_SESSION['admin'])) {
  header("Location: index.php?page=login&error=fail");
}
$tutorcode_sql = "SELECT * FROM tutorgroup";
$tutorcode_qry = mysqli_query($dbconnect, $tutorcode_sql);
$tutorcode_aa = mysqli_fetch_assoc($tutorcode_qry);



 ?>
<div class="container-fluid">
  <div class="row">
    <div class="col p-3">
      <p class="display-2">Enter new student</p>
      <!-- When form is submitted, post information to the enterstudent page -->
      <form class="" action="index.php?page=enterstudent" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <!-- Get the tutor's name -->
          <label for="firstname" class="form-label">First name</label>
          <input type="text" name="firstname" class="form-control" id="firstname" aria-describedby="firstname">

        </div>
        <div class="mb-3">
          <!-- Get the 3-letter tutor code -->
          <label for="lastname" class="form-label">Last name</label>
          <input type="text" name="lastname" class="form-control" id="lastname" aria-describedby="lastname">
        </div>
        <div class="mb-3">
          <!-- Select tutor group -->
          <!-- Display tutorgroups in a select menu -->
          <label for="tutorcode" class="form-label">Select tutor group</label>
          <select name="tutorcode" class="form-select" aria-label="tutorgroup">
          <?php
            // YOUR TASK: Get all tutor groups available for selection


            do {
              $tutorgroupID = $tutorcode_aa['tutorgroupID'];
              $tutorcode = $tutorcode_aa['tutorcode'];
            // YOUR TASK: display each tutor group code in an option target,
            // with value of tutorgroupID
              echo "<option value=$tutorgroupID>$tutorcode</option>";

            } while ($tutorcode_aa = mysqli_fetch_assoc($tutorcode_qry))
           ?>
           </select>
        </div>
        <div class="mb-3">
          <!-- Select an image for the student -->
          <!-- YOUR TASK: go to W3 Schools and look up how to upload an image. -->
          <label for="formFile"  class="form-label">Upload photo</label>
          <input class="form-control" required type="file" id="formFile">
        </div>
        <div class="mb-3">
          <?php
          // Check if there is an error being returned
            if(isset($_GET['error'])) {
              ?>
              <div class="alert alert-danger" role="alert">
                Please check that all information is correct, image is a .jpg/.jpeg
              </div>
              <?php
                          }
           ?>
        </div>
        <button type="submit" name="button" class="btn btn-primary">Add student</button>
      </form>
      <!-- Show alert if either the tutor name or code were not entered -->

    </div>
  </div>
</div>
