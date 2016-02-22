<?php
	/*! 
	 * \file importerMonochrome.php
	 * \brief Pour creer un fichier image a partir d'une matrice monochrome
	 * \author Claire Dune
	 * \date 22/02/2016
	 */

	require_once("../conf/config.php");
	require_once("../src/Lecteur.php");
    require_once("../src/ImageMonochrome.php");
	
	// creation de l'image
	$I = new ImageMonochrome(300,200);
	
	// creation du lecteur
	$lecteur = new Lecteur();
    
    // importer l'image
    $lecteur->importe($I);
    
    // afficher l'image
    $lecteur->afficheImage();
    
    echo "l'image monochrome est bien importée";
    
    
    
        
?>

