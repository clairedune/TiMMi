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
 $largeur = 100;
 $hauteur = 50;
 $I1 = new Image($largeur, $hauteur);
 
 // on remplit la partie gauche en noir
 for($i = $largeur/2 ; $i < $largeur; $i ++) // on parcourt les colonnes
    for ($j = 0 ; $j < $hauteur ; $j ++) // on parcourt les lignes
    {
        $I1->tab[$i][$j][0] = 255;  // couche du rouge
        $I1->tab[$i][$j][1] = 255;  // couche du vert
        $I1->tab[$i][$j][2] = 255;  // couche du bleu
    }
 // on remplit la partie droite en blanc
 // on creer un lecteur
 $lecteur = new Lecteur();
 $lecteur->importe($I1,"../res/I1.png");
 $lecteur->afficheImage();
 
 
  // seconde image
  $I2 = new Image($largeur, $hauteur);
  
    // on remplit la partie gauche en noir
 for($i = 0 ; $i < $largeur/2 ; $i ++) // on parcourt les colonnes
    for ($j = 0 ; $j < $hauteur ; $j ++) // on parcourt les lignes
    {
        $I2->tab[$i][$j][0] = 100;  // couche du rouge
        $I2->tab[$i][$j][1] = 100;  // couche du vert
        $I2->tab[$i][$j][2] = 100;  // couche du bleu
    }
   // on remplit la partie droite en blanc
 for($i = $largeur/2 ; $i < $largeur ; $i ++) // on parcourt les colonnes
    for ($j = 0 ; $j < $hauteur ; $j ++) // on parcourt les lignes
    {
        $I2->tab[$i][$j][0] = 101;  // couche du rouge
        $I2->tab[$i][$j][1] = 101;  // couche du vert
        $I2->tab[$i][$j][2] = 101;  // couche du bleu
    }
 

 $lecteur->importe($I2,"../res/I2.png");
 $lecteur->afficheImage();
 
 // seconde image
  $I3 = new Image($largeur, $hauteur);
 
  for($i =  0 ; $i < $largeur ; $i ++) 
     for ($j = $hauteur/2 ; $j < $hauteur ; $j ++) 
        {
        $I3->tab[$i][$j][0] = 240;  // couche du rouge
        $I3->tab[$i][$j][1] = 240;  // couche du vert
        $I3->tab[$i][$j][2] = 240;  // couche du bleu
    }
 $lecteur->importe($I3,"../res/I3.png");
 $lecteur->afficheImage();
 

 //----------------------------------------//
 // DETECTION DU CONTOUR //
 
 // si la valeur de deux pixels voisins est différente alors on met le pixel à 255
 $I4 = $lecteur->ouvre("../images/girl.png");
 
 // image source
 $Isrc    = clone $I4;
 $largeur = $Isrc->getLargeur();
 $hauteur = $Isrc->getHauteur();
 // image resultat
 $Itest   = new Image($largeur, $hauteur);
 
 for($colonne=0 ; $colonne < $Isrc->getLargeur()-1 ; $colonne++) 
     for ($ligne=0 ; $ligne < $Isrc->getHauteur()-1; $ligne++) 
        {   
            $lun         = $Isrc->tab[$colonne][$ligne][0];
            $lautre      = $Isrc->tab[$colonne+1][$ligne][0]; // DROITE
            $lautreautre = $Isrc->tab[$colonne][$ligne+1][0]; // DU DESSOUS
            
            if( (abs($lun - $lautre) > 10) OR ( abs($lun - $lautreautre) > 10))
            {
              $Itest->tab[$colonne][$ligne][0] = 255; 
              $Itest->tab[$colonne][$ligne][1] = 255; 
              $Itest->tab[$colonne][$ligne][2] = 255;      
            }
                        
        }

for($colonne=0 ; $colonne < $Isrc->getLargeur()-1 ; $colonne++) 
     for ($ligne=0 ; $ligne < $Isrc->getHauteur()-1; $ligne++) 
        {     
            if( $Itest->tab[$colonne][$ligne][0] == 255)
            {
              $Isrc->tab[$colonne][$ligne][0] = 0; 
              $Isrc->tab[$colonne][$ligne][1] = 0; 
              $Isrc->tab[$colonne][$ligne][2] = 0;      
            }
                        
        }


 $lecteur->importe($Isrc,"../res/Isrc.png");
 $lecteur->afficheImage();
 $lecteur->importe($Itest,"../res/Itest.png");
 $lecteur->afficheImage();
 

 