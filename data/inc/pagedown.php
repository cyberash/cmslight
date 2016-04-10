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

//Determine the page number
list($pagenumber1, $extension) = explode(".", $pagedown);
list($filename, $pagenumber) =  explode("p", $pagenumber1);
//Define prefixes
$temp = "_temp";
$kop = "kop";
$ext = "php";

$lowerpagenumber = ($pagenumber+1);
//Check if the page isn't already the last one
if (!file_exists("data/content/$kop$lowerpagenumber.$ext")) { 
echo $lang_updown4;
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"2; URL=?action=page\">";
include ("data/inc/footer.php");
exit;
}

//First make temporary file
rename ("data/content/$pagedown", "data/content/$pagedown$temp");

//Then make the lower page one higher
rename ("data/content/$kop$lowerpagenumber.$ext", "data/content/$pagedown");

//Finally, give the temp-file its final name
rename ("data/content/$pagedown$temp", "data/content/$kop$lowerpagenumber.$ext");

//METATAG redirect
echo $lang_updown3;
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=?action=page\">";
?>