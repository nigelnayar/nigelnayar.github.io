<?php
  include 'header.inc.php';
 ?>
 <?php
 $user = $_SESSION["un"];
 $like = @$_POST['likevut'];
 $tpostids = @$_POST['thepostid'];
  if (isset($like)) {
     $tpostids = @$_POST['thepostid'];
    $asdf = "INSERT INTO likes (postid, user)
    VALUES ('$tpostids', '$user')";
    if ($conn->query($asdf) === TRUE) {
      echo '<br><br>';
        echo "Thank You For Helping The Community To Grow! ";
        echo "";
        echo @$_POST['name'];
        echo '<br><br><br>';
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

  }
  ?>
