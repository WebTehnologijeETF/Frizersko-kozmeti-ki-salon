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
	 
	 print ("<div class='prijava' id='prijava'>prijavljeni ste kao ".$username. " !</div>");
	 print("<div class='loginforma' > <form class='loginform action='home.php?actionOut=".$username."'>
	  <input class='logout' id='out' name='action' type='submit' value='Logout'></form>
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





<div id="omot" style="padding-bottom:10px;">
<div style="margin-bottom:10px;"></div>

<?php

$veza = new PDO("mysql:dbname=beauty;host=localhost;charset=utf8", "user", "user");
 
     $veza->exec("set names utf8");
     $rezultat = $veza->query("select n.id, n.naslov, n.tekst, n.slika, n.vise, UNIX_TIMESTAMP(n.datum) datum2, n.autor from novosti n order by n.datum desc ");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	 
	 
	 	
	 
	  if( isset($_GET ['vise'])) {
		  $rezultat = $veza->query("select id, naslov, tekst, slika, vise, UNIX_TIMESTAMP(datum) datum2, autor from novosti order by datum desc");
          foreach ($rezultat as $novost) {
	      if ($novost['vise']!=null) {
	       print ("<div id = 'glavni'>
			 <img src ='".htmlentities($novost['slika'], ENT_QUOTES)."' height:'200' width:'750' />
			 <h3>".htmlentities($novost['naslov'], ENT_QUOTES)."</h3>
			 <p> ".$novost['tekst']."<a style='color: blue;'></a></p>
			 <p> ".$novost['vise']."<a style='color: blue;'></a></p>
			 <p style='color: pink;'>".$novost['datum2']." | by ".htmlentities($novost['autor'], ENT_QUOTES)."
			 </p></div> ");
		}
			  print("<div id='komentari'>
		     <img src ='https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSVxMmlJLFDMhOEBxxpf2lzR9_AuOViDd64nklcUtEqCbwFP3Ys' height:'20' width:'20' /> 
			 <a href='http://localhost/projekat/komentarforma.php?coment=".$novost['id']."'> Komentariši novost</a>
			 </div>");
			 $_SESSION['id'] = $novost['id'];
		 }
	 }
	  
	
	  

     foreach ($rezultat as $novost) {
		
		 if ($novost['vise']==null) {
		 print ("<div id = 'glavni'>
			 <center><img src ='".htmlentities($novost['slika'], ENT_QUOTES)."' height:'200' width:'750' /></center>
			 <h3>".htmlentities($novost['naslov'], ENT_QUOTES)."</h3>
			 <p> ".$novost['tekst']."<a style='color: blue;'></a></p>
			 </p>
			 <p style='color: black;'>".$novost['datum2']." | by ".htmlentities($novost['autor'], ENT_QUOTES)."<br/>
			  <a style='color:black;' href='http://localhost/projekat/komentarforma.php?coment=".$novost['id']."'>Komentariši novost</a><br/>
			 </p></div>");
		 }
		 else if ($novost['vise']!=null) {
			print ("<div id = 'glavni'>
			 <center><img src ='".htmlentities($novost['slika'], ENT_QUOTES)."' height:'200' width:'750' /></center>
			 <h3>".htmlentities($novost['naslov'], ENT_QUOTES)."</h3>
			 <p> ".$novost['tekst']."<a style='color: blue;'></a></p>
			 <a class='linkzavise' href=home.php?vise=".$novost['vise'].">Pogledajte više</a>
			 </p>
			 <p style='color: black;'>".$novost['datum2']." | by ".htmlentities($novost['autor'], ENT_QUOTES)."<br/>
			  <a style='color:black;' href='http://localhost/projekat/komentarforma.php?coment=".$novost['id']."'>Komentariši novost</a><br/>
			  </p></div> ");
			 
		  }
		
			 $_SESSION['id'] = $novost['id'];
		 } 	
		?>
		
		<div id="glavni">
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

