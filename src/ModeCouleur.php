<?php 
require_once("Image.php");
class ModeCouleur
{
  public static function desaturation(Image $I)
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
}