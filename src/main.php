<?php
	/*! 
	 * \file main.php
	 * \brief Ce fichier contient l'introduction à la documentation
	 * \author Claire Dune
	 * \date 20/09/2014
	 */

/*!
 * \mainpage Bienvenue dans la documentation de la bibliothèque php TiMMi
 *
 *	
 * \section Introduction 
 *
 * Vous utiliserez ces fonctions dans le cours de traitement d'image au semestre 3.
 *
 * \section install Comment installer la bibliothèque ?
 *
 * \subsection install_gd Etape 1 : assurez vous que la bibliothèque gd est bien activée sur votre serveur php 
 \code
 <?php
 	phpinfo();
 ?>
 \endcode 
 * Si vous utilisez easyPhp, allez dans configuration—>extension php--->php gd2  
 *
 * \subsection install_step2 Etape 2 : copiez le répertoire phpTiSrc dans votre dossier www (ou htdocs, selon que vous utilisez wamp ou xamp)
 * \subsection install_step3 Etape 3 : vérifiez que tous les utilisateurs ont les droits en écriture sur le répértoire res
 * \subsection install_step4 Etape 4 : incluez ensuite vos les fichiers nécessaires dans vos codes.
 \code
 <?php
	 include('conf/config.php');
 	include('src/Display.php');
 	etc ...
 ?> 
 \endcode 
 *
 * \section documentation Ou puis-je trouver de la documentation ? 
 *
 * La bibliothèque phpTiSrc est basée sur la bibliothèque php gd. 
 * Beaucoup d'autres bibliothèques de traitement de l'image sont disponibles (ex: imagick). 
 * Nous avons choisis la bibliothèque gd principalement parcequ'elle est habituellement disponible sur les serveurs php que vous installez en utilisant Xamp, Wamp ou Mamp.
 * 
 * Vous trouverez une documentation en français très complète et bien rédigée sur le site officiel de php : http://php.net/manual/fr/
 *
 * \subsection documentation_TiMMi Documentation de TiMMi
 * Vous trouverez la documentation de la bibliothèque TiMMi dans 
 * \code TiMMi/doc/html\endcode
 * \n
 * Cette documentation a été générée automatiquement en utilisant Doxygen. 
 * Si vous ajoutez de nouvelles fonctionnalités à cette librairie et souhaitez mettre à jour la documentation, il suffit 
 * d'installer Doxygen (http://www.stack.nl/~dimitri/doxygen/index.html) et générer la documentation pour le répertoire src. 
 *\n
 * Doxygen utilise un fichier qui s'appelle Doxyfile. Il est ici déjà configuré pour parser le code du répertoire src recursivement. 
 * \code
 cd TiMMi
 doxygen
 \endcode
 *
 * \subsection documentation_gd  Documentation sur la bibliothèque gd
 * PHP n'est pas limité à la génération de sortie HTML. 
 * Ce langage peut aussi être utilisé pour créer et manipuler des fichiers images GIF, PNG, JPEG, WBMP, and XPM.
 * Le manuel de la librairie gd se trouve ici :	http://php.net/manual/fr/book.image.php					   
 * 
 */
