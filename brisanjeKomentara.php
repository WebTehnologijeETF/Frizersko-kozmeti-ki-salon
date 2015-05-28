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
		<div class="naviLinks" onmouseover="prikazi()" onmouseout="sakrij()"><a href="dodajNovost.php">NOVOSTI</a>
		<ul id="podmeni" onmouseover="prikazi()">
									<li><a href="dodajNovost.php">Dodavanje</a></li>
									<li><a href="promijeniNovost.php">Promjena</a></li>
									<li><a href="brisanjeNovosti.php">Brisanje</a></li>
								</ul>
								</div>
    <div class="naviLinks"><a href="brisanjeKomentara.php">BRISANJE KOMENTARA</a></div>
	<div class="naviLinks"><a href="dodavanjeKorisnika.php">DODAVANJE KORISNIKA</a></div>
	<div class="naviLinks"><a href="brisanjeKorisnika.php">BRISANJE KORISNIKA</a></div>
	<div class="naviLinks"><a href="promjenaKorisnika.php">PROMJENA KORISNIKA</a></div>
	

	
								</div>
							

<div id="glavni">

<?php
 $veza = new PDO("mysql:dbname=beauty;host=localhost;charset=utf8", "user", "user");
 $veza->exec("set names utf8");
	 
	  if (isset($_GET['id'])) {
		 $novid=$_GET['id'];
		 $brisanje= $veza->query("DELETE FROM komentari WHERE id='".$novid."'");
		  header("location: brisanjeKomentara.php");
		     
	 }
	    $rezultat = $veza->query("select id, autor, tekst, UNIX_TIMESTAMP(datum) datum2, email from komentari order by datum desc");
	    foreach ($rezultat as $komentar) {
		 print ("<div id = 'glavni'><br/>
		 <h3>".$komentar['id']."</h3>
			 <p> ".$komentar['tekst']."<a style='color: blue;'></a></p>
			 <p style='color: pink;'>".$komentar['datum2']." | by ".htmlentities($komentar['autor'], ENT_QUOTES)."</p>
			 <p>".htmlentities($komentar['email'], ENT_QUOTES)."</p></div>");
	     print ("<a href='http://localhost/projekat/brisanjeKomentara.php?id=".$komentar['id']."'> Briši </a>");
		 } 
		
		
		
		?>
</div>
	
</div>

<script src="Skripta.js"></script>
</body>
</html>

