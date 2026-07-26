function show(log1) {
  var username=getCookie("username");
  if (username != "") {
    document.getElementById("dial").innerHTML = "Hello "  ;
    document.getElementById("uname").innerHTML = username;
    document.getElementById("2nds").innerHTML ="! " + "Welcome Back" + "! What Do You Want Me To Do? ";
    document.getElementById("div1").style.display = "none";
    document.getElementById("div2").style.display = "block";

  } else {

  var name = document.getElementById('txt').value;
  var log1 = document.getElementById('div1');
  document.getElementById('div1').style.display = "block";
  }
}
function myFunction(x) {
  var content = document.getElementById('drop').value;
  document.getElementById("drop").classList.toggle("sizeup");

  x.classList.toggle("change");
}
function setCookie(cname,cvalue,exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires=" + d.toGMTString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function ok() {
	var text = document.getElementById("txt").value;
  if (text === "") {
		document.getElementById("dial").innerHTML = "Please Tell Me Your Name! I will not sell it to anyone!";

	}
	else {
  var user = document.getElementById('txt').value;
  setCookie("username", user, 30);
    var username=getCookie("username");
  var thename = text;
	document.getElementById("dial").innerHTML = "Hello "  ;
  document.getElementById("uname").innerHTML = username;
  document.getElementById("2nds").innerHTML ="! " + "I'm Chadnester" + "! What Do You Want Me To Do? ";
  var myna = document.getElementById("uname");
	document.getElementById("div2").style.display = "block";
  document.getElementById("div1").style.display = "none";


}}
function please() {
  var username=getCookie("username");
      var myna = document.getElementById("uname");
      var hello = ["hello!", "hello there!", "hello chadnester!", "hello, chadnester!", "hello there, chadnester!", "hello", "hello there", "hello chadnester", "hello, chadnester", "hello there, chadnester"];
      var hi = ["hi!", "hi there!", "hi chadnester!", "hi, chadnester!", "hi there, chadnester!", "hi", "hi there", "hi chadnester", "hi, chadnester", "hi there, chadnester"];
      var hey = ["hey!", "hey there!", "hey chadnester!", "hey, chadnester!", "hey there, chadnester!", "hey", "hey there", "hey chadnester", "hey, chadnester", "hey there, chadnester"];
      var howru = ["how are you?", "howareyou?", "how ar u?", "how are you today?", "how are y?", "how r u?", "howru?", "are you good?", "r u good?", "areyougood?", "ya good?", "how are you", "how are you today", "howareyou", "how ar u", "how are y", "how r u", "howru", "are you good", "r u good", "areyougood", "ya good"];
      var whoru = ["who are you", "who r u", "whoru", "who ar yu", "who are you?", "who r u?", "whoru?", "who ar yu?"];
      var whoami = ["who am i", "whoami", "say my name", "i forgot my name", "tell me my name", "my name", "my name is who", "do you know who am i", "who am i?", "whoami?", "say my name!", "i forgot my name?", "tell me my name?", "my name?", "my name is who?", "do you know who am i?" ];
      var com = document.getElementById("cmd").value;
	var d = new Date();
	var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
  document.getElementById("cmd").value = "";

	if (com === "") {
		document.getElementById("say").innerHTML = "I Don't Know What You Want Me To Do.";
	}
  else if (com === "Help Me With A Math Problem") {
    document.getElementById("say").innerHTML ="What Is It?";
    document.getElementById("total").innerHTML =" ";
    document.getElementById("calculator").style.display = "block";
  }
  else {
    document.getElementById("total").innerHTML =" ";
  document.getElementById("calculator").style.display = "none";
  if (whoru.includes(com.toLowerCase())) {
		document.getElementById("say").innerHTML = "I am Chadnester!"
	}
	else if (com === "What Specific Time Is It" ) {
		document.getElementById("say").innerHTML ="It's " + d
	}
  else if (whoami.includes(com.toLowerCase())) {
		document.getElementById("say").innerHTML = "Your name is " + username + ", sir.";
	}
	else if (com === "What Day Is Today") {
		document.getElementById("say").innerHTML ="It's " + days[d.getDay()];
	}
	else if (com === "How Many Milliseconds Is Right Now") {
		document.getElementById("say").innerHTML = d.getMilliseconds();
	}
	else if (com === "What Year Is It") {
		document.getElementById("say").innerHTML ="It's" + d.getFullYear();
	}

	else if (com === "What Is 1+1" || com === "What Is 3-1") {
		document.getElementById("say").innerHTML ="That Will Be 2";
	}
	else if (com === "What Does Chadnester Mean" || com === "What Does Chadnester Stands For") {
		document.getElementById("say").innerHTML ="I don't know, my creator didn't tell me.";
	}
	else if (com === "Help Me!") {
		document.getElementById("say").innerHTML= "Help You With What?";
	}
	else if (com === " Give Me, A Random Number") {
		document.getElementById("say").innerHTML= Math.floor(Math.random() * 9999);
	}
  else if (howru.includes(com.toLowerCase())) {
		document.getElementById("say").innerHTML= "Never Felt Bad Before!";
	}
	else if (hello.includes(com.toLowerCase())) {
		document.getElementById("say").innerHTML= "Hi!";
	}
  else if (hi.includes(com.toLowerCase())) {
		document.getElementById("say").innerHTML= "Hello!";
	}
  else if (hey.includes(com.toLowerCase())) {
		document.getElementById("say").innerHTML= "Hey!";
	}
	else if (com === "Howdy") {
		document.getElementById("say").innerHTML= "Ho";
		}
    else {
      document.getElementById("say").innerHTML= "I don't think i understand.";
    }
  }
}
function calc() {
	var num1 = parseFloat(document.getElementById("n1").value);
	var num2 = parseFloat(document.getElementById("n2").value);

	var oper = document.getElementById("oper").value;

					if ( oper === "+") {
            document.getElementById("say").innerHTML= "It is ";
						document.getElementById("total").innerHTML = num1 + num2;
					}
					if ( oper === "-") {
            document.getElementById("say").innerHTML= "It is ";
						document.getElementById("total").innerHTML = num1 - num2;
					}
					if ( oper === "x") {
            document.getElementById("say").innerHTML= "It is ";
						document.getElementById("total").innerHTML = num1 * num2;
					}
					if ( oper === "÷") {
            document.getElementById("say").innerHTML= "It is ";
						document.getElementById("total").innerHTML = num1 / num2;
					}
					if ( oper === "˄") {
            document.getElementById("say").innerHTML= "It is ";
						document.getElementById("total").innerHTML = num1 ** num2;
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
function sme() {
  var muche = document.getElementById("mupache");
  if (muche.classList.contains("jalid")) {
    document.getElementById('morebtn2').style.display = "none";
    document.getElementById('plswait').style.display = "block";
    document.getElementById('morebtn').style.display = "none";
    muche.classList.remove("jalid");
    setTimeout(function(){

        document.getElementById("more2").classList.remove("showmore");

      }, 2000);
      setTimeout(function(){
        document.getElementById('morebtn').style.display = "block";
        document.getElementById('plswait').style.display = "none";
    }, 3000);

  }
  else {
    document.getElementById('morebtn2').style.display = "none";
    document.getElementById('morebtn').style.display = "none";
    document.getElementById('plswait').style.display = "block";
  var muche = document.getElementById("mupache");
  document.getElementById("more2").classList.add("showmore");
  setTimeout(function(){

     muche.classList.add("jalid");}, 1000);

       setTimeout(function(){
         document.getElementById('morebtn2').style.display = "block";
       document.getElementById('plswait').style.display = "none"; }, 2000);
}
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
