<?php
	/*! 
	 * \file ImageIOgif.php
	 * \brief Ce fichier contient des methodes de lecture et enregistrement des images
	 * \author Claire Dune
	 * \date 2/10/2014
	 */

    /*!
    * \class ImageIOgif
    * \brief classe ImageIOgif, affichage, lecture et écriture des images
    * \author Claire Dune
    * \date 2/10/2014
    */
	
require_once("ImageIO.php");
require_once("Image.php");
require_once("Conversion.php");


class ImageIOgif extends ImageIO
{
    
       
	public function ouvre($filename)
	{
	  $this->_filename = $filename;
	  $this->_im       = imageCreateFromGif($this->_filename);
	}
	
	public function enregistre()
	{
	   imagegif($this->_im, $this->_filename);
	}
	
	public function enregistreSous($filename)
	{
	   $this->_filename = $filename;
	   $this->enregistre();
	}
}