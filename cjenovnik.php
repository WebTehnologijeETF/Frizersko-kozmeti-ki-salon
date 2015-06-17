<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
 <title>
 Fizersko-kozmeticki salon Beauty
 </title>
 <link rel="stylesheet" type="text/css" href="stilST.css">
 <META http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
	<?php
session_start();
$veza = new PDO("mysql:dbname=beauty;host=localhost;charset=utf8", "user", "user");
 
     $veza->exec("set names utf8");
if (isset($_SESSION['username']) || isset($_REQUEST['submit'])) {
		 if (isset($_SESSION['username']))
     $username = $_SESSION['username'];
 else {
	 $username = $_REQUEST['username'];
	 $password= $_REQUEST['password'];
     $upit = $veza->query("SELECT k.username, k.password FROM korisnici k WHERE k.username='".$username."' and k.password='".$password."' ");
	 foreach ($upit as $korisnik) {
		 if ($korisnik['username']==$username && $korisnik['password']==$password) {	 
			 $_SESSION['username'] = $username;
		 }
}
if ($username=="admin") {
	 header("location: logovan.php");
	
}
 }
	 
	 print "<div class='prijava' id='prijava'>prijavljeni ste kao ".$username. " !</div>";
	 print("<div class='loginforma' > <form class='loginform action='home.php?actionOut=".$username."'>
	  <input class='submiti' id='out' name='action' type='submit' value='Logout'></form>
	</form>
	</div>");
	  if (isset($_REQUEST['action'])) {
		 session_unset();
		 session_destroy(); 
		 header("location: home.php");
         }
	 }
	 else {
		print("<div class='loginforma' >
	<form class='loginform' action='home.php' method='get'>
    <input id='name' name='username' placeholder='username' type='text'>
     <input id='password' name='password' placeholder='**********' type='password'> <br />
     <input class='submiti' id='in' name='submit' type='submit' value='Login '>
	</form>
	</div>");
	 }
	 
?>
	<div id="vrh">
	</div>
<div id="okvir">

	<div id="zaglavlje">
	
	</div>
	
	
<div class="gornji"></div>	
<div class="meni">
		<div class="naviLinks"><a href="home.php">NOVOSTI</a></div>
    <div class="naviLinks"><a href="cjenovnik.php">CJENOVNIK</a></div>
    <div class="naviLinks"><a href="linkovi.php">LINKOVI</a></div>    
    <div class="naviLinks"><a href="kontakt.php">KONTAKT</a></div>
	<div class="naviLinks"><a href="kursevi.php">KURSEVI</a></div>
	</div>
<div class="dojnji"></div>

		<div id="omot">
		<div id="cjenovnik">
<table style="margin-left:30px; margin-bottom:20px; margin-top:20px;" border="0px" width="100%">
<tr>
 <th align="left">Frizerske usluge</th>
 <th align="left">Cijena (KM)</th>
 </tr>
 <tr></tr>
  <tr></tr>
   <tr></tr>
 <tr>
<td>Pranje kose</td>
<td>5KM</td>
</tr>
<tr>
<td>Muško šišanje</td>
<td>7KM</td>
</tr>
<tr>
<td>Žensko šišanje</td>
<td>10KM</td>
</tr>
<tr>
<td>Feniranje kratka kosa</td>
<td>10KM</td>
</tr>
<tr>
<td>Feniranje duga kosa</td>
<td>20KM</td>
</tr>
<tr>
<td>Šišanje + feniranje kratka kosa</td>
<td>20KM</td>
</tr>
<tr>
<td>Šišanje + feniranje duga kosa</td>
<td>30KM</td>
</tr>
<tr>
<td>Farbanje</td>
<td>45KM</td>
</tr>
<tr>
<td>Pramenovi</td>
<td>50KM</td>
</tr>
<tr>
<td>Minnival</td>
<td>37KM</td>
</tr>
<tr>
<td>Brazilsko feniranje*</td>
<td>100KM</td>
</tr>
<tr>
<td>Svečana frizura</td>
<td>45KM</td>
</tr>
<tr>
<td>Tretman Makadamia</td>
<td>25KM</td>
</tr>
<tr>
<td>Nadogradnja kose (po pramenu)*</td>
<td>6KM</td>
</tr>
<tr>
<td>Skidanje nadogradnje (po pramenu)*</td>
<td>1KM</td>
</tr>
<tr>
 <tr></tr>
  <tr></tr>
   <tr></tr>
 <th align="left">Kozmetičke usluge</th>
 <th align="left">Cijena (KM)</th>
 </tr>
  <tr></tr> <tr></tr> <tr></tr>
<tr>
<td>Šminkanje</td>
<td>25KM</td>
</tr>
<tr>
<td>Higijenski tretman lica</td>
<td>40KM</td>
</tr>
<tr>
<td>Piling masaža i maska</td>
<td>30 KM</td>
</tr>
<tr>
<td>Fotopodmlađivanje sa IPL-om*</td>
<td>80KM</td>
</tr>
<tr>
<td>Depigmentacija cijelo lica sa IPL-om</td>
<td>70KM</td>
</tr>
<tr>
<td>RF Radio Talasni Lifting</td>
<td>100KM</td>
</tr>
<tr>
<td>Dijamantna mikrodermoabrazija</td>
<td>40KM</td>
</tr>
<tr>
<td>Nadogradnja noktiju (gel)</td>
<td>35KM</td>
</tr>
<tr>
<td>Ojačavanje noktiju (ruke, noge)</td>
<td>25KM</td>
</tr>
<tr>
<td>Francuski manikir</td>
<td>10KM</td>
</tr>
<tr>
<td>Spa manikir</td>
<td>25KM</td>
</tr>
<tr>
 <th align="left" rowspan="2">* nova usluga u našim salonima</th>
 </tr> <tr></tr> <tr></tr> <tr></tr>
</table>
</div>	
</div>
</div>
<div id="dno">
</div>
<div id="copyright">
<center>Selma Tucak, 16043</center>
</div>
<script src="Skripta.js"></script>
</body>
</html>


	


