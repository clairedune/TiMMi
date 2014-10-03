<?php


 	require_once("ImageIOpng.php");
    require_once("ImageIOjpg.php");
    require_once("ImageIOgif.php");
    require_once("InterfaceIO.php");

/*! 
 * \file Lecteur.php 
 * \brief Ce fichier contient la classe Lecteur qui permet d'ouvrir, enregistrer et afficher n'importe quel fichier image
 * \author Claire Dune
 * \date 2/10/2014
 */
	 
/*!
* \class Lecteur
* \brief classe lecteur pour les TP de 
*  traitement d'image qui permet d'ouvrir, enregistrer et afficher n'importe quel fichier image
* \author Claire Dune
* \date 2/10/2014
*/

    
class Lecteur implements interfaceIO
{
    
	private $_lecteur;
	
	
	/*------------------------------------*/
	public function Lecteur()
	{
	    $this->_lecteur = new ImageIOpng(); 
    }
	
	/*------------------------------------*/
	public function selectLecteur($name)
	{	
	    $info = new SplFileInfo($name);
       
       // on utilise l'extension pour utiliser le bon lecteur
       // attention en selectionnant un nouveau lecteur, on 
       // efface l'image qu'il contenait et son nom de fichier
	   if(($info->getExtension()=="jpg"||$info->getExtension()=="jpeg")&&get_class($this->_lecteur)!="ImageIOjpg")
	       {
	           $this->_lecteur = new ImageIOjpg();
	       }  
	   else if($info->getExtension()=="png"&&get_class($this->_lecteur)!="ImageIOpng")
	       {
	           $this->_lecteur = new ImageIOpng(); 
	       }
	   else if($info->getExtension()=="gif"&&get_class($this->_lecteur)!="ImageIOgif")
	       {
	           $this->_lecteur = new ImageIOgif(); 
	         
	       }

	    	    
	}
	
    public function export()
    { 
        return $this->_lecteur->export();
    }
    
    public function import(Image $I)
    {
        $this->_lecteur->import($I);    
    }  
	
	public function ouvre($filename)
	{   
	    $this->selectLecteur($filename);
	    $this->_lecteur->ouvre($filename);
	}
	
	public function enregistre()
	{   
	    $this->_lecteur->enregistre();
	}
	
	public function enregistreSous($filename)
	{  
	    $tmp=$this->_lecteur->_im;
	    $this->selectLecteur($filename);
	    $this->_lecteur->_im = $tmp;
	    $this->_lecteur->enregistreSous($filename);
	} 
	 
	 public function afficheImage()
	 {
	   $this->_lecteur->afficheImage();
	 }
	
   
    
}