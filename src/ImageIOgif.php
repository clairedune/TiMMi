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


class ImageIOgif extends ImageIO
{
 
	public function ouvre($filename)
	{
	  $this->_filename = $filename;
	  $this->im        = imageCreateFromGif($this->_filename);
	}
	
	public function enregistre($filename)
	{
	   $this->_filename = $filename;
	   imagegif($this->im, $filename);
	}
	
}