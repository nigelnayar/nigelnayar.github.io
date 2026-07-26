<?php include 'header.inc.php'; ?>
<?php
$un = @$_POST['un'];
$pswd = @$_POST['pw'];
$hp = password_hash($pswd, PASSWORD_DEFAULT);
$query = mysqli_query($conn, "SELECT * FROM userstest WHERE Username = '".$un. "'");
$d = date("Y-m-d");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(mysqli_num_rows(  $query) > 0){
    echo "Nope, the Username is already in use.<br>";

     }
      else {
        // code...
        if (strlen($pswd)<5) {
          echo "So you wanna get hacked huh? Password must be 5 or more characters!";
        }

      else{
      $sql = "INSERT INTO userstest (Username,Password, sign_up_date)
      VALUES ('$un','$hp','$d')";
      if ($conn->query($sql) === TRUE) {
          die("
          <input type = "text" name= "s" size = "80" placeholder = "Search post..." class= "srchbar" autocomplete="off"  />
          <input type= "image" src=  "search.png" class= "searchbutton" alt= "submit"><br>
        
      ");
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
        }
      }
      } ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Join The Community</title>
  </head>
  <body>
    <h3>Make your account!</h3>
    <form class="" action="SignUPTest.php" method="post" id="form">
      <label for="">Username:</label><br>
      <input type="text" name="un" value="" class="bar" required><br>
      <label for="">Password:</label><br>
      <input type="password" name="pw" value="" class="bar" required><br><br>
      <button type="submit" name="sub" onclick="hide()">SignUp</button>
    </form>
    <p>already have an account? <a style="text-decoration: underline;" href="signIN.php">Sign In!</a></p>
    <script type="text/javascript" src="script.js">

    </script>
  </body>
</html>
