<?php

require_once('Image.php');

class Contraste
{
    
    public static function decalage($Isrc,$dec)
    {
        // pour tous les pixels on ajoute $decalage à la valeur
        $Ires = clone $Isrc;
        for( $i = 0 ; $i < $Isrc->getLargeur() ; $i++)
            for( $j = 0 ; $j < $Isrc->getHauteur() ; $j++) 
            {
                // on ajoute la valeur
                $val = $Isrc->tab[$i][$j][0] + $dec; 
                
                // on sature le resultat pour qu'il soit affichable
                if($val>255) $val = 255;
                else if ($val < 0) $val = 0;
                
                // on construit la nouvelle image
                $Ires->tab[$i][$j][0] = $val;
                $Ires->tab[$i][$j][1] = $val;
                $Ires->tab[$i][$j][2] = $val;
            }
        
        // on renvoie le resultat
        return $Ires;
    }
    
    public static function eclaircir($Isrc,$dec)
    {
        // pour tous les pixels on ajoute $decalage à la valeur
        $Ires = clone $Isrc;
        for( $i = 0 ; $i < $Isrc->getLargeur() ; $i++)
            for( $j = 0 ; $j < $Isrc->getHauteur() ; $j++) 
            {
                // on ajoute la valeur
                $val = $Isrc->tab[$i][$j][0] + $dec; 
                
                // on sature le resultat pour qu'il soit affichable
                if($val>255) $val = 255;
               
                
                // on construit la nouvelle image
                $Ires->tab[$i][$j][0] = $val;
                $Ires->tab[$i][$j][1] = $val;
                $Ires->tab[$i][$j][2] = $val;
            }
        
        // on renvoie le resultat
        return $Ires;
    }
    
    public static function assombrir($Isrc,$dec)
    {
        // pour tous les pixels on ajoute $decalage à la valeur
        $Ires = clone $Isrc;
        for( $i = 0 ; $i < $Isrc->getLargeur() ; $i++)
            for( $j = 0 ; $j < $Isrc->getHauteur() ; $j++) 
            {
                // on ajoute la valeur
                $val = $Isrc->tab[$i][$j][0] - $dec; 
                
                // on sature le resultat pour qu'il soit affichable
                if ($val < 0) $val = 0;
                
                // on construit la nouvelle image
                $Ires->tab[$i][$j][0] = $val;
                $Ires->tab[$i][$j][1] = $val;
                $Ires->tab[$i][$j][2] = $val;
            }
        
        // on renvoie le resultat
        return $Ires;
    }


    
    
    public static function automatique($Isrc)
    {
        
        $mini = $Isrc->minimum();
        $maxi = $Isrc->maximum();
        $plage = $maxi-$mini;
        
       
        
        
       
         if ($plage==0)
         {
            echo "la plage de valeur est nulle, l'image ne peut pas être améliorée";
            return $Isrc;
         }
         
         $Ires = clone $Isrc;
         
        for( $i = 0 ; $i < $Isrc->getLargeur() ; $i++)
            for( $j = 0 ; $j < $Isrc->getHauteur() ; $j++) 
            {
                // on ajoute la valeur
                $val = ($Isrc->tab[$i][$j][0]-$mini)*255/$plage; 
                
                // on sature le resultat pour qu'il soit affichable
                if($val>255) $val = 255;
                else if ($val < 0) $val = 0;
                
                // on construit la nouvelle image
                $Ires->tab[$i][$j][0] = $val;
                $Ires->tab[$i][$j][1] = $val;
                $Ires->tab[$i][$j][2] = $val;
            }
        
        // on renvoie le resultat
        return $Ires;
        
    }
    
    
    
    
    public static function inversion($Isrc)
    {
         $Ires = clone $Isrc;
        for( $i = 0 ; $i < $Isrc->getLargeur() ; $i++)
            for( $j = 0 ; $j < $Isrc->getHauteur() ; $j++) 
            {
                
                $val = 255-$Isrc->tab[$i][$j][0] ;                
               
                // on sature le resultat pour qu'il soit affichable
                if($val>255) $val = 255;
                else if ($val < 0) $val = 0;
                
                // on construit la nouvelle image
                $Ires->tab[$i][$j][0] = $val;
                $Ires->tab[$i][$j][1] = $val;
                $Ires->tab[$i][$j][2] = $val;
            }
        
        // on renvoie le resultat
        return $Ires;
    }
    

    public static function seuil($Isrc,$s)
    {
        $Ires = clone $Isrc;
        for( $i = 0 ; $i < $Isrc->getLargeur() ; $i++)
            for( $j = 0 ; $j < $Isrc->getHauteur() ; $j++) 
            {
                
                if($Isrc->tab[$i][$j][0]>$s) 
                    $val = 255;
                else
                    $val = 0;                
                             
                // on construit la nouvelle image
                $Ires->tab[$i][$j][0] = $val;
                $Ires->tab[$i][$j][1] = $val;
                $Ires->tab[$i][$j][2] = $val;
            }
        
        // on renvoie le resultat
        return $Ires;
    }
    
    
}