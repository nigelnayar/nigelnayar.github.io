<?php include 'header.inc.php'; ?>
<?php
$unlog = @$_POST['unlog'];
$pwlog = @$_POST['pwlog'];
  $query = mysqli_query($conn, "SELECT * FROM users WHERE Username = '".$unlog. "'");
  $query2 = mysqli_query($conn, "SELECT * FROM users WHERE Username = '".$pwlog. "'");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if(mysqli_num_rows(  $query) == 1|| mysqli_num_rows(  $query2) == 1){
        header("location: test2.php");
    }
    else {
      echo "your data's not correct";
    }}
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Join The Community</title>
</head>
<body>
  <h3>Join The Community Today!</h3>
  <form class="" action="test2.php" method="post">
    <label for="">Username:</label><br>
    <input type="text" name="unlog" value="" class="bar" size="30" required><br>
    <label for="">Password:</label><br>
    <input type="password" name="pwlog" value="" class="bar" size="30" required><br><br>
    <button type="submit" name="sub">SignIn</button>
  </form>
  <p>No Account yet? <a style="text-decoration: underline;" href="signUP.php">Make One!</a></p>
  <script type="text/javascript" src="script.js">

  </script>
</body>
</html>
