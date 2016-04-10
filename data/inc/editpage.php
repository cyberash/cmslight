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

//Get form-data
include ("data/settings/options.php");
//If no email-address is set, display a link
if (!$email) {
$email = "<a href=\"?action=settings\">$lang_contact11</a>";
$echeck = "no"; }

//Generate the menu on the right
echo "<div class=\"rightmenu\">";
echo "$lang_page8 <br>";
read_imagesinpages(images);
read_pagesinpages("data/content");
echo "</div>";

//Include Page information
include("data/content/$editpage");

//Check if we have to check the contactform checkbox
if ($contactinc == "yes") {
$formcheck = "checked"; }
else {
$formcheck = ""; }
//Check if we have to check the hidepage checkbox
if (($hidden == "no") || (!$hidden)) {
$hidecheck = "checked"; }
else {
$hidecheck = ""; }

//Form
echo "<form method=\"post\" action=\"\">
<span class=\"kop2\">$lang_install17</span><br>
<input name=\"kop\" type=\"text\" value=\"$title\"><br><br>

<span class=\"kop2\">$lang_install18</span><br>
<textarea class=\"tinymce\" name=\"tekst\" cols=\"70\" rows=\"20\">$content</textarea><br>";

//Options div
echo "<div style=\"background-color: #f4f4f4; width: 600px; padding: 5px; border: 1px dotted gray; margin: 5px;\">
<table>
<tr>
<td>
<img src=\"data/image/options.png\" border=\"0\" alt=\"\">
</td>
<td>
<span class=\"kop3\">$lang_contact2</span><br>";

//Display checkbox for the hidepage-option
echo "<input type=\"checkbox\" name=\"hidepage\" value=\"no\" $hidecheck> $lang_pagehide1<br>";

//Check if we have to display a checkbox for the emailform or not
if ($echeck != "no") {
echo "<input type=\"checkbox\" name=\"contactform\" value=\"yes\" $formcheck> "; }
echo "$lang_contact1 (<i>$email</i>)<br>";

//Check for albums and make checkboxes for them
read_albumsinpages("data/albums");
read_bloginpages("data/blog");

echo "</td>
</tr>
</table>
</div>"; 
			
echo "<input type=\"submit\" name=\"Submit\" value=\"$lang_install13\">
<input type=\"button\" name=\"Cancel\" value=\"$lang_install14\" onclick=\"javascript: window.location='?action=page';\">
</form>";

//If form is posted...
if(isset($_POST['Submit'])) {

//Check if we want to include the contactform
if ($contactform != "yes") {
$contactform = "no"; }
//Check if we want to show the page in the menu
if ($hidepage != "no") {
$hidepage = "yes"; }

$data = "data/content/$editpage";    
include("data/inc/page_stripslashes.php");

$file = fopen($data, "w");
fputs($file, "<?php
\$title = \"$kop\";
\$content = \"$tekst\";
\$contactinc = \"$contactform\";
\$hidden = \"$hidepage\";
\$description = \"$description\";
\$keywords = \"$keywords\";
\$copyright = \"$copyright\";");
//Check which albums we need to include and write data
if ($_POST['insertedalbums']) {  
foreach ($_POST['insertedalbums'] as $value) {
fputs($file, "\n\$incalbum['$value'] = \"yes\";");
} }
//Check which blogs we need to include and write data
if ($_POST['insertedblogs']) {  
foreach ($_POST['insertedblogs'] as $value) {
fputs($file, "\n\$incblog['$value'] = \"yes\";");
} }
//Close the file
fputs($file, "\n ?>");
chmod($data, 0777);

//and redirect us back...
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=?action=page\">"; }
?>