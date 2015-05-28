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
	
	
<div id="okvir">
	<div id="zaglavlje">
	
	
	</div>
	
	
<div class="meni">
		<div class="naviLinks"><a href="home.php">NOVOSTI</a></div>
    <div class="naviLinks"><a href="cjenovnik.php">CJENOVNIK</a></div>
    <div class="naviLinks"><a href="linkovi.php">LINKOVI</a></div>    
    <div class="naviLinks"><a href="kontakt.php">KONTAKT</a></div>
    <div class="naviLinks" id="kursevi" onmouseover="prikazi()" onmouseout="sakrij()"><a href="kursevi.php">KURSEVI</a>
  
  							<ul id="podmeni" onmouseover="prikazi()">
									<li><a href="kursevi.php">Frizerski</a></li>
									<li><a href="kursevi.php">Kozmetički</a></li>
									<li><a href="kursevi.php">MakeUp</a></li>
								</ul>
							</div>
	</div>

<div id="glavni">

<?php
session_start();
$veza = new PDO("mysql:dbname=beauty;host=localhost;charset=utf8", "user", "user");
      $veza->exec("set names utf8");
     $rezultat = $veza->query("select id, naslov, tekst, slika, vise, UNIX_TIMESTAMP(datum) datum2, autor from novosti order by datum desc");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	 
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
	<label class='labelelogin' id='user'>UserName :</label>
    <input id='name' name='username' placeholder='username' type='text'>
     <label class='labelelogin' id='pas'>Password :</label>
     <input id='password' name='password' placeholder='**********' type='password'> <br />
     <input class='submiti' id='in' name='submit' type='submit' value='Login '>
	</form>
	</div>");
   
	 }
	 		  
	
	  	
		?>
		
		<div id="kursprvi">
	- GRUPNA OBUKA ZA PROFESIONALNOG VIZAŽISTU - 
	<br></br>
	Priključite se školi šminkanja i naučite sve što je potrebno za profesionalnog vizažistu.
	Nakon uspješno završene obuke stičete certifikat.
	Obuka se održava u našim salonima. Prijave za obuku traju do 30.4.2015.
	Za prijavu, kontaktirajte na tel: 033/72 74 27.
	</div>
	<div id ="slikajedan">
	</div>
	<div id="kursdrugi">
	- KURS ZA NADOGRADNJU NOKTIJU - 
    <br></br>
    Na kursu za nadogradnju noktiju možete naučiti sljedeće stvari: standardnu nadogradnju noktiju, izlivanje noktiju,
    trajni frenč, gel lak tahinku, te korekciju za sve tehnike. Prijave traju do 12. 5. 2015.
    Za dodatne informacije konktaktirajte nas na tel: 033/72 74 27.
	</div>
	<div id="slikadva">
	</div>
	</div>
</div>

</div>
<script src="Skripta.js"></script>
</body>
</html>


	


