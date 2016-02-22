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



class ImageIOpng extends ImageIO
{ 
	public function ouvre($filename)
	{
	  $this->_filename = $filename;
	  $this->im       = imagecreatefrompng($this->_filename);
	}
	
	public function enregistre($filename)
	{
	   $this->_filename = $filename;
	   imagepng($this->im, $this->_filename);
	}	
}