<?php
	/*! 
	 * \file ouvrirImage.php
	 * \brief un exemple de lecture image
	 * \author Claire Dune
	 * \date 22/02/2016
	 */

	require_once("../conf/config.php");
	require_once("../src/Lecteur.php");
	
	$lecteur = new Lecteur();
    
    // ouvrir une image
    $lecteur->ouvre("../images/bobine.png");
    
    // afficher une image
    $lecteur->afficheImage();
        
?>

