<?php
	/*! 
	 * \file afficherMonochrome.php
	 * \brief Pour creer un fichier image a partir d'une matrice monochrome
	 * \author Claire Dune
	 * \date 22/02/2016
	 */

	require_once("../conf/config.php");
	require_once("../src/Lecteur.php");
    require_once("../src/ImageMonochrome.php");
	
	echo "<H1>Afficher une image</H1>";
	
	// creation de l'image
	$I = new ImageMonochrome(300,200);
	
	// creation du lecteur
	$lecteur = new Lecteur();
    
    // importer l'image
    $lecteur->affiche($I);
    
   
    
    
    
        
?>

