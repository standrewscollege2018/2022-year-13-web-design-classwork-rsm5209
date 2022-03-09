<div class="container-fluid">
  <div class="row g-3 mt-3">
<?php
  if(!isset($_POST['search'])) {
    header("Location: search.php");
  }
  $search = $_POST['search'];

  $result_sql = "SELECT student.*, tutorgroup.tutorcode FROM student JOIN tutorgroup ON student.tutorgroupID=tutorgroup.tutorgroupID
  WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%'";

  $result_qry = mysqli_query($dbconnect, $result_sql);

  if(mysqli_num_rows($result_qry)==0) {
    echo "<div class='jumbotron jumbotron-fluid text-center'>
  <div class='container'>";
      echo "<h1>Sorry, we couldn't find any results matching '$search' <br> Try searching for something different</h1>";
      echo "</div>
      </div>";
    } else {
      $result_aa = mysqli_fetch_assoc($result_qry);

      do {
        $firstname = $result_aa['firstname'];
        $lastname = $result_aa['lastname'];
        $tutor = $result_aa['tutorcode'];
        $photo = $result_aa['photo'];
        ?>
        <div class="col-12 col-md-6 col-xl-4">
        <div class="card bg-custom">
          <img src="images/<?php echo $photo; ?>" class="card-img-top" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">  <?php echo "$firstname $lastname"; ?></p>
            <p class="card-text">Tutor: <?php echo "$tutor"; ?></p>
          </div>
        </div>
      </div>
      <?php
        } while ($result_aa = mysqli_fetch_assoc($result_qry));


  }

 ?>
</div>
</div>
