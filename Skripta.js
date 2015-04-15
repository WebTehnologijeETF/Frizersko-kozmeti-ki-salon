function prikazi(){
   document.getElementById("podmeni").style.display="block";
   document.getElementById("podmeni").style.clear="both";
}
 
function sakrij(){
	document.getElementById("podmeni").style.display="none";
	document.getElementById("eror").style.display="none";
	document.getElementById("erormail").style.display="none";
	document.getElementById("erorporuka").style.display="none";
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




