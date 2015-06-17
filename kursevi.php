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
	<div class="naviLinks"><a href="kontakt.php">KURSEVI</a></div>
	</div>
<div class="dojnji"></div>


		
		<div id="omot">
		<div id="kursevi">
		<div id="kursprvi">
	<strong>- GRUPNA OBUKA ZA PROFESIONALNOG VIZAŽISTU - </strong>
	<br></br>
	Priključite se školi šminkanja i naučite sve što je potrebno za profesionalnog vizažistu.
	Nakon uspješno završene obuke stičete certifikat.
	Obuka se održava u našim salonima. Prijave za obuku traju do 30.4.2015. <br/>
	Za prijavu, kontaktirajte na tel: 033/72 74 27.
	</div>
	<div id ="slikajedan">
	</div>
	<div id="kursdrugi">
	<strong> - KURS ZA NADOGRADNJU NOKTIJU -  </strong>
    <br></br>
    Na kursu za nadogradnju noktiju možete naučiti sljedeće stvari: standardnu nadogradnju noktiju, izlivanje noktiju,
    trajni frenč, gel lak tahinku, te korekciju za sve tehnike. Prijave traju do 12. 5. 2015. <br/>
    Za dodatne informacije konktaktirajte nas na tel: 033/72 74 27.
	</div>
	<div id="slikadva">
	</div>
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


	


