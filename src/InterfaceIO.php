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


interface InterfaceIO
{
    
    
    /*!
	 * \fn exporte()
	 * \brief permet de créer une image de la librairie TiMMi
	 * \return une image
	 */   
    public function exporte();
     /*!
	 * \fn importe(Image $I)
	 * \brief 
	 */  
    public function importe(Image $I); 
     /*!
	 * \fn ouvre($filename)
	 * \brief 
	 */     
	public function ouvre($filename);
	 /*!
	 * \fn enregistre()
	 * \brief 
	 */  
	public function enregistre();
	 /*!
	 * \fn enregistreSous($filename)
	 * \brief 
	 */  
	public function enregistreSous($filename);	
	 /*!
	 * \fn afficheImage()
	 * \brief 
	 */  
    public function afficheImage();
}