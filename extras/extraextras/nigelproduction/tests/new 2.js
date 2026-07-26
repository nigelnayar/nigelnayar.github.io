<!doctype html>
	<html>
	<head>
		<style>
			input {border-radius: 20px 20px;}
			body {background-color: black}
		body {background-color: black;}
.text {font-family: arial; color: white; text-align: center;}
.heading {background-color: grey; border: solid; border-color: red; border-radius: 20px 20px; color: white; font-family: Arial; padding-left: 50px}

a { text-decoration: none; color: white;}
input {border-radius: 10px;}
.link {display: block;
  margin-left: auto;
  margin-right: auto; border-radius: 20px 20px; color: white; height: 90px; width: 200px; filter: grayscale(100%);}

		</style>
</head>
<body>
<div class="heading">
<h1 >TEXT COMPARATOR</h1>
 <p> <a href= "nigelproduction.html">Go to Nigel Production's Website</a></p>
</div>
	
	<p id= "date"></p>
	 <body>
	 
	 <label class= "text" >Compare:</label><br>
		<input type= "text" id= "input1" required><br>
	<label class= "text" >to:</label><br>
		<input type= "text" id= "input2"  required><br>
		<br>
		<button type="button" onclick='show()'>Compare!</button>

	
	<p class= "text" id= "result"></p>
	<script type="text/javascript">
		document.getElementById('date').innerHTML =Date() ;
	function show() {
		  var input1 = document.getElementById("input1").value;
		  var input2 = document.getElementById("input2").value;
		  
		
			if (input1 === input2) {
				document.getElementById("result").innerHTML = "The same"
			}
			else {
				document.getElementById("result").innerHTML = "Not the same"
			}
			if (input1 === "is bumbum weird?") {
				document.getElementById("result").innerHTML = "yes"
			}
			
		
	</script>
	 </body>
	</html>