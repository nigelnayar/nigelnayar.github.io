<div class="alll">
<?php include 'header.inc.php'; ?>
<?php
$sub = @$_POST['sub'];

$id = rand(1000,100000);
$d = date("Y-m-d");
if (isset($sub)) {
  $un = @$_POST['un'];
  $unr = str_replace("'", "''", $un);
  $pswd = @$_POST['pw'];
  $resume = htmlentities(@$_POST['resume']);
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
          if (empty(trim($resume))) {
            $pic = 'pp/prof.jpg';
          $sql = "INSERT INTO users (id, Username,Password, sign_up_date, profilepic, resume)
          VALUES ('$id','$unr','$hp2','$d', '$pic', '...')";
          if ($conn->query($sql) === TRUE) {
              header("location: \signIN.php ");
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }
          }
          else {
            // code...

        $pic = 'pp/prof.jpg';
      $sql = "INSERT INTO users (id, Username,Password, sign_up_date, profilepic, resume)
      VALUES ('$id','$unr','$hp2','$d', '$pic', '$resume')";
      if ($conn->query($sql) === TRUE) {
          header("location: \signIN.php ");
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
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
    <center>
    <h3>Make your account!</h3>
    <form class="" action="SignUP.php" class="signuppls" method="post" id="form">
      <label for="">Username:</label><br>
      <input type="text" id="un"  onkeyup="clean('un')" onkeydown="clean('un')" name="un" style="border-left: none;  " value="" class="bar" size="60" autocomplete="off" maxlength="100" required><br>
      <label for="">Password:</label><br>
      <input type="password" style="border-left: none;  " name="pw" id="pw" value="" class="bar" size="60" required autocomplete="off"><br><br>
      <button type="button" class="showpw" id="sbutt" onclick="showpw()">O</button> <label>show password</label>
      <br><br>
      <label>Resume(Optional)</label><br>
      <textarea id="re"  onkeyup="clean('re')" onkeydown="clean('re')" style="border: none; border-radius: 12px;      " name="resume" rows="8" cols="80"></textarea>
      <br>
      <span id="gend"></span><br>
        <button style="border-left: none;  "  type="submit" name="sub" >SignUp</button>
    </form><br>
        <button style="border-left: none;  "  type="button" name="sub" onclick="genpas()">Generate Password</button><br><br>
    <p>Already have an account? <a style="text-decoration: underline;" href="signIN.php">Sign In!</a></p><br><br>
    <label>Warning: Cursing is <strong><b>ILLEGAL!</b></strong></label>
  </center>
  <br><br><br><br><br><br><br><br><br><br>
    <div style="border-top: solid; border-width: thin;">
      <label>Copyright (c) 2020 Copyright NIgelProduction All Rights Reserved.</label>
      <br>
      <br>
      <br>
      <br>
      <a href="#"><img src="discord.png" alt="discord" class="work2">  <span style=" padding-left: 20px;  ">Join My Discord Server!</span></a>
      <a href="#"><img src="ig.png" alt="ig" class="work2" style=" padding-left: 35px;  " > <span style=" padding-left: 20px;  ">Follow Chadnester's Instagram!</span></a>
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
      function genpas() {
        let r = Math.random().toString(36).substring(2);
        document.getElementById('pw').value = r;
        document.getElementById("gend").innerHTML = r;
      }
      function clean(e) {
        var textfield = document.getElementById(e);
        var regex = /[<>{?}]/gi;
        var censor = /fuck/gi;
        var swcensor = /shit/gi;
        var bwcensor = /bitch/gi;
        var nwcensor = /nigga/gi;
        textfield.value = textfield.value.replace(regex, " ");
        textfield.value = textfield.value.replace(censor, "****");
        textfield.value = textfield.value.replace(swcensor, "****");
        textfield.value = textfield.value.replace(bwcensor, "*****");
        textfield.value = textfield.value.replace(nwcensor, "*****");
      }

      </script>

  </body>
  </html>
  </div>
