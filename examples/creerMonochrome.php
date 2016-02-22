<?php
	/*! 
	 * \file creerMonochrome.php
	 * \brief Pour creer une matrice monochrome
	 * \author Claire Dune
	 * \date 22/02/2016
	 */

	require_once("../conf/config.php");
    require_once("../src/ImageMonochrome.php");
	
	echo "<H1>Créer une image monochrome</H1>";
	
	// creation de l'image
	$I = new ImageMonochrome(300,200);
    

    
    echo "<p>L'image monochrome est bien créée</p>";
    echo($I)
    
    
    
        
?>

