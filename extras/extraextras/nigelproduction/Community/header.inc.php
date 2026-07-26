<?php include ("connect.inc.php");
session_start();
if (!isset($_SESSION["un"])) {

}
else {



$user = $_SESSION["un"];

}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="master.css">

    <title>Community</title>
    <style media="screen">
      .like {
        display:inline;
        width: 20px;
        height: 20px;
        outline: none;
        cursor: pointer;
        transition: 0.22px;
      }
      .like:hover {
        opacity: 0.5;
      }
    </style>
  </head>
  <body>
    <div class="header" style="max-width:100%; height:auto;">
      <a href="\" ><img src="TheNigelProductionText.png" alt="logo" class="logo"></a>
        <label><a href="\buymerch.php" class="linker" >Buy Merch</a></label> <label class="active">Join The Community</label>
        <a href="https://www.youtube.com/channel/UCzbNyed8zaQvZkqgBztwjqQ"><img src="yt.png" alt="youtube" class="work"></a>
        <a href= "https://www.patreon.com/nigelproduction"><img src="ptrn.png" alt="patreon" class="work">
        </a>
        <a href= "https://twitter.com/nigel_not"><img src="twt.png" alt="patreon" class="work">
        </a>

         <div class="container" onclick="myFunction(this)" style=" position: relative; ">
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
</div>
<div class="drop" id="drop">
  <a href="#">Contact</a><br><br>
  <a href="about.html">About</a><br><br>
  <a href="briefQnA.html">Brief QnA</a><br><br>
  <?php echo "<a href= 'prof.$user'>";
        echo "Profile";
        echo "</a>";
   ?><br><br>
  <h3>YOUTUBE VIDEOS</h3>
  <a href="https://www.youtube.com/watch?v=cWwlT4lfetA"><Img src="https://i.ytimg.com/vi/cWwlT4lfetA/hqdefault.jpg?sqp=-oaymwEZCPYBEIoBSFXyq4qpAwsIARUAAIhCGAFwAQ==&rs=AOn4CLDGk5eARn_2RU40PR3kCEa-LM0uQw"</img></a><br>
  <label>GTA 6 But Better</label><br>
  <a href="https://www.youtube.com/watch?v=2HkmI15kJco"><img src="https://i.ytimg.com/vi/2HkmI15kJco/hqdefault.jpg?sqp=-oaymwEZCPYBEIoBSFXyq4qpAwsIARUAAIhCGAFwAQ==&rs=AOn4CLDDDQDUl86mqF1doyEJ2LwShF3J1w"</img></a><br>
  <label>3rd MCU Spiderman Sequel (a bad sequel)</label><br>
</div><br>
    </div>
