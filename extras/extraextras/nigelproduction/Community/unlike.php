<?php
  include 'header.inc.php';
 ?>
 <?php
 $user = $_SESSION["un"];
 $unlike = @$_POST['unlikevut'];
 $tpostids = @$_POST['thepostid'];
  if (isset($unlike)) {
     $tpostids = @$_POST['thepostid'];
    $asdf = "DELETE FROM likes WHERE User = '$user' AND postid = $tpostids";
    if ($conn->query($asdf) === TRUE) {
      echo '<br><br>';
        echo "";
        echo @$_POST['name'];
        echo '<br><br><br>';
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

  }
  ?>
