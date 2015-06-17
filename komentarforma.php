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
	 
	  $rezultat = $veza->query("select id, naslov, tekst, slika, vise, UNIX_TIMESTAMP(datum) datum2, autor from novosti order by datum desc");
	  
	 
		  foreach ($rezultat as $novost) {
	      if ($novost['vise']!=null) {
	       print ("<div id = 'glavni'>
			 <center><img src ='".htmlentities($novost['slika'], ENT_QUOTES)."' height:'200' width:'750' /></center>
			 <h3>".htmlentities($novost['naslov'], ENT_QUOTES)."</h3>
			 <p> ".$novost['tekst']."<a style='color: blue;'></a></p>
			 <p> ".$novost['vise']."<a style='color: blue;'></a></p>
			 <p style='color: pink;'>".$novost['datum2']." | by ".htmlentities($novost['autor'], ENT_QUOTES)."
			 </p></div> ");
		  }
		 
		  
	  }
	  
	  
	 if (isset($_REQUEST['coment'])) {
		 $_SESSION['id']=$_REQUEST['coment'];
		  $rezultat = $veza->query("select id, autor, tekst, UNIX_TIMESTAMP(datum) datum2, email from komentari where novost=".$_REQUEST['coment']." order by datum desc");
	 foreach ($rezultat as $komentar) {
		 print ("<div id = 'komentarisanje'>
		 <h3>".$komentar['id']."</h3>
			 <p> ".$komentar['tekst']."<a style='color: blue;'></a></p>
			 <p style='color: pink;'>".$komentar['datum2']." | by ".htmlentities($komentar['autor'], ENT_QUOTES)."</p>
			 <p>".htmlentities($komentar['email'], ENT_QUOTES)."</p></div>");
	 } 
	 }
		 
	
 if (isset ( $_REQUEST['comment'])) {
			$novicoment=$_REQUEST['comment'];
			$noviautor=$_GET['autora'];
			$noviemail=$_GET['emaila'];
			$novid=$_SESSION['id'];
			$noviKomentar= $veza->query("INSERT INTO komentari SET id='',novost='".$novid."', tekst='".$novicoment."', autor='".$noviautor."', email='".$noviemail."' ");
			 header("location: komentarforma.php?coment=".$_SESSION['id']."");
			if (!$noviKomentar) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
		 }
		 
		 print ("<div id='omotac'>
   <form id='komentarforma' action='komentarforma.php?coment' method='get'>
 <input type='text' name='autora' placeholder='Ime...'> <br><br>
	 
	   <input type='text'  name='emaila' placeholder='Email...'> <br><br>

	  <textarea name='textarea' id='poruka' placeholder='Unesite komentar...' cols='50' rows='4'></textarea><br>	<br>
	 
      <input class='dugme' type='submit' value='Komentariši'>
	 
    </form>	
	 </div>");
		
		
	
    ?>

	




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