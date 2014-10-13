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

class Conversion{
   
    /*!
	 * \fn ressource2image($imageGd)
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
    public static function ressource2image($ressource)
    { 
        
        $largeur  = imagesx($ressource);
	    $hauteur  = imagesy($ressource);
        
        $image = new Image($largeur, $hauteur);
        
        
        for( $i = 0 ; $i < $largeur ; $i++ )
		{
			for( $j = 0 ; $j < $hauteur ; $j++ )
			{
				
				$rgb = imagecolorat($ressource, $i, $j);
		        // il faut ensuite traduire cet "index" en couleurs
		        // R, G et B. La documentation nous propose deux solutions
		        // on opere des decalages binaires et des masquages
				$image ->tab[ $i ][ $j ][ 0 ] = ($rgb >> 16) & 0xFF;
				$image ->tab[ $i ][ $j ][ 1 ] = ($rgb >> 8) & 0xFF;
				$image ->tab[ $i ][ $j ][ 2 ] = $rgb & 0xFF;
			}
		}
		return $image;
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
    public static function image2ressource($I)
    {
		//on creer l'image	
		$im = imageCreateTrueColor( $I->getLargeur() ,$I->getHauteur() );
		
        for( $i = 0 ; $i < $I->getLargeur(); $i++ )
		{
			for( $j = 0 ; $j < $I->getHauteur() ; $j++ )
			{
			    $r = $I->tab[ $i ][ $j ][ 0 ];
				$g = $I->tab[ $i ][ $j ][ 1 ];
				$b = $I->tab[ $i ][ $j ][ 2 ];
				
                // on construit la couleur 
		        $c = imageColorAllocate( $im, $r , $g , $b );
		        // on applique cette couleur au pixel de coordonées $i,$j
		        imageSetPixel( $im , $i , $j , $c );
			}
		}
		
		return $im;
		
    }
    
    
      
}

