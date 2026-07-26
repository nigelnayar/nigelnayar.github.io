<?php
include 'connect.inc.php';
  session_start();
$query = mysqli_query($conn, "SELECT * from users");

if (!isset($_SESSION["un"])) {
  header("location: \signIN.php ");
}
else {
  $user = $_SESSION["un"];
  if(isset($_GET['u'])){
    $puserc = mysqli_real_escape_string($conn, $_GET['u']);
    $puser = htmlentities($puserc);
    if(ctype_alnum(trim(str_replace(' ','',$puser)))) {
      $check = mysqli_query($conn, "SELECT * FROM users WHERE Username = '$puser'");

      $posts = mysqli_query($conn, "SELECT * FROM posts WHERE Username = '$puser'");
      $checkfols = mysqli_query($conn, "SELECT * FROM followers WHERE followed = '$puser'");
      $checkfoli = mysqli_query($conn, "SELECT * FROM followers WHERE follower = '$puser'");
      $followedalready = mysqli_query($conn, "SELECT * FROM followers WHERE followed = '$puser' AND follower = '$user'");
      if (mysqli_num_rows($check)===1){
        $raw = rawurlencode($puser);
        $get = mysqli_fetch_assoc($check);
      $name = htmlentities($get['Username']);
      $resume = htmlentities($get['Resume']);

    $signed = mysqli_query($conn, "SELECT * FROM users WHERE Username = '".$user. "'");
  }
      else {
        echo "no user";
      }
    }
    else {
      echo "no ctype";
    }

  }
  else {
    echo "no u";
  }

  }  ?>
  <?php

    $posts = mysqli_query($conn, "SELECT * FROM posts WHERE Username = '".$puser. "'");
    $checkfols = mysqli_query($conn, "SELECT * FROM followers WHERE followed = '".$puser."'");
    $checkfoli = mysqli_query($conn, "SELECT * FROM followers WHERE follower = '".$puser."'");
    $followedalready = mysqli_query($conn, "SELECT * FROM followers WHERE followed = '".$puser."' AND follower = '$user'");
   ?>
  <body>
<div class="profile">
  <br> <img src="<?php echo $get['profilepic']; ?>" alt="profilepic" class=" pp " style=" width: 90px; height: 90px; border-radius: 50px;">
  <label class="fols" id="followers" name="followers"> Sobats: <?php echo mysqli_num_rows($checkfols); ?></label>
    <br><br>
     <br>
</div>
<div style="border: none; background: none; position: relative; " class="followbuttons">
  <?php
      if ($user !== $puser ) {
        if (mysqli_num_rows($followedalready) == 0) {
          echo "<button class= 'followbtn' id='$puser' style=' border: none; width:250px; position: relative;  left: 100px;' >Become Sobats With ";
          echo $puser;
          echo "</button>";
        }
        else {
          echo "<button class= 'unfollowbtn' id='$puser' style=' border: none; width:250px; position: relative;  left: 100px;' >Unsobat ";
          echo $puser;
          echo "</button>";
        }

      }
      else {

      }
   ?>
</div>
<script type="text/javascript" src="script.js">

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$('.followbtn').click(function() {
  var uid = $(this).attr('id');
  $.ajax
  ({
    type: 'post',
    url: 'follow.php',
    data: {
      'followvut': true,
      'uitid': uid
    },
    success:function(response) {
      $(".profilepage").load('<?php echo "loadp.php?u=$raw"; ?>');
    }
  });;
  return false;
});
$('.unfollowbtn').click(function() {
  var uid = $(this).attr('id');
  $.ajax
  ({
    type: 'post',
    url: 'follow.php',
    data: {
      'unfollowvut': true,
      'uitid': uid
    },
    success:function(response) {
      $(".profilepage").load('<?php echo "loadp.php?u=$raw"; ?>');
    }
  });;
  return false;
});
</script>
