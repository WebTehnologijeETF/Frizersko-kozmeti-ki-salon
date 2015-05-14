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

//funkcija za provjeru Blank Space
function provjeriSpace(id) {
var flag=0;
       var strText=id.value;
       var strArr = new Array();
  
       strArr = strText.split("");

       if(strArr[0]==" ")
       flag=1;
       
       if (flag==1) return true;
       else return false; 

}

function validacija() {

var ret=true;

//validacija imena
if(ime.value=="") {
document.getElementById("eror").style.display="inline";
document.getElementById("eror").style.visibility="visible";
ret=false;
}
else if(ime.value!="")
{
       
       if (provjeriSpace(ime))
        {
       document.getElementById("eror").style.display="inline";
document.getElementById("eror").style.visibility="visible";
ret=false;
       }
       else if (!provjeriSpace(ime))
document.getElementById("eror").style.display="none";
}


//validacija opstine
if(opstina.value=="") {
document.getElementById("eroropstina").style.display="inline";
document.getElementById("eroropstina").style.visibility="visible";
ret=false;
}
else
{
document.getElementById("eroropstina").style.display="none";
}


//validacija mjesta
if(mjesto.value=="") {
document.getElementById("erormjesto").style.display="inline";
document.getElementById("erormjesto").style.visibility="visible";
ret=false;
}
else
{
document.getElementById("erormjesto").style.display="none";
}

ajaxValidacija();

//validacija poruke
if(poruka.value=="") {
document.getElementById("erorporuka").style.display="inline";
document.getElementById("erorporuka").style.visibility="visible";
ret=false;
}
else if(poruka.value!="")
{
  
       if (provjeriSpace(poruka)) {
       document.getElementById("erorporuka").style.display="inline";
document.getElementById("erorporuka").style.visibility="visible";
ret=false;
       }
else
{
document.getElementById("erorporuka").style.display="none";
}
}

//validacija maila
 var re = /(\w+)@((\w+).){2}.(\w+){2}/i;
if (!re.test(email) || email.value=="") {
        document.getElementById("erormail").style.display="inline";
        document.getElementById("erormail").style.visibility="visible";
        ret = false;
    } 
    else if (re.test(email)) {
    document.getElementById("erormail").style.display="none";
    }
    

return ret;
}




//ajax ucitavanje stranica
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


//ajax validacija
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





