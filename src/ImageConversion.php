<?php

	/*! 
	 * \file Conversion.php
	 * \brief Ce fichier contient des methodes de conversion de formats d'image
	 * \author Claire Dune
	 * \date 2/10/2014
	 */

    /*!
    * \class Conversion
    * \brief classe Conversion, conversions
    * \author Claire Dune
    * \date 2/10/2014
    */
require_once("Image.php");
require_once("ImageMonochrome.php");
require_once("ImageRGB.php");

class ImageConversion{
   
    /*!
	 * \fn ressource2imageRGB($imageGd)
	 * \brief convertit une image de la library gd en image de la library timmi
	 *
	 * \param $ressource une image gd
	 * \return $image une image TiMMi
	 * 
	 *\code
	  <?php 
	     require_once("src/Conversion.php");
	     $imageGd    = imageCreateFromPng("images/bobine.png");
	     $imageTimmi = Conversion::ressource2image($imageGd);
	     echo $imageTimmi[12][3][0];
	  ?php>
	 \endcode
	 */
    public static function ressource2imageRGB($im)
    { 
        
        $largeur  = imagesx($im);
	    $hauteur  = imagesy($im);
        
        $Irgb = new ImageRGB($largeur, $hauteur);
        
        
        for( $i = 0 ; $i < $largeur ; $i++ )
		{
			for( $j = 0 ; $j < $hauteur ; $j++ )
			{
				
				$rgb = imagecolorat($im, $i, $j);
		        // il faut ensuite traduire cet "index" en couleurs
		        // R, G et B. La documentation nous propose deux solutions
		        // on opere des decalages binaires et des masquages
				$Irgb->tab[ $i ][ $j ][ 0 ] = ($rgb >> 16) & 0xFF;
				$Irgb->tab[ $i ][ $j ][ 1 ] = ($rgb >> 8) & 0xFF;
				$Irgb->tab[ $i ][ $j ][ 2 ] = $rgb & 0xFF;
			}
		}
		return $Irgb ;
    }
    
    public static function ressource2imageMonochrome($ressource)
    { 
        
        $largeur  = imagesx($ressource);
	    $hauteur  = imagesy($ressource);
        
        $I = new ImageMonochrome($largeur, $hauteur);
        
        
        for( $i = 0 ; $i < $largeur ; $i++ )
		{
			for( $j = 0 ; $j < $hauteur ; $j++ )
			{
				
				$rgb = imagecolorat($ressource, $i, $j);
		        // il faut ensuite traduire cet "index" en couleurs
		        // R, G et B. La documentation nous propose deux solutions
		        // on opere des decalages binaires et des masquages
				$r= ($rgb >> 16) & 0xFF;
				$g = ($rgb >> 8) & 0xFF;
				$b = $rgb & 0xFF;
				
				$I->tab[ $i ][ $j ]= ($r+$g+$b)/3;
			}
		}
		return $I;
    }
    
    
    public static function ressource2image($ressource)
    {
        return ressource2imageRGB($ressource);    
    }
    
    
     /*!
	 * \fn image2ressource($imageTimmi)
	 * \brief convertit une image de la library timmi en image de la library gd
	 *
	 * \param $imageTimmi une image TiMMi
	 * \return $imageGd une image gd
	 * 
	 *\code
	  <?php 
	     require_once("src/Lecteur.php");
	
	     $lecteur    = new Lecteur();
         $lecteur->ouvre("images/bobine.png");
         $imageTimmi = lecteur->export();	     
	     $imageGd    = Conversion::image2ressource($imageTimmi);

	  ?php>
	 \endcode
	 */
    public static function image2ressource(ImageRGB $Irgb)
    {
       
       return imageRGB2ressource($Irgb);    
      
    }
    
    
    public static function imageRGB2ressource(ImageRGB $Irgb)
    {    
        
        
		//on creer l'image	
		$im = imageCreateTrueColor( $Irgb->getLargeur() ,$Irgb->getHauteur() );
		
        for( $i = 0 ; $i < $Irgb->getLargeur(); $i++ )
		{
			for( $j = 0 ; $j < $Irgb->getHauteur() ; $j++ )
			{
			    $r = $Irgb->tab[ $i ][ $j ][ 0 ];
				$g = $Irgb->tab[ $i ][ $j ][ 1 ];
				$b = $Irgb->tab[ $i ][ $j ][ 2 ];
				
                // on construit la couleur 
		        $c = imageColorAllocate( $im, $r , $g , $b );
		        // on applique cette couleur au pixel de coordonées $i,$j
		        imageSetPixel( $im , $i , $j , $c );
			}
		}
		
		return $im;
		
    }
    
    
    public static function imageMonochrome2ressource(ImageMonochrome $I)
    {    
        
        
		//on creer l'image	
		$im = imageCreateTrueColor( $I->getLargeur() ,$I->getHauteur() );
		
        for( $i = 0 ; $i < $I->getLargeur(); $i++ )
		{
			for( $j = 0 ; $j < $I->getHauteur() ; $j++ )
			{
			    $x = $I->tab[ $i ][ $j ];
								
                // on construit la couleur 
		        $c = imageColorAllocate( $im, $x , $x , $x );
		        // on applique cette couleur au pixel de coordonées $i,$j
		        imageSetPixel( $im , $i , $j , $c );
			}
		}
		
		return $im;
		
    }

    
    
    
    public static function imageRGB2imageMonochrome(ImageRGB $Irgb)
    {
	    $I = new ImageMonochrome($Irgb->getLargeur() ,$Irgb->getHauteur());
	    
	    for( $i = 0 ; $i < $Irgb->getLargeur(); $i++ )
		{
			for( $j = 0 ; $j < $Irgb->getHauteur() ; $j++ )
			{
			 
			     $I->tab[ $i ][ $j ] = 
			         ($Irgb->tab[ $i ][ $j ][0]+
			         $Irgb->tab[ $i ][ $j ][1]+
			         $Irgb->tab[ $i ][ $j ][2])/3;
			 
			}
	    }
	    
	    return $I;
        
    }
    
        
    
    
    
      
}

