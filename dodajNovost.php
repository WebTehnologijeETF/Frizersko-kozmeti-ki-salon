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
     	
 if (isset ( $_REQUEST['dodaj'])) {
	 $novinaziv=$_REQUEST['naslov'];
			$noviautor=$_GET['autora'];
			$novitekst=$_GET['tekst'];
			$novivise=$_GET['vise'];
			$novaslika=(string)$_GET['slika'];
			
			$noviKomentar= $veza->query("INSERT INTO novosti SET id='',naziv='".$novinaziv."', tekst='".$novitekst."', autor='".$noviautor."', vise='".$novivise."' slika='".$novaslika."' ");
		    if (!$noviKomentar) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
		 }
	

	 	
	  


		?>
</div>
<form id="komentarforma" action="dodajNovost.php" method="get">

      <p> <h1>Dodavanje novosti: </h1> <br />
	  <div class="wrapper">
	  <label class="labele">Naslov:</label>
	  <input type="text" name="naslov">
	  </div>
	  <div class="wrapper">
	  <label class="labele">Autor</label>
	  <input type="text" name="autora"> 
	  </div>
	  <div class="wrapper">
	  <label class="labele" id="tekstlabela">Tekst</label>
	   <input type="text"  name="tekst"> 
	  </div>
	   <div class="wrapper">
	  <label class="labele">Vise</label>
	   <input type="text"  name="vise"> 
	  </div>
	  <div class="wrapper">
	  <label class="labele">URL slike</label>
	   <input type="url" name="slika">
	  </div>
      <input class="dugme" type="submit" name="dodaj" value="Dodaj">
	  </p>
    </form>	
</div>
<script src="Skripta.js"></script>
</body>
</html>

