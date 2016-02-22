<?php
	/*! 
	 * \file InterfaceIO.php
	 * \brief Ce fichier contient des methodes de lecture et enregistrement des images
	 * \author Claire Dune
	 * \date 2/10/2014
	 */

    /*!
    * \interface InterfaceIO
    * \brief interface InterfaceIO : prototype des methodes d'affichage, lecture et écriture des images
    * \author Claire Dune
    * \date 2/10/2014
    */
	
require_once "Image.php";
require_once "ImageMonochrome.php";
require_once "Image.php";

interface InterfaceIO
{
    
  
    /*!
	 * \fn exporte()
	 * \brief permet de créer une image de la librairie TiMMi
	 * \return une image
	 */   
    public function exporte();
  
    
    /*!
	 * \fn exporteEnRGB()
	 * \brief permet de créer une image de la librairie TiMMi
	 * \return une image
	 */   
    public function exporteRGB();
    
    /*!
	 * \fn exporteEnMonochrome()
	 * \brief permet de créer une image de la librairie TiMMi
	 * \return une image
	 */   
    public function exporteMonochrome();
    
     /*!
	 * \fn importeRGB(Image $I)
	 * \brief 
	 */  
    public function importe(Image $I);  
    
     /*!
	 * \fn ouvre($filename)
	 * \brief ouvre un fichier sur le disque et retourne une image
	 */     
	public function ouvre($filename);
	 /*!
	 * \fn enregistre()
	 * \brief ouvre un fichier sur le disque et retourne une image
	 */  
	public function enregistre($filename);

		
	 /*!
	 * \fn afficheImage()
	 * \brief 
	 */  
    public function afficheImage();
}