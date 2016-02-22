<?php
	/*! 
	 * \file enregistrerImage.php
	 * \brief un exemple d'enregistrement d'image en plusieurs formats
	 * \author Claire Dune
	 * \date 22/02/2016
	 */

	require_once("../conf/config.php");
	require_once("../src/Lecteur.php");
	
	$lecteur = new Lecteur();
    
    // ouvrir une image
    $lecteur->ouvre("../images/bobine.png");
    
    // enregistrer une image
    $lecteur->enregistre("../res/bobine.png");
    $lecteur->enregistre("../res/bobine.jpg");
    $lecteur->enregistre("../res/bobine.gif");
    
    echo "L'image bobine.png est enregistrée aux formats png, gif et jpg dans /res.";
        
?>

