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

//Class GIFPIX
class gifpix {
// by Bernd Schnitzer <schber@sbox.tugraz.at>

	var $start = '47494638396101000100800000';
	var $color = 'ffffff';
	var $black = '000000';
	var $marker = '21f904';
	var $transparent = '01';
	var $end = '000000002c00000000010001000002024401003b';
	
	function hex2bin($s) {
		for ($i = 0; $i < strlen($s); $i += 2) { 
			$bin .= chr(hexdec(substr($s,$i,2))); 
		} 
		return $bin; 
	}

	function create($color = -1) {
		if (($color!= -1) && (strlen($color)==6)) {
			$this->transparent = '00';
			if ($color == '000000')
				$this->black = 'ffffff';
			$this->color = $color;
		}
		$hex = $this->start.$this->color.$this->black.$this->marker.$this->transparent.$this->end;
		return $this->hex2bin($hex);
	}
}

//First make sure the image doesn't end up in the visitors' cache
header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
header("Pragma: no-cache");
//Make the transparent GIF
header("Content-Type: image/gif");
$gifpix = new gifpix();
print $gifpix->create();
 
//Include systemdetection
require('stats/systemcheck.php');
require('stats/dircheck.php');
$br = new Browser;
//Get date
$maand = date("M");
$year = date("Y");

//Check directories
if (dir_exists("stats/$maand$year") != "true") {
mkdir("stats/$maand$year", 0777);
chmod("stats/$maand$year", 0777);
}
if (dir_exists("totaal") != "true") {
mkdir("stats/totaal", 0777);
chmod("stats/totaal", 0777);
}

//Write month-data
//Month's visitors
if (is_file("stats/$maand$year/totaal")) {
include ("stats/$maand$year/totaal"); }
$c++;
$file = fopen ("stats/$maand$year/totaal","w+");
fputs($file, "<");
fputs($file, "? $");
fputs($file, "c=$c ?");
fputs($file, ">"); 
fclose ($file);
chmod("stats/$maand$year/totaal", 0777);

//Month's browsers
if (is_file("stats/$maand$year/$br->Name")) {
include ("stats/$maand$year/$br->Name"); }
$a++;
$file=fopen ("stats/$maand$year/$br->Name","w+");
fputs($file, "<");
fputs($file, "? $");
fputs($file, "a=$a ?");
fputs($file, ">"); 
fclose ($file);
chmod("stats/$maand$year/$br->Name", 0777);

//Months OS's
if (is_file("stats/$maand$year/$br->Platform")) {
include ("stats/$maand$year/$br->Platform"); }
$b++;
$file=fopen ("stats/$maand$year/$br->Platform","w+");
fputs($file, "<");
fputs($file, "? $");
fputs($file, "b=$b ?");
fputs($file, ">"); 
fclose ($file);
chmod("stats/$maand$year/$br->Platform", 0777);

//Write total-data
//Total visitors
if (is_file("stats/totaal/totaal")) {
include ("stats/totaal/totaal"); }
$d++;
$file=fopen ("stats/totaal/totaal","w+");
fputs($file, "<");
fputs($file, "? $");
fputs($file, "d=$d ?");
fputs($file, ">"); 
fclose ($file);
chmod("stats/totaal/totaal", 0777);

//Total browsers
if (is_file("stats/totaal/$br->Name")) {
include ("stats/totaal/$br->Name"); }
$e++;
$file=fopen ("stats/totaal/$br->Name","w+");
fputs($file, "<");
fputs($file, "? $");
fputs($file, "e=$e ?");
fputs($file, ">"); 
fclose ($file);
chmod("stats/totaal/$br->Name", 0777);

//Total OSs
if (is_file("stats/totaal/$br->Platform")) {
include ("stats/totaal/$br->Platform"); }
$f++;
$file=fopen ("stats/totaal/$br->Platform","w+");
fputs($file, "<");
fputs($file, "? $");
fputs($file, "f=$f ?");
fputs($file, ">"); 
fclose ($file);
chmod("stats/totaal/$br->Platform", 0777);
?>