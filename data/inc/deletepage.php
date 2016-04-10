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

//First check if there isn't an item with the same name in the trashcan
if (!file_exists("data/trash/pages/$deletepage")) {

//Move the page to the trashcan
copy("data/content/$deletepage", "data/trash/pages/$deletepage");
chmod("data/trash/pages/$deletepage", 0777);
unlink("data/content/$deletepage"); }

//If there is an item with the same name in the trashcan
else {
//Now we have to check which filenames we can then use
if (file_exists("data/trash/pages/kop1.php")) {
$i = 2;
$o = 3;
while ((file_exists("data/trash/pages/kop$i.php")) || (file_exists("data/trash/pages/kop$o.php"))) {
$i = $i+1;
$o = $o+1; }
$newfile = "data/trash/pages/kop$i.php"; }
else {
$newfile = "data/trash/pages/kop1.php";
}
//Move the file with the new filename
copy("data/content/$deletepage", $newfile);
chmod($newfile, 0777);
unlink("data/content/$deletepage");
}

//Redirect user
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=?action=page\">";
?>