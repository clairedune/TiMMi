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
   
     //3. Creer une image pour le traitement de l'image
    $Isrc = $lecteur->exporte();
        
    // 4. Pour ne pas modifier cette image d'origine on
    // la copie dans une image de travail
    // un clone est un nouvel objet dont les 
    // attributs ont les mêmes valeurs
    $I    = clone $Isrc;
          
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
        
    $A = 1; $B =1 ; $C=1;
    $D = 1; $E =1 ; $F=1; 
    $G = 1; $H =1 ; $K=1;
    $s = 9;
    
    $largeur = $IbNw->getLargeur();
    $hauteur = $IbNw->getHauteur();
        
    $Iconv = new Image($largeur, $hauteur);
        
    for( $i=1 ; $i < $largeur-1 ; $i++ )
        {
            for( $j=1 ; $j < $hauteur-1 ; $j++ )
            {
                    $a = $I->tab[$i-1][$j-1][0]; 
                    $b =$I->tab[$i][$j-1][0] ; 
                    $c=$I->tab[$i+1][$j-1][0];
                    $d = $I->tab[$i-1][$j][0]; 
                    $e =$I->tab[$i][$j][0] ; 
                    $f=$I->tab[$i+1][$j][0]; 
                    $g = $I->tab[$i-1][$j+1][0]; 
                    $h =$I->tab[$i][$j+1][0] ; 
                    $k=$I->tab[$i+1][$j+1][0];
                    
                    $p = $A*$a + $B*$b + $C*$c+
                         $D*$d + $E*$e + $F*$f+
                         $G*$g + $H*$h + $K*$k;
                        
                    $Iconv->tab[$i][$j][0] = $p/$s;
                    $Iconv->tab[$i][$j][1] = $p/$s;
                    $Iconv->tab[$i][$j][2] = $p/$s;    
   
            }
        }
    
       // importer l'image
    $lecteur->importe($Iconv ,"../res/bobineConv.png");
    $lecteur->afficheImage();
   
   
?>

