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

//Include security-enhancements
include ("data/inc/security.php");
//Include Translation data
include ("data/settings/langpref.php");
include ("data/inc/lang/en.php");
include ("data/inc/lang/$langpref");
//Include the installation data
require ("data/settings/install.dat");

//First check if we've installed pluck
if ($install == "no") {
$titelkop = $lang_error1;
include ("data/inc/header.php");
echo "$lang_login2<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=install.php\">";
include ("data/inc/footer.php");
exit; 
} 

if ($install == "yes") {
session_start();
//Then check if we are properly logged in
if ($_SESSION["cmssystem_loggedin"] != "ok") {
$titelkop = $lang_error3;
include ("data/inc/header.php");
echo "$lang_error4<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=login.php\">";
include ("data/inc/footer.php");
exit; }

//Incluse proper POST/GETs
include("data/inc/post_get.php");


//------------------------
//------------------------
//	Action pages
//------------------------
//------------------------
if($action) {

//Page:Start
if ($action=="start") {
$titelkop = $lang_kop1;
include ("data/inc/header.php");
include("data/inc/start.php"); }

//Page:Credits
elseif ($action=="credits") {
$titelkop = $lang_credits;
include ("data/inc/header.php");
include("data/inc/credits.php"); }

//Page:Pages
elseif ($action=="page") {
$titelkop = $lang_kop2;
include ("data/inc/header.php");
include("data/inc/page.php"); }

//Page:New Page
elseif ($action=="newpage") {
$titelkop = $lang_kop11;
include ("data/inc/header.php");
include("data/inc/newpage.php"); }

//Page:Manage Images
elseif ($action=="images") {
$titelkop = $lang_kop17;
include ("data/inc/header.php");
include("data/inc/images.php"); }

//Page:Modules
elseif ($action=="modules") {
$titelkop = $lang_modules;
include ("data/inc/header.php");
include("data/inc/modules.php"); }

//Page:Albums
elseif ($action=="albums") {
$titelkop = $lang_albums;
include ("data/inc/header.php");
include("data/inc/albums.php"); }

//Page:Blog
elseif ($action=="blog") {
$titelkop = $lang_blog;
include ("data/inc/header.php");
include("data/inc/blog.php"); }

//Page:Blog:NewPost
elseif ($action=="blog_newpost") {
$titelkop = $lang_blog10;
include ("data/inc/header.php");
include("data/inc/blog_newpost.php"); }

//Page:Options
elseif ($action=="options") {
$titelkop = $lang_kop4;
include ("data/inc/header.php");
include("data/inc/options.php"); }

//Page:Options:Settings
elseif ($action=="settings") {
$titelkop = $lang_settings;
include ("data/inc/header.php");
include("data/inc/settings.php"); }

//Page:Options:Module Settings
elseif ($action=="modulesettings") {
$titelkop = $lang_modules3;
include ("data/inc/header.php");
include("data/inc/module_settings.php"); }

//Page:Options:Language
elseif ($action=="language") {
$titelkop = $lang_kop14;
include ("data/inc/header.php");
include("data/inc/language.php"); }

//Page:Options:Theme
elseif ($action=="theme") {
$titelkop = $lang_kop16;
include ("data/inc/header.php");
include("data/inc/theme.php"); }

//Page:Options:Changepass
elseif ($action=="changepass") {
$titelkop = $lang_kop10;
include ("data/inc/header.php");
include("data/inc/changepass.php"); }

//Page:Options:Themeinstall
elseif ($action=="themeinstall") {
$titelkop = $lang_theme5;
include ("data/inc/header.php");
include("data/inc/themeinstall.php"); }

//Page:Trashcan
elseif ($action=="trashcan") {
$titelkop = $lang_trash;
include ("data/inc/header.php");
include("data/inc/trashcan.php"); }

//Page:Empty Trashcan
elseif ($action=="trashcan_empty") {
$titelkop = $lang_trash;
include ("data/inc/header.php");
include("data/inc/trashcan_empty.php"); }

//Page:Logout
elseif ($action=="logout") {
$titelkop = $lang_kop5;
session_destroy();
include ("data/inc/header.php");
include("data/inc/logout.php"); }

//Unknown page => Redirect
else {
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=?action=start\">";
exit; }
}

//------------------------
//------------------------
//	Stats pages
//------------------------
//------------------------
elseif($statmonth) {
$titelkop = $lang_kop15;
include ("data/inc/header.php");
include("data/inc/stats.php");  
}

//------------------------
//------------------------
//	Editpage pages
//------------------------
//------------------------
elseif($editpage) {
$titelkop = $lang_page3;
include ("data/inc/header.php");
include("data/inc/editpage.php"); 
}

//------------------------
//------------------------
//	Editmeta pages
//------------------------
//------------------------
elseif($editmeta) {
$titelkop = $lang_meta1;
include ("data/inc/header.php");
include("data/inc/page_editmeta.php"); 
}

//------------------------
//------------------------
//	Deletepage pages
//------------------------
//------------------------
elseif($deletepage) {
$titelkop = $lang_trash1;
include ("data/inc/header.php");
echo $lang_trash2;
include("data/inc/deletepage.php"); 
}

//------------------------
//------------------------
//	Deleteimage pages
//------------------------
//------------------------
elseif($deleteimage) {
$titelkop = $lang_trash1;
include ("data/inc/header.php");
echo $lang_trash2;
include("data/inc/deleteimage.php"); 
}

//------------------------
//------------------------
//	Pageup pages
//------------------------
//------------------------
elseif($pageup) {
$titelkop = $lang_updown1;
include ("data/inc/header.php");
include("data/inc/pageup.php"); 
}

//------------------------
//------------------------
//	Pagedown pages
//------------------------
//------------------------
elseif($pagedown) {
$titelkop = $lang_updown1;
include ("data/inc/header.php");
include("data/inc/pagedown.php"); 
}

//------------------------
//------------------------
//	Imageup pages
//------------------------
//------------------------
elseif($imageup) {
$titelkop = $lang_updown5;
include ("data/inc/header.php");
include("data/inc/albums_up.php"); 
}

//------------------------
//------------------------
//	Imagedown pages
//------------------------
//------------------------
elseif($imagedown) {
$titelkop = $lang_updown5;
include ("data/inc/header.php");
include("data/inc/albums_down.php"); 
}

//------------------------
//------------------------
// Editalbum pages
//------------------------
//------------------------
elseif($editalbum) {
$titelkop = $lang_albums6;
include ("data/inc/header.php");
include("data/inc/albums_edit.php");
}

//------------------------
//------------------------
//	Deletealbum pages
//------------------------
//------------------------
elseif($deletealbum) {
$titelkop = $lang_albums5;
include ("data/inc/header.php");
echo $lang_page5;
include("data/inc/albums_delete.php");
}

//------------------------
//------------------------
//	Deleteimagealbum pages
//------------------------
//------------------------
elseif($deleteimagealbum) {
$titelkop = $lang_kop13;
include ("data/inc/header.php");
echo $lang_page5;
include("data/inc/albums_deleteimage.php");
}

//------------------------
//------------------------
//	Editimagealbum pages
//------------------------
//------------------------
elseif($editimagealbum) {
$titelkop = $lang_albums15;
include ("data/inc/header.php");
include("data/inc/albums_editimage.php");
}

//------------------------
//------------------------
//	Deleteblog pages
//------------------------
//------------------------
elseif($deleteblog) {
$titelkop = $lang_blog6;
include ("data/inc/header.php");
echo $lang_page5;
include("data/inc/blog_delete.php");
}

//------------------------
//------------------------
//	Editblog pages
//------------------------
//------------------------
elseif($editblog) {
$titelkop = $lang_blog7;
include ("data/inc/header.php");
include("data/inc/blog_edit.php");
}

//------------------------
//------------------------
//	Editblogreaction pages
//------------------------
//------------------------
elseif($blog_editreactions) {
$titelkop = $lang_blog19;
include ("data/inc/header.php");
include("data/inc/blog_editreactions.php");
}

//------------------------
//------------------------
//	Deleteblogreaction pages
//------------------------
//------------------------
elseif($blog_deletereaction) {
$titelkop = $lang_blog21;
include ("data/inc/header.php");
echo $lang_page5;
include("data/inc/blog_deletereaction.php");
}

//------------------------
//------------------------
//	Editblogpost pages
//------------------------
//------------------------
elseif($blog_editpost) {
$titelkop = $lang_blog11;
include ("data/inc/header.php");
include("data/inc/blog_editpost.php");
}

//------------------------
//------------------------
//	Deleteblogpost pages
//------------------------
//------------------------
elseif($blog_deletepost) {
$titelkop = $lang_blog12;
include ("data/inc/header.php");
echo $lang_page5;
include("data/inc/blog_deletepost.php");
}

//------------------------
//------------------------
//	Trash_viewitem pages
//------------------------
//------------------------
elseif($trash_viewitem) {
$titelkop = $lang_trash7;
include ("data/inc/header.php");
include("data/inc/trashcan_viewitem.php");
}

//------------------------
//------------------------
//	Trash_restoreitem pages
//------------------------
//------------------------
elseif($trash_restoreitem) {
$titelkop = $lang_trash10;
include ("data/inc/header.php");
include("data/inc/trashcan_restoreitem.php");
}

//------------------------
//------------------------
//	Trash_deleteitem pages
//------------------------
//------------------------
elseif($trash_deleteitem) {
$titelkop = $lang_trash8;
include ("data/inc/header.php");
include("data/inc/trashcan_deleteitem.php");
}


//------------------------
//	Unknown pages
//------------------------
else {
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=?action=start\">";
exit; 
}

//Include footer
include ("data/inc/footer.php");
}
?>