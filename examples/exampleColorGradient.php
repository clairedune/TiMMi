<?php

/*! 
 * \file exampleColorGradient.php 
 * \brief Ce fichier creer 3 image degradee en couleur, l'enregistre sur le disque et l'affiche
 * \author Claire Dune
 * \date 20/10/2013
 */
 
 
 require_once("../conf/config.php"); 
 require_once("../src/Image.php");
 require_once("../src/Lecteur.php");

 
 
 // on creer une image
 $largeur = 255;
 $hauteur = 100;
 $I = new Image($largeur, $hauteur);
 
 // on affiche les informations de l'image
// echo $I;
 
 // on remplit les pixels avec un degradé
 for($i = 0 ; $i < $largeur ; $i ++) // on parcourt les colonnes
    for ($j = 0 ; $j < $hauteur/3 ; $j ++) // on parcourt les lignes
    {
        $I->tab[$i][$j][0] = $i; 
    }
 
 // on creer un lecteur
 $lecteur = new Lecteur();
 $lecteur->importe($I);
 $lecteur->enregistreSous("../res/gradientRouge.png");
 echo "<br/> Image 1 ";
 $lecteur->afficheImage();
 
 
  // on remplit les pixels avec un degradé
 for($i = 0 ; $i < $largeur ; $i ++) // on parcourt les colonnes
    for ($j = 0 ; $j < 2*$hauteur/3 ; $j ++) // on parcourt les lignes
    {
        $I->tab[$i][$j][1] = $i;    
    }
 
 // on creer un lecteur
 $lecteur = new Lecteur();
 $lecteur->importe($I);
 $lecteur->enregistreSous("../res/gradientJaune.png");
 echo "<br/> Image 2 ";
 $lecteur->afficheImage();
 
  // on remplit les pixels avec un degradé
 for($i = 0 ; $i < $largeur ; $i ++) // on parcourt les colonnes
    for ($j = 0 ; $j < $hauteur ; $j ++) // on parcourt les lignes
    {
        $I->tab[$i][$j][2] = $i;   
    }
 
 // on creer un lecteur
 $lecteur = new Lecteur();
 $lecteur->importe($I);
 $lecteur->enregistreSous("../res/gradientGris.png");
  echo "<br/> Image 3 ";
 $lecteur->afficheImage();
 
 
 
 
 
 
 