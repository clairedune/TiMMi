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
        
    $Iclair = Contraste::decalage($IbNw,25);
     // on va mettre tout un ensemble de pixels en noir
    for( $i=200 ; $i<220 ; $i++ ){ // boucle sur les colonnes
        for( $j=110 ; $j<130 ; $j++ ){ // boucle sur les lignes
                $Iclair->tab[$i][$j][0] = 0; 
                $Iclair->tab[$i][$j][1] = 0;
                $Iclair->tab[$i][$j][2] = 0;
            }
        }
    $lecteur->importe($Iclair ,"../res/bobclaire2.png");
    $lecteur->afficheImage();
   
   
    $Isombre = Contraste::decalage($IbNw,-20);
    $lecteur->importe($Isombre ,"../res/bobsombre2.png");
    $lecteur->afficheImage();
    
    $Iauto = Contraste::automatique($Iclair);
    $lecteur->importe($Iauto ,"../res/bobAuto11.png");
    $lecteur->afficheImage();
    
    
    $Iauto = Contraste::automatique($Isombre);
    $lecteur->importe($Iauto ,"../res/bobAuto12.png");
    $lecteur->afficheImage();
    
    $Iinv = Contraste::inversion($IbNw);
    $lecteur->importe($Iinv ,"../res/bobinv.png");
    $lecteur->afficheImage();
    
    $s = 100;
    $Is = Contraste::seuil($IbNw,$s);
    $lecteur->importe($Is ,"../res/bobs.png");
    $lecteur->afficheImage();
    
   
?>

