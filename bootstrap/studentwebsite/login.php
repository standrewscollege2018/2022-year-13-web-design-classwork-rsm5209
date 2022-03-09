<?php
if (isset($_SESSION['admin'])) {
  header('Location:index.php?page=adminpanel');
} ?>


<form method="post" action="verify.php" class="ms-3 mt-3 me-3">
  <div class="form-group mb-3">
    <label for="exampleInputUsername">Username</label>
    <input name="username" type="text" required class="form-control" id="exampleInputUsername1" aria-describedby="usernameHelp" placeholder="Enter Username">
  </div>
  <div class="form-group mb-3">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" required class="form-control" id="exampleInputCode1" placeholder="Enter Password">
  </div>
<?php if (isset($_GET["error"])) {
  if ($_GET["error"] == 'fail') {
    ?> <div class="alert alert-danger" role="alert">
    You need to be logged in to access that page!
  </div>
  <?php

} if ($_GET["error"] == 'loginerror') {
  ?> <div class="alert alert-danger" role="alert">
  Username or Password are incorrect!
</div>
<?php
}

}

 ?>
  <button type="submit" class="btn btn-primary">Sign In</button>
</form>
