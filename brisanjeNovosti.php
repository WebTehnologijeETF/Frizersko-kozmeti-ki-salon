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
	 $rezultat = $veza->query("select id, naslov, tekst, slika, vise, UNIX_TIMESTAMP(datum) datum2, autor from novosti order by datum desc");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	 if (isset($_GET['id'])) {
		 $novid=$_REQUEST['id'];
		 $brisanje= $veza->query("DELETE FROM novosti WHERE id='".$novid."'");
		 header("location: brisanjeNovosti.php");
		     
	 }
	foreach ($rezultat as $novost) {
		
		 print ("<div id = 'glavni'>
			 <img src ='".htmlentities($novost['slika'], ENT_QUOTES)."' height:'200' width:'750' />
			 <h3>".htmlentities($novost['naslov'], ENT_QUOTES)."</h3>
			 <p> ".$novost['tekst']."<a style='color: blue;'></a></p>
			 <p style='color: pink;'>".$novost['datum2']." | by ".htmlentities($novost['autor'], ENT_QUOTES)."</p></div> ");
		  if ($novost['vise']!=null) {
			 print ("<p style='color: red;'>
			 <a class='linkzavise' href=home.php?vise=".$novost['vise'].">Vise</a>
			 </p><br/>");
			 
		  }
		   print ("<a href='http://localhost/projekat/brisanjeNovosti.php?id=".$novost['id']."'> Briši </a>");
		
		  
	}
		
		
		
		?>
</div>
	
</div>
<script src="Skripta.js"></script>
</body>
</html>

