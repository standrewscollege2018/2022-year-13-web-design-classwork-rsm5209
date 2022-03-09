<?php

if (!isset($_SESSION['admin'])) {
  header("Location: index.php?page=login&error=fail");
}
?>
<div class="container-fluid">

  <div class="row">

    <div class="col p-3">

      <p class="display-2">Enter new tutor group</p>

<form method="post" action="index.php?page=entertutor">

  <div class="form-group">
    <div class="mb-3">
    <label for="exampleInputTutor">Tutor</label>
    <input name="tutor" type="text" required class="form-control" id="exampleInputTutor1" aria-describedby="tutorHelp" placeholder="Enter Tutor Name">
  </div> </div>

  <div class="form-group">
    <div class="mb-3">

    <label for="exampleInputCode1">Tutor Code</label>
    <input name="tutorcode" type="text" required class="form-control text-uppercase" id="exampleInputCode1" placeholder="Enter Tutor Code" minlength="3" maxlength="3">
  </div> </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
</div>
</div>
