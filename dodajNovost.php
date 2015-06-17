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
$veza = new PDO("mysql:dbname=beauty;host=localhost;charset=utf8", "user", "user");
 
     $veza->exec("set names utf8");
	 

	  if (isset($_REQUEST['action'])) {
		 session_unset();
		 session_destroy(); 
		 header("location: home.php");
         }
	 
	
		
	 print("<div class='loginforma' > <form class='loginform action='logovan.php'>
	  <input class='logout' id='out' name='action' type='submit' value='Logout'></form>
	</form>
	</div>");
	
	 
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





<div id="omot" style="padding-bottom:10px; height:600px;">

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
<form id="komentarforma" action="dodajNovost.php" method="get">

      <p> <center><h1>Dodavanje novosti: </h1> <br /></center>
	 
	  <input type="text" name="naslov" placeholder="Naslov...">
	<br/>
<br/>	
	<input type="text" name="autora" placeholder='Autor...'> 
	 <br/>
	 <br/>
	 <textarea name='tekst' id='tekst' placeholder='Unesite tekst...' cols='30' rows='8'></textarea>
	   <br/>
	  <br/>
	  <textarea name='vise' id='vise' placeholder='Vise...' cols='30' rows='8'></textarea>
	  <br/>
	  <br/>
	   <input type="url" name="slika" placeholder="URL slike...">
	  <br/>
	  <br/>
      <input class="dugme" type="submit" name="dodaj" value="Dodaj">
	 
	  </p>
	
    </form>	
	<div id="natrag" style="padding-top:330px;"><a href="logovan.php">Natrag na admin panel</a></div>
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

