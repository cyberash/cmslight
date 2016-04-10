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

//We can't higher kop1.php, so we have to check:
if ($imageup == "image1") {
echo $lang_updown6;
redirect("editalbum",$album,"2");
include ("data/inc/footer.php");
exit; }

//Determine the imagenumber
list($filename, $pagenumber) = explode("e", $imageup);

//Define prefixes
$temp = "_temp";
$kop = "image";
//First make temporary files
rename ("data/albums/$album/$imageup.jpg", "data/albums/$album/$imageup$temp.jpg");
rename ("data/albums/$album/$imageup.php", "data/albums/$album/$imageup$temp.php");
rename ("data/albums/$album/thumb/$imageup.jpg", "data/albums/$album/thumb/$imageup$temp.jpg");

//Then make the higher images one lower
$higherpagenumber = ($pagenumber-1);
rename ("data/albums/$album/$kop$higherpagenumber.jpg", "data/albums/$album/$imageup.jpg");
rename ("data/albums/$album/$kop$higherpagenumber.php", "data/albums/$album/$imageup.php");
rename ("data/albums/$album/thumb/$kop$higherpagenumber.jpg", "data/albums/$album/thumb/$imageup.jpg");

//Finally, give the temp-files its final name
rename ("data/albums/$album/$imageup$temp.jpg", "data/albums/$album/$kop$higherpagenumber.jpg");
rename ("data/albums/$album/$imageup$temp.php", "data/albums/$album/$kop$higherpagenumber.php");
rename ("data/albums/$album/thumb/$imageup$temp.jpg", "data/albums/$album/thumb/$kop$higherpagenumber.jpg");

//METATAG redirect
echo $lang_updown3;
redirect("editalbum",$album,"0");
?>