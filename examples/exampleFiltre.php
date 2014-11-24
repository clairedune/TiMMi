<?php
	/*! 
	 * \file exampleIntro.php
	 * \brief ce fichier montre un premier exemple de chargement d'une image et d'affichage
	 * \author Claire Dune
	 * \date 20/10/2013
	 */

	require_once("../conf/config.php");
	require_once("../src/Lecteur.php");
    require_once("../src/colorMode.php");
    require_once("../src/Contraste.php");
       
    $lecteur = new Lecteur();
    $lecteur->ouvre("../images/bobine.png"); 
    $Isrc = $lecteur->exporte();
    $IbNw = ColorMode::desaturation( $Isrc );
      
    // creation de l'image resultat         
    function convolution (Image $IbNw, $K, $facteur)
    {
        $largeur = $IbNw->getLargeur();
        $hauteur = $IbNw->getHauteur();
        $Imoy = new Image($largeur, $hauteur);
        
        for( $i=0 ; $i<$largeur ; $i++ )
        {
            for( $j=0 ; $j<$hauteur ; $j++ )
            {
               $p = 0;
               
               for( $m=0 ; $m<=2 ; $m++)
               { 
                    for( $n=0 ; $n<=2 ; $n++)
                    {   
                        $p+= $IbNw->tab[$i+$m-1][$j+$n-1][0]*$K[$m][$n];
                    }
               }
                
               $p = $p/$facteur ;
               
               $Imoy->tab[$i][$j][0] =$p ;
               $Imoy->tab[$i][$j][1] =$p ;
               $Imoy->tab[$i][$j][2] =$p ;
            }
        }
        return $Imoy;
    }
    
    // creation du filtre 3x3 Moyenne
    $K[0][0] = 1;  $K[1][0] = 1; $K[2][0] = 1;
    $K[0][1] = 1;  $K[1][1] = 1; $K[2][1] = 1;
    $K[0][2] = 1;  $K[1][2] = 1; $K[2][2] = 1;
    $facteur = 9;    

    
    $Imoy = convolution ($IbNw, $K ,$facteur);
    $lecteur->importe($Imoy ,"../res/moyenne.png");
    $lecteur->afficheImage();    
        
        
   /* $Iauto = Contraste::automatique($IbNw);
    $lecteur->importe($Iauto ,"../res/bobAuto.png");
    $lecteur->afficheImage();
    
    $Iinv = Contraste::inversion($IbNw);
    $lecteur->importe($Iinv ,"../res/bobinv.png");
    $lecteur->afficheImage();
    
    $s = 100;
    $Is = Contraste::seuil($IbNw,$s);
    $lecteur->importe($Is ,"../res/bobs.png");
    $lecteur->afficheImage();*/
    
   
?>

