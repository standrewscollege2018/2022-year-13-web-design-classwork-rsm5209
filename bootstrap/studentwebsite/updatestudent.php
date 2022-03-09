<?php
// Check to see if user is logged in

if (!isset($_SESSION['admin'])) {
  header("Location: index.php?page=login&error=fail");
}
if (!isset($_POST['student'])) {
  header("Location: index.php?page=selectstudent&type=update&error=error");
}

$studentID = $_POST['student'];

$tutorcode_sql = "SELECT * FROM tutorgroup";
$tutorcode_qry = mysqli_query($dbconnect, $tutorcode_sql);
$tutorcode_aa = mysqli_fetch_assoc($tutorcode_qry);

$student_sql = "SELECT * FROM student WHERE studentID = $studentID";
$student_qry = mysqli_query($dbconnect, $student_sql);
$student_aa = mysqli_fetch_assoc($student_qry);

$studentID = $student_aa['studentID'];
$firstname = $student_aa['firstname'];
$lastname = $student_aa['lastname'];
$oldtutorgroupID = $student_aa['tutorgroupID'];

?>
 <div class="container-fluid">
   <div class="row">
     <div class="col p-3">
       <p class="display-2">Update student</p>
       <!-- When form is submitted, post information to the enterstudent page -->
       <form class="" action="index.php?page=submitstudent&student=<?php echo $studentID; ?>" method="post" enctype="multipart/form-data">
         <div class="mb-3">
           <!-- Get the tutor's name -->
           <label for="firstname" class="form-label">First name</label>
           <input type="text" required value=<?php echo $firstname; ?> name="firstname" class="form-control" id="firstname" aria-describedby="firstname">

         </div>
         <div class="mb-3">
           <!-- Get the 3-letter tutor code -->
           <label for="lastname" class="form-label">Last name</label>
           <input type="text" required value=<?php echo $lastname; ?> name="lastname" class="form-control" id="lastname" aria-describedby="lastname">
         </div>
         <div class="mb-3">
           <!-- Select tutor group -->
           <!-- Display tutorgroups in a select menu -->
           <label for="tutorcode" class="form-label">Select tutor group</label>
           <select name="tutorcode" required class="form-select" aria-label="tutorgroup">
           <?php
             // YOUR TASK: Get all tutor groups available for selection
             do {
               $tutorgroupID = $tutorcode_aa['tutorgroupID'];
               $tutorcode = $tutorcode_aa['tutorcode'];
             // YOUR TASK: display each tutor group code in an option target,
             // with value of tutorgroupID
             if ($oldtutorgroupID == $tutorgroupID) {
               echo "<option selected value=$tutorgroupID>$tutorcode</option>";

             }
             else {
               echo "<option value=$tutorgroupID>$tutorcode</option>";
             }
             } while ($tutorcode_aa = mysqli_fetch_assoc($tutorcode_qry))
            ?>
            </select>
         </div>
         <div class="mb-3">
           <!-- Select an image for the student -->
           <!-- YOUR TASK: go to W3 Schools and look up how to upload an image. -->
           <label for="formFile" class="form-label" ></label>
             <input class="formcontrol" required type="file" name="fileToUpload" id="formFile">
         </div>
         <div class="mb-3">
           <?php
           // Check if there is an error being returned
             if(isset($_GET['error'])) {
               ?>
               <div class="alert alert-danger" role="alert">
                 Something went wrong
               </div>
               <?php
                           }
            ?>
         </div>
         <button type="submit" name="button" class="btn btn-primary">Update student</button>
       </form>
       <!-- Show alert if either the tutor name or code were not entered -->

     </div>
   </div>
 </div>
