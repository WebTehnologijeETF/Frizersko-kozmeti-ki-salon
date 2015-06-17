function prikazi(){
   document.getElementById("podmeni").style.display="block";
   document.getElementById("podmeni").style.clear="both";
 
}
function prikazinovi(){
  
   document.getElementById("podmenii").style.visibility="visible";
   document.getElementById("podmenii").style.clear="both";
}
 
 
function sakrij(){
	document.getElementById("podmeni").style.display="none";
	document.getElementById("podmenii").style.display="none";
	document.getElementById("eror").style.display="none";
	document.getElementById("erormail").style.display="none";
	document.getElementById("erorporuka").style.display="none";
	document.getElementById("eroropstina").style.display="none";
	document.getElementById("erormjesto").style.display="none";
}
function sakrijnovi(){
	document.getElementById("podmenii").style.display="none";
	
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
	
	if (ret) {
    var link = "mailto:selma.tucak@gmail"
             + "?cc=vljubovic@etf.unsa.ba"
             + "&subject=" + escape(document.getElementById('predmet').value)
             + "&body=" + escape(document.getElementById('poruka').value)
    ;

    window.location.href = link;
	alert("Hvala što ste nas kontaktirali!");
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






