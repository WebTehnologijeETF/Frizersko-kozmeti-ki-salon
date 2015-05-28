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
session_start();
 $veza = new PDO("mysql:dbname=beauty;host=localhost;charset=utf8", "user", "user");
    $veza->exec("set names utf8");
	
	 $rezultat = $veza->query("select username, password from korisnici");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	 if (isset($_GET['username'])) {
		 $novid=$_GET['username'];
		 print("<form id='komentarforma' method='get'>

        <p> <h1>Dodavanje korisnika: </h1> <br />
	    <div class='wrapper'>
	    <label class='labele'>Username:</label>
	    <input type='text' name='username'>
	    </div>
	    <div class='wrapper'>
	    <label class='labele'>Password</label>
	    <input type='text' name='password'> 
	     </div>
		 <input type='submit' name='promjeni' value='Promijeni'>
	     </p>
       </form>");
	   

	if(isset($_REQUEST['promjeni'])) {
		 $rezultat = $veza->query("select username, password from korisnici where username='".$novid."'");
       $noviusername=$_REQUEST['username'];
		$novipassword=$_REQUEST['password'];
		foreach($rezultat as $novost) {
			if(isset($_REQUEST['username'])){
				$noviusername=$_REQUEST['username'];
			}
			else {
				$noviusername=$novost['username'];
			}
		    if(isset($_REQUEST['password'])){
			
				$novipassword=$_REQUEST['password]'];
			}
			else  {
				$novipassword=$novost['password'];
			}
		$noviKomentar= $veza->query("UPDATE korisnici SET username='".$novipassword."' password='".$novipassword."' where username='".$novid."'");
		 
	}	
		     
	 }
	
	 }
	foreach ($rezultat as $novost) {
		 print ("<div id = 'glavni'>
			 <small> ".$novost['username']."</small>
			 <small> ".$novost['password']."</small>
			 </div><br/><br/>");
			 
			
		print(" <a href='http://localhost/projekat/promjenaKorisnika.php?username=".$novost['username']."'> Promijeni </a>");
			
	}
		
		
		
		?>
</div>
	
</div>

<script src="Skripta.js"></script>
</body>
</html>

