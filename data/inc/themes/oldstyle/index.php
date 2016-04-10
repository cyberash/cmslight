<?php
//--------------------------------------------------
//Theme name: Oldstyle
//Designer: Sander Thijsen, http://www.somp.nl
//This is a pluck theme-file
//You can find pluck at http://www.pluck-cms.org
//--------------------------------------------------

//First include the predefined variables
include("data/inc/themes/predefined_variables.php");

$html_doctype = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">";
$html_start = "<html xmlns=\"http://www.w3.org/1999/xhtml\">";

$html_in_head = "<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" />";

$html_menu_start = "<div class=\"head\">
<div class=\"header\">
<div class=\"headerkop\">$sitetitle</div>
<div class=\"menu\">";

$html_menuitem_start = "<a href=\"?file=$file\">";
$html_menuitem_end = "</a> || ";

$html_menu_end = "</div></div>";

$html_title = "<div class=\"content\">
<div class=\"kop\">$title</div><br /><div class=\"txt\">";

$html_content = "$content";

$html_footer = "<div class=\"footer\">
>> <a href=\"login.php\">admin</a>
<br />powered by <a href=\"http://www.pluck-cms.org\">pluck</a>
</div>
</div>
</div>
</div>
</body>
</html>";
?>