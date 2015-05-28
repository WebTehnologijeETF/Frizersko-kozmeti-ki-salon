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
		print("
		<form id='komentarforma' action='promijeniNovost.php' method='get'>
      <p> <h1>Dodavanje novosti: </h1> <br />
	  <div class='wrapper'>
	  <label class='labele'>Naslov:</label>
	  <input type='text' name='naslov'>
	  </div>
	  <div class='wrapper'>
	  <label class='labele'>Autor</label>
	  <input type='text' name='autora'> 
	  </div>
	  <div class='wrapper'>
	  <label class='labele'>Tekst</label>
	   <input type='text'  name='tekst'> 
	  </div>
	   <div class='wrapper'>
	  <label class='labele'>Vise</label>
	   <input type='text'  name='vise'> 
	  </div>
	  <div class='wrapper'>
	  <label class='labele'>URL slike</label>
	   <input type='text' name='slika'> 
	  </div>
		<input type='submit' name='promjeni' value='Promijeni'>
	  </p>
    </form>	");
    if(isset($_REQUEST['promjeni'])) {
	 $rezultat = $veza->query("select  naslov, tekst, slika, vise, autor from novosti WHERE id='".$novid."'");
        
		$novinaslov=$_REQUEST['naslov'];
		$novitekst=$_REQUEST['tekst'];
		$novaslika=$_REQUEST['slika'];
		$novivise=$_REQUEST['vise'];
		foreach($rezultat as $novost) {
			if(isset($_REQUEST['autora'])) { 
			$noviautor=$_REQUEST['autora'];
			}
			else {
				$noviautor=$novost['autor'];

			}
			if(isset($_REQUEST['naslov'])) { 
			$novinaslov=$_REQUEST['naslov'];
			}
			else {
				$novinaslov=$novost['naslov'];
			}
			if(isset($_REQUEST['tekst'])) { 
			$novitekst=$_REQUEST['tekst'];
			}
			else {
				$novitekst=$novost['tekst'];
			}
			if(isset($_REQUEST['slika'])) { 
			$novaslika=$_REQUEST['slika'];
			}
			else {
				$novaslika=$novost['slika'];
			}
			if(isset($_REQUEST['vise'])) { 
			$novivise=$_REQUEST['vise'];
			}
			else {
				$novivise=$novost['vise'];
			}
		}
		echo($novinaslov);
		$noviKomentar= $veza->query("UPDATE novosti SET naziv='".$novinaziv."', tekst='".$novitekst."', autor='".$noviautor."', vise='".$novivise."' slika='".$novaslika."' where id='".$novid."'");
		 
	}	
	     
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
		print( "<a href='http://localhost/projekat/promijeniNovost.php?id=".$novost['id']."'> Promijeni </a>");
			
	}
		
		?>
</div>
	
</div>

<script src="Skripta.js"></script>
</body>
</html>

