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

//Introduction text
echo "<p><b>$lang_credits2</b></p>";

//Project leader
//-----------
echo "<p><span class=\"kop2\">$lang_credits3</span><br>
Sander Thijsen
</p>";

//Translation
//-----------
//First seek out who's the translator
if ($langpref == "en.php") {
$translator = "Sander Thijsen"; }
if ($langpref == "nl.php") {
$translator = "Sander Thijsen"; }
if ($langpref == "da.php") {
$translator = "Lone Hansen"; }
if ($langpref == "de.php") {
$translator = "Max Effenberger, Dennis Sewberath"; }
if ($langpref == "es.php") {
$translator = "Cesc"; }
if ($langpref == "ct.php") {
$translator = "Cesc"; }
if ($langpref == "fr.php") {
$translator = "zigzagbe"; }
if ($langpref == "he.php") {
$translator = "Erez Wolf"; }
if ($langpref == "hu.php") {
$translator = "Wix"; }
if ($langpref == "lt.php") {
$translator = "Mindaugas Salamachinas"; }
if ($langpref == "no.php") {
$translator = "John Erik Kristensen"; }
if ($langpref == "pt.php") { 
$translator = "Hélio Carrasqueira"; }
if ($langpref == "pt_br.php") { 
$translator = "Gilnei Moraes"; }
if ($langpref == "ru.php") { 
$translator = "Tkachev Vasily"; }
if ($langpref == "sv.php") { 
$translator = "Carl Jansson"; }
if ($langpref == "bg.php") { 
$translator = "smartx"; }
if ($langpref == "th.php") { 
$translator = "meandev"; }
if ($langpref == "lv.php") { 
$translator = "Munky"; }
if ($langpref == "it.php") { 
$translator = "Skc"; }

//Then display
echo "<p><span class=\"kop2\">$lang_credits4</span><br>
$translator
</p>";

//Project leader
//-----------
echo "<p><span class=\"kop2\">$lang_credits5</span><br>
<a href=\"http://tinymce.moxiecode.com\" target=\"_blank\">MoxieCode</a>, for making the excellent TinyMCE-editor used in pluck<br>
<a href=\"http://www.phpconcept.net\" target=\"_blank\">PhpConcept</a>, for making PclTar, used in the automatic theme-installer<br>
<a href=\"http://www.huddletogether.com/projects/lightbox2\" target=\"_blank\">Lokesh</a>, for developing LightBox2, used in pluck to serve the images in your albums with flair<br>
<a href=\"http://tango.freedesktop.org\" target=\"_blank\">The Tango Desktop Project</a>, for designing the wonderful icons used in the pluck administrationcenter<br>
Bernd Schnitzer, for making the GIFPIX class, used in the statistics counter</p>";
?>