<<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
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





<div id="omot" style="padding-bottom:10px; padding-top:10px; height:1600px;">


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
		<div id="natrag"><a href="logovan.php">Natrag na admin panel</a></div>
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

