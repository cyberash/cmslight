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

//Delete the post
unlink("data/blog/$cat/posts/$blog_deletepost");
//Check for reactions
if (file_exists("data/blog/$cat/reactions/$blog_deletepost")) {
//...and delete them
unlink("data/blog/$cat/reactions/$blog_deletepost"); }

//Redirect
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=?editblog=$cat\">";
redirect("editblog",$cat,"0");
?>