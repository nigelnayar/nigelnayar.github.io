  <div id="all">
<?php include 'header.inc.php'; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>



    <center>
    <h3 class="idinput">Get Your Id!</h3>
    <form class="" action="" id="getthefingid" method="post">
      <label for="">Username:</label><br>
      <input style="border-left: none;  " type="text" name="unlog" id="nm" class="bar" size="60" required><br>
      <label for="">Password:</label><br>
      <input style="border-left: none;  " type="password" name="pwlog" class="bar" size="60" id="pw" autocomplete="off" required><br><br>
      <button type="button" class="showpw" id="sbutt" onclick="showpw()">O</button> <label>show password</label>
      <br><br>
      <button type="submit" style="border-left: none;  " id="signbutton" name="sign">Get id</button><br><br>

    </form>
    <p>No Account yet? <a style="text-decoration: underline;" href="\signUP.php">Make One!</a></p>
  </center>
    <br><br><br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br><br><br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br><br><br>
    <div style="border-top: solid; border-width: thin;">
      <label>Copyright (c) 2020 Copyright NIgelProduction All Rights Reserved.</label>
      <br>
      <br>
      <br>
      <br>
      <a href="#"><img src="\discord.png" alt="discord" class="work2">  <span style=" padding-left: 20px;  ">Join My Discord Server!</span></a>
      <a href="#"><img src="\ig.png" alt="ig" class="work2" style=" padding-left: 35px;  " > <span style=" padding-left: 20px;  ">Follow Chadnester's Instagram!</span></a>
      <a href="#" style="padding-left: 20px;display: inline-block;     "> <h2 style=" display: inline-block; "  >@</h2> <span style=" padding-left: 15px;  ">Email Me.</span></a>
      <br>
    <br>
    <br>
    <br>
    <label class="bottomtext">If you want to support me, consider donating me by clicking the patreon icon!</label>
    </div>
    <script type="text/javascript" src="\script.js">

    </script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <script type="text/javascript">
         $(document).ready(function() {
           $("#getthefingid").submit(function functionName() {



          var name = document.getElementById('nm').value;
          var pass = document.getElementById('pw').value;
            $.ajax
            ({
              type: 'post',
              url: 'proccess.php',
              data: {
                usarnm: name,
                usarpw: pass
              },
              success: function (response) {
                $(".idinput").html(response);
              }
            });


           return false;
          });
         });
       </script>

  </body>
</html>
</div>
