<?php include 'connect.inc.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    session_start();
    $user = $_SESSION["un"];
    if(isset($_GET['p'])){
      $rpid = mysqli_real_escape_string($conn, $_GET['p']);
      if (ctype_alnum($rpid)) {
        $checkrid = mysqli_query($conn, "SELECT * FROM replies WHERE id = '".$rpid. "'");
        $d = date("Y-m-d");
        $t = date("H:i:s");
        $rep = @$_POST['user_reply'];
        $submittr = @$_POST['replied'];
        if (mysqli_num_rows($checkrid) < 1) {
          die ("norep");
        }
      }
      else {
        die ("noctype");
      }

    }
    else {
      die ("nou");
    }
     ?>
     <?php
        $replyreps = mysqli_query($conn, "SELECT * FROM repliesr WHERE postid = '".$rpid. "'");
        if (mysqli_num_rows($replyreps) < 1) {
          echo "No Replies :(";
        }
        else {
          echo "<div class='repbox'>";
          while ($rinf = mysqli_fetch_assoc($replyreps)) {
            $reprep = htmlentities($rinf['reply']);
            $userep = htmlentities($rinf['user']);

            echo "<div style=''>";
            echo "<a href='$userep'>";
            echo "<strong>";
            echo $userep;
            echo "</strong>";
            echo "</a>";
            echo " ";
            echo "<span style ='font-size: 12px;'>";
            echo $rinf['date_posted']." ";
            echo "</span>";
            echo "</div>";
            echo "<div class='reppp'>";
            echo nl2br($reprep);
            echo "<br>";
            echo "<br>";
            echo "</div>";
            echo "<br>";

          }
          echo "</div>";
        }
      ?>
  </body>
</html>
