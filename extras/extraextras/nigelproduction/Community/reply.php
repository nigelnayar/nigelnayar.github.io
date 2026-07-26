<?php
session_start();
  $user = $_SESSION["un"];
  include 'connect.inc.php';
  $d = date("Y-m-d");
  $rep = @$_POST['user_reply'];
  $unr = str_replace("'", "''", $rep);
  $submittr = @$_POST['submittr'];
  if(isset($_GET['p'])){
    $po = mysqli_real_escape_string($conn, $_GET['p']);
    if (ctype_alnum($po)) {
      $check = mysqli_query($conn, "SELECT * FROM posts WHERE id = '".$po. "'");
      $d = date("Y-m-d");
      $rep = @$_POST['user_reply'];
      $submittr = @$_POST['submittr'];
      if (isset($rep)) {

        if (empty(trim($rep))) {
          echo "No";
        }
        else{
        $sql = "INSERT INTO replies (user, reply, postid, date_posted)
        VALUES ('$user', '$unr', '$po', '$d')";
        if ($conn->query($sql) === TRUE) {
            echo "Thanks!";
            echo '<br><br><br>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }}}
      if (mysqli_num_rows($check) < 1) {

      }
    }
    else {

    }

  }
  else {

  }
 ?>
<script type="text/javascript">

</script>
