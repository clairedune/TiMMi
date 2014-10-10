<?php
	/*! 
	 * \file index.php
	 * \brief fonction principale, se lance automatiquement dans le navigateur à l'URL du répertoire principal
	 * \author Claire Dune
	 * \date 20/10/2013
	 */

	require_once("conf/config.php");
	require_once("src/Lecteur.php");

    // creer un lecteur d'image qui permet de lire, ecrire et afficher des fichier
	$lecteur = new Lecteur();
	
	// utilise le lecteur pour ouvrir une fichier
    $lecteur->ouvre("images/bobine.png");
    $lecteur->afficheImage();

           
                
    
    
    
    
    
    
 
	
	
?>

