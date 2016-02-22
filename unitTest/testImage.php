<?php
	require_once("../conf/config.php");
	require_once("../src/ImageMonochrome.php");
    require_once("../src/ImageRGB.php");
    require_once("../src/ImageConversion.php");
    
    
    $Irgb = new ImageRGB(2,3);
    
      for( $i = 0 ; $i < $Irgb->getLargeur(); $i++ )
		{
			for( $j = 0 ; $j < $Irgb->getHauteur() ; $j++ )
			{
			     $Irgb->tab[$i][$j][0]=50*$i+10*$j;
			     $Irgb->tab[$i][$j][1]=10*$i+50*$j;
			     $Irgb->tab[$i][$j][2]=255;
			}
	    }
    
    
    echo $Irgb;
    print_r($Irgb);
    
    $r = $Irgb->tab[1][2][0];
    $g = $Irgb->tab[1][2][1];
    $b = $Irgb->tab[1][2][2];    
    echo "<br/ ><br/ > La valeur RGB du pixel (1,2): 
          rouge ".$r.", vert ".$g." et bleu ".$b;
 
    
    $I = ImageConversion::imageRGB2imageMonochrome($Irgb);
    
    echo $I;
    print_r($I);
    
    $x = $I->tab[1][2];
    echo "<br/ ><br/ > La valeur Intensité du pixel (1,2): ".$x;
    
    
?>

