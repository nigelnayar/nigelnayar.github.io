<?php
  include 'connect.inc.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
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
    if(isset($_GET['p'])){
      $rpid = mysqli_real_escape_string($conn, $_GET['p']);
      if (ctype_alnum($rpid)) {
        $checkrid = mysqli_query($conn, "SELECT * FROM replies WHERE id = '".$rpid. "'");
        $d = date("Y-m-d");
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
     <span class="" style="padding-right: 400px; float: right; ">


   <span id="reply<?php echo $rpid;  ?>" style="">
     <?php
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
            echo "<a href='\Community/prof.$userep'>";
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
   </span>
 </span>
     <form class='<?php echo "$rpid"; ?>' style="position: relative;
     display: inline-block;
     left: 30px;
     border-left: none;
     background: none;
     border-bottom: solid;
     border-top: solid;
     border-right: solid;
     border-width: thin;
     border-radius: 20px 20px;
     width: 30%;
     height: 110px;" id='repostasdf<?php echo "$rpid"; ?>' action='' method='post'>

     <label style="padding-left: 20px;">Reply:</label><br>
     <textarea class="comun"   onkeyup="clean('rpost')" onkeydown="clean('rpost')" id="rpostasdf<?php echo "$rpid"; ?>" rows="4" cols="60" required></textarea>
     <br><br>
     <button type="submit" style="float: right;" class="submit">Submit</button><br><br>
     </form>
     <br>


       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <script type="text/javascript">
       $('#repostasdf<?php echo "$rpid"; ?>').submit(function functionName() {
         var rpid = $(this).attr("class");
         var rpost = document.getElementById('rpostasdf<?php echo "$rpid"; ?>').value;
         if (rpost) {


         $.ajax
         ({
           type: 'post',

           url: '<?php echo "repit.php?p=$rpid"?>',
           data: {
             user_reply: rpost,
             replied: 1
           },
           success: function (response) {
             console.log(rpid);
             $("#reply" + rpid).load('<?php echo "reprps.php?p=$rpid"?>');
             document.getElementById('rpostasdf<?php echo "$rpid"; ?>').value = '';
           }
         });
       }
         return false;
       });

       </script>

  </body>
</html>
