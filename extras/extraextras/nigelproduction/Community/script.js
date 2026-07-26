function show(log1) {
  var name = document.getElementById('txt').value;
  var log1 = document.getElementById('div1');
  document.getElementById('div1').style.display = "block";

}
function myFunction(x) {
  var content = document.getElementById('drop').value;
  document.getElementById("drop").classList.toggle("sizeup");

  x.classList.toggle("change");
}
function ok() {
	var text = document.getElementById("txt").value;

	if (text === "") {
		document.getElementById("dial").innerHTML = "Please Tell Me Your Name! I will not sell it to anyone!";

	}
	else {
	document.getElementById("dial").innerHTML = "Hello " + text + "! " + "I'm Chadnester" + "! What Do You Want Me To Do?" ;
	document.getElementById("div1").style.display = "none";
	document.getElementById("div2").style.display = "block";
	console.log(text)
}}
function please() {
	var com = document.getElementById("cmd").value;
	var d = new Date();
	var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];

	if (com === "") {
		document.getElementById("say").innerHTML = "I Don't Know What You Want Me To Do.";
	}
	else if (com === "Who Are You") {
		document.getElementById("say").innerHTML = "I am Chadnester!"
	}
	if (com === "What Specific Time Is It" ) {
		document.getElementById("say").innerHTML ="It's " + d
	}
	if (com === "What Day Is Today") {
		document.getElementById("say").innerHTML ="It's " + days[d.getDay()];
	}
	if (com === "How Many Milliseconds Is Right Now") {
		document.getElementById("say").innerHTML = d.getMilliseconds();
	}
	if (com === "What Year Is It") {
		document.getElementById("say").innerHTML ="It's" + d.getFullYear();
	}
	if (com === "Help Me With A Math Problem") {
		document.getElementById("say").innerHTML ="What Is It?";
		document.getElementById("calculator").style.display = "block";
	}
	if (com === "What Is 1+1" || com === "What Is 3-1") {
		document.getElementById("say").innerHTML ="That Will Be 2";
	}
	if (com === "What Does Chadnester Mean" || com === "What Does Chadnester Stands For") {
		document.getElementById("say").innerHTML ="I don't know, my creator didn't tell me.";
	}
	if (com === "Help Me!") {
		document.getElementById("say").innerHTML= "Help You With What?";
	}
	if (com === " Give Me, A Random Number") {
		document.getElementById("say").innerHTML= Math.floor(Math.random() * 9999);
	}
	if (com === "How Are You") {
		document.getElementById("say").innerHTML= "I Never Feel Bad Before";
	}
	if (com === "Hi") {
		document.getElementById("say").innerHTML= "Hello!";
	}
	if (com === "Hello") {
		document.getElementById("say").innerHTML= "Hi!";
		}
	if (com === "Hey") {
		document.getElementById("say").innerHTML= "What's Up!";
		}
	if (com === "Howdy") {
		document.getElementById("say").innerHTML= "Ho";
		}
}
function calc() {
	var num1 = parseFloat(document.getElementById("n1").value);
	var num2 = parseFloat(document.getElementById("n2").value);

	var oper = document.getElementById("oper").value;

					if ( oper === "+") {
						document.getElementById("say").innerHTML = num1 + num2;
					}
					if ( oper === "-") {
						document.getElementById("say").innerHTML = num1 - num2;
					}
					if ( oper === "x") {
						document.getElementById("say").innerHTML = num1 * num2;
					}
					if ( oper === "÷") {
						document.getElementById("say").innerHTML = num1 / num2;
					}
					if ( oper === "˄") {
						document.getElementById("say").innerHTML = num1 ** num2;
					}
function hide() {
  document.getElementById('from').style.display = "none";

}

}
function showpw() {
  var x = document.getElementById("pw");
  var y = document.getElementById("sbutt");
 if (x.type === "password") {
   x.type = "text";
   y.style.opacity = "0.5";
 } else {
   x.type = "password";
   y.style.opacity = "1";
 }

}
function more() {
   var more = document.getElementById("more");
   var much = document.getElementById('much');
   var func = much.classList.toggle("showmuch");
   more.classList.toggle("showmore");




    }
function srchbr() {
  var searchbar = document.getElementById('srchbarr');
  searchbar.classList.add("stylesr");
}
window.onclick = function cls() {
  if (!event.target.matches('.srchbar')) {
   var dropdowns = document.getElementsByClassName("srchbar");
   var i;
   for (i = 0; i < dropdowns.length; i++) {
     var openDropdown = dropdowns[i];
     if (openDropdown.classList.contains('stylesr')) {
       openDropdown.classList.remove('stylesr');
     }
   }
 }
}
var follow = document.getElementById('follow');
var unfollow = document.getElementById('unfollow');
function followuser() {
  follow.style.display = "none";
}
