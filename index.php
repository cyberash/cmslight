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

//Check if pluck has been installed. If not, redirect.
include("data/settings/install.dat");
if ($install == "no") {
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=install.php\">";
exit; }

//Include security-enhancements
include ("data/inc/security.php");
//Include Translation data
include ("data/settings/langpref.php");
include ("data/inc/lang/en.php");
include ("data/inc/lang/$langpref");
//Include Theme data
include ("data/settings/themepref.php");
//Get the site-title
$sitetitle = file_get_contents("data/settings/title.dat");
//Get themedir
$themedirectory = "data/inc/themes/$themepref";

//Get page data
$filetoread = $_GET['file'];
$album = $_GET['album'];
$blogpost = $_GET['blogpost'];
$cat = $_GET['cat'];
//If no page specified: => Homepage
if ((!$filetoread) && (!$album) && (!$blogpost)) {
header("Location: ?file=kop1.php");
exit;		}

//If page exists
elseif(($filetoread) || ($album) || ($blogpost)) {
include ("data/inc/themes/$themepref/index.php"); }

//If the direction is rtl and the theme hasn't been converted yet: convert the theme first
if (($direction == "rtl") && (!file_exists("data/inc/themes/$themepref/style-rtl.css"))) {
header("Location: data/inc/themes_convert-rtl.php"); }

//---------------
//Render the page
//---------------
//Include Doctype
echo $html_doctype;
echo "\n";
//Open HTML
echo $html_start;
echo "\n";
//After HTML
echo "<head>
<title>$title - $sitetitle</title>\n";

//If the direction is rtl: include appropriate css
if ($direction == "rtl") {
echo "<style type=\"text/css\">
body {
direction: rtl; }
</style>\n";
	}

//Include Meta-data
echo "<meta name=\"title\" content=\"$title\" />
<meta name=\"keywords\" content=\"$keywords\" />
<meta name=\"description\" content=\"$description\" />\n";

//Include rtl css-file
if ($direction == "rtl") { 
	echo "<link href=\"$themedirectory/style-rtl.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />"; 
}
//... or include ltr css-file
else {
	echo "<link href=\"$themedirectory/style.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />"; 
}

//...and also include the lightbox-album files
if ($album) {
echo "<link href=\"data/lightbox/css/lightbox.css\" rel=\"stylesheet\"  type=\"text/css\" media=\"screen\" />
<script src=\"data/lightbox/js/prototype.js\" type=\"text/javascript\"></script>
<script src=\"data/lightbox/js/scriptaculous.js?load=effects\" type=\"text/javascript\"></script>
<script src=\"data/lightbox/js/lightbox.js\" type=\"text/javascript\"></script>"; }

//and the theme-defined head
echo $html_in_head;
echo "\n";

//Close the head-tag and start the body
echo "</head>
<body>\n";

//Include HTML Menu Start
echo $html_menu_start;
echo "\n";

//Make up the function to readout menu-data  
function read_dir($dir) {
   $path = opendir($dir);
   while (false !== ($file = readdir($path))) {
       if(($file !== ".") and ($file !== "..")) {
           if(is_file($dir."/".$file))
               $files[]=$file;
           else
               $dirs[]=$dir."/".$file;           
       }
   }
   if($dirs) {
   echo "";
   }
   if($files) {
       natcasesort($files);
       foreach ($files as $file) {
           //Include Theme data
			  include ("data/settings/themepref.php");
			  include ("data/inc/themes/$themepref/index.php");
			  //Get page data
			  unset($hidden);
           include ("data/content/$file");

           //If page isn't hidden: display menu-item
           if (($hidden == "no") || (!$hidden)) {
           echo "$html_menuitem_start$title$html_menuitem_end"; } 

           }
   }
   closedir($path);
}

if (($html_menuitem_start) && ($html_menuitem_end)) {
read_dir("data/content"); }

//Include HTML Menu End
echo $html_menu_end;
echo "\n";

//Include HTML Title
echo $html_title;
echo "\n";

//Include HTML Content
if ($album) {
	include("data/inc/albums_include2.php"); }
elseif ($blogpost) {
	include("data/inc/blog_include_react.php"); }
else {
	echo $html_content;
	echo "\n"; }

//Load the albums
include("data/inc/albums_include.php");

//Load the blog
include("data/inc/blog_include.php");

//If we need a contactform, show it
if ($contactinc == "yes") {
include("data/inc/contactform.php"); }

//Include the stats
echo "<img src=\"data/count.php\" alt=\"\" style=\"border: 0px\" />\n";

//Display HTML Footer
echo $html_footer;
?>