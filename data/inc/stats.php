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

//Get Date
$maand2 = date("M");
$year = date("Y");

echo "<p><b>$lang_stats1</b></p>";

//Check from which date we want to display the stats
if ($statmonth == "") {
$maand = "$maand2$year";	}

elseif ($statmonth == $lang_stats7) {
$maand = "totaal"; }

elseif ($statmonth != $lang_stats7) {
$maand = $statmonth; }

//Check which title we need: month or total?
if ($statmonth == $lang_stats7) {
echo "<p><span class=\"kop2\">$lang_stats2 $lang_stats7</span></p>"; }
elseif ($statmonth != $lang_stats7) {
echo "<p><span class=\"kop2\">$lang_stats2 $maand</span></p>"; }

//Include directory-check
require('data/stats/dircheck.php');
//Include stats-data
$procent = round($procent);
include ("data/stats/$maand/totaal");

//Start OS table
echo "<table style=\"margin-left: 25px; border-left: 1px dotted gray\"><tr><td><b>$lang_stats3</b></td></tr>";

if (is_file("data/stats/$maand/BeOS")) {
include ("data/stats/$maand/BeOS");
if ($statmonth == $lang_stats7) {
$procent = $f/$d*100;
}
else { $procent = $b/$c*100; }
$procent = round($procent);
echo "<tr><td><table><tr><td><img src=\"data/stats/images/unknown.gif\" width=\"25\" height=\"25\" border=\"0\" alt=\"BeOS\"></td><td> <b>BeOS</b></td></tr></table></td>";
echo "<td><i>$procent%</i></td></tr>";
}

if (is_file("data/stats/$maand/Linux")) {
include ("data/stats/$maand/Linux");
if ($statmonth == $lang_stats7) {
$procent = $f/$d*100;
}
else { $procent = $b/$c*100; }
$procent = round($procent);
echo "<tr><td><table><tr><td><img src=\"data/stats/images/linux.gif\" width=\"25\" height=\"25\" border=\"0\" alt=\"Linux\"></td><td> <b>Linux</b></td></tr></table></td>";
echo "<td><i>$procent%</i></td></tr>";
}

if (is_file("data/stats/$maand/MacIntosh")) {
include ("data/stats/$maand/MacIntosh");
if ($statmonth == $lang_stats7) {
$procent = $f/$d*100;
}
else { $procent = $b/$c*100; }
$procent = round($procent);
echo "<tr><td><table><tr><td><img src=\"data/stats/images/osx.gif\" width=\"25\" height=\"25\" border=\"0\" alt=\"Mac OSX\"></td><td> <b>Mac OS X</b></td></tr></table></td>";
echo "<td><i>$procent%</i></td></tr>";
}

if (is_file("data/stats/$maand/OS2")) {
include ("data/stats/$maand/OS2");
if ($statmonth == $lang_stats7) {
$procent = $f/$d*100;
}
else { $procent = $b/$c*100; }
$procent = round($procent);
echo "<tr><td><table><tr><td><img src=\"data/stats/images/unknown.gif\" width=\"25\" height=\"25\" border=\"0\" alt=\"OS/2\"></td><td> <b>OS/2</b></td></tr></table></td>";
echo "<td><i>$procent%</i></td></tr>";
}

if (is_file("data/stats/$maand/Windows")) {
include ("data/stats/$maand/Windows");
if ($statmonth == $lang_stats7) {
$procent = $f/$d*100;
}
else { $procent = $b/$c*100; }
$procent = round($procent);
echo "<tr><td><table><tr><td><img src=\"data/stats/images/windows.gif\" width=\"25\" height=\"25\" border=\"0\" alt=\"Window$\"></td><td> <b>Windows</b></td></tr></table></td>";
echo "<td><i>$procent%</i></td></tr>";
}

//Start Browsers
echo "<tr><td><b>$lang_stats4</b></td></tr>";

if (is_file("data/stats/$maand/Firefox")) {
include ("data/stats/$maand/Firefox");
if ($statmonth == $lang_stats7) {
$procent = $e/$d*100;
}
else { $procent = $a/$c*100; }
$procent = round($procent);
echo "<tr><td><table><tr><td><img src=\"data/stats/images/firefox.gif\" width=\"25\" height=\"25\" border=\"0\" alt=\"Firefox\"></td><td> <b>Firefox</b></td></tr></table></td>";
echo "<td><i>$procent%</i></td></tr>";
}

if (is_file("data/stats/$maand/Galeon")) {
include ("data/stats/$maand/Galeon");
if ($statmonth == $lang_stats7) {
$procent = $e/$d*100;
}
else { $procent = $a/$c*100; }
$procent = round($procent);
echo "<tr><td><table><tr><td><img src=\"data/stats/images/galeon.gif\" width=\"25\" height=\"25\" border=\"0\" alt=\"Galeon\"></td><td> <b>Galeon</b></td></tr></table></td>";
echo "<td><i>$procent%</i></td></tr>";
}

