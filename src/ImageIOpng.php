<?php
	/*! 
	 * \file ImageIOpng.php
	 * \brief Ce fichier contient des methodes de lecture et enregistrement des images
	 * \author Claire Dune
	 * \date 2/10/2014
	 */

    /*!
    * \class ImageIOpng
    * \brief classe ImageIOgif, affichage, lecture et écriture des images
    * \author Claire Dune
    * \date 2/10/2014
    */
	
require_once("ImageIO.php");
require_once("Image.php");
require_once("Conversion.php");


class ImageIOpng extends ImageIO
{
    
      
	public function ouvre($filename)
	{
	  $this->_filename = $filename;
	  $this->_im       = imagecreatefrompng($this->_filename);
	}
	
	public function enregistre()
	{
	   imagepng($this->_im, $this->_filename);
	}
	
	public function enregistreSous($filename)
	{
	   $this->_filename = $filename;
	   $this->enregistre();
	}
}