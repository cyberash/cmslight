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

//First get the day of the year
$dayofyear = date("z");

//Check if the last updatecheckfile already exists
//If not, we want to make one, and write update-status to it
if (!file_exists("data/settings/update_lastcheck.php")) {
$update_available = file_get_contents("http://www.pluck-cms.org/update.php?version=$pluck_version");

$data1 = "data/settings/update_lastcheck.php";
$file = fopen($data1, "w");
fputs($file, "<?php
\$lastcheck = \"$dayofyear\";
\$lastupdatestatus = \"$update_available\";
?>");
fclose($file);
}

//If it already exists, we want to check when the last updatecheck was
elseif (file_exists("data/settings/update_lastcheck.php")) {
include("data/settings/update_lastcheck.php");

//...if we already checked for updates today, don't do it again
if ($lastcheck == $dayofyear) {
$update_available = $lastupdatestatus;
}

//...if we didn't check for updates today, check for updates, and write them to the file
else {
$update_available = file_get_contents("http://www.pluck-cms.org/update.php?version=$pluck_version");

$data1 = "data/settings/update_lastcheck.php";
$file = fopen($data1, "w");
fputs($file, "<?php
\$lastcheck = \"$dayofyear\";
\$lastupdatestatus = \"$update_available\";
?>");
fclose($file); }
}


//Then determine which icon we need to show... and show it
if ($update_available == "yes") {
$update_image = "update-available.png";
$update_note = "<a href=\"http://www.pluck-cms.org/cmsupdate.php?versie=$pluck_version\" target=\"_blank\">$lang_update2</a>";
}

elseif ($update_available == "urgent") {
$update_image = "update-available-urgent.png";
$update_note = "<a href=\"http://www.pluck-cms.org/cmsupdate.php?versie=$pluck_version\" target=\"_blank\">$lang_update3</a>";
}

else {
$update_image = "update-no.png";
$update_note = "$lang_update1";
}


echo "<table>
<tr>
<td><img src=\"data/image/$update_image\" border=\"0\" align=\"right\"></td>
<td>$update_note</td>
</tr>
</table>";
?>