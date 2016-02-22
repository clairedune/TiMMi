<?php
	/*! 
	 * \file enregistrerImage.php
	 * \brief un exemple d'enregistrement d'image en plusieurs formats
	 * \author Claire Dune
	 * \date 22/02/2016
	 */

	require_once("../conf/config.php");
	require_once("../src/Lecteur.php");
	
	echo "<H1>Enregistrer une image dans un fichier.</H1>";
	
	$lecteur = new Lecteur();
    
    // ouvrir une image
    $lecteur->ouvre("../images/bobine.png");
    $lecteur->afficheImage();
    
    // enregistrer une image
    $lecteur->enregistre("../res/bobine.png");
    $lecteur->afficheImage();
    $lecteur->enregistre("../res/bobine.jpg");
    $lecteur->afficheImage();
    $lecteur->enregistre("../res/bobine.gif");
    $lecteur->afficheImage();
    
    echo "<p>L'image bobine.png est enregistrée aux formats png, gif et jpg. Vous pouvez aller vérifier la création de ces fichiers dans le répertoire res.</p>";
        
?>

