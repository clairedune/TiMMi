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
abstract class Image
{
	/*! \param $largeur : largeur de l'image*/
	protected $largeur;
	/*! \param $hauteur : hauteur de l'image*/
	protected $hauteur;
	/*! \param $tab : valeurs des pixels*/
	public $tab;	
		
	
	

	
		
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
		return "<H4>Attributs de l'image</H4>".
		"<ul><li>Largeur : ".$this->largeur.
		"</li><li>Hauteur : ".$this->hauteur."</li></ul>";
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
	
	
	/*!
	 * \fn initTab
	 * \brief initilise a zero le tableau de la classe
	 */
	public abstract function initTab();
	
	public abstract function findMinimum($couche);

    public abstract function findMaximum($couche);
	


}