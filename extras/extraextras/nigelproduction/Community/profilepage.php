<?php include 'profileheader.inc.php';?>
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
      $check = mysqli_query($conn, "SELECT * FROM users WHERE Username = '".$puser. "'");

      $posts = mysqli_query($conn, "SELECT * FROM posts WHERE Username = '".$puser. "'  ORDER BY id DESC");
      $checkfols = mysqli_query($conn, "SELECT * FROM followers WHERE followed = '".$puser."'");
      $checkfoli = mysqli_query($conn, "SELECT * FROM followers WHERE follower = '".$puser."'");
      $followedalready = mysqli_query($conn, "SELECT * FROM followers WHERE followed = '".$puser."' AND follower = '$user'");
      if (mysqli_num_rows($check)===1){
        $raw = rawurlencode($puser);
        $get = mysqli_fetch_assoc($check);
      $name = htmlentities($get['Username']);
      $resume = htmlentities($get['Resume']);
      echo '<br>';
      echo "PROFILE";
      echo '<br>';

    $signed = mysqli_query($conn, "SELECT * FROM users WHERE Username = '".$user. "'");
  }
      else {
          header("location: \Community");
      }
    }
    else {
      header("location: \Community");
    }

  }
  else {
    header("location: \Community");
  }

  }  ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

  </head>
  <div class="profilepage">

    <body>
  <div class="profile">
    <br> <img src="<?php echo $get['profilepic']; ?>" alt="profilepic" class=" pp " style=" width: 90px; height: 90px; border-radius: 50px;">
    <label class="fols" id="followers" name="followers">Sobats: <?php echo mysqli_num_rows($checkfols); ?></label>
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
  </div>
    <br>
    <div class="biograph">
      <h2>
      <?php echo $name; ?></h3><br><br>
      <span>Joined in</span>
      <?php echo $get['sign_up_date']; ?>
      <br><br>
      <label><?php echo $name; ?>'s Resume: </label><br>

      <?php if ($user !== $puser) {
        echo "<div style='white-space:pre-wrap; word-break: break-all;'  class='bio'>";
        echo "$resume";
        echo '<br><br><br><br><br>';
        echo '</div>';
      }
      else {
        echo "<div style='white-space:pre-wrap;' class='thefingbio'>";
        echo "<textarea id='bioedit' maxlength='400'  class='bio' rows='6' style ='font-size: 16px;' cols='80' autofocus>";
        echo "$resume </textarea>";
        echo "</div>";
        echo "<button type='button' class='cbio' id='$puser' style='border: none;    '>";
        echo "Update Resume";
        echo "</button>";
      }

      ?>

      <br><br>


    </div>

    <label>POSTS:</label><br><br>
    <div class="postingan">
    <?php

      if (mysqli_num_rows($posts) == 0) {
        echo htmlentities($name);
        echo " Haven't Posted Anything Yet";
      }
      else {
        while ($pos = mysqli_fetch_array($posts)) {
          $hispost = htmlentities($pos['post']);
          $id = $pos['id'];
          $reps = mysqli_query($conn, "SELECT * FROM replies where postid = $id");
          $rep = mysqli_num_rows($reps);
          $likes = mysqli_query($conn, "SELECT * FROM likes WHERE postid = $id");
          $tlikes = mysqli_num_rows($likes);
          echo "<span style='white-space:pre-wrap;'>";

          echo "<span class= 'date' >";
          echo $pos['dateposted'];
          echo "</span>";
          echo "<br>";
          echo "<span style='word-break: break-all;'>";
          echo linking(hashtagging(nl2br($hispost)));
          echo "<br>";
          echo "</span>";
          echo "<span>";
          echo "<a href=''>";
          echo "Likes: ";
          echo $tlikes;
          echo "</a>";
          echo "</span>";
          echo "   ";
          echo "<span>";
          echo "<a href='rep.$id'>";
          echo "Replies: ";
          echo $rep;
          echo "</a>";
          echo "</span>";
          echo "<br>";
          echo "<br>";
          echo "</span>";
        }

      }
     ?>
      <br><br><br>
    </div>

    <script type="text/javascript" src="script.js">

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
    $('.bio').keyup(function(){
      var textfieldr = $(this);
      var censor = /fuck/gi;
      var swcensor = /shit/gi;
      var bwcensor = /bitch/gi;
      var nwcensor = /nigga/gi;
        var repl = textfieldr.val().replace(censor,"****").replace(swcensor,"****").replace(bwcensor,"*****").replace(nwcensor,"*****");
        $(this).val(repl);
});
});

    $('.cbio').click(function() {
      var userid = $(this).attr('id');
      var resume = document.getElementById('bioedit').value;
      $.ajax
        ({
          type: 'post',
          url: 'updateres.php',
          data: {
            'resume' : resume,
            'upd': true,
            'uitid': userid
          },
          success:function(response) {
            }
      });
    });
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
        cache: false,
        async: true,
        success:function(response) {
          $(".profilepage").load('<?php echo "loadp.php?u=$raw"; ?>');
        }
      });
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
  </body>
</html>
