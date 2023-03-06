<?php
include "../layout/header.php";
?>

<div>
<?php include "../scripts/messages.php";?>

<form action="../scripts/passwordreset.serv.php" method="POST">

<div class="mb-3">
  <label for="email" class="form-label">Email</label>
  <input type="email" class="form-control" id="email" name="email">
</div>

<button type="submit" class="btn btn-primary" name="submit">reset</button>
</form>

</div>
<?php
include "../layout/footer.php";
?>
