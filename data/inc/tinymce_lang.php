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

//This files checks which language pluck uses, and then returns the right tinymce-line

//Make sure the file isn't accessed directly
if((!ereg("index.php", $_SERVER['SCRIPT_FILENAME'])) && (!ereg("admin.php", $_SERVER['SCRIPT_FILENAME'])) && (!ereg("install.php", $_SERVER['SCRIPT_FILENAME'])) && (!ereg("login.php", $_SERVER['SCRIPT_FILENAME']))){
    //Give out an "access denied" error
    echo "access denied";
    //Block all other code
    exit();
}

//LANGUAGES
//---------------

//Dutch
if ($langpref == "nl.php") {
$tinymce_lang = "nl"; }

//Danish
elseif ($langpref == "da.php") {
$tinymce_lang = "da"; }

//German
elseif ($langpref == "de.php") {
$tinymce_lang = "de"; }

//French
elseif ($langpref == "fr.php") {
$tinymce_lang = "fr"; }

//Portuguese/Brazilian
elseif ($langpref == "pt_br.php") {
$tinymce_lang = "pt_br"; }

//Russian
elseif ($langpref == "ru.php") {
$tinymce_lang = "ru"; }

//Hungarian
elseif ($langpref == "hu.php") {
$tinymce_lang = "hu"; }

//Spanish
elseif ($langpref == "es.php") {
$tinymce_lang = "es"; }

//Swedish
elseif ($langpref == "sv.php") {
$tinymce_lang = "sv_utf8"; }

//Catalan
elseif ($langpref == "ct.php") {
$tinymce_lang = "ca"; }

//Italian
elseif ($langpref == "it.php") {
$tinymce_lang = "it"; }

//Hebrew (not (yet) supported!)
elseif ($langpref == "he.php") {
$tinymce_lang = "en"; }

//Portuguese (not (yet) supported!)
elseif ($langpref == "pt.php") {
$tinymce_lang = "en"; }

//Lithuanian (not (yet) supported!)
elseif ($langpref == "lt.php") {
$tinymce_lang = "en"; }

//Norwegian (not (yet) supported!)
elseif ($langpref == "no.php") {
$tinymce_lang = "en"; }

//Thai (not (yet) supported!)
elseif ($langpref == "th.php") {
$tinymce_lang = "en"; }

//Latvian (not (yet) supported!)
elseif ($langpref == "lv.php") {
$tinymce_lang = "en"; }

//Bulgarian (not (yet) supported!)
elseif ($langpref == "bg.php") {
$tinymce_lang = "en"; }


//--------------------------
//In any other case: English
else {
$tinymce_lang = "en"; }

//Then return the tinymce-line
$tinymce_lang_line = "language : \"$tinymce_lang\", \n";
echo $tinymce_lang_line;
?>