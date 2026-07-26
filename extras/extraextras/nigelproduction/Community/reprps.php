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
     function linking($link)
     {
       $href = "/www\.+([a-zA-Z0-9_]+\.(.*))/";
       $link = preg_replace($href, '<a style= "text-decoration: underline;"  href="http://$0">$0</a>', $link);
       return($link);
     }
     function hashtagging($tag)
     {
       $hash = "/#+([a-zA-Z0-9_]+)/";
       $tag = preg_replace($hash, '<a style= "text-decoration: underline;" href="asdf.php?tag=$1">$0</a>', $tag);
       return($tag);
     }
        $replyreps = mysqli_query($conn, "SELECT * FROM repliesr WHERE postid = '".$rpid. "' ORDER BY id DESC");
        if (mysqli_num_rows($replyreps) < 1) {
          echo "No Replies :(";
        }
        else {
          echo "<div class='repbox'>";
          while ($rinf = mysqli_fetch_assoc($replyreps)) {
            $reprep = htmlentities($rinf['reply']);
            $userep = htmlentities($rinf['user']);

            echo "<div style=''>";
            echo "<a href='prof.$userep'>";
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
            echo hashtagging(linking(nl2br($reprep)));
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
