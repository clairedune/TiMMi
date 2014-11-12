<?php
	/*! 
	 * \file exampleIntro.php
	 * \brief ce fichier montre un premier exemple de chargement d'une image et d'affichage
	 * \author Claire Dune
	 * \date 20/10/2013
	 */

	require_once("../conf/config.php");
	require_once("../src/Lecteur.php");

        // creer un lecteur d'image qui permet de lire, 
        // ecrire et afficher des fichier
	$lecteur = new Lecteur();
	
	//1. utilise le lecteur pour ouvrir une fichier
    $lecteur->ouvre("../images/bobine.png");
    $lecteur->afficheImage();
   
    //2. enregistrer sous un nouveau nom
    $lecteur->enregistreSous("../res/bobine.png");
   
    //3. Creer une image pour le traitement de l'image
    $Isrc = $lecteur->exporte();
        
    // 4. Pour ne pas modifier cette image d'origine on
    // la copie dans une image de travail
    // un clone est un nouvel objet dont les 
    // attributs ont les mêmes valeurs
    $I    = clone $Isrc;
   
    // 5. verifier la classe. Ici on veut afficher le nom de la
    // classe. Si tout va bien, ça devrait être une Image
    echo get_class($I);
  
    // on affiche les donnees de l'image
    echo $I; // ici on appelle en fait la methode magique __toString()
   
    // 6. on affiche les valeurs RGB du pixel 10,5
    $rouge = $I->tab[10][5][0]     ; // couche rouge
    $vert  = $I->tab[10][5][1]     ; // couche verte
    $bleu  = $I->tab[10][5][2]     ; // couche bleue 
    echo "<br/> R: ".$rouge." V: ".$vert." B: ".$bleu; 
   
    // 7. on modifie ce pixel, on va le mettre en blanc
    $I->tab[10][5][0] = 255;
    $I->tab[10][5][1] = 255;
    $I->tab[10][5][2] = 255;
   
    // importer l'image
    $lecteur->importe($I,"../res/bobinePointBlanc.png");
    $lecteur->afficheImage();
   
    // remarque, ce code est equivalent à
    // $lecteur->importe($I);
    // $lecteur->enregistreSous(,"../res/bobinePointBlanc.png")
    // $lecteur->afficheImage();
    
    // 8. Dessinez un rectangle de 20x30 pixel
    $I    = clone $Isrc;
   
    // remarque, on peut cloner l'image source ou bien reouvrir l'image d'origine
    // $lecteur->ouvre("../images/bobine.png");
    // $I = $lecteur->exporte();
  
    // on va mettre tout un ensemble de pixels en noir
    for( $i=100 ; $i<120 ; $i++ ){ // boucle sur les colonnes
        for( $j=100 ; $j<130 ; $j++ ){ // boucle sur les lignes
                $I->tab[$i][$j][0] = 0; 
                $I->tab[$i][$j][1] = 0;
                $I->tab[$i][$j][2] = 0;
            }
        }
        
     // importer l'image et afficher le résultat
     $lecteur->importe($I,"../res/bobineRectangleNoir.png");
     $lecteur->afficheImage();
   
   
     //  9. On enleve la composante de rouge de toute l'image
     $I       = clone $Isrc;
     $largeur = $I->getLargeur();
     $hauteur = $I->getHauteur();
        
     for( $i=0 ; $i < $largeur ; $i++ )
     {
        for( $j=0 ; $j < $hauteur ; $j++ )
        {
            $r = $I->tab[$i][$j][0];
            $g = $I->tab[$i][$j][1];
            $b = $I->tab[$i][$j][2];
            
            $m = ($r+$g+$b)/3;
            
            $I->tab[$i][$j][0] = $m;
            $I->tab[$i][$j][1] = $m;
            $I->tab[$i][$j][2] = $m;
         }
     }
     
     // importer l'image
     $lecteur->importe($I,"../res/bobineLum.png");
     $lecteur->afficheImage();
        
        
     //  10. Même chose en définissant une fonction
     $I = clone $Isrc;
        
        
     // -------- A mettre dans src/outils.php -------- //
     
     function desaturation(Image $I)
     {
        $largeur = $I->getLargeur();
        $hauteur = $I->getHauteur();
        
        $Idest = new Image($largeur, $hauteur);
        
        for( $i=0 ; $i < $largeur ; $i++ )
        {
            for( $j=0 ; $j < $hauteur ; $j++ )
            {
                $r = $I->tab[$i][$j][0];
                $g = $I->tab[$i][$j][1];
                $b = $I->tab[$i][$j][2];
            
                $m = ($r+$g+$b)/3;
            
                $Idest->tab[$i][$j][0] = $m;
                $Idest->tab[$i][$j][1] = $m;
                $Idest->tab[$i][$j][2] = $m;
            }
        }
        
        return $Idest;
     }
     // ------------------------------------------ //   
        
    $IbNw = desaturation( $I );
   
    // importer l'image
    $lecteur->importe($IbNw ,"../res/bobineLumFun.png");
    $lecteur->afficheImage();
        
    
     //  11. Ici, on voudrait faire une desaturation partielle
     $lecteur->ouvre("../images/video.png");
     $I = $lecteur->exporte();
     $lecteur->afficheImage();
     
     
     function desaturationPartielle(Image $I)
     {
        $largeur = $I->getLargeur();
        $hauteur = $I->getHauteur();
        
        $Idest = new Image($largeur, $hauteur);
        
        for( $i=0 ; $i < $largeur ; $i++ )
        {
            for( $j=0 ; $j < $hauteur ; $j++ )
            {
                $r = $I->tab[$i][$j][0];
                $g = $I->tab[$i][$j][1];
                $b = $I->tab[$i][$j][2];
            
                // on passe le vert en niveau de gris
                if($g>$r && $g>$b)
                {
                    $m = ($r+$g+$b)/3;
            
                    $Idest->tab[$i][$j][0] = $m;
                    $Idest->tab[$i][$j][1] = $m;
                    $Idest->tab[$i][$j][2] = $m;
                }
                else // on recopie
                {
                    $Idest->tab[$i][$j][0] = $I->tab[$i][$j][0];
                    $Idest->tab[$i][$j][1] = $I->tab[$i][$j][1];
                    $Idest->tab[$i][$j][2] = $I->tab[$i][$j][2];
                }

                
            }
        }
        
        return $Idest;
     }
     // ------------------------------------------ //   
        
    $Ipart = desaturationPartielle( $I );
   
    // importer l'image
    $lecteur->importe($Ipart ,"../res/bobinePart.png");
    $lecteur->afficheImage();
   
   
?>

