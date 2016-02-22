<?php
/*! 
 * \file Image.php 
 * \brief Ce fichier contient la classe Image que vous compléterez dans vos TP
 * \author Claire Dune
 * \date 20/10/2013
 */
	 
/*!
* \class Image
* \brief classe image pour les TP de traitement d'image. Elle contient un tableau de 3 dimensions.
* \author Claire Dune
* \date 20/09/2013
*/

require_once("Image.php");

class ImageMonochrome extends Image
{
	
	
	/*!*/
    public function __construct($l, $h)
	{
	 	//hydratation
		$this->largeur = $l;
		$this->hauteur = $h;
			
		//initialisation du tableau
		$this->initTab();
	}	
	
    public function __toString()
	{
	    $text = "<H3>Image Monochrome</H3> ";
	    $def = "<H4>Encodage</H4> <p>Chaque pixel est encodé par une seule valeur d'intensité codée sur 8 bits</p>";
	   
		return $text.$def.parent::__toString();
	}
	
	
	
	
	public function initTab()
	{
	   for($i=0;$i<$this->largeur;$i++)
		{
			for($j=0;$j<$this->hauteur;$j++)
				{
					$this->tab[$i][$j]=0;
				}
		}
	   
	}
	
			
	public function findMinimum($couche=0)
	{
	   $min =255;
	   for ($i=0;$i<$this->largeur;$i++)
	       for ($j=0;$j<$this->hauteur;$j++) 
	       {
	         if($this->tab[$i][$j]<$min) $min = $this->tab[$i][$j];
	       
	       }
	         
	   return $min;
	}

    
	public function findMaximum($couche=0)
	{
	   $max = 0;
	   for ($i=0;$i<$this->largeur;$i++)
	       for ($j=0;$j<$this->hauteur;$j++) 
	       {
	         if($this->tab[$i][$j]>$max) $max = $this->tab[$i][$j];
	       
	       }
	         
	   return $max;
	}


}