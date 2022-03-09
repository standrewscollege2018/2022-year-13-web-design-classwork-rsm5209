<?php
if (!isset($_SESSION['admin'])) {
  header("Location: index.php?page=login&error=fail");
}

if (isset($_GET["type"])) {
  if($_GET['type'] == 'update') {
    $action = 'update';
    $page = 'updatestudent';
  }
  if($_GET['type'] == 'delete') {
    $action = 'delete';
    $page = 'confirmstudent';
  }
  if($_GET['type'] == 'classes') {
    $action = 'assign to classes';
    $page = 'assignclass';
  }
}
else {
  header('Location:index.php?page=adminpanel');
}

$studentselect_sql = "SELECT * FROM student ORDER BY tutorgroupID";
$studentselect_qry = mysqli_query($dbconnect, $studentselect_sql);
$studentselect_aa = mysqli_fetch_assoc($studentselect_qry);

 ?>
 <div class="container-fluid">

   <div class="row">

     <div class="col p-3">

       <p class="display-2">Select a student to <?php echo $action ?></p>

       <form class="" action="index.php?page=<?php echo $page ?>" method="post" enctype="multipart/form-data">
         <div class="mb-3">
           <!-- Select student -->
           <!-- Display students in a select menu -->
           <label for="students" class="form-label">Select student</label>
           <select required name="student" class="form-select" aria-label="student">
             <option disabled selected>Select student</option>
           <?php
             // YOUR TASK: Get all tutor groups available for selection

             do {
               $studentID = $studentselect_aa['studentID'];
               $firstname = $studentselect_aa['firstname'];
               $lastname = $studentselect_aa['lastname'];
               $tutorgroupID = $studentselect_aa['tutorgroupID'];
               $tutorcode_sql = "SELECT tutorcode FROM tutorgroup WHERE tutorgroupID = $tutorgroupID";
               $tutorcode_qry = mysqli_query($dbconnect, $tutorcode_sql);
               $tutorcode_aa = mysqli_fetch_assoc($tutorcode_qry);
               $tutorcode = $tutorcode_aa['tutorcode'];

             // YOUR TASK: display each tutor group code in an option target,
             // with value of tutorgroupID
               echo "<option value=$studentID>$firstname $lastname, Tutor: $tutorcode </option>";

             } while ($studentselect_aa = mysqli_fetch_assoc($studentselect_qry))
            ?>
            </select>
         </div>
         <?php
         if (isset($_GET['error'])) {
           if ($_GET['error'] == 'error') {
           ?>
           <div class="alert alert-danger mt-3" role="alert">
             Please select a student
           </div>
           <?php
         }
         }
          ?>
         <button type="submit" name="button" class="btn btn-primary">Go</button>
         </form>


     </div>

   </div>

 </div>
