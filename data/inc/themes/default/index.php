<?php
//--------------------------------------------------
//Theme name: gTheme
//Theme Made by: Kristaps, http://www.fyfi.net
//This is a pluck theme-file
//You can find pluck at http://www.pluck-cms.org
//--------------------------------------------------

//First include the predefined variables
include("data/inc/themes/predefined_variables.php");

//Theme-variables below
$html_doctype = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">";
$html_start = "<html xmlns=\"http://www.w3.org/1999/xhtml\">";

$html_in_head = "<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" />";

$html_menu_start = "<div id=\"container\"><div id=\"hd\">
<h2>$sitetitle</h2>
<ul>";

$html_menuitem_start = "<li><a href=\"?file=$file\">";
$html_menuitem_end = "</a></li>";

$html_menu_end = "</ul></div>";

$html_title = "<div id=\"ct\"><h1>$title</h1>";

$html_content = $content;

$html_footer = "</div>
<div id=\"ft\">
<a href=\"login.php\">admin</a> | powered by <a href=\"http://www.pluck-cms.org\">pluck</a>
</div></div>		
</body>
</html>";
?>