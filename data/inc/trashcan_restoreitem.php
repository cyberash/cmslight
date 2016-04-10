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

//If we want to restore a page
//----------------------------
if ($cat == "page") {
//First check if there isn't a page with the same name
if (!file_exists("data/content/$trash_restoreitem")) {

//Move the page to the trashcan
copy("data/trash/pages/$trash_restoreitem", "data/content/$trash_restoreitem");
chmod("data/content/$trash_restoreitem", 0777);
unlink("data/trash/pages/$trash_restoreitem"); }

//If there is a page with the same name
else {
//Now we have to check which filenames we can then use
if (file_exists("data/content/kop1.php")) {
$i = 2;
$o = 3;
while ((file_exists("data/content/kop$i.php")) || (file_exists("data/content/kop$o.php"))) {
$i = $i+1;
$o = $o+1; }
$newfile = "data/content/kop$i.php"; }
else {
$newfile = "data/content/kop1.php";
}
//Move the file with the new filename
copy("data/trash/pages/$trash_restoreitem", $newfile);
chmod($newfile, 0777);
unlink("data/trash/pages/$trash_restoreitem");
}
}

//If we want to restore an image
//----------------------------
if ($cat == "image") {
//First check if there isn't an image with the same name
if (!file_exists("images/$trash_restoreitem")) {
copy("data/trash/images/$trash_restoreitem", "images/$trash_restoreitem");
chmod("images/$trash_restoreitem", 0777);
unlink("data/trash/images/$trash_restoreitem"); }

//If there already is an image with the same name
else { 
list($filename, $extension) = explode(".", $trash_restoreitem);
$filename = "$filename copy";
copy("data/trash/images/$trash_restoreitem", "images/$filename.$extension");
chmod("images/$filename.$extension", 0777);
unlink("data/trash/images/$trash_restoreitem");
}

}

//Redirect user
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=?action=trashcan\">";
?>