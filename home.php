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
//ucitavanje fajlova
 $folder = glob('Novosti/*.txt', GLOB_BRACE);
        $files = array();
        foreach($folder as $file) 
		{
            $fajl = file($file);
            array_push($files, $fajl);
        }
      

// Sortiranje fajlova po datumu kreacije tih fajlova.
for ($i=0; $i<count($files); $i++)
		{
			for ($j=0; $j<count($files); $j++)
			{
				$datum1 = strtotime($files[$i][0]);
				$datum2 = strtotime($files[$j][0]);
				if ($datum1 < $datum2)
				{
					$pomocna = $files[$i];
					$files[$i] = $files[$j];
					$files[$j] = $pomocna;
				}
			}
		}

//ucitavanje na stranicu
		foreach($files as $file)
		{
			$datumivrijeme=$file[0];
			$autor=$file[1];
			$naslov=$file[2];
			$slikanovosti=$file[3];
			$tekstnovost="";
			$tekstsirebool=false;
			$tekstsire="";
			$linkvise="";
			$tekst="";
			$tekst1=array();
			$postojivise=true;
			$naslov = strtolower($naslov);
            $naslov[0] = strtoupper($naslov[0]);
			
			for($i = 4; $i < count($file); $i++) 
			{
				if(trim($file[$i]) === "--") 
				{
					$postojivise = false;
				}
				if($postojivise) 
				{
					$tekstnovost = $tekstnovost." ".$file[$i];
				}
				else 
				{
					if(trim($file[$i]) != "--")
					{
						$tekstsirebool = true;
						$tekstsire = $tekstsire." ".$file[$i];
						$linkvise="Kliknite ovdje za više informacija";
						
					}
				}
			}
        
			
			$DiV = explode(' ', $datumivrijeme);
			
			
		

			$k=1;
			print ("<div id = 'glavni".$k."'>
			 <img src ='".htmlentities($slikanovosti, ENT_QUOTES)."' height:'200' width:'150' />
			 <h3>".htmlentities($naslov, ENT_QUOTES)."</h3>
			 <p> ".$tekstnovost."<a style='color: blue;'>".$linkvise."</a></p>
			 <p style='color: pink;'>" .$DiV[0]. " | by ".htmlentities($autor, ENT_QUOTES)."</p></div> ");
			 
			$k=$k+1;}
	
		
		?>

</div>
<div id="vise">

</div>
</div>
<script src="Skripta.js"></script>
</body>
</html>

