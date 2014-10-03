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
    */
	
require_once "Image.php";
require_once "InterfaceIO.php";


abstract class ImageIO implements InterfaceIO
{
    protected $_filename = "tmp.png";
    public $_im;
    
    public function __toString()
    {
        return  "<br />----Image info-----<br />".
                "<br />Fichier :<br />".$this->_filename."<br/>";    
    }
    
    public function afficheImage()
    {
		echo "<img src=\"".$this->_filename."\"\>";
    }
    
    public function export()
    {
        return Conversion::ressource2image($this->_im);
    }
  
    public function import(Image $I)
    {
        $this->_im = Conversion::image2ressource($I);    
    }
    
    public function setFilename($a)
    {
        $this->_filename = $a;  
    }
    
    
         
	public abstract function ouvre($filename);
	public abstract function enregistre();
	public abstract function enregistreSous($filename);	
}