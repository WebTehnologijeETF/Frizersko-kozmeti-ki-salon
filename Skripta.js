function prikazi(){
   document.getElementById("podmeni").style.display="block";
   document.getElementById("podmeni").style.clear="both";
}
 
function sakrij(){
	document.getElementById("podmeni").style.display="none";
	document.getElementById("eror").style.display="none";
	document.getElementById("erormail").style.display="none";
	document.getElementById("erorporuka").style.display="none";
	document.getElementById("eroropstina").style.display="none";
	document.getElementById("erormjesto").style.display="none";
}
function validacija() {
var mailRegEx = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

var ret=true;
if(ime.value=="") {
document.getElementById("eror").style.display="inline";
document.getElementById("eror").style.visibility="visible";
ret=false;
}
else
{
document.getElementById("eror").style.display="none";
}

if(opstina.value=="") {
document.getElementById("eroropstina").style.display="inline";
document.getElementById("eroropstina").style.visibility="visible";
ret=false;
}
else
{
document.getElementById("eroropstina").style.display="none";
}

if(mjesto.value=="") {
document.getElementById("erormjesto").style.display="inline";
document.getElementById("erormjesto").style.visibility="visible";
ret=false;
}
else
{
document.getElementById("erormjesto").style.display="none";
}

if(poruka.value=="") {
document.getElementById("erorporuka").style.display="inline";
document.getElementById("erorporuka").style.visibility="visible";
ret=false;
}
else
{
document.getElementById("erorporuka").style.display="none";
}

 var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;


if (re.test(email) == false || email.value=="") {
        document.getElementById("erormail").style.display="inline";
        ret = false;
    }
    
	
return ret;


}





function ucitaj(id) {
   var xhr = new XMLHttpRequest();
	xhr.onload = function () {
		var html = this.responseText;
		var glavni = document.getElementById("glavni");
		glavni.innerHTML = html;
	};
	xhr.open("get", id + ".html", true);
	xhr.send();
}



var usjpesno=false;

function ajaxValidacija() {
    var o = document.getElementById("opstina");
var m = document.getElementById("mjesto");

var ajax = new XMLHttpRequest();

    
	ajax.onreadystatechange = function() {// Anonimna funkcija
		if (ajax.readyState == 4 && ajax.status == 200) {
		var obj = JSON.parse(ajax.responseText);
			if(Object.keys(obj)[0] == "ok"){
				document.getElementById("eroropstina").style.display="none";
	document.getElementById("erormjesto").style.display="none";
                uspjesno=true;
                
			}		

		else if (Object.keys(obj)[0] == "greska") {
		document.getElementById("eroropstina").style.display="inline";
document.getElementById("eroropstina").style.visibility="visible";
			document.getElementById("erormjesto").style.display="inline";
document.getElementById("erormjesto").style.visibility="visible";
uspjesno=false;
			}
			else{
				document.getElementById("eroropstina").style.display="inline";
document.getElementById("eroropstina").style.visibility="visible";
			document.getElementById("erormjesto").style.display="inline";
document.getElementById("erormjesto").style.visibility="visible";
uspjesno=false;
			}
		
			}
	}
	ajax.open("GET", "http://zamger.etf.unsa.ba/wt/mjesto_opcina.php?opcina="+o.value+"&mjesto="+m.value, true);
	ajax.send();

}





