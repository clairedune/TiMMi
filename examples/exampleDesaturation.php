<?php
	/*! 
	 * \file exampleIntro.php
	 * \brief ce fichier montre un premier exemple de chargement d'une image et d'affichage
	 * \author Claire Dune
	 * \date 20/10/2013
	 */

	require_once("../conf/config.php");
	require_once("../src/Lecteur.php");
    require_once("../src/ColorMode.php");
        // creer un lecteur d'image qui permet de lire, 
        // ecrire et afficher des fichier
	$lecteur = new Lecteur();
	
	//1. utilise le lecteur pour ouvrir une fichier
    $lecteur->ouvre("../images/bobine.png");
    $lecteur->afficheImage();
   
    //2. enregistrer sous un nouveau nom
    $lecteur->enregistreSous("../res/bobine.png");
   
    //3. Creer une image pour le traitement de l'image
    $Isrc = $lecteur->exporte();
        
     //4. Desaturation
     $I = clone $Isrc;
       
     // on utilise les fonction de la classe colorMode   
     $IbNw = ColorMode::desaturation( $I );
   
     // importer l'image resultat
     $lecteur->importe($IbNw ,"../res/bobineLumDesat.png");
     $lecteur->afficheImage();
        
    
     //  5. Ici, on voudrait faire une desaturation partielle sur une nouvelle image
     $lecteur->ouvre("../images/video.png");
     $I = $lecteur->exporte();
     $lecteur->afficheImage();
     $Ipart = ColorMode::desaturationPartielle( $I );
   
     // importer l'image
     $lecteur->importe($Ipart ,"../res/videoPart.png");
     $lecteur->afficheImage();
   
   
?>

