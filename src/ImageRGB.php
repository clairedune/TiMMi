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

class ImageRGB extends Image
{
	
	/*!
	 * \fn __construct($l, $h)
	 * \brief constructeur de la classe Display
	 *
	 * \param $l la largeur de l'affichage
	 * \param $h la hauteur de l'affichage
	 * \example examples/exampleGradient.php
	 * Exemple : creation d'une image
	 \code
    require_once("../conf/config.php"); 
    require_once("../src/ImageRGB.php");
    require_once("../src/Lecteur.php");
    // on creer une image
    $largeur = 255;
    $hauteur = 100;
    $I = new ImageRGB($largeur, $hauteur);
 
    // on affiche les informations de l'image
    echo $I;
 
 
    // on remplit les pixels avec un degradé
    for($i = 0 ; $i < $largeur ; $i ++) // on parcourt les colonnes
        for ($j = 0 ; $j < $hauteur ; $j ++) // on parcourt les lignes
        {
            $I->tab[$i][$j][0] = $i;  // couche du rouge
            $I->tab[$i][$j][1] = $i;  // couche du vert
            $I->tab[$i][$j][2] = $i;  // couche du bleu
        }
 
    // on creer un lecteur
    $lecteur = new Lecteur();
 
    // on importe l'image
    $lecteur->importe($I);
 
    // on enregistre l'image dans un fichier physique
    $lecteur->enregistreSous("../res/gradientGris.png");
 
    // on affiche l'image
    echo "<br/> Degrade de niveaux de gris <br/>";
    $lecteur->afficheImage();
    \endcode
	 */
	public function __construct($l, $h)
	{
	 	//hydratation
		$this->largeur = $l;
		$this->hauteur = $h;
			
		//initialisation du tableau de pixel
		$this->initTab();
	}	
	
	
	
	public function __toString()
	{
	    $text = "<H3>Image RGB</H3> ";
	    $def = "<H4>Encodage</H4> <p>Chaque pixel est encodé par un tableau de trois valeurs Rouge, Vert et Bleu. Chacune de ces valeurs est codées sur 8 bits</p>";
		
		return $text.$def.parent::__toString();
	}
	
	
	
	public function initTab()
	{
	   for($i=0;$i<$this->largeur;$i++)
		{
			for($j=0;$j<$this->hauteur;$j++)
				{
					$this->tab[$i][$j][0]=0;
					$this->tab[$i][$j][1]=0;
				  	$this->tab[$i][$j][2]=0;
				}
		}
	   
	}
	
			
	public function findMinimum($couche)
	{
	   $min =255;
	   for ($i=0;$i<$this->largeur;$i++)
	       for ($j=0;$j<$this->hauteur;$j++)
	         if($this->tab[$i][$j][$couche]<$min) 
	           $min = $this->tab[$i][$j][$couche];
	         
	   return $min;
	}

    
	public function findMaximum($couche)
	{
	   $max = 0;
	   for ($i=0;$i<$this->largeur;$i++)
	       for ($j=0;$j<$this->hauteur;$j++) 
	         if($this->tab[$i][$j][$couche]>$max) 
	           $max = $this->tab[$i][$j][$couche];
	                
	   return $max;
	}


}