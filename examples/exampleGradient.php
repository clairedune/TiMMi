<?php

/*! 
 * \file exampleGradient.php 
 * \brief Ce fichier creer une image degradee, l'enregistre sur le disque et l'affiche
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
    for ($j = 0 ; $j < $hauteur ; $j ++) // on parcourt les lignes
    {
        $I->tab[$i][$j][0] = $i;  // couche du rouge
        $I->tab[$i][$j][1] = $i;  // couche du vert
        $I->tab[$i][$j][2] = $i;  // couche du bleu
    }
 
 // on creer un lecteur
 $lecteur = new Lecteur();
 $lecteur->importe($I);
 $lecteur->enregistreSous("../res/gradientGris.png");
  echo "<br/> Degrade de niveaux de gris <br/>";
 $lecteur->afficheImage();
 
 
 
 
 
 
 