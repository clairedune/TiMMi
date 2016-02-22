<?php
	/*! 
	 * \file ImageIO.php
	 * \brief Ce fichier contient des methodes de lecture et enregistrement des images
	 * \author Claire Dune
	 * \date 20/10/2013
	 */

    /*!
    * \class ImageIO
    * \brief classe ImageIO, lecture et écriture des images
    * \author Claire Dune
    * \date 20/09/2014
    * \warning c'est une classe abstraite, on ne peut donc pas l'instancier
    * ce sont ses classes filles qui peuvent être utilisées
    * \warning cette classe est une classe interne de la librairie, utilisez plutôt la classe Lecteur
    */
	
require_once "Image.php";
require_once "InterfaceIO.php";
require_once "ImageConversion.php";

abstract class ImageIO implements InterfaceIO
{
    protected $_filename = "tmp.png";
    public $im;
    
    
    /*!
	 * \fn __toString()
	 * \brief permet d'afficher les infos de l'image
	 *
	 */
    public function __toString()
    {
        return  "<br />----ImageIO info-----<br />".
                "<br />Fichier :<br />".$this->_filename."<br/>".
                "<br />Largeur :<br />".imagesx($this->im)."<br/>".
                "<br />Hauteur :<br />".imagesy($this->im)."<br/>";    
    }
    
     /*!
	 * \fn afficheImage()
	 * \brief utilise la balise HTML img pour afficher le fichier image
	 * \warning attention, l'image doit être enregistrée
	 */
    public function afficheImage()
    {
		echo "<table>".
		"<tr><td>".
		"<img src=\"".$this->_filename."\"\>".
		"</td></tr><tr><td>".$this->_filename."</td></tr></table>";
    }
    
    
    /*!
	 * \fn exporteRGB()
	 * 
	 * \brief export le fichier image en un image TiMMi
	 * \return Image $I, une image RGB pour le traitement d'image
	 */
    public function exporteRGB()
    {
        return ImageConversion::ressource2imageRGB($this->im);
    }
    
     /*!
	 * \fn exporte()
	 * 
	 * \brief export le fichier image en un image TiMMi
	 * \return Image $I, une image RGB pour le traitement d'image
	 */
    public function exporte()
    {
        return $this->exporteRGB();
    }

    
    
     /*!
	 * \fn exporteMonochrome()
	 * 
	 * \brief export le fichier image en un image TiMMi
	 * \return Image $I, une image intensity pour le traitement d'image
	 */
    public function exporteMonochrome()
    {
        return ImageConversion::ressource2imageMonochrome($this->im);
    }
    
  
    /*!
	 * \fn import(Image $I)
	 * \brief utilise une image TiMMi pour en faire une image gd prête a être enregistrée
	 *
	 */  
    public function importe(Image $I)
    {
        
        if(get_class($I)=="ImageRGB") 
            $this->im = ImageConversion::imageRGB2ressource($I);  
        elseif(get_class($I)=="ImageMonochrome")
            $this->im = ImageConversion::imageMonochrome2ressource($I); 
        else
            $this->im = ImageConversion::imageRGB2ressource($I); 
    }
    
        
    /*!
	 * \fn getFilename()
	 * \brief donne le nom du fichier courant
	 *
	 * \return $filename : le nom du fichier
	 */
    public function getFilename()
    {
         return       $this->_filename;  
    }

    
     /*!
	 * \fn ouvre($filename);
	 * \brief 
	 * \warning  c'est une methode abstraite de cette classe
	 */     
	public abstract function ouvre($filename);
	
	 /*!
	 * \fn enregistre();
	 * \brief 
	 *
	 * \return $filename : le nom du fichier
	 */
	public abstract function enregistre($filename);
	
}