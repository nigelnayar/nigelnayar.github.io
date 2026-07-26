  <?php include 'header.inc.php'; ?>
  <?php
  session_start();
  $unlog = @$_POST['unlog'];
  $pwlog = @$_POST['pwlog'];
  $sign = @$_POST['sign'];
  $id = @$_POST['id'];
  $pwe = password_hash($pwlog, PASSWORD_DEFAULT);
  $pwloge = md5($pwlog);
  $pwlogee = md5($pwloge);
  $d = date("Y-m-d");
  $_SESSION["un"] = $unlog;
    $_SESSION["d"] = $d;
    $query = mysqli_query($conn, "SELECT * FROM users WHERE Username = '".$unlog. "' AND Password = '".$pwlogee. "' AND id = '".$id."' " );
      if (isset($sign)) {
        if(mysqli_num_rows(  $query) == 1){

            header("location: /Community");
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
    <style media="screen">
    .work2 {

        display:inline;
        width: 24px;
        height: 20px;
        padding-top: 20px;
        outline: none;
        cursor: pointer;
        transition: 0.22px;
    }
    </style>
  </head>
  <body>
    <center>
    <h3>Join The Community Today!</h3>

    <form class="" action="signIN.php" method="post">
      <label for="">Username:</label><br>
      <input type="text" style="border-left: none;  " name="unlog" value="" size="60" class="bar" size="30" required><br>

      <label for="">Password:</label><br>
      <input type="password"  style="border-left: none;" name="pwlog" value="" size="60" class="bar" size="30" id="pw" autocomplete="off" required><br><br>
      <label>id:</label><br>
      <input type="number" style="border-left: none;  " name="id" value="" size="60" class="bar" required><br><br>
      <button type="button" class="showpw" id="sbutt" onclick="showpw()">O</button> <label>show password</label>
      <br><br>
      <button type="submit" style="border-left: none;  "name="sign">SignIn</button><br><br>
    </form>

    <p>No Account yet? <a style="text-decoration: underline;" href="signUP.php">Make One!</a></p>
    <br>
    <a style="text-decoration: underline;" href="\idconfig/">What's my id?</a>
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
  </body>
</html>
