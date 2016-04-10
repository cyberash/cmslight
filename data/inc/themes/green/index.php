<?php
//--------------------------------------------------
//Theme name: Green
//Theme Made by: Dennis, http://www.rs11.nl
//This is a pluck theme-file
//You can find pluck at http://www.pluck-cms.org
//--------------------------------------------------

//First include the predefined variables
include("data/inc/themes/predefined_variables.php");

//Theme-variables below

$html_doctype = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">";
$html_start = "<html xmlns=\"http://www.w3.org/1999/xhtml\">";

$html_in_head = "<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" />";

$html_menu_start = "<div id=\"container\">
<div id=\"top\"></div>
<div id=\"mainblok\">
<div id=\"blok1\">
<div class=\"binnen\">          
<h3 class=\"headtext\">$sitetitle</h3>
<ul class=\"menu1\">";

$html_menuitem_start = "<li class=\"menu1\"><a href=\"?file=$file\">";
$html_menuitem_end = "</a></li>";

$html_menu_end = "</ul></div></div>";

$html_title = "<div id=\"blok2\"><div class=\"binnen\"><h1>$title</h1></div>";

$html_content = "<div class=\"txt\">$content</div>";

$html_footer = "</div> 
</div>
<div id=\"footer\">
>> <a href=\"login.php\">admin</a>
<br />powered by <a href=\"http://www.pluck-cms.org\">pluck</a>
</div>  
</div>			
</body> 
</html>";

?>