<?php
 
/*!
* \class ColorMode
* \brief cette classe ne contient que des fonctions public et statiques
*/

require_once("Image.php");

class ColorMode
{
    /*!
    * \brief Cette fonction prend en entree une image couleur et retourne une image en niveau de gris
    * \warning On suppose qu'une image couleur est donnée en entrée sans faire de test.
    */
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
    
    
    /*!
    * \brief Cette fonction prend en entree une image couleur et retourne une image partiellement 
    * convertie en niveaux de gris.
    * \warning On suppose qu'une image couleur est donnée en entrée sans faire de test.
    */
    public static function desaturationPartielle(Image $I)
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

    
    
}