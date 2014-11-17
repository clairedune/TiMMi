<?php
	require_once("../conf/config.php");
	require_once("../src/Lecteur.php");
 
     $lecteur = new Lecteur();
     $lecteur->ouvre("../images/bobine.png");
     $lecteur->afficheImage();
     $I = $lecteur->exporte();
            
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
    $IbNw = desaturation( $I );
   
    // importer l'image
    $lecteur->importe($IbNw ,"../res/bobineLumFun.png");
    $lecteur->afficheImage();
    
     function eclaircissement(Image $I)
     {
        $largeur = $I->getLargeur();
        $hauteur = $I->getHauteur();
        
        $Idest = new Image($largeur, $hauteur);
        
        for( $i=0 ; $i < $largeur ; $i++ )
        {
            for( $j=0 ; $j < $hauteur ; $j++ )
            {
                // eclaircissement k'=k+50
                $k = $I->tab[$i][$j][0];
                $kprime = $k + 50;
                if($kprime>255) $kprime=255;
                
                $Idest->tab[$i][$j][0] = $kprime;
                $Idest->tab[$i][$j][1] = $kprime;
                $Idest->tab[$i][$j][2] = $kprime;
            }
        }
        
        return $Idest;
     }      
    $Iec = eclaircissement( $IbNw );
   
    // importer l'image
    $lecteur->importe($Iec ,"../res/BobEc.png");
    $lecteur->afficheImage();
    
        
?>

