<?php
	/*! 
	 * \file exporterMonochrome.php
	 * \brief Pour lire un fichier image en le convertir en une matrice monochrome
	 * \author Claire Dune
	 * \date 22/02/2016
	 */

	require_once("../conf/config.php");
	require_once("../src/Lecteur.php");
	
	echo "<H1>Exporter une image monochrome depuis le lecteur</H1>";
	
	$lecteur = new Lecteur();
    
    // ouvrir une image
    $lecteur->ouvre("../images/bobine.png");
    $lecteur->afficheImage();
    
    // construire une image monochrome
    $I = $lecteur->exporteMonochrome();
    
    echo "l'image est bien exportée en image monochrome";
    
    // afficher l'image
    $lecteur->affiche($I);
    
            
?>

