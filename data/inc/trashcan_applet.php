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

//Count items in trashcan
include("data/inc/trashcan_count.php");

//Define which image we have to display, a full trashcan or an empty one
if ($trashcan_items == "0") {
$trash_image = "trash.png"; }
else {
$trash_image = "trash-full.png"; }

echo "<table>
<tr>
<td><a href=\"?action=trashcan\"><img src=\"data/image/$trash_image\" border=\"0\" align=\"right\" alt=\"$lang_trash\" title=\"$lang_trash\"></a></td>
<td>$trashcan_items $lang_trash3</td>
</tr>
</table>";

?>