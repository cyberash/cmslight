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

//Delete the reaction
unlink("data/blog/$cat/reactions/$blogpost/$blog_deletereaction");
//Check if reaction is really gone
if (file_exists("data/blog/$cat/reactions/$blogpost/$blog_deletereaction")) {
echo "<p><span class=\"kop2\">Error</span><br>Blog reaction couldn't be deleted. Check the rights, please.</p><META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=?action=page\">"; }

//Display success message
else {
redirect("blog_editreactions","$blogpost.php","0","cat",$cat);
}
?>