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
    
    // utilise le lecteur pour creer une image exploitable pour le traitement d'image
    $I = $lecteur->export();
    
    echo $I->tab[23][34][1];
    
    for ($i=50;$i<150;$i++)
        for ($j=50;$j<150;$j++)
                $I->tab[$i][$j][1] = 0;
                
                
                
    
    $lecteur->import($I);
    
    $lecteur->afficheImage();
           
                
    
    
    
    
    
    
 
	
	
?>

