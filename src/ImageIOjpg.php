<?php
	/*! 
	 * \file ImageIOjpg.php
	 * \brief Ce fichier contient des methodes de lecture et enregistrement des images
	 * \author Claire Dune
	 * \date 2/10/2014
	 */

    /*!
    * \class ImageIOjpg
    * \brief classe ImageIOjpg, affichage, lecture et écriture des images
    * \author Claire Dune
    * \date 2/10/2014
    */	
require_once("ImageIO.php");
require_once("Image.php");


class ImageIOjpg extends ImageIO
{
    
   
    
	public function ouvre($filename)
	{
	  $this->_filename = $filename;
	  $this->im       = imageCreateFromJpeg($this->_filename);
	}
	
	public function enregistre($filename)
	{
	   $this->_filename = $filename;
	   imagejpeg($this->im, $this->_filename);
	}
	
	
}