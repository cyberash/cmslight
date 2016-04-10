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

//Include the actual siteinfo
require ("data/content/$editmeta");

//Introduction text
echo "<p><b>$lang_meta2</b></p>

<form method=\"post\" action=\"\">

<span class=\"kop2\">$lang_albums11</span><br>
<textarea name=\"cont1\" rows=\"3\" cols=\"50\">$description</textarea><br><br>

<span class=\"kop2\">$lang_siteinfo4</span> ($lang_siteinfo5)<br>
<textarea name=\"sleutel\" rows=\"5\" cols=\"50\">$keywords</textarea><br><br>

<input type=\"submit\" name=\"Submit\" value=\"$lang_install13\">
<input type=\"button\" name=\"Cancel\" value=\"$lang_install14\" onclick=\"javascript: window.location='?action=page';\">
</form>";

if(isset($_POST['Submit'])) {
$data = "data/content/$editmeta";
include("data/inc/page_stripslashes.php");
  
$file = fopen($data, "w");  
fputs($file, "<?php 
\$title = \"$title\";
\$content = \"$content\";
\$contactinc = \"$contactinc\";
\$hidden = \"$hidden\";
\$description = \"$cont1\";
\$keywords = \"$sleutel\";
\$copyright = \"$copyr\";");
//Check if we also need to include albums
if ($incalbum) {
foreach ($incalbum as $name => $value) {
fputs($file, "\n\$incalbum['$name'] = \"yes\";");
} }
//Check if we also need to include blogs
if ($incblog) {
foreach ($incblog as $name => $value) {
fputs($file, "\n\$incblog['$name'] = \"yes\";");
} }
fputs($file, "\n ?>");
fclose($file); 
echo "$lang_meta4
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=?action=page\">"; } 

?>