<?php
/* 
 * This file is part of pluck, the easy content management system
 * Copyright (c) somp (www.somp.nl)
 * http://www.pluck-cms.org
 * Pluck is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 
 * See docs/COPYING for the complete license.
*/

//Define which css-file we have to convert
include ("../settings/themepref.php");
$cssfile = "themes/$themepref/style.css";

$handle = fopen ("$cssfile", "r");
while (!feof ($handle)) {
    $buffer = fgets($handle, 4096);
	 
	 //First change all 'left' to 'right'
	 //... and 'right' to 'left'
    $buffer = str_replace("left","letempft",$buffer);
  	 $buffer = str_replace("right","left",$buffer);
    $buffer = str_replace("letempft","right",$buffer);

	 //Then we have to check for 'nested' css-attributes
	 //First define the reg.exprs strings
	 $fourpx = "#([0-9]{1,4}[a-z%]{0,2})([ ]{1,2})([0-9]{1,4}[a-z%]{0,2})([ ]{1,2})([0-9]{1,4}[a-z%]{0,2})([ ]{1,2})([0-9]{1,4}[a-z%]{0,2})([ ]{0,1})#";
	 
	 //Then check for instances
	 if (preg_match($fourpx, $buffer, $cssel)) {
	 $cssline = $cssel['0'];
	 
	 //Then split the attributes in for parts
	 list($partone,$parttwo,$partthree,$partfour) = explode(" ", $cssline);
	 //... and generate a new line	 
	 $newcss = "$partone $partfour $partthree $parttwo";
	 
	 //Makeup the whole line, so it can be saved
	 $buffer = preg_replace($fourpx, $newcss, $buffer);
	 }

    //Save the line in our css-file
    $data = "themes/$themepref/style-rtl.css";    
	 $file = fopen($data, "a");
	 fputs($file, "$buffer");  
	 fclose($file); 
	 chmod("themes/$themepref/style-rtl.css", 0777);

}
fclose ($handle);

header("Location: ../../");
?>