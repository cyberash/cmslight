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

//Block any access to files that only need to be included (no direct access)
if((!ereg("index.php", $_SERVER['SCRIPT_FILENAME'])) && (!ereg("admin.php", $_SERVER['SCRIPT_FILENAME'])) && (!ereg("install.php", $_SERVER['SCRIPT_FILENAME'])) && (!ereg("login.php", $_SERVER['SCRIPT_FILENAME']))){
    //Give out an "access denied" error
    echo "access denied";
    //Block all other code
    exit();
}

//Introduction text
echo "<p><b>$lang_albums1</b></p>";

//Edit albums
echo "<span class=\"kop2\">$lang_albums2</span><br>";
read_albums("data/albums");

//Check if the PHP-gd module is installed on server
if (extension_loaded("gd")) {

//New album
echo "<br><br><span class=\"kop2\">$lang_albums3</span><br>";
echo "<form method=\"post\"><span class=\"kop4\">$lang_albums4</span><br>
<input name=\"album_name\" type=\"text\" value=\"\"> <input type=\"submit\" name=\"Submit\" value=\"$lang_install13\">
</form>";

//When form is submitted
if(isset($_POST['Submit'])) {
if($album_name) {
$album_name = stripslashes($album_name);
$album_name = str_replace ("\"","", $album_name);
$album_name = str_replace ("'","", $album_name);
$album_name = str_replace (".","", $album_name);
$album_name = str_replace ("/","", $album_name);
mkdir("data/albums/$album_name");
mkdir("data/albums/$album_name/thumb");
chmod ("data/albums/$album_name", 0777);
chmod ("data/albums/$album_name/thumb", 0777);
redirect("action","albums","0"); }
	}
}

//If PHP-gd module is not installed
if (!extension_loaded ('gd')) {
echo "<p><span style=\"color: red;\">$lang_albums16</span></p>";
}

echo "<p><a href=\"?action=modules\"><<< $lang_theme12</a></p>";
?>