if (is_file("data/stats/$maand/MSIE")) {
include ("data/stats/$maand/MSIE");
if ($statmonth == $lang_stats7) {
$procent = $e/$d*100;
}
else { $procent = $a/$c*100; }
$procent = round($procent);
echo "<tr><td><table><tr><td><img src=\"data/stats/images/ie.gif\" width=\"25\" height=\"25\" border=\"0\" alt=\"IE\"></td><td> <b>Internet Explorer</b></td></tr></table></td>";
echo "<td><i>$procent%</i></td></tr>";
}

if (is_file("data/stats/$maand/Konqueror")) {
include ("data/stats/$maand/Konqueror");
if ($statmonth == $lang_stats7) {
$procent = $e/$d*100;
}
else { $procent = $a/$c*100; }
$procent = round($procent);
echo "<tr><td><table><tr><td><img src=\"data/stats/images/konqueror.gif\" width=\"25\" height=\"25\" border=\"0\" alt=\"Konqueror\"></td><td> <b>Konqueror</b></td></tr></table></td>";
echo "<td><i>$procent%</i></td></tr>";
}

if (is_file("data/stats/$maand/Lynx")) {
include ("data/stats/$maand/Lynx");
if ($statmonth == $lang_stats7) {
$procent = $e/$d*100;
}
else { $procent = $a/$c*100; }
$procent = round($procent);
echo "<tr><td><table><tr><td><img src=\"data/stats/images/lynx.gif\" width=\"25\" height=\"25\" border=\"0\" alt=\"Lynx\"></td><td> <b>Lynx</b></td></tr></table></td>";
echo "<td><i>$procent%</i></td></tr>";
}

if (is_file("data/stats/$maand/Netscape")) {
include ("data/stats/$maand/Netscape");
if ($statmonth == $lang_stats7) {
$procent = $e/$d*100;
}
else { $procent = $a/$c*100; }
$procent = round($procent);
echo "<tr><td><table><tr><td><img src=\"data/stats/images/netscape.gif\" width=\"25\" height=\"25\" border=\"0\" alt=\"Netscape\"></td><td> <b>Netscape</b></td></tr></table></td>";
echo "<td><i>$procent%</i></td></tr>";
}

if (is_file("data/stats/$maand/Opera")) {
include ("data/stats/$maand/Opera");
if ($statmonth == $lang_stats7) {
$procent = $e/$d*100;
}
else { $procent = $a/$c*100; }
$procent = round($procent);
echo "<tr><td><table><tr><td><img src=\"data/stats/images/opera.gif\" width=\"25\" height=\"25\" border=\"0\" alt=\"Opera\"></td><td> <b>Opera</b></td></tr></table></td>";
echo "<td><i>$procent%</i></td></tr>";
}

if (is_file("data/stats/$maand/Safari")) {
include ("data/stats/$maand/Safari");
if ($statmonth == $lang_stats7) {
$procent = $e/$d*100;
}
else { $procent = $a/$c*100; }
$procent = round($procent);
echo "<tr><td><table><tr><td><img src=\"data/stats/images/safari.gif\" width=\"25\" height=\"25\" border=\"0\" alt=\"Safari\"></td><td> <b>Safari</b></td></tr></table></td>";
echo "<td><i>$procent%</i></td></tr>";
}
echo "</table>";
// End browser table

//Display the hits
include ("data/stats/totaal/totaal");

echo "<div style=\"background-color: #f4f4f4; border: 1px dotted gray; margin-top: 20px; margin: 10px;\">
	<table>
		<tr>
			<td>
				<img src=\"data/image/stats.png\" border=\"0\" alt=\"\">
			</td>
			<td>
				<span style=\"font-size: 17pt; color: gray;\">$lang_stats8</span><br>
				<b>$lang_stats9</b>: $d";
				if ($maand == "totaal") {
					}
				elseif ($maand == $statmonth) {
				include ("data/stats/$maand/totaal");
				echo "<br><b>$lang_stats10</b>: $c"; }
			echo "</td>
		</tr>
	</table>
</div>";

//Make a nice archive-list
echo "<p><span class=\"kop2\">$lang_stats5</span><br>";
echo "$lang_stats6<br>";
echo "<span style=\"font-size: 10pt;\">";
echo "<a href=\"?statmonth=$lang_stats7\">$lang_stats7</a> || ";
//List files in stats directory
$path = "data/stats";
//using the opendir function
$dir_handle = @opendir($path) or die("$path not opened");
//running the while loop
while ($file = readdir($dir_handle)) 
{
if(($file != ".") and ($file != "..") and ($file != "dircheck.php") and ($file != "systemcheck.php") and ($file != "images")  and ($file != "totaal")) {
   echo "<a href=\"?statmonth=$file\">$file</a> || "; }
}
//closing the directory
closedir($dir_handle);

echo "</span>";
?>