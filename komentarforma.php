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
		<div class="naviLinks"><a href="home.php">NOVOSTI</a></div>
    <div class="naviLinks"><a href="cjenovnik.html">CJENOVNIK</a></div>
    <div class="naviLinks"><a href="linkovi.html">LINKOVI</a></div>    
    <div class="naviLinks"><a href="kontakt.php">KONTAKT</a></div>
    <div class="naviLinks" id="kursevi" onmouseover="prikazi()" onmouseout="sakrij()"><a href="kursevi.html">KURSEVI</a>
  
  							<ul id="podmeni" onmouseover="prikazi()">
									<li><a href="kursevi.html#kursprvi">Frizerski</a></li>
									<li><a href="kursevi.html#kursdrugi">Kozmetički</a></li>
									<li><a href="kursevi.html">MakeUp</a></li>
								</ul>
							</div>
	</div>

<div id="glavni">

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
	<label class='labelelogin' id='user'>UserName :</label>
    <input id='name' name='username' placeholder='username' type='text'>
     <label class='labelelogin' id='pas'>Password :</label>
     <input id='password' name='password' placeholder='**********' type='password'> <br />
     <input class='submiti' id='in' name='submit' type='submit' value='Login '>
	</form>
	</div>");
   
	 }
	
	 if (isset($_REQUEST['coment'])) {
		 $_SESSION['id']=$_REQUEST['coment'];
		  $rezultat = $veza->query("select id, autor, tekst, UNIX_TIMESTAMP(datum) datum2, email from komentari order by datum desc");
	 foreach ($rezultat as $komentar) {
		 print ("<div id = 'glavni'>
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
		    if (!$noviKomentar) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
		 }
		
		
	
    ?>

	




   
<form id="komentarforma" action="komentarforma.php" method="get">

      <p> <h1>Ostavite komentar: </h1> <br />
	  <div class="wrapper">
	  <label class="labele">Komentar:</label>
	  <input type="text" name="comment">
	  </div>
	  <div class="wrapper">
	  <label class="labele">Autor</label>
	  <input type="text" name="autora"> 
	  </div>
	  <div class="wrapper">
	  <label class="labele">Email</label>
	   <input type="text"  name="emaila"> 
	  </div>
  <div class="wrapper">
      <input class="dugme" type="submit" value="Komentariši">
	    <div class="wrapper">
	  </p>
    </form>	

	
</div>
  </body>
</html>

</div>
<script src="Skripta.js"></script>
</body>
</html>