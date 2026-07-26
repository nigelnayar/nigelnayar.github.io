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
  include 'header.inc.php';
  if (!isset($_SESSION['un'])) {
    die("Sign In  First!!");
  }
  else {
    $user = $_SESSION["un"];
    if(isset($_GET['p'])){
      $po = mysqli_real_escape_string($conn, $_GET['p']);
      if (ctype_alnum($po)) {
        $check = mysqli_query($conn, "SELECT * FROM posts WHERE id = '".$po. "'");
        $d = date("Y-m-d");
        $rep = @$_POST['rep'];
        $submittr = @$_POST['submittr'];
        if (isset($submittr)) {
          $sql = "INSERT INTO replies (user, reply, postid, date_posted)
          VALUES ('$user', '$rep', '$po', '$d')";
          if ($conn->query($sql) === TRUE) {
              echo "Thanks!";
              echo '<br><br><br>';
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }}
        if (mysqli_num_rows($check) < 1) {
          header ("location: \Community");
        }
      }
      else {
        header("location: \Community ");
      }

    }
    else {
      header("location: \Community ");
    }
  }
 ?>
</head>
<body>
  <?php while ($pos = mysqli_fetch_array($check)) {
    $id = $pos['id'];
    $name = htmlentities($pos['username']);
    $userinf = mysqli_query($conn, "SELECT * FROM users WHERE Username = '".$name. "'");
    $getthisuserinf = mysqli_fetch_assoc($userinf);
    $ppic = $getthisuserinf['profilepic'];
    $checkfols = mysqli_query($conn, "SELECT * FROM followers WHERE followed = '".$name."'");
    $fols = mysqli_num_rows($checkfols);
    $likes = mysqli_query($conn, "SELECT * FROM likes WHERE postid = $id");
    $tlikes = mysqli_num_rows($likes);
    echo "<br>";

    echo "<div style:'border-bottom: solid; border-width: thin;' >";
    echo "<img src='$ppic' style= 'width:60px; height: 60px; position: relative; border-radius: 50px; '>";
    echo "<span style='display: inline-block; padding-left: 10px;  '>";
    echo "<h3>";
    echo "<a href= '\Community/prof.$name'>";
    echo $name;
    echo "</a>";
    echo "</h3>";
    echo "<span style ='font-size: 15px;'>";
    echo $pos['dateposted']." ";
    echo "</span>";
    echo " ";
    echo " ";
    echo "<span style='padding-left: 10px; font-size: 12px;'>";
    echo " Sobats:";
    echo $fols ;
    echo "</span>";
    echo "</span>";
    echo "</div>";
    echo "</div>";
    echo "<div style='  border-radius: 5px; user-select: text;
     -webkit-user-select: text;
      -moz-user-select: text;
      -ms-user-select: text;   word-break: break-all; border-top: solid; max-width: 1300px; border-width: thin; border-radius: 5px; background-color: rgba(40, 90, 130, 0.5) ;  >'";


    echo "<br>";
      echo linking(hashtagging(nl2br(htmlentities($pos['post']))));

      echo "<br>";
      echo "<br>";
      echo "<br>";
      echo "</div>";
      echo "<br>";
      echo "Total Likes: ";
      echo  $tlikes;
      echo "<br>";
      echo "<br>";
    }
              $replies = mysqli_query($conn, "SELECT * FROM replies WHERE postid = '".$po. "'  ORDER BY id DESC");
       ?>
       <br><br><br>
       <div class="">

         <form class='post' action='' method='post' onsubmit='return repost();'>

         <label style="padding-left: 20px;">Reply:</label><br><br>
         <textarea name="rep" class="comun" onkeyup="clean('rpost')" onkeydown="clean('rpost')" id="rpost" rows="10" cols="100" required></textarea>
         <br><br>
         <button type="submit" style="float: right;" class="submit" name="submittr">Submit</button><br><br>
       </form>
       <br><br>
        Replies: <br>
        <div class="" id="thereplies">
        <?php


          if (mysqli_num_rows($replies) < 1) {
            echo "<br>";
            echo "<br>";
            echo "No Replies Yet";
          }
          else {
            echo "<br>";
            while ($re = mysqli_fetch_array($replies)) {

              $rid = $re['id'];
              $replyrepsa = mysqli_query($conn, "SELECT * FROM repliesr WHERE postid = '".$rid. "'");
              $repliess = mysqli_num_rows($replyrepsa);
              echo "<div style = 'padding-left: 30px;'>";
              echo "<div style = 'white-space:pre-wrap; border-bottom: solid; border-width: thin; max-width: 750px; '>";

              $usern = htmlentities($re['user']);
              $checkfolsa = mysqli_query($conn, "SELECT * FROM followers WHERE followed = '".$usern."'");
              $folsa = mysqli_num_rows($checkfolsa);
              $checkthis = mysqli_query($conn, "SELECT * FROM users WHERE Username = '".$usern."'");
              $getthisuserinf = mysqli_fetch_assoc($checkthis);
              $ppic = htmlentities($getthisuserinf['profilepic']);
              $Thereply = htmlentities($re['reply']);
              echo "<img src='$ppic' alt='' class='homepp'>";
              echo "<span id='$rid' class='getinf'>";
              echo "<a href= '\Community/prof.$usern'>";
              echo $usern ;
              echo " ";
              echo "</a>";
              echo "</span>";
              echo "<span style= 'font-size: 10px;'>";
              echo $re['date_posted'];

              echo "</span>";
              echo "</div>";
              echo "<div class='asd$rid' style='height: 0; overflow : hidden;   '>";
              echo " Sobats: ";
              echo $folsa;
              echo "</div>";
              echo "<div class= 'postbox'>";
              echo linking(hashtagging(nl2br($Thereply)));

              echo "<br>";
              echo "<br>";
              echo "</div>";
              echo "</div>";


              echo "<span id='$rid' class='showrep' style='position: relative;  padding-left: 30px;'>";
              echo "+replies";
              echo "</span>";
              echo "<div id='rep$rid' style='display: block;'>";
              echo "</div>";
              echo "<br>";
              echo "<br>";
              echo "<br>";
              echo "<br>";

            }
              $conn -> close();
          }
         ?>
         <span style=""></span>

         </div>
       </div>
       <script type="text/javascript" src="script.js">

       </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
          $('.getinf').mouseover(function() {
            var theid = $(this).attr("id");
            setTimeout(function() {
             $(".asd" + theid).css("height", "24px");
         }, 300);
          });
          $(".getinf").mouseout(function(){
            var theid = $(this).attr("id");
            setTimeout(function() {
             $(".asd" + theid).css("height", "0");
         }, 300);

           });

        });
          function repost() {
            var rpost = document.getElementById('rpost').value;
            if (rpost) {


            $.ajax
            ({
              type: 'post',

              url: '<?php echo "reply.php?p=$po"?>',
              data: {
                user_reply: rpost
              },
              success: function (response) {
                console.log("thanks");
                $("#thereplies").load('<?php echo "thereplies.php?p=$po"?>');
                document.getElementById('rpost').value = '';
              }
            });
          }
            return false;
          }
          $('.showrep').click(function functionName() {
            var rfid= $(this).attr("id");
            var allrepshown = 1;
              $("#rep" + rfid).load("reprep.php?p=" + rfid);



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
          function repeat(func, times) {
         func();
         times && --times && repeat(func, times);
     }
        </script>
</body>
</html>
