<?php include 'header.inc.php';
 ?>
<?php $un = @$_POST['user_post'];
$d = date("Y-m-d");
$time = date("H:i:s");
$search = @$_POST['s'];
$s = @$_POST['search'];
$submit = @$_POST['submit'];
if (!isset($_SESSION["un"])) {
  die("SIGN IN FIRST!!!!!");
}

else {
  $user = $_SESSION["un"];
  echo "Welcome, " . $user . "!";
  echo '<br>';
  echo '<br>';
$signed = mysqli_query($conn, "SELECT * FROM users WHERE Username = '".$_SESSION["un"]. "'");
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
    <button type="blueroom" name="blueroom">The Blue Room</button>
    <form action="search.php" method="post">
    <input type = "text" name= "s" size = "80" placeholder = "Search user..." class= "srchbar" autocomplete="off" id="srchbarr" onclick="srchbr()"/>
    <input type= "image" src=  "search.png" class= "searchbutton" alt= "submit" name= "search"><br>
  </form>
  <div class="form">
    <h3>Ask questions or Submit Ideas!</h3>
    <form class="post" id="postform" action="" method="post" onsubmit="return thpost();">
    <label style="padding-left: 20px;">Type:</label><br><br>
    <textarea name="post" class="comun" rows="11" cols="120" required id="tpost" maxlength="1000"></textarea>
    <br><br>
    <button type="submit" style="float: right;" class="submit" id="submit" name="submit">Submit</button><br><br>
  </form>
  <label>If you want to use single quotes, make sure you type it twice!(Example: If you want to type "Nigel's", you must type it like "Nigel''s"!)</label>
  </div>
  <br>
  <br>
  <div id="feed">


  <?php
    $ttps = "SELECT * FROM posts ORDER BY dateposted DESC, hour DESC";
    $posts = $conn -> query($ttps);
    while ($pos = $posts -> fetch_array()) {
      $id = $pos['id'];
      $name = $pos['username'];
      $like = @$_GET['like'];
      $thepost = $pos['post'];
      $reps = mysqli_query($conn, "SELECT * FROM replies where postid = $id");
      $rep = mysqli_num_rows($reps);
      if (isset($like)) {

        $lk = $pos['likes'];
        $tp = @$_GET['like'];
        $liked = "UPDATE posts set likes = $lk + 1 where id = '$tp'";
        if ($conn->query($liked) === TRUE) {
          echo "lol";
        } else {
            echo "Error: " . $liked . "<br>" . $conn->error;
        }
      }
      echo "<form class='' action='\Community/' method='get'>";
      echo "<button type = 'submit' name = 'like' id = '$id'>like</button>" ;
      echo "<br>";
      echo "<span style= 'padding-left: 5px;  '>";
      echo $pos['likes'];
      echo "</span>";
      echo "</form>";
      echo "<div style = 'padding-left: 30px; line-spacing: 1px; '>";
      echo "<div style = ' border-bottom: solid; border-width: thin; max-width: 750px; '>";
      echo "<a href= 'profilepage.php?u=$name'>";
      echo $pos['username'];
      echo "</a>";
      echo "  ";
      echo "<span style = ' font-size: 10px; '>";
      echo $pos['dateposted'];
      echo "</span>";
      echo "</div>";
      echo "<div style= ' background-color: rgba(40, 90, 130, 0.5) ; max-width: 780px; border-radius: 5px; '";
      echo "<br>";
      echo $pos['post'];
      echo "<br>";
      echo "<br>";

      echo "</div>";
      echo "</div>";
      echo "<div style = 'padding-left: 30px; line-spacing: 1px; '>";
      echo "<a href = 'replies.php?p=$id'>";
      echo "+Replies: ";
      echo $rep;
      echo "</a>";
      echo "</div>";
      echo "<br>";
      echo "<br>";

    }
    $conn->close();
   ?>
 </div>

  <script type="text/javascript" src="script.js">
  $(document).ready(function() {
    var loop = true;
    while (loop) {
      $("#feed").load("load.php");
    }

  });
  </script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script type="text/javascript">
     function thpost() {
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
           console.log("thanks");
            document.getElementById('tpost').value = '';


         }
       });
     }
       return false;
     }
   </script>
  </body>
</html>
