﻿<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
 <title>
 Fizersko-kozmeticki salon Beauty
 </title>
 <link rel="stylesheet" type="text/css" href="stilST.css">
 <META http-equiv="Content-Type" content="text/html; charset=utf-8">
  <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
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
		<div id="kontakt">
		<center><h2>Kontaktirajte nas</h2></center><br>
		<div id="adresa">
		<div id="tekstic">
		Adresa<br/><br/>
		
		Ruđera Boškovića 394<br/>
		71000 Sarajevo<br/>
		BiH
		<br/><br/>
		Telefon:+38733654652<br/>
		Mobitel:+38761568563<br/>
		E-mail: selma@beauty.com<br/>
		Skype: beauty<br/>
		</div>
		<br><br>
		<div id="map" ></div>
		</div>
	
	<form name="mojaForma" id="kontaktForma" method="POST" action= "kontakt.php"> 
									<div class="wrapper">
										<span class="labele">Ime i prezime*</span>
										<input type="text" id="ime" name="ime" class="input" />
										<span class="greske" id="eror"><img src="error.png" alt="er"/>  Unesite ime!</span>
									</div>
							
	
									<div class="wrapper">
						     
										<span class="labele">E-mail:*</span>
										<input type="text" id="email" name="email" class="input" />	
										<span class="greske" id="erormail"><img src="error.png" alt="er"/>  Neispravan E-mail!</span>						
									</div>
									
									<div class="wrapper">
							
										<span class="labele">Predmet</span>
										<input type="text" id="predmet" name="predmet" class="input" />			
									</div>
										<br> <br>
								
									<div class="textarea_box">
										<span class="labele">Poruka*</span>
										<span class="greske" id="erorporuka"><img src="error.png" alt="er"/>  Unesite poruku!</span>
										<textarea name="textarea" id="poruka" cols="1" rows="1"></textarea>								
									</div>
			            <button onclick="validacija();">Pošalji</button>
							    
							</form>


</div>

		
			</div>

</div>

  

<div id="dno">
</div>
<div id="copyright">
<center>Selma Tucak, 16043</center>
</div>
<script src="mapa.js"></script>
<script src="Skripta.js"></script>
</body>
</html>


	





