<?php
	/*! 
	 * \file exampleLecteur.php
	 * \brief ce fichier teste intensivement les methodes de la classe lecteur
	 * \author Claire Dune
	 * \date 2/10/2014
	 */

	require_once("../conf/config.php");
	require_once("../src/Lecteur.php");
	
	$lecteur = new Lecteur();
    $lecteur->ouvre("../images/bobine.png");
    $lecteur->afficheImage();
    
    // on enregistre en jpg
	$lecteur->enregistreSous("../images/bobine102.jpg");
    $lecteur->afficheImage();
    
    // on enrigistre en gif
    $lecteur->enregistreSous("../images/bobine102.gif");
    $lecteur->afficheImage();
    
    // on export en gif
    $lecteur->ouvre("../images/bobine.png");
    
    // on convertit l'image pour le traitement d'image
    $Isrc = $lecteur->exporte();
    
    // On creer une image de travail qui est une copie
    // de l'image source mais on n'ecrase surtout pas l'image source
    $I = clone $Isrc;

	for ($i = 0 ; $i<150 ; $i++ )
	{
	   for ($j = 0 ; $j<150 ; $j++ )
	   {
	       $I->tab[$i][$j][0] = 100;
	       $I->tab[$i][$j][1] = 100;
	       $I->tab[$i][$j][2] = 100;
	   }
	}    

	
	$lecteur->importe($I);
    $lecteur->afficheImage();     
   
   
    //----------------//
    // test avec un nouveau lecteur
    $lecteur2 = new Lecteur();
    $lecteur2->ouvre("../images/bobine.png");
    $Isrc = $lecteur2->exporte();
    
    $I = clone $Isrc; 
	for ($i = 50 ; $i<150 ; $i++ )
	{
	   for ($j = 50 ; $j<150 ; $j++ )
	   {
	       $I->tab[$i][$j][2] = 100;
	   }
	}    
	
	$lecteur2->importe($I);
    $lecteur2->afficheImage(); 
   
    //----------------//
    $I = clone $Isrc;
	
	echo ("pixel 32, 45".$I->tab[32][45][0]);
	
	for ($i = 100 ; $i<200 ; $i++ )
	{
	   for ($j = 100 ; $j<200 ; $j++ )
	   {
	       $I->tab[$i][$j][1] = 100;
	   }
	}    
	$lecteur->importe($I);
    $lecteur->afficheImage(); 
    
?>

