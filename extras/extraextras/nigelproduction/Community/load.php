<?php include 'connect.inc.php';
session_start();
 $user = $_SESSION["un"];
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
 $userfingname = $_SESSION["un"];
 $d = date("Y-m-d");
 $ttps = "SELECT * FROM posts WHERE dateposted = '$d' ORDER BY dateposted DESC, hour DESC";
 $posts = $conn -> query($ttps);
 if (mysqli_num_rows($posts) < 1) {
   echo "No new post today :(";
 }


 else {

 while ($pos = $posts -> fetch_assoc()) {

   $upots = htmlentities($pos['post']);
   $likebtn = @$_POST['like'];
   $id = $pos['id'];
   $name = htmlentities($pos['username']);
   $checkfols = mysqli_query($conn, "SELECT * FROM followers WHERE followed = '".$name."'");
   $fols = mysqli_num_rows($checkfols);
   $check = mysqli_query($conn, "SELECT * FROM users WHERE Username = '".$name. "'");
   $getthisuserinf = mysqli_fetch_assoc($check);
   $ppic = htmlentities($getthisuserinf['profilepic']);
   $likes = mysqli_query($conn, "SELECT * FROM likes WHERE postid = $id");
   $tlikes = mysqli_num_rows($likes);
   $likedalready = mysqli_query($conn, "SELECT * FROM likes WHERE User = '$user' AND postid = $id");
   $thepost = htmlentities($pos['post']);
   $src = "\u263a\ud83d\ude00\ud83d\ude01\ud83d\ude02\ud83d\ude03";
   $reps = mysqli_query($conn, "SELECT * FROM replies where postid = $id");
   $rep = mysqli_num_rows($reps);
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
          echo '<br><br><br>';
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
    echo "<div>";
    if (mysqli_num_rows($likedalready) < 1) {
      echo "<span>";
      echo "<a name='unlike' id='$id' class='likebtn'>";
      echo "<img src='up.png' class='work2'>";
      echo "</a>";
      echo "</span>";

    }
    else {
      echo "<span>";
      echo "<a name='like' id='$id' class='unlikebtn'>";
      echo "<img src='up.png' class='likedalready'>";
      echo "</a>";

      echo "</span>";

    }

   echo "<br>";
   echo "<span name='$tlikes' id='likes' style= 'padding-left: 5px;  '>";
   echo "<a href='likers.php?l=$id'>";

   echo $tlikes;

   echo "</a>";
   echo "</span>";
   echo "</div>";

   echo "<div style = 'padding-left: 30px; line-spacing: 1px; '>";
   echo "<div style = ' border-bottom: solid; border-width: thin; width: 780px;'>";
   echo "<img src='$ppic' alt='' class='homepp'>";
   echo "<span id='$id' class='getinf'>";
   echo "<a href= 'prof.$name'>";
   echo $name;
   echo "</a>";
   echo " ";
   echo "</span>";
   echo "<span style = ' font-size: 10px; '>";
   echo $pos['dateposted'];
   echo "</span>";
   echo " ";

   echo "</div>";
   echo "<div class='f$id' style='height: 0; overflow : hidden;   '>";
   echo " Sobats: ";
   echo $fols;
   echo "</div>";
   echo "<div style='white-space:pre-wrap;' class='postbox'>";
   echo linking(hashtagging(nl2br($thepost)));
   echo "<br>";
   echo "<br>";

   echo "</div>";
   echo "</div>";
   echo "<div style = 'padding-left: 30px; line-spacing: 1px; '>";
   echo "<a href = 'rep.$id'>";
   echo "+Replies: ";
   echo $rep;
   echo "</a>";
   echo "</div>";
   echo "<br>";
   echo "<br>";

 }
 // code...
}

 $conn->close();
  ?>
  <button type="button" class="lol" style="border-left: none; font-size: 15px; width: 240px; position: relative; left: 300px; " id="showall">Show All Posts</button>
  <script type="text/javascript">
  $(document).ready(function() {
    $('.getinf').mouseover(function() {
      var theid = $(this).attr("id");
      setTimeout(function() {
       $(".f" + theid).css("height", "24px");
   }, 400);
    });
    $(".getinf").mouseout(function(){
      var theid = $(this).attr("id");
      setTimeout(function() {
       $(".f" + theid).css("height", "0");
   }, 400);

     });
  });
  $('.likebtn').click(function() {
    var postid = $(this).attr('id');
    console.log(postid);
    $.ajax
    ({
      type: 'post',
      url: 'like.php',
      data: {
        'likevut': true,
        'thepostid': postid
      },
      success:function(response) {
        $(".feed").load("load.php");
      }
    });
    return false;
  });

  $('.unlikebtn').click(function() {
    var postid = $(this).attr('id');
    console.log(postid);
    $.ajax
    ({
      type: 'post',
      url: 'unlike.php',
      data: {
        'unlikevut': true,
        'thepostid': postid
      },
      success:function(response) {
        $(".feed").load("load.php");
      }
    });
    return false;
  });
  $('#showall').click(function() {
    allpostshown = true;
    $(".feed").load("allposts.php");
  });


  </script>
