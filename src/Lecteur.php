<?php


 	require_once("ImageIOpng.php");
    require_once("ImageIOjpg.php");
    require_once("ImageIOgif.php");
    require_once("InterfaceIO.php");

/*! 
 * \file Lecteur.php 
 * \brief Ce fichier contient la classe Lecteur qui permet d'ouvrir, enregistrer et afficher n'importe quel fichier image
 * \author Claire Dune
 * \date 2/10/2014
 */
	 
/*!
* \class Lecteur
* \brief classe lecteur pour les TP de 
*  traitement d'image qui permet d'ouvrir, enregistrer et afficher n'importe quel fichier image
* \author Claire Dune
* \date 2/10/2014
* \example exampleGradient.php, exampleColorGradient.php
*/

    
class Lecteur implements InterfaceIO
{
    static public $instances = 0; 
    public $instance;
    public $num = 0;
	private $_lecteur;
	
	
	/*!
	 * \fn Lecteur()
	 * \brief constructeur de la classe Lecteur
	 *
	 *
	 * Exemple : creation d'une image
	 * \code
	 <?php
	        $lecteur = new Lecteur();
            $lecteur->ouvre("../images/bobine.png");
            $lecteur->afficheImage();
	  ?php>
	 * \endcode
	 */
	public function Lecteur()
	{
	   $this->instance = ++self::$instances;
	   $this->_lecteur = new ImageIOpng(); 
    }
	
	/*!
	 * \fn selectionneLecteur()
	 * \brief permet de selectionner le bon lecteur selon l'extension du fichier
	 * \warning c'est une méthode privée qui n'est pas accessible depuis l'extérieur de    
	 * la classe
	 */
	private function selectionneLecteur($name)
	{	
	    $info = new SplFileInfo($name);
       
       // on utilise l'extension pour utiliser le bon lecteur
       // attention en selectionnant un nouveau lecteur, on 
       // efface l'image qu'il contenait et son nom de fichier
	   if(($info->getExtension()=="jpg"||$info->getExtension()=="jpeg")&&get_class($this->_lecteur)!="ImageIOjpg")
	       {
	           $this->_lecteur = new ImageIOjpg();
	       }  
	   else if($info->getExtension()=="png"&&get_class($this->_lecteur)!="ImageIOpng")
	       {
	           $this->_lecteur = new ImageIOpng(); 
	       }
	   else if($info->getExtension()=="gif"&&get_class($this->_lecteur)!="ImageIOgif")
	       {
	           $this->_lecteur = new ImageIOgif(); 
	         
	       }

	    	    
	}
	
	
	
	
	/*!
	 * \fn exporte()
	 * \brief cette méthode permet de créer une image de la classe Image pour le traitement d'image
	 *
	 *
	 * 
	 * \code
	 <?php
	        $lecteur = new Lecteur();
            $lecteur->ouvre("../images/bobine.png");
            $lecteur->afficheImage();
            $I = $lecteur->exporte();
	  ?php>
	 \endcode
	 */
    public function exporte()
    { 
        return $this->_lecteur->exporte();
    }
    
    
    /*!
	 * \fn importe(Image $I)
	 * \brief cette méthode permet de créer une image de la classe Image pour le traitement d'image
	 * \param $I c'est l'image qu'on veut charger 
	 * \param $filename c'est le nom du fichier, par défaut, il est null.
	 * 
	 * \code
	 <?php
	        $lecteur = new Lecteur();
            $lecteur->ouvre("../images/bobine.png");
            $lecteur->afficheImage();
            $I = $lecteur->export();
	  ?php>
	 * \endcode
	 */
    public function importe(Image $I, $filename = NULL)
    {
        $this->_lecteur->importe($I); 
       
       if(is_null($filename))
       {
         $this->num++;
         $this->enregistreSous("../res/lecteur".$this->instance."-im".$this->num.".png"); 
       }  
       else 
         $this->enregistreSous($filename); 
       
    
    }
	
	
		
	/*!
	 * \fn ouvre($filename)
	 * \brief cette méthode permet d'ouvrir un fichier image qui a pour nom $filename
	 * \param $filename, une chaîne de caractere qui donne le chemin du fichier image et son nom
	 * \return $I image prete a etre utilisée pour le traitement de l'image qu'on peut capter ou pas
	 * \code
	 <?php
	        $lecteur = new Lecteur();
            $lecteur->ouvre("../images/bobine.png");
	  ?php>
	 \endcode
	 * ou
     \code
	 <?php
	        $lecteur = new Lecteur();
            $I = $lecteur->ouvre("../images/bobine.png");
             
	  ?php>
	 \endcode
	 */

	public function ouvre($filename)
	{   
	    $this->selectionneLecteur($filename);
	    $this->_lecteur->ouvre($filename);
	    return $this->exporte();
	}
	
	
	
	/*!
	 * \fn enregistre()
	 * \brief cette méthode enregistre l'image courante dans le fichier image courant
	 * \warning : attention, cette methode ecrase l'image courante
	 * \code
	 <?php
	        $lecteur = new Lecteur();
            $lecteur->ouvre("../images/bobine.png");
            $lecteur->enregistre(); // ecrase l'image bobine.png
	  ?php>
	 * \endcode
	 */
	public function enregistre()
	{   
	    $this->_lecteur->enregistre();
	}
	
	/*!
	 * \fn enregistreSous($filename)
	 * \brief cette méthode permet d'enregistrer l'image courante dans un fichier image qui a pour nom $filename
	 * \param $filename, une chaîne de caractere qui donne le chemin du fichier image et son nom
	 * \warning : attention, il faut que les permissions soient données en écriture sur ce fichier
	 * \code
	 <?php
	        $lecteur = new Lecteur();
            $lecteur->ouvre("../images/bobine.png");
            $lecteur->enregistreSous("../res/bobine.png");
	  ?php>
	  \endcode
	 */
	public function enregistreSous($filename)
	{  
	    $tmp=$this->_lecteur->_im;
	    $this->selectionneLecteur($filename);
	    $this->_lecteur->_im = $tmp;
	    $this->_lecteur->enregistreSous($filename);
	} 
	 
	 
	 /*!
	 * \fn afficheImage()
	 * \brief cette méthode permet d'afficher l'image à l'écran
	 * \warning attention, il faut que l'image soit enregistrée sur le disque pour être appelée
	 * \code
	 <?php
	        $lecteur = new Lecteur();
            $lecteur->ouvre("../images/bobine.png");
            $lecteur->afficheImage();
	  ?php>
	 * \endcode
	 */
	 public function afficheImage()
	 {
	   $this->_lecteur->afficheImage();
	 }
	
   
    
}