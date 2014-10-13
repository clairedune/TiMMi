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
class Image
{
	/*! \param $largeur : largeur de l'image*/
	protected $largeur;
	/*! \param $hauteur : hauteur de l'image*/
	protected $hauteur;
	/*! \param $tab : tableau à 3 dimension qui permet de stocker les valeurs des pixels de l'image*/
	public $tab;	
		
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
 require_once("../src/Image.php");
 require_once("../src/Lecteur.php");

 
 
 // on creer une image
 $largeur = 255;
 $hauteur = 100;
 $I = new Image($largeur, $hauteur);
 
 // on affiche les informations de l'image
 // echo $I;
 
 
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
			
		//initialisation du tableau
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
		
	/*!
	 * \fn __toString()
	 * \brief permet d'afficher le contenu de la classe.
	 *
	 * Exemple : utilisation de __toString() par un appel implicite avec echo
	 * \code
	 * <?php
	   $largeur = 200;
	   $hauteur = 300;
	  	$I = new Image($largeur, $hauteur);
	   echo $I;
	  ?php>
	  \endcode
	 */
	public function __toString()
	{
		return "<hr/><H3>Attributs de l'image</H3>".
		"Largeur : ".$this->largeur.
		"<br />Hauteur : ".$this->hauteur."<br/><hr/>";
	}
	
		
		
	/*!
	 * \fn int getLargeur()
	 * \brief accesseur de la classe image : largeur
	 *
	 * \return largeur, la largeur de l'image
	 *
	 * Exemple : utilisation de l'accesseur sur la largeur
	 * \code
	  <?php
	       $largeur = 200;
	       $hauteur = 300;
	  	   $I = new Image($largeur, $hauteur); 
	       $l = $I->getLargeur();
	       echo $l;
	  ?php>
	  \endcode
	 */
	public function getLargeur(){return $this->largeur;}
	
	/*!
	 * \fn int getHauteur()
	 * \brief accesseur de la classe image : largeur
	 *
	 * \return largeur, la largeur de l'image
	 *
	 * Exemple : utilisation de l'accesseur sur la largeur
	 * \code
	  <?php
	       $largeur = 200;
	       $hauteur = 300;
	  	   $I = new Image($largeur, $hauteur); 
	       $h = $I->getHauteur();
	       echo $h;
	 ?php>
	  \endcode
	 */
	public function getHauteur(){return $this->hauteur;}
	
	
	
	


}