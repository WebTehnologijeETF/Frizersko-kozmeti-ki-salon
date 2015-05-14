<!DOCTYPE HTML>
<html>
<head>

 <title>
 Fizersko-kozmeticki salon Beauty
 </title>
 <link rel="stylesheet" type="text/css" href="stilST.css">
 <META http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body onload="sakrij()">

<?php

$nameErr = $emailErr = "";
$name = $email =  "";
$correct=true;
if(isset($_POST['Button'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["ime"])) {
     $nameErr = "Morate unijeti ime";
     $correct=false;
   } else {
     $name = test_input($_POST["ime"]);
    
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Neispravan unos imena"; 
       $correct=false;
     }
   }
   
   if (empty($_POST["email"])) {
     $emailErr = "Neispravan email";
     $correct=false;
   } else {
     $email = test_input($_POST["email"]);
     
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Neispravan email";
       $correct=false; 
     }
   }
   }

   function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
   }
}
 ?>

<div id="okvir">
	<div id="zaglavlje">
	</div>
<div class="meni">
                        
		<div class="naviLinks"><a href="home.php">NOVOSTI</a></div>
    <div class="naviLinks"><a href="cjenovnik.html">CJENOVNIK</a></div>
    <div class="naviLinks"><a href="linkovi.html">LINKOVI</a></div>    
    <div class="naviLinks"><a href="kontakt.php">KONTAKT</a></div>
    <div class="naviLinks" id="kursevi" onmouseover="prikazi()" onmouseout="sakrij()"><a onclick="ucitaj('kursevi')">KURSEVI</a>
  
  							<ul id="podmeni" onmouseover="prikazi()">
									<li><a href="kursevi.html#kursprvi">Frizerski</a></li>
									<li><a href="kursevi.html#kursdrugi">Kozmetički</a></li>
									<li><a href="kursevi.html">MakeUp</a></li>
								</ul>
							</div>
	</div>
	<div id="kontakt">
	<form name="mojaForma" id="kontaktForma" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<h1>Kontakt</h1>
									<div class="wrapper">
										<span class="labele">Ime i prezime*</span>
										<input type="text" id="ime" name="ime" class="input" >
										<span class="greske" id="eror">* <?php echo $nameErr;?></span>
									</div>
									<div class="wrapper">
	
		
										<span class="labele">Opština*</span>
										<input type="text" id="opstina" name="opstina" class="input" onKeyUp="ajaxValidacija();" onBlur="ajaxValidacija();" />
										<span class="greske" id="eroropstina"><img src="error.png" alt="er"/>  Mjesto i opština se ne slažu!</span>
									</div>
									<div class="wrapper">
								
								
										<span class="labele">Mjesto*</span>
										<input type="text" id="mjesto" name="mjesto" class="input" onKeyUp="ajaxValidacija();" onBlur="ajaxValidacija();" />
										<span class="greske" id="erormjesto"><img src="error.png" alt="er"/>  Mjesto i opština se ne slažu!</span>
									</div>
									<div class="wrapper">
						       <br> <br>
										<span class="labele">E-mail:*</span>
										<input type="text" id="email" name="email" class="input" >	
										<span class="greske" id="erormail"> * <?php echo $emailErr;?></span>						
									</div>
										<br> <br>
									<div class="wrapper">
									<br><br>
										<span class="labele">Predmet</span>
										<input type="text" id="predmet" name="predmet" class="input" >			
									</div>
										<br> <br>
										<br><br>
									<div class="textarea_box">
										<span class="labele">Poruka*</span>
										<span class="greske" id="erorporuka"><img src="error.png" alt="er">  Unesite poruku!</span>
										<textarea name="textarea" id="poruka" cols="1" rows="1"></textarea>								
									</div>
			            <button id="Button">Pošalji</button>
							    
							</form>

<div id="desno">

</div>
</div>
</div>
<script src="Skripta.js"></script>
</body>
</html>

