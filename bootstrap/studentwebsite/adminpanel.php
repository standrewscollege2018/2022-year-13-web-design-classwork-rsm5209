<?php
if (!isset($_SESSION['admin'])) {
  header("Location: index.php?page=login&error=fail");
}
?>
<div class="fluid-container card">

  <div class="row mt-3 ms-3 me-3 ">
    <?php
    // Check if there is an error being returned
    if (isset($_GET["success"])) {
      if($_GET['success'] == 'newstudent') {
        ?>
        <div class="alert alert-success" role="alert">
          New student is successfully added
        </div>
        <?php
      }
      if($_GET['success'] == 'newtutor') {
        ?>
        <div class="alert alert-success" role="alert">
          New tutor is successfully added
        </div>
        <?php
      }
      if($_GET['success'] == 'studentdelete') {
        ?>
        <div class="alert alert-success" role="alert">
          Student has been successfully deleted
        </div>
        <?php
      }
      if($_GET['success'] == 'studentupdated') {
        ?>
        <div class="alert alert-success" role="alert">
          Student has been successfully updated
        </div>
        <?php
      }
      if($_GET['success'] == 'subjectupdate') {
        ?>
        <div class="alert alert-success" role="alert">
          Students classes have been updated
        </div>
        <?php
      }
      if($_GET['success'] == 'subjectdelete') {
        ?>
        <div class="alert alert-success" role="alert">
          Student has been removed from all of their classes
        </div>
        <?php
      }

    }
     ?>
    <div class="col-12 col-md-6 col-xl-3 mb-3">
  <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="images/tutor.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Add new Tutor</h5>
      <p class="card-text">Here admins can add new tutors</p>
      <a href="index.php?page=addtutor" class="btn btn-primary">Go</a>
    </div>
    </div>
  </div>
  <div class="col-12 col-md-6 col-xl-3 mb-3">
  <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="images/newstudent.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Add new Students</h5>
    <p class="card-text">Here admins can add new students to tutor groups</p>
    <a href="index.php?page=addstudent" class="btn btn-primary">Go</a>
  </div>
  </div>
</div>
<div class="col-12 col-md-6 col-xl-3 mb-3">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="images/changestudent.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Change Student Details</h5>
    <p class="card-text">Here admins can change all of students details</p>
    <a href="index.php?page=selectstudent&type=update" class="btn btn-primary">Go</a>
  </div>
  </div>
</div>
<div class="col-12 col-md-6 col-xl-3 mb-3">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="images/checklist.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Assign students to classes</h5>
    <p class="card-text">Here admins can assign students to classes</p>
    <a href="index.php?page=selectstudent&type=classes" class="btn btn-primary">Go</a>
  </div>
  </div>
</div>
<div class="col-12 col-md-6 col-xl-3 mb-3">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="images/deletestudent.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Delete Students</h5>
    <p class="card-text">Here admins can delete a student</p>
    <a href="index.php?page=selectstudent&type=delete" class="btn btn-primary">Go</a>
  </div>
  </div>
</div>

  </div>
</div>
