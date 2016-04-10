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

 * This is a file that checks for hacking attempts and blocks them.
*/

//First, define the version of pluck
$pluck_version = "4.5.1";

//--------------------------------
//Register Globals
//If Register Globals are ON, emulate that they are OFF
function unregister_GLOBALS()
{
    if (!ini_get("register_globals")) {
        return;
    }

    if (isset($_REQUEST['GLOBALS']) || isset($_FILES['GLOBALS'])) {
        die("A hacking attempt has been detected. For security reasons, we're blocking any code execution.");
    }

    $noUnset = array('GLOBALS',  '_GET',
                     '_POST',    '_COOKIE',
                     '_REQUEST', '_SERVER',
                     '_ENV',     '_FILES');

    $input = array_merge($_GET,    $_POST,
                         $_COOKIE, $_SERVER,
                         $_ENV,    $_FILES,
                         isset($_SESSION) && is_array($_SESSION) ? $_SESSION : array());
   
    foreach ($input as $k => $v) {
        if (!in_array($k, $noUnset) && isset($GLOBALS[$k])) {
            unset($GLOBALS[$k]);
        }
    }
}
unregister_GLOBALS();
//--------------------------------

//--------------------------------
//Remote File Inclusion
//Check for strange characters in $_GET keys
//All keys with "/" or ":" are blocked, so it becomes virtually impossible to inject other pages or websites
  foreach ($_GET as $get_key => $get_value) {
    if ((ereg("/", $get_value)) || (ereg(":", $get_value))) {
    eval("unset(\${$get_key});");
    die("A hacking attempt has been detected. For security reasons, we're blocking any code execution."); }
  } 
//--------------------------------

//--------------------------------
//Cross Site Scripting
//Check for strange characters in $_GET keys
//All keys with "<" or ">" or "=" or ";" or ")" are blocked, so that it's virtually impossible to inject any HTML-code
  foreach ($_GET as $get_key => $get_value) {
    if ((ereg("<", $get_value)) || (ereg(">", $get_value)) || (ereg("=", $get_value)) || (ereg(";", $get_value)) || (ereg(")", $get_value))) {
    eval("unset(\${$get_key});");
    die("A hacking attempt has been detected. For security reasons, we're blocking any code execution."); }
  } 
//--------------------------------
  
?>