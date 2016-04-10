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

//Define variable
$image = $_GET['image'];
//Then, check for hacking attempts (Remote Code Execution), and block them
//if (ereg("/", $image)) {
if (!ereg("thumb", $image)) {
if (preg_match("#([.*])([/])([A-Za-z0-9.]{0,11})#", $image, $matches)) {
if ($image != $matches[0]) {
unset($image);
die("A hacking attempt has been detected. For security reasons, we're blocking any code execution.");
		} 
	}
}
elseif (ereg("thumb", $image)) {
if (preg_match("#([.*])([/])thumb([/])([A-Za-z0-9.]{0,11})#", $image, $matches)) {
if ($image != $matches[0]) {
unset($image);
die("A hacking attempt has been detected. For security reasons, we're blocking any code execution.");
		} 
	}
}

//...if no hacking attempts found:
//generate the image, and make sure it doesn't end up in the visitors buffer
header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
header("Pragma: no-cache");
header("Content-Type: image/jpeg");
echo readfile("../../data/albums/$image");
?>