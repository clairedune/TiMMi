<?php
   /*! 
	 * \file exampleIntro.php
	 * \brief ce fichier montre un premier exemple de chargement d'une image et d'affichage
	 * \author Claire Dune
	 * \date 20/10/2013
	 */

	require_once("../conf/config.php");
	require_once("../src/Lecteur.php");
    require_once("../src/colorMode.php");
    require_once("../src/Contraste.php");
       
       
	$lecteur = new Lecteur();
	$lecteur->ouvre("../images/bobine.png");
    $lecteur->afficheImage();
    
    $Isrc = $lecteur->exporte();
    $I = clone $Isrc;
    $IbNw = ColorMode::desaturation( $I );
   
    // importer l'image resultat
    $lecteur->importe($IbNw ,"../res/bobineLumDesat.png");
    $lecteur->afficheImage();
        
    $Iclair = Contraste::decalage($IbNw,50);
    $lecteur->importe($Iclair ,"../res/bobclaire.png");
    $lecteur->afficheImage();
   
   
    $Isombre = Contraste::decalage($IbNw,-50);
    $lecteur->importe($Isombre ,"../res/bobsombre.png");
    $lecteur->afficheImage();
    
    $Iauto = Contraste::automatique($IbNw);
    $lecteur->importe($Iauto ,"../res/bobAuto.png");
    $lecteur->afficheImage();
    
    $Iinv = Contraste::inversion($IbNw);
    $lecteur->importe($Iinv ,"../res/bobinv.png");
    $lecteur->afficheImage();
    
    $s = 100;
    $Is = Contraste::seuil($IbNw,$s);
    $lecteur->importe($Is ,"../res/bobs.png");
    $lecteur->afficheImage();
 
?>

