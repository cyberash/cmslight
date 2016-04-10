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

//Check if we want to include albums
if ($incalbum) {

//Define how we want to show a random image
function getRandomImage($path, $img) {
    if ( $list = getImagesList($path) ) {
        mt_srand( (double)microtime() * 1000000 );
        $num = array_rand($list);
        $img = $list[$num];
    } 
    return $path . $img;
}

function getImagesList($path) {
    $ctr = 0;
    if ( $img_dir = @opendir($path) ) {
        while ( false !== ($img_file = readdir($img_dir)) ) {
            // can add checks for other image file types here
            if ( preg_match("/(\.gif|\.jpg)$/", $img_file) ) {
                $images[$ctr] = $img_file;
                $ctr++;
            }
        }
        closedir($img_dir);
        return $images;
    } 
    return false;
}

foreach ($incalbum as $albumname => $value) {

//Check if the album exists
if (file_exists("data/albums/$albumname")) {

//Define the directories we want to read out random images
$path_to_images = "data/albums/$albumname/thumb/";
$default_img = "../../../../data/image/image.png";

echo "\n <div class=\"album\" style=\"margin: 15px; padding: 5px;\">
<table>
<tr>
<td>
<img alt=\"\" src=\"";
echo getRandomImage($path_to_images, $default_img);
echo "\" />
</td>
<td><span style=\"font-size: 17pt\"><a href=\"?album=$albumname&amp;pageback=$filetoread\">$albumname</a></span>
</td>
</tr>
</table>
</div> \n";

		}
	}
}
?>