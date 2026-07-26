<?php
session_start();
      session_destroy();?>
      <!DOCTYPE html>

      <html lang="en" dir="ltr">
        <head>
          <meta charset="utf-8">
          <title>nigelproduction</title>
          <link rel="stylesheet" href="master.css">
        </head>
        <body class="index" id="all">
          <div class="header">
            <img src="TheNigelProductionText.png" alt="logo" class="logo">
              <label><a href="buymerch.php" class="linker" >Buy Merch</a></label> <label><a href="SignIN.php" class="linker">Join The Community</a></label>
              <a href="https://www.youtube.com/channel/UCzbNyed8zaQvZkqgBztwjqQ"><img src="yt.png" alt="youtube" class="work"></a>
              <a href= "https://www.patreon.com/nigelproduction"><img src="ptrn.png" alt="patreon" class="work">
              </a>
              <a href= "https://twitter.com/nigel_not"><img src="twt.png" alt="patreon" class="work">
              </a>
               <div class="container" onclick="myFunction(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
      </div>
          </div>
          <div class="drop" id="drop">
            <a href="#">Contact</a><br><br>
            <a href="about.html">About</a><br><br>
            <a href="briefQnA.html">Brief QnA</a><br><br>
            <a href="profilepage.php">Profile</a><br>
            <h3>YOUTUBE VIDEOS</h3>
            <a href="https://www.youtube.com/watch?v=cWwlT4lfetA"><Img src="https://i.ytimg.com/vi/cWwlT4lfetA/hqdefault.jpg?sqp=-oaymwEZCPYBEIoBSFXyq4qpAwsIARUAAIhCGAFwAQ==&rs=AOn4CLDGk5eARn_2RU40PR3kCEa-LM0uQw"</img></a><br>
            <label>GTA 6 But Better</label><br>
            <a href="https://www.youtube.com/watch?v=2HkmI15kJco"><img src="https://i.ytimg.com/vi/2HkmI15kJco/hqdefault.jpg?sqp=-oaymwEZCPYBEIoBSFXyq4qpAwsIARUAAIhCGAFwAQ==&rs=AOn4CLDDDQDUl86mqF1doyEJ2LwShF3J1w"</img></a><br>
            <label>3rd MCU Spiderman Sequel (a bad sequel)</label><br>
          </div><br>




    <label>Welcome to NIgelProduction's Official Website!</label><br><br><br>

    <label>STUFFS</label><br><br><br><br>
    <a href="textcomparator.html"><button class= "lol" >Text Comparator</button></a><br><br><br><br> <label>Compare texts to see if it's the same or not!</label><br><br><br><br>

    <button class= "lol" onclick="show(this)" >Say Hi To Chadnester</button><br><br><br><br><label id="dial">Chadnester is a chatbot created by me!!</label><br><br><br><br>
    <div id= "div1" style="display: none;">
			<label id= "lbl">Your Name Is:</label>
			<input type= "text" id= "txt" class="bar"><br><br>

			<button onclick='ok()' id= "OK">Yes That Is My Name!</button><br><br>
		</div>
    <div id= "div2" style= "display: none;" >
			<input type= "text" id="cmd" class="bar" size= "30"><br>
			<button onclick='please()'>-></button><br>
			<label id= "say"></label>
      <div id= "calculator" style = "display: none;">
  			<input type= "number" id= "n1" class="bar">
  			<select id="oper" class="bar">
  					<option value= "+">+</option>
  					<option value= "-">-</option>
  					<option value= "x">x</option>
  					<option value= "÷">÷</option>
  					<option value= "˄">˄</option>
  				</select>
  			<input type= "number" id= "n2" class="bar" ><br>
  			<button onclick= "calc()">=</button>
  		</div><br>
		</div>
        <button class= "lol" onclick="more(more)" >MoRe</button><br><br><br><br><label>More from me!</label><br><br>
<div class="more" id="more">



<div class="much" id="much">
  <br><br>
  <a href="textcomparator.html"><button class= "lol" >Nigel Search</button></a><br><br><br><br> <label>Just my custom search engine!</label><br><br><br><br>

  <button class= "lol">Donate via Paypal</button><br><br><br><br><label id="dial">Donate thru paypal!</label><br><br><br><br>

  <a href="Oldvideos.html"><button class= "lol">Old Videos</button></a><br><br><br><br><label id="dial">Watch or download my old videos from my old Channels here!</label><br><br><br><br>


  <a href="textcomparator.html"><button class= "moreofmorebuttons" >Interviews</button></a><br><br><br><br> <label class="moreofmore">See me being interviewed or interviewing others!</label><br><br><br><br>

  <button class= "moreofmorebuttons" >Collaborations</button><br><br><br><br><label class="moreofmore">See my Collaborations with youtubers and others!</label><br><br><br><br>

  <button class= "moreofmorebuttons" >The Blue Room</button><br><br><br><br><label class="moreofmore">A parody of red room, watch my live streams here!</label><br><br><br><br>

</div>
</div>

    <div style="position: relative; width: 600px; height: 800px;">

    <div style="position: absolute; bottom: 1px;">
    <label>If you want to support me, consider donating me by clicking the patreon icon!</label>
    </div>
</div>



    <script type="text/javascript" src="script.js">

    </script>
  </body>
</html>
