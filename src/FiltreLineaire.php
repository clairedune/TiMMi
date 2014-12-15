<?php
/*! 
 * \file FiltreLineaire.php 
 * \brief Ce fichier contient la classe FiltreLineaire qui permet d'appliquer des masques de convolution sur une image
 * \author Claire Dune
 * \date 20/10/2013
 */
	 
require_once('Image.php');	 
	 
/*!
* \class FiltreLineaire
* \brief classe FiltreLineaire 
*/
class FiltreLineaire
{
	/*! \param $taille : taille du filtre*/
	protected $taille;
	/*! \param $K : tableau contenant les coefficients du filtre*/
	public $K;
	/*! \param $facteur : tableau contenant le facteur diviseur*/
	public $facteur;	
		
	/*!
	 * \fn __construc()
	 */
	public function __construct($t=3)
	{
	 	//hydratation
		$this->taille = $t;
		$this->facteur = $t*$t;	
		//initialisation du tableau
		for($i=0;$i<$this->taille;$i++)
		{
			for($j=0;$j<$this->taille;$j++)
				{
					$this->K[$i][$j]=1;
				}
		}
	}	
		
	/*!
	 * \fn __toString()
	 */
	public function __toString()
	{
		$a= "<hr/><H3>Attributs du filtre</H3>".
		"<br />Taille : ".$this->taille.
		"<br />Facteur : ".$this->facteur.
		"<br/><hr/>";
		
		for($j=0;$j<$this->taille;$j++)
		{
		    $a = $a."<br/>";
			for($i=0;$i<$this->taille;$i++)
				{
					$a = $a." ".$this->K[$i][$j]." ";
				}
		}
		
		return $a;
	}
	
	public function getTailles(){return $this->taille;}
	
	// creation de l'image resultat         
    private function appliqueMasque (Image $IbNw)
    {
        $largeur = $IbNw->getLargeur();
        $hauteur = $IbNw->getHauteur();
        $Imoy = new Image($largeur, $hauteur);
        
        
        
        for( $i=floor($this->taille/2) ; $i<$largeur-floor($this->taille/2) ; $i++ )
        {
            for( $j=floor($this->taille/2) ; $j<$hauteur-floor($this->taille/2) ; $j++ )
            {
               $p = 0;
               
               for( $m=0 ; $m<$this->taille ; $m++)
               { 
                    for( $n=0 ; $n<$this->taille ; $n++)
                    {   
                        $p+= $IbNw->tab[$i+$m-floor($this->taille/2)][$j+$n-floor($this->taille/2)][0]*$this->K[$m][$n];
                    }
               }
                
               $p = $p/$this->facteur ;
               
               $Imoy->tab[$i][$j][0] =$p ;
               $Imoy->tab[$i][$j][1] =$p ;
               $Imoy->tab[$i][$j][2] =$p ;
            }
        }
        return $Imoy;
    }
    
    public function convolution (Image $IbNw,$K,$facteur)
    { 
       $this->K = $K; 
       $this->facteur = $facteur;
       $this->taille = (count($K)); 
       return $this->appliqueMasque ($IbNw); 
    }
    
    public function flouMoyen (Image $IbNw, $rayon)
    {
         $this->taille = $rayon;
         $this->facteur = $rayon*$rayon;
         
         for($i=0;$i<$this->taille;$i++)
		  {
			for($j=0;$j<$this->taille;$j++)
				{
					$this->K[$i][$j]=1;
				}
		  }
         
    
        return $this->appliqueMasque($IbNw);    
        
    }
    


}