Welcome to the MMi Image Treatement Library TiMMi ! 
 
1. Introduction 
 
 You will use this few functions for the numerisation class (S2) as well 
 as the image processing and the compression class (S3)
 
 
 
2. How to install this library ?

 
 * Step 1 : make sure that the library gd is activated in your php settings
  For instance, with easyPhp,configuration—>extension php--->php gd2  
 * Step 2 : copy the folder TiMMi-3.0 in your www/htdocs folder
 * Step 3 : change the permission on the res folder : everyone should have writing privilege
 
WARNING ! take care of not changing the code architecture.

3. Where can I find the documentation ? 
 
 The TiMMi Toolbox is mainly based on the gd library. 
 Many image processing php library exists. We chose the gd library mainly because it is usually available in the php default libraries that you get with Xamp, or Mamp.
 
 3.1.  Documentation on TiMMi
 
	You can find the documentation of the TiMMi lib in TiMMi/doc/html
	
	This documentation was an automatically generated using Doxygen. 
	If you add new features to the lib and  want to regenerate the documentation,
	please download Doygen (http://www.stack.nl/~dimitri/doxygen/index.html) and run it in the TiMMi folder. 
	The existing Doxyfile is already configured to recursively parse the code in the source folder src.
 
 3.2 Documentation on the gd library
   
	PHP is not limited to creating just HTML output. 
	
	It can also be used to create and manipulate image files in a variety of different image formats, 
	including GIF, PNG, JPEG, WBMP, and XPM. 
	
	Even more convenient, PHP can output image streams directly to a browser. 
	You will need to compile PHP with the GD library of image functions for this to work. 
	GD and PHP may also require other libraries, depending on which image formats you want to work with.\n
	
	You can use the image functions in PHP to get the size of JPEG, GIF, PNG, SWF, TIFF and JPEG2000 images.
	Read more in french :	http://php.net/manual/fr/book.image.php					   
	
 
