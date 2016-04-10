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

//Include Translation data
include ("data/settings/langpref.php");
include ("data/inc/lang/$langpref");
//Get Site-title
$sitetitle = file_get_contents("data/settings/title.dat");

//Get the page-data
$filetoread = $_GET['file'];
$album = $_GET['album'];
$blogpost = $_GET['blogpost'];
$cat = $_GET['cat'];

if (($filetoread) && (file_exists("data/content/$filetoread"))) {
include "data/content/$filetoread"; }

elseif ($album) {
$title = $album; }

elseif ($blogpost) {
include("data/blog/$cat/posts/$blogpost"); }

elseif ((!file_exists("data/content/$filetoread")) && (!$album) && (!$blogpost)) {
$title = $lang_front1;
$content = $lang_front2; }
?>