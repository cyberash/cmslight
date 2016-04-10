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

//First set character encoding
header("Content-Type:text/html;charset=utf-8");
?>
<html>
<head>
<title>pluck <?php echo $pluck_version; ?> - <?php echo $titelkop; ?></title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<?php
if ($direction == "rtl") {
echo "<link href=\"data/styleadmin-rtl.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\">";
}
else {
echo "<link href=\"data/styleadmin.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\">";
}
?>
<meta name="robots" content="noindex">
<script language="javascript" type="text/javascript" src="data/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "advanced",
	entity_encoding : "raw",
<?php
//Check if we need to set the direction to rtl
if ($direction == "rtl") {
echo "	directionality : \"rtl\","; }
//Include the right language
include("data/inc/tinymce_lang.php");
?>
	theme : "advanced",
	force_p_newlines : false,
	force_br_newlines : true,
	width : "600px",
	plugins : "table",
	theme_advanced_buttons1 : "bold,italic,underline,strikethrough,separator,justifyleft,justifycenter,justifyright,separator,fontselect,fontsizeselect",
   theme_advanced_buttons2 : "cut,copy,paste,separator,undo,redo,separator,bullist,numlist,outdent,indent,separator,link,unlink,anchor,image,separator,table,forecolor,backcolor,separator,code,cleanup",
   theme_advanced_buttons3 : "",
   theme_advanced_toolbar_location : "top",
   theme_advanced_toolbar_align : "left",
   theme_advanced_path_location : "bottom",
   theme_advanced_resizing : true,
   theme_advanced_resize_horizontal : false
});
</script>
<script language="javascript" type="text/javascript">
<!--
function refresh()
{
    window.location.reload( false );
}
//-->
</script>
<script language=\"JavaScript1.3\">
//Enter-listener
if (document.layers)
  document.captureEvents(Event.KEYDOWN);
  document.onkeydown =
    function (evt) { 
      var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
      if (keyCode == 13)   //13 = the code for pressing ENTER
 
      {
         document.form.submit();
      }
    }
</script>
</head>

<body>
<div class="menuheader">
<div class="menu2">
	<span class="menuitems"><?php echo $titelkop; ?></span>

</div>
<span class="cmssystem">pluck</span>
</div>

<div class="text">