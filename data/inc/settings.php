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

$sitetitle = file_get_contents("data/settings/title.dat");
include ("data/settings/options.php");

//Decide whether to check the xhtmlcompatmode_checkbox or not
if ($xhtmlruleset == "true") {
$checked_xhtml = "checked"; }
else {
$checked_xhtml = ""; }

//Introduction text
echo "<p><b>$lang_settings5</b></p>
<form method=\"post\" action=\"\">
<p><span class=\"kop2\">$lang_kop6</span><br>
<span class=\"kop4\">$lang_settings2</span><br>
<input name=\"cont1\" type=\"text\" value=\"$sitetitle\"></p>

<p><span class=\"kop2\">$lang_install24</span><br>
<span class=\"kop4\">$lang_install25</span><br>
<input name=\"email2\" type=\"text\" value=\"$email\"></p>

<p><span class=\"kop2\">$lang_contact2</span><br>
<input type=\"checkbox\" name=\"cont2\" value=\"true\" $checked_xhtml> $lang_settings6
</p>

<input type=\"submit\" name=\"Submit\" value=\"$lang_install13\">
<input type=\"button\" name=\"Cancel\" value=\"$lang_install14\" onclick=\"javascript: window.location='?action=options';\">
</form>";

if(isset($_POST['Submit'])) {

//Check if a sitetitle has been given in
if (!$cont1) {
echo "<b>$lang_stitle2</b>";
 }

else {

if($cont2 != "true") {
$cont2 = "false"; }

$data1 = "data/settings/title.dat";
$file = fopen($data1, "w");
$cont1 = stripslashes($cont1);
fputs($file, "$cont1");
fclose($file);

$data2 = "data/settings/options.php";
$file = fopen($data2, "w");
fputs($file, "<?php 
\$email = \"$email2\";
\$xhtmlruleset = \"$cont2\"; 

?>");
fclose($file);

echo "$lang_settings4  
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=?action=options\">"; }
} 
?>