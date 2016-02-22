<?php
	/*! 
	 * \file exampleLecteur.php
	 * \brief ce fichier teste intensivement les methodes de la classe lecteur
	 * \author Claire Dune
	 * \date 2/10/2014
	 */

	require_once("../conf/config.php");
	require_once("../src/Lecteur.php");
	
	$lecteur = new Lecteur();
    
    // ouvrir une image
    $lecteur->ouvre("../images/bobine.png");
    
    // afficher une image
    $lecteur->afficheImage();
    
    // enregistrer dans des formats différents
    // et afficher
    $lecteur->enregistre("../res/bobine1.jpg");
    $lecteur->afficheImage();
      
    $lecteur->enregistre("../res/bobine1.png");
    $lecteur->afficheImage();  
    
    $lecteur->enregistre("../res/bobine1.gif");
    $lecteur->afficheImage();
    
    // exporter dans une matrice couleur
    $Irgb = $lecteur->exporteRGB();
    $lecteur->importe($Irgb);
    $lecteur->afficheImage();
    
    
    // exporter dans une matrice monochromatique
    $I = $lecteur->exporteMonochrome();
    $lecteur->importe($I);
    $lecteur->afficheImage();
    
    
?>

