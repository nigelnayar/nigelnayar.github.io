<?php include 'connect.inc.php'; ?>
<?php
  session_start();
  $upd = @$_POST['upd'];
  if (isset($upd)) {
    $puser = @$_POST['uitid'];
    $resume = htmlentities(@$_POST['resume']);
    $unr = str_replace("'", "''", $resume);
    $update = mysqli_query($conn, "UPDATE users SET Resume= '$unr' WHERE Username = '".$puser."' ");
    if ($update === TRUE) {
      echo '<br><br>';
        echo "Thank You For Helping The Community To Grow! ";
        echo "";
        echo @$_POST['name'];
        echo '<br><br><br>';
    } else {
        echo "Error: " . $update . "<br>" . $conn->error;
    }
  }
 ?>
