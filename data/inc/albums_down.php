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

//Determine the imagenumber
list($filename, $pagenumber) = explode("e", $imagedown);

//Define prefixes
$temp = "_temp";
$kop = "image";
$lowerpagenumber = ($pagenumber+1);

//We can't higher kop1.php, so we have to check:
if (!file_exists("data/albums/$album/$kop$lowerpagenumber.jpg")) {
echo $lang_updown7;
redirect("editalbum",$album,"2");
include ("data/inc/footer.php");
exit; }

//First make temporary files
rename ("data/albums/$album/$imagedown.jpg", "data/albums/$album/$imagedown$temp.jpg");
rename ("data/albums/$album/$imagedown.php", "data/albums/$album/$imagedown$temp.php");
rename ("data/albums/$album/thumb/$imagedown.jpg", "data/albums/$album/thumb/$imagedown$temp.jpg");

//Then make the higher images one lower
rename ("data/albums/$album/$kop$lowerpagenumber.jpg", "data/albums/$album/$imagedown.jpg");
rename ("data/albums/$album/$kop$lowerpagenumber.php", "data/albums/$album/$imagedown.php");
rename ("data/albums/$album/thumb/$kop$lowerpagenumber.jpg", "data/albums/$album/thumb/$imagedown.jpg");

//Finally, give the temp-files its final name
rename ("data/albums/$album/$imagedown$temp.jpg", "data/albums/$album/$kop$lowerpagenumber.jpg");
rename ("data/albums/$album/$imagedown$temp.php", "data/albums/$album/$kop$lowerpagenumber.php");
rename ("data/albums/$album/thumb/$imagedown$temp.jpg", "data/albums/$album/thumb/$kop$lowerpagenumber.jpg");

//Redirect
echo $lang_updown3;
redirect("editalbum",$album,"0");
?>