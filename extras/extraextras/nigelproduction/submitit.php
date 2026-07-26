
<?php include 'connect.inc.php'; ?>
<?php
$sub = @$_POST['usarnm'];

$id = rand(10,100000);
$d = date("Y-m-d");
if (isset($sub)) {
  $un = @$_POST['usarnm'];
  $pswd = @$_POST['usarpw'];
  $hp = md5($pswd);
  $hp2 = md5($hp);
  $query = mysqli_query($conn, "SELECT * FROM users WHERE Username = '".$un. "'");
  if(mysqli_num_rows(  $query) > 0){
    echo "Nope, the Username is already in use.<br>";

     }
      else {
        // code...
        if (strlen($pswd)<5) {
          echo "So you wanna get hacked huh? Password must be 5 or more characters!";
        }

      else{
        if (empty(trim($un))) {
          echo "No!";
        }
        else {
          // code...

        $pic = 'pp/prof.jpg';
      $sql = "INSERT INTO users (id, Username,Password, sign_up_date, profilepic)
      VALUES ('$id','$un','$hp2','$d', '$pic')";
      if ($conn->query($sql) === TRUE) {
          header("location: \signIN.php ");
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
        }
      }
      }
    } ?>
