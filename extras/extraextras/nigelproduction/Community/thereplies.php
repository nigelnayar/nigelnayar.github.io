<?php
session_start();
include 'connect.inc.php';
$po = mysqli_real_escape_string($conn, $_GET['p']);

  $user = $_SESSION["un"];
  if(isset($_GET['p'])){
    $po = mysqli_real_escape_string($conn, $_GET['p']);
    if (ctype_alnum($po)) {
      $check = mysqli_query($conn, "SELECT * FROM posts WHERE id = '".$po. "'");
      $d = date("Y-m-d");
      $rep = @$_POST['user_reply'];
      $submittr = @$_POST['submittr'];
      $check = mysqli_query($conn, "SELECT * FROM posts WHERE id = '".$po. "'");
      $pos = mysqli_fetch_array($check);
        $id = $pos['id'];

  }
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
  $replies = mysqli_query($conn, "SELECT * FROM replies WHERE postid = '".$po. "' ORDER BY id DESC");



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
