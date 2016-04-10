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

//Make sure the file isn't accessed directly
if((!ereg("index.php", $_SERVER['SCRIPT_FILENAME'])) && (!ereg("admin.php", $_SERVER['SCRIPT_FILENAME'])) && (!ereg("install.php", $_SERVER['SCRIPT_FILENAME'])) && (!ereg("login.php", $_SERVER['SCRIPT_FILENAME']))){
    //Give out an "access denied" error
    echo "access denied";
    //Block all other code
    exit();
}

//Introduction text
echo "<p><b>$lang_theme6</b></p>";

if(!isset($_POST['Submit'])) {
echo "<div style=\"background-color: #f4f4f4; padding: 5px; width: 500px; margin-top: 15px; border: 1px dotted gray;\">
<table><tr><td><img src=\"data/image/install.png\" border=\"0\" alt=\"\">
</td><td><form name=\"bestand\" method=\"post\" action=\"\" enctype=\"multipart/form-data\">
<input type=\"file\" name=\"bestand\">
<input type=\"submit\" name=\"Submit\" value=\"$lang_image9\"></form>
</td></tr></table>
</div>";

echo "<div style=\"background-color: #f4f4f4; padding: 5px; width: 500px; margin-top: 15px; border: 1px dotted gray;\">
<table>
<tr>
<td>
<img src=\"data/image/note.png\" border=\"0\" alt=\"\">
</td>
<td>
<span style=\"font-size: 17pt;\"><a href=\"http://www.pluck-cms.org/themes.php\" target=\"_blank\">$lang_theme2</a></span><br>
$lang_theme4
</td>
</tr>
</table></div>";

echo "<div style=\"background-color: #f4f4f4; padding: 5px; width: 500px; margin-top: 15px; border: 1px dotted gray;\">
<table>
<tr>
<td>
<img src=\"data/image/themes.png\" border=\"0\" alt=\"\">
</td>
<td>
<span class=\"kop3\"><a href=\"?action=theme\"><<< $lang_theme12</a></span>
</td>
</tr>
</table></div>"; }

if(isset($_POST['Submit'])) {
$map = "data/inc/themes/";  
$max = "1000000";   
$ext = "gz";  

if (!$_FILES['bestand'])  
        echo "$lang_image2"; 
else
    {  
			// Determine filename 
			$bestand2 = explode("\\", $_FILES['bestand']['name']);  
			$laatste = count($bestand2) - 1;  
			$bestand2 = "$bestand2[$laatste]";   
			
			// Determine extension
			$bestand3 = explode(".", $bestand2);  
			$laatste = count($bestand3) - 1;  
			$bestand3 = "$bestand3[$laatste]";   
			$bestand3 = strtolower($bestand3);  

			// Check if file is tar.gz 
			$ext = strtolower($ext);  
			$ext = explode(" ", $ext);  
			$aantal = count($ext);  

			for ($tel = 0;$tel < $aantal; $tel++)
			{  
			if ($bestand3 == $ext[$tel])
				{  
 					$extfout = "nee";  
				}
			}  
    
			if (!$extfout)
			{  
				echo "$lang_theme7"; 
			}  
			else  
			{  
				if ($_FILES['bestand']['size'] > $max)  
					echo "$lang_theme8";
				else  
				{  
					//Save theme-file 
					copy ($_FILES['bestand']['tmp_name'], "data/inc/themes/".$_FILES['bestand']['name'])
					or die ("$lang_image2");

					require("data/inc/lib/pcltar.lib.php");

					//Start ArchiveExtractor Object 
					PclTarExtract("$map$bestand2", "$map")
					or die("<p>$lang_theme9</p>");
					unlink("$map$bestand2");

					//Display successmessage
					echo "<div style=\"background-color: #f4f4f4; padding: 5px; width: 300px; margin-top: 15px; border: 1px dotted gray;\">
								<table>
										<tr>
										<td>
											<img src=\"data/image/install.png\" border=\"0\" alt=\"\">
										</td>
										<td>
											<span class=\"kop3\">$lang_theme10</span><br>
											$lang_theme11
										</td>
										</tr>
								</table>
							</div>";
			}
		}
	}
}
?>