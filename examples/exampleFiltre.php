<?php
	/*! 
	 * \file exampleIntro.php
	 * \brief ce fichier montre un premier exemple de chargement d'une image et d'affichage
	 * \author Claire Dune
	 * \date 20/10/2013
	 */

	require_once("../conf/config.php");
	require_once("../src/Lecteur.php");
    require_once("../src/colorMode.php");
    require_once("../src/FiltreLineaire.php");
    
   // phpInfo();
       
  
    
       
    $lecteur = new Lecteur();
    $lecteur->ouvre("../images/bobine.png"); 
    $Isrc = $lecteur->exporte();
    $IbNw = ColorMode::desaturation( $Isrc );
      
    $f=new FiltreLineaire();  
    
    $L[0][0] =1 ; $L[1][0] =1 ; $L[2][0] =1 ;
    $L[0][1] =1 ; $L[1][1] =1 ; $L[2][1] =1 ;  
    $L[0][2] =1 ; $L[1][2] =1 ; $L[2][2] =1 ;
    
    $facteur = 9;
    
    
    $Imoy = $f->convolution($IbNw, $L,9);
    $lecteur->importe($Imoy ,"../res/moyenne2.png");
    $lecteur->afficheImage();    
   
      
    $L[0][0] =1 ; $L[1][0] =0 ; $L[2][0] =-1 ;
    $L[0][1] =2 ; $L[1][1] =0 ; $L[2][1] =-2 ;  
    $L[0][2] =1 ; $L[1][2] =0 ; $L[2][2] =-1 ;
    
    $facteur = 4;
         
    $Ih = $f->convolution($Imoy, $L,9);
    $lecteur->importe($Ih ,"../res/h.png");
    $lecteur->afficheImage();    
    
    
        
    $L[0][0] =1 ; $L[1][0] =2 ; $L[2][0] =1 ;
    $L[0][1] =0 ; $L[1][1] =0 ; $L[2][1] =0 ;  
    $L[0][2] =-1 ; $L[1][2] =-2 ; $L[2][2] =-1 ;
    
    $facteur = 4;
         
    $Iv = $f->convolution($Imoy, $L,9);
    $lecteur->importe($Iv ,"../res/v.png");
    $lecteur->afficheImage();   
     
   
    
   
?>

