<?php include 'header.inc.php';
session_start();
 ?>
<?php $un = @$_POST['post'];
$d = date("Y-m-d");
if (!isset($_SESSION["un"])) {
  die("SIGN IN FIRST!!!!!");
}
else {
  echo "Welcome, " . $_SESSION["un"];
$signed = mysqli_query($conn, "SELECT * FROM users WHERE Username = '".$_SESSION["un"]. "'");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$sql = "INSERT INTO post (post, dateposted)
VALUES ('$un', '$d')";
if ($conn->query($sql) === TRUE) {
    echo "Thank You For Posting in the community! ";
    echo "";
    echo @$_POST['name'];
    echo '<br><br><br>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}}}?>

    <form action="search.php" method="post">
    <input type = "text" name= "s" size = "80" placeholder = "Search user..." class= "srchbar" autocomplete="off"  />
    <input type= "image" src=  "search.png" class= "searchbutton" alt= "submit"><br>
  </form>
  <div class="form">
    <h3>Ask questions or Submit Ideas!</h3>
    <form class="post" action="community.php" method="post">
    <label style="padding-left: 20px;">Type:</label><br><br>
    <textarea name="post" class="comun" rows="11" cols="120" required></textarea>
    <br><br>
    <button type="submit" style="float: right;" class="submit" name="sub">Submit</button><br><br>
  </form>
  </div>
  <br>
  <br>
  <script type="text/javascript" src="script.js">

  </script>
  </body>
</html>
