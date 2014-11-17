<?php

	require_once("../conf/config.php");
	require_once("../src/Lecteur.php");
    require_once("../src/Image.php");
    require_once("../src/Conversion.php");
    require_once("../src/colorMode.php");
    require_once("../src/contraste.php");
    
    $lecteur = new Lecteur();
	$lecteur->ouvre("../images/bobine.png");
   // $lecteur->afficheImage();
    $Isrc = $lecteur->exporte();
    $I = clone $Isrc;
    $IbNw = ColorMode::desaturation( $I );


    function histogramme($I)
    {	
    	   // 1. ATTENTION NE PAS OUBLIER LA MISE A ZERO !!! 
	   $hist[] = array();
	   for ($k=0 ; $k<256 ; $k++)
	       $hist[$k]=0;
	   
	   // 2. On construit l'histogramme
	   for( $i=0 ; $i<$I->getLargeur() ; $i++ )
	       for($j=0 ; $j<$I->getHauteur() ; $j++ )
	       {
	           $hist [ $I->tab[$i][$j][0] ] ++ ;
	       }  
	    return $hist;
    }	   
	
	$hist = histogramme ($IbNw);
	$I = Conversion::hist2image($hist);
	$I = Contraste ::inversion($I);
	$lecteur->importe($I ,"../res/histogramme.png");
     $lecteur->afficheImage();
    
    $Iclair = Contraste::decalage($IbNw,150);
    $lecteur->importe($Iclair ,"../res/bobclaire.png");
    $lecteur->afficheImage();
    
    $hist = histogramme ($Iclair);
	$I = Conversion::hist2image($hist);
	$lecteur->importe($I ,"../res/histogrammec.png");
    $lecteur->afficheImage();

   /*
    $Isombre = Contraste::decalage($IbNw,-50);
    $lecteur->importe($Isombre ,"../res/bobsombre.png");
    $lecteur->afficheImage();
    
    $hist = histogramme ($Isombre);
	$I = Conversion::hist2image($hist);
	$lecteur->importe($I ,"../res/histogrammesombre.png");
    $lecteur->afficheImage();
    
    
    $Iinv = Contraste::inversion($IbNw);
    $lecteur->importe($Iinv ,"../res/bobinv.png");
    $lecteur->afficheImage();
    
     $hist = histogramme ($Iinv);
	$I = Conversion::hist2image($hist);
	$lecteur->importe($I ,"../res/histogrammecINV.png");
    $lecteur->afficheImage();
    
    $s = 100;
    $Is = Contraste::seuil($IbNw,$s);
    $lecteur->importe($Is ,"../res/bobs.png");
    $lecteur->afficheImage();
 
 
    $hist = histogramme ($Is);
	$I = Conversion::hist2image($hist);
	$lecteur->importe($I ,"../res/histogrammecSeuil.png");
    $lecteur->afficheImage();*/
    
    
    
?>