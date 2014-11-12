<?php
	/*! 
	 * \file exampleIntro.php
	 * \brief ce fichier montre un premier exemple de chargement d'une image et d'affichage
	 * \author Claire Dune
	 * \date 20/10/2013
	 */

	require_once("../conf/config.php");
	require_once("../src/Lecteur.php");

   // creer un lecteur d'image qui permet de lire, ecrire et afficher des fichiers
	$lecteur = new Lecteur();
	
	//1. CHARGER L'IMAGE
	// utilise le lecteur pour ouvrir une fichier
   $lecteur->ouvre("../images/bobine.png");
   $lecteur->afficheImage();
  
	
?>

