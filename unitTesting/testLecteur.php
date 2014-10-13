<?php
	/*! 
	 * \file testLecteur.php
	 * \brief test unitaire de la classe Lecteur
	 * \author Claire Dune
	 * \date 20/10/2013
	 */

	require_once("../conf/config.php");
	require_once("../src/Lecteur.php");
	
	$lecteur = new Lecteur();
    $lecteur->ouvre("../images/bobine.png");
    $lecteur->afficheImage();
    
    // on enregistre en jpg
	$lecteur->enregistreSous("../images/bobine102.jpg");
    $lecteur->afficheImage();
    
    // on enrigistre en gif
    $lecteur->enregistreSous("../images/bobine102.gif");
    $lecteur->afficheImage();
    
    // on export en gif
    $I = $lecteur->export();
    
	echo ("pixel 32, 45".$I->tab[32][45][0]);
	
	for ($i = 50 ; $i<150 ; $i++ )
	{
	   for ($j = 50 ; $j<150 ; $j++ )
	   {
	       $I->tab[$i][$j][0] = 120;
	   }
	}    
	$lecteur->import($I);
	// affichage de l'image à l'écran
    $lecteur->enregistreSous("../images/bobine102.png");
    $lecteur->afficheImage(); 
?>

