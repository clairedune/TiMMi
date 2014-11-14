<?php

	require_once("../conf/config.php");
	require_once("../src/Lecteur.php");
    require_once("../src/Image.php");
    require_once("../src/Conversion.php");
    require_once("../src/colorMode.php");
    
    $lecteur = new Lecteur();
	$lecteur->ouvre("../images/bobine.png");
    $lecteur->afficheImage();
 /*   $Isrc = $lecteur->exporte();
    $I = clone $Isrc;
    $IbNw = ColorMode::desaturation( $I );
	
	$hist = array (10 ,10, 0,0,0,0,0,0,0, 30 , 46 , 57 , 0,0,0,0,0,0,0, 58, 10, 2, 200, 30, 0,0,58, 10, 2, 200, 30,
	10 ,10, 0,0,0,0,0,0,0, 30 , 46 , 57 , 10,20,30,40,50,60,70, 58, 10, 2, 200, 30, 0,0,58, 10, 2, 200, 30,
	10 ,10, 0,0,0,0,0,0,0, 30 , 46 , 57 , 0,0,0,0,0,0,0, 58, 10, 2, 200, 30, 0,0,58, 10, 2, 200, 30,
	10 ,10, 0,0,0,0,0,0,0, 30 , 46 , 57 , 0,0,0,0,0,0,0, 58, 10, 2, 200, 30, 0,0,58, 10, 2, 200, 30,
	10 ,10, 0,0,0,0,0,0,0, 30 , 46 , 57 , 0,0,0,0,0,0,0, 58, 10, 2, 200, 30, 0,0,58, 10, 2, 200, 30);
   
   	$I = Conversion::hist2image($hist);
	
	$lecteur->importe($I ,"../res/histogramme.png");
    $lecteur->afficheImage();*/
    
?>