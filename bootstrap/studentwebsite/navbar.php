
    <?php
    $tutor_sql = "SELECT * FROM tutorgroup";
    $tutor_qry = mysqli_query($dbconnect, $tutor_sql);
    $tutor_aa = mysqli_fetch_assoc($tutor_qry);

    $subject_sql = "SELECT * FROM subject";
    $subject_qry = mysqli_query($dbconnect, $subject_sql);
    $subject_aa = mysqli_fetch_assoc($subject_qry);
     ?>

     <nav class="navbar navbar-expand-lg navbar-dark custom-nav">
   <div class="container-fluid">
     <a class="navbar-brand" href="index.php">
       St Andrews College
     </a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         <li class="nav-item">
           <a class="nav-link active" aria-current="page" href="index.php?page=login">Admin</a>
         </li>
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Tutor Groups
           </a>
           <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style= "background-color: #003366">
             <?php
               do {
                 $tutorgroupID = $tutor_aa['tutorgroupID'];
                 $tutorcode = $tutor_aa['tutorcode'];

                 echo "<li class='dropdown-item'><a href='index.php?page=tutorgroup&tutorgroupID=$tutorgroupID&tutorcode=$tutorcode'>$tutorcode</a></li>";

                } while ($tutor_aa = mysqli_fetch_assoc($tutor_qry))
             ?>
             <li><hr class="dropdown-divider" style="color:white;"></li>
             <li><a class="dropdown-item" href="index.php?page=allstudents">All Students</a></li>
           </ul>
         </li>
         <?php  if(isset($_SESSION['admin'])) {
           ?>
           <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Classes
             </a>
             <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style= "background-color: #003366">
               <?php
                 do {
                   $subjectID = $subject_aa['subjectID'];
                   $subject = $subject_aa['subject'];

                   echo "<li class='dropdown-item'><a href='index.php?page=subject&subjectID=$subjectID&subject=$subject'>$subject</a></li>";

                 } while ($subject_aa = mysqli_fetch_assoc($subject_qry))
               ?>
             </ul>
           </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
          </li>
        <?php } ?>
       </ul>
       <form class="d-flex" action="index.php?page=searchresults" method="post">
         <div class="input-group">
           <input class="form-control" required type="text" name="search" placeholder="Student Name" aria-label="Search" aria-describedby="button-addon2">
           <button class="btn btn-outline-success" type="submit" id="button-addon2" ><i class="bi bi-search"></i></button>
         </div>
       </form>
     </div>
   </div>
 </nav>
