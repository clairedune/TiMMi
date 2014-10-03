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
    public function export();
    public function import(Image $I);    
	public function ouvre($filename);
	public function enregistre();
	public function enregistreSous($filename);	
    public function afficheImage();
}