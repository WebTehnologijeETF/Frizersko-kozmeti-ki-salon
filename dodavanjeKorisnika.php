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
	 $noviusername=$_REQUEST['username'];
			$novipassword=$_GET['password'];
			
			$noviKomentar= $veza->query("INSERT INTO korisnici SET username='".$noviusername."', password='".$novipassword."'");
		    if (!$noviKomentar) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
		 }
	

	 	
	  


		?>
</div>
<form id="komentarforma" action="dodavanjeKorisnika.php" method="get">

      <p> <h1>Dodavanje korisnika: </h1> <br />
	  <div class="wrapper">
	  <label class="labele">Username:</label>
	  <input type="text" name="username">
	  </div>
	  <div class="wrapper">
	  <label class="labele">Password</label>
	  <input type="text" name="password"> 
	  </div>
      <input class="dugme" type="submit" name="dodaj" value="Dodaj">
	  </p>
    </form>	
</div>
<script src="Skripta.js"></script>
</body>
</html>

