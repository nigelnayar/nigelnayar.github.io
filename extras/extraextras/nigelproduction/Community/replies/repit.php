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
        $repsd = @$_POST['user_reply'];
        $unr = str_replace("'", "''", $repsd);
        $submittr = @$_POST['replied'];
        if (isset($submittr)) {
          if (empty(trim($repsd))) {
            echo "No";
          }
          else {
            // code...

          $sql = "INSERT INTO repliesr (user, reply, postid, date_posted, thetime)
          VALUES ('$user', '$unr', '$rpid', '$d', '$t')";
          if ($conn->query($sql) === TRUE) {
            echo $rep;
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }}}
          else {
            echo "no";
          }
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
  </body>
</html>
