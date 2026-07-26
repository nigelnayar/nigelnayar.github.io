<?php include 'header.inc.php';
 ?>
<?php $un = @$_POST['user_post'];
$d = date("Y-m-d");
$time = date("H:i:s");
$search = @$_POST['s'];
$s = @$_POST['search'];
$submit = @$_POST['submit'];
if (!isset($_SESSION["un"])) {
  header("location: \signIN.php ");
}

else {
  $user = $_SESSION["un"];
  $struser = htmlentities($user);
  $chaps = mysqli_query($conn, "SELECT * FROM users");
  $signed = mysqli_query($conn, "SELECT * FROM users WHERE Username = '".$_SESSION["un"]. "'");
  $get = mysqli_fetch_assoc($signed);

if (isset($un)) {

$sql = "INSERT INTO posts (username, post, dateposted, hour)
VALUES ('$user', '$un', '$d', '$time')";
if ($conn->query($sql) === TRUE) {
  echo '<br><br>';
    echo "Thank You For Helping The Community To Grow! ";
    echo "";
    echo @$_POST['name'];
    echo '<br><br><br>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}}}


?>
    <style media="screen">
      .photos:hover {
        opacity: 0.5;
      }
      .totalfols {
        display: block;
      }
    </style>

    <span>There Are <?php echo mysqli_num_rows($chaps); ?> Chaps in the community right now!</span>
    <br><br>
    <button type="blueroom" style="border: none;" name="blueroom">The Blue Room</button>
    <a href="messages/" style="position: relative; left: 20px; "><img src="chat.png" class="work2"  alt=""></a>

    <form action="search.php" method="post">
    <input type = "text" name= "s" size = "80" style="border-left: none; " placeholder = "Search chap..." class= "srchbar" autocomplete="off" id="srchbarr" onclick="srchbr()"/>
    <input type= "image" src=  "search.png" class= "searchbutton" alt= "submit" name= "search"><br>
  </form>
  <br><br>
  <center>
  <div class="profilemob">
    <?php
    $sinf = mysqli_query($conn, "SELECT * FROM users WHERE Username = '".$_SESSION["un"]. "'");

      $urinf = $sinf -> fetch_assoc();
      $yourpic = $urinf['profilepic'];
      $checkfolsu = mysqli_query($conn, "SELECT * FROM followers WHERE followed = '".$_SESSION["un"]."'");
      $folsu = mysqli_num_rows($checkfolsu);
    ?>

       <h4><?php echo $struser; ?></h4><br>
       <center><img src="<?php echo "$yourpic"; ?>" style=" border-radius: 50px;height:100px;width:100px" alt="Avatar"></center>
       <hr></hr>
       <span>Sobats: </span><span><?php echo $folsu; ?></span><br>
       <span style="font-size: 11px; ">Joined in <?php echo $urinf['sign_up_date']; ?></span><br><br>
       <span style="font-size: 12px; word-break: break-all; white-space: pre-wrap;"><?php echo htmlentities($urinf['Resume']); ?></span><br><br>
       <a href="<?php echo "prof.$struser"; ?>">Go To Your Profile</a>

    </div>
    </center>
  <div class="form">
    <h3>What's new today?</h3><br>
      <label for="images" class="photos" style="position: relative; left: 20px; background-color: none ; border-radius: 10px; cursor: pointer;     "><img class="work2" src="addimg.png" alt=""></label>
    <form id="postform" action="" method="post" onsubmit="return thpost();">
      <input type="file" name="images" style=" display: none;" value="" id="images">
      <div class="imageprev" id="imageprev">
        <img src="" alt="imageprev">
      </div>
      <div class="post">

    <label style="padding-left: 20px;">Type:</label><br><br>
    <textarea name="post" class="comun" onkeyup="clean('tpost')" onkeydown="clean('tpost')" rows="11" cols="120" required id="tpost" maxlength="1000"></textarea>
    <br><br>
    <button type="submit" style="float: right;" class="submit" id="submit" name="submit">Submit</button><br><br>
  </div>
  </form>
  </div>


  <br>
  <br>
  <div class="feed">
  <?php
  function linking($link)
  {
    $href = "/www\.+([a-zA-Z0-9_]+\.(.*))/";
    $link = preg_replace($href, '<a href="http://$0">$0</a>', $link);
    return($link);
  }
  function hashtagging($tag)
  {
    $hash = "/#+([a-zA-Z0-9_]+)/";
    $tag = preg_replace($hash, '<a href="tags.$1">$0</a>', $tag);
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
 </div>
 <br><br><br>
 <div style="border-top: solid; border-width: thin;">
   <label>Copyright (c) 2020 Copyright NIgelProduction All Rights Reserved.</label>
   <br>
   <br>
   <br>
   <br>
   <a href="#"><img src="discord.png" alt="discord" class="work2">  <span style=" padding-left: 20px;  ">Join My Discord Server!</span></a>
   <a href="#"><img src="\ig.png" alt="ig" class="work2" style=" padding-left: 35px;  " > <span style=" padding-left: 20px;  ">Follow Chadnester's Instagram!</span></a>
   <a href="#" style="padding-left: 20px;display: inline-block;     "> <h2 style=" display: inline-block; "  >@</h2> <span style=" padding-left: 15px;  ">Email Me.</span></a>
   <br>
 <br>
 <br>
 <br>
 <label class="bottomtext">If you want to support me, consider donating me by clicking the patreon icon!</label>
 </div>
  <script type="text/javascript" src="script.js">

  </script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script type="text/javascript">
   var allpostshown = false;
   $(document).ready(function() {


     console.log(allpostshown);
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
   function update() {
     $(".feed").load("load.php");
   }
     var post = document.getElementById('tpost').value;
     function thpost() {
       if (document.getElementById('tpost').value == "/Loggout") {
           console.log("Error");
    }
    else {
         var post = document.getElementById('tpost').value;
       if (post) {


        $.ajax
        ({
          type: 'post',
          url: 'post.php',
          data: {
            user_post: post
          },
          success: function (response) {
            if (allpostshown) {
              console.log(allpostshown);
              $(".feed").load("allposts.php");
              document.getElementById('tpost').value = '';
            }
            else {

              $(".feed").load("load.php");
              document.getElementById('tpost').value = '';
            }

          }
        });
      }
     }
       return false;
     }

       $('.likebtn').click(function() {
         var postid = $(this).attr('id');
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


     var debug = false;
     function clean(e) {
       var textfield = document.getElementById(e);
       var censor = /fuck/gi;
       var swcensor = /shit/gi;
       var bwcensor = /bitch/gi;
       var nwcensor = /nigga/gi;
       textfield.value = textfield.value.replace(censor, "****");
       textfield.value = textfield.value.replace(swcensor, "****");
       textfield.value = textfield.value.replace(bwcensor, "*****");
       textfield.value = textfield.value.replace(nwcensor, "*****");
     }
   </script>


  </body>
</html>
