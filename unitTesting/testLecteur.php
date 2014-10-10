<?php
	/*! 
	 * \file index.php
	 * \brief fonction principale, se lance automatiquement dans le navigateur à l'URL du répertoire principal
	 * \author Claire Dune
	 * \date 20/10/2013
	 */

	require_once("../conf/config.php");
	require_once("../src/Lecteur.php");
	
	$lecteur = new Lecteur();
    $lecteur->ouvre("../images/bobine.png");
    $lecteur->afficheImage();
	$lecteur->enregistreSous("../images/bobine102.jpg");
    $lecteur->afficheImage();
    $lecteur->enregistreSous("../images/bobine102.gif");
    $lecteur->afficheImage();
    
    $lecteur2 = $lecteur;
	$lecteur2->afficheImage();
	
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

