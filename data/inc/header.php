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
//And include the user-specified settings
include("data/settings/options.php");
?>
<html>
<head>
<title>pluck <?php echo $pluck_version; ?> <?php echo $lang_install22; ?> - <?php echo $titelkop; ?></title>
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
<?php
//Check if we need to include TinyMCE
if (($editpage) || ($action == "newpage") || ($action == "blog_newpost") || ($blog_editpost)) {
?>
<script language="javascript" type="text/javascript" src="data/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	editor_selector : "tinymce",
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
   theme_advanced_resize_horizontal : false,
<?php
//Include the Full XHTML Ruleset, when that has been set
if ($xhtmlruleset == "true") {
echo "valid_elements : \"\" +
+\"a[accesskey|charset|class|coords|dir<ltr?rtl|href|hreflang|id|lang|name\"
  +\"|onblur|onclick|ondblclick|onfocus|onkeydown|onkeypress|onkeyup\"
  +\"|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|rel|rev\"
  +\"|shape<circle?default?poly?rect|style|tabindex|title|target|type],\"
+\"abbr[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress\"
  +\"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style\"
  +\"|title],\"
+\"acronym[class|dir<ltr?rtl|id|id|lang|onclick|ondblclick|onkeydown|onkeypress\"
  +\"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style\"
  +\"|title],\"
+\"address[class|align|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown\"
  +\"|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover\"
  +\"|onmouseup|style|title],\"
+\"applet[align<bottom?left?middle?right?top|alt|archive|class|code|codebase\"
  +\"|height|hspace|id|name|object|style|title|vspace|width],\"
+\"area[accesskey|alt|class|coords|dir<ltr?rtl|href|id|lang|nohref<nohref\"
  +\"|onblur|onclick|ondblclick|onfocus|onkeydown|onkeypress|onkeyup\"
  +\"|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup\"
  +\"|shape<circle?default?poly?rect|style|tabindex|title|target],\"
+\"base[href|target],\"
+\"basefont[color|face|id|size],\"
+\"bdo[class|dir<ltr?rtl|id|lang|style|title],\"
+\"big[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress\"
  +\"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style\"
  +\"|title],\"
+\"blockquote[dir|style|cite|class|dir<ltr?rtl|id|lang|onclick|ondblclick\"
  +\"|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout\"
  +\"|onmouseover|onmouseup|style|title],\"
+\"body[alink|background|bgcolor|class|dir<ltr?rtl|id|lang|link|onclick\"
  +\"|ondblclick|onkeydown|onkeypress|onkeyup|onload|onmousedown|onmousemove\"
  +\"|onmouseout|onmouseover|onmouseup|onunload|style|title|text|vlink],\"
+\"br[class|clear<all?left?none?right|id|style|title],\"
+\"button[accesskey|class|dir<ltr?rtl|disabled<disabled|id|lang|name|onblur\"
  +\"|onclick|ondblclick|onfocus|onkeydown|onkeypress|onkeyup|onmousedown\"
  +\"|onmousemove|onmouseout|onmouseover|onmouseup|style|tabindex|title|type\"
  +\"|value],\"
+\"caption[align<bottom?left?right?top|class|dir<ltr?rtl|id|lang|onclick\"
  +\"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove\"
  +\"|onmouseout|onmouseover|onmouseup|style|title],\"
+\"center[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress\"
  +\"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style\"
  +\"|title],\"
+\"cite[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress\"
  +\"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style\"
  +\"|title],\"
+\"code[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress\"
  +\"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style\"
  +\"|title],\"
+\"col[align<center?char?justify?left?right|char|charoff|class|dir<ltr?rtl|id\"
  +\"|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown\"
  +\"|onmousemove|onmouseout|onmouseover|onmouseup|span|style|title\"
  +\"|valign<baseline?bottom?middle?top|width],\"
+\"colgroup[align<center?char?justify?left?right|char|charoff|class|dir<ltr?rtl\"
  +\"|id|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown\"
  +\"|onmousemove|onmouseout|onmouseover|onmouseup|span|style|title\"
  +\"|valign<baseline?bottom?middle?top|width],\"
+\"dd[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup\"
  +\"|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style|title],\"
+\"del[cite|class|datetime|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown\"
  +\"|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover\"
  +\"|onmouseup|style|title],\"
+\"dfn[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress\"
  +\"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style\"
  +\"|title],\"
+\"dir[class|compact<compact|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown\"
  +\"|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover\"
  +\"|onmouseup|style|title],\"
+\"div[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick\"
  +\"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove\"
  +\"|onmouseout|onmouseover|onmouseup|style|title],\"
+\"dl[class|compact<compact|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown\"
  +\"|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover\"
  +\"|onmouseup|style|title],\"
+\"dt[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup\"
  +\"|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style|title],\"
+\"em/i[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress\"
  +\"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style\"
  +\"|title],\"
+\"fieldset[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress\"
  +\"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style\"
  +\"|title],\"
+\"font[class|color|dir<ltr?rtl|face|id|lang|size|style|title],\"
+\"form[accept|accept-charset|action|class|dir<ltr?rtl|enctype|id|lang\"
  +\"|method<get?post|name|onclick|ondblclick|onkeydown|onkeypress|onkeyup\"
  +\"|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|onreset|onsubmit\"
  +\"|style|title|target],\"
+\"frame[class|frameborder|id|longdesc|marginheight|marginwidth|name\"
  +\"|noresize<noresize|scrolling<auto?no?yes|src|style|title],\"
+\"frameset[class|cols|id|onload|onunload|rows|style|title],\"
+\"h1[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick\"
  +\"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove\"
  +\"|onmouseout|onmouseover|onmouseup|style|title],\"
+\"h2[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick\"
  +\"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove\"
  +\"|onmouseout|onmouseover|onmouseup|style|title],\"
+\"h3[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick\"
  +\"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove\"
  +\"|onmouseout|onmouseover|onmouseup|style|title],\"
+\"h4[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick\"
  +\"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove\"
  +\"|onmouseout|onmouseover|onmouseup|style|title],\"
+\"h5[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick\"
  +\"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove\"
  +\"|onmouseout|onmouseover|onmouseup|style|title],\"
+\"h6[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick\"
  +\"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove\"
  +\"|onmouseout|onmouseover|onmouseup|style|title],\"
+\"head[dir<ltr?rtl|lang|profile],\"
+\"hr[align<center?left?right|class|dir<ltr?rtl|id|lang|noshade<noshade|onclick\"
  +\"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove\"
  +\"|onmouseout|onmouseover|onmouseup|size|style|title|width],\"
+\"html[dir<ltr?rtl|lang|version],\"
+\"iframe[align<bottom?left?middle?right?top|class|frameborder|height|id\"
  +\"|longdesc|marginheight|marginwidth|name|scrolling<auto?no?yes|src|style\"
  +\"|title|width],\"
+\"img[id|dir|lang|longdesc|usemap|style|class|src|onmouseover|onmouseout|border|alt=|title|hspace|vspace|width|height|align],\"
+\"input[accept|accesskey|align<bottom?left?middle?right?top|alt\"
  +\"|checked<checked|class|dir<ltr?rtl|disabled<disabled|id|ismap<ismap|lang\"
  +\"|maxlength|name|onblur|onclick|ondblclick|onfocus|onkeydown|onkeypress\"
  +\"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|onselect\"
  +\"|readonly<readonly|size|src|style|tabindex|title\"
  +\"|type<button?checkbox?file?hidden?image?password?radio?reset?submit?text\"
  +\"|usemap|value],\"
+\"ins[cite|class|datetime|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown\"
  +\"|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover\"
  +\"|onmouseup|style|title],\"
+\"isindex[class|dir<ltr?rtl|id|lang|prompt|style|title],\"
+\"kbd[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress\"
  +\"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style\"
  +\"|title],\"
+\"label[accesskey|class|dir<ltr?rtl|for|id|lang|onblur|onclick|ondblclick\"
  +\"|onfocus|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout\"
  +\"|onmouseover|onmouseup|style|title],\"
+\"legend[align<bottom?left?right?top|accesskey|class|dir<ltr?rtl|id|lang\"
  +\"|onclick|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove\"
  +\"|onmouseout|onmouseover|onmouseup|style|title],\"
+\"li[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup\"
  +\"|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style|title|type\"
  +\"|value],\"
+\"link[charset|class|dir<ltr?rtl|href|hreflang|id|lang|media|onclick\"
  +\"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove\"
  +\"|onmouseout|onmouseover|onmouseup|rel|rev|style|title|target|type],\"
+\"map[class|dir<ltr?rtl|id|lang|name|onclick|ondblclick|onkeydown|onkeypress\"
  +\"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style\"
  +\"|title],\"
+\"menu[class|compact<compact|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown\"
  +\"|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover\"
  +\"|onmouseup|style|title],\"
+\"meta[content|dir<ltr?rtl|http-equiv|lang|name|scheme],\"
+\"noframes[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress\"
  +\"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style\"
  +\"|title],\"
+\"noscript[class|dir<ltr?rtl|id|lang|style|title],\"
+\"object[align<bottom?left?middle?right?top|archive|border|class|classid\"
  +\"|codebase|codetype|data|declare|dir<ltr?rtl|height|hspace|id|lang|name\"
  +\"|onclick|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove\"
  +\"|onmouseout|onmouseover|onmouseup|standby|style|tabindex|title|type|usemap\"
  +\"|vspace|width],\"
+\"ol[class|compact<compact|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown\"
  +\"|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover\"
  +\"|onmouseup|start|style|title|type],\"
+\"optgroup[class|dir<ltr?rtl|disabled<disabled|id|label|lang|onclick\"
  +\"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove\"
  +\"|onmouseout|onmouseover|onmouseup|style|title],\"
+\"option[class|dir<ltr?rtl|disabled<disabled|id|label|lang|onclick|ondblclick\"
  +\"|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout\"
  +\"|onmouseover|onmouseup|selected<selected|style|title|value],\"
+\"p[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick\"
  +\"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove\"
  +\"|onmouseout|onmouseover|onmouseup|style|title],\"
+\"param[id|name|type|value|valuetype<DATA?OBJECT?REF],\"
+\"pre/listing/plaintext/xmp[align|class|dir<ltr?rtl|id|lang|onclick|ondblclick\"
  +\"|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout\"
  +\"|onmouseover|onmouseup|style|title|width],\"
+\"q[cite|class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress\"
  +\"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style\"
  +\"|title],\"
+\"s[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup\"
  +\"|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style|title],\"
+\"samp[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress\"
  +\"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style\"
  +\"|title],\"
+\"script[charset|defer|language|src|type],\"
+\"select[class|dir<ltr?rtl|disabled<disabled|id|lang|multiple<multiple|name\"
  +\"|onblur|onchange|onclick|ondblclick|onfocus|onkeydown|onkeypress|onkeyup\"
  +\"|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|size|style\"
  +\"|tabindex|title],\"
+\"small[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress\"
  +\"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style\"
  +\"|title],\"
+\"span[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown\"
  +\"|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover\"
  +\"|onmouseup|style|title],\"
+\"strike[class|class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown\"
  +\"|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover\"
  +\"|onmouseup|style|title],\"
+\"strong/b[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress\"
  +\"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style\"
  +\"|title],\"
+\"style[dir<ltr?rtl|lang|media|title|type],\"
+\"sub[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress\"
  +\"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style\"
  +\"|title],\"
+\"sup[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress\"
  +\"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style\"
  +\"|title],\"
+\"table[align<center?left?right|bgcolor|border|cellpadding|cellspacing|class\"
  +\"|dir<ltr?rtl|frame|height|id|lang|onclick|ondblclick|onkeydown|onkeypress\"
  +\"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|rules\"
  +\"|style|summary|title|width],\"
+\"tbody[align<center?char?justify?left?right|char|class|charoff|dir<ltr?rtl|id\"
  +\"|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown\"
  +\"|onmousemove|onmouseout|onmouseover|onmouseup|style|title\"
  +\"|valign<baseline?bottom?middle?top],\"
+\"td[abbr|align<center?char?justify?left?right|axis|bgcolor|char|charoff|class\"
  +\"|colspan|dir<ltr?rtl|headers|height|id|lang|nowrap<nowrap|onclick\"
  +\"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove\"
  +\"|onmouseout|onmouseover|onmouseup|rowspan|scope<col?colgroup?row?rowgroup\"
  +\"|style|title|valign<baseline?bottom?middle?top|width],\"
+\"textarea[accesskey|class|cols|dir<ltr?rtl|disabled<disabled|id|lang|name\"
  +\"|onblur|onclick|ondblclick|onfocus|onkeydown|onkeypress|onkeyup\"
  +\"|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|onselect\"
  +\"|readonly<readonly|rows|style|tabindex|title],\"
+\"tfoot[align<center?char?justify?left?right|char|charoff|class|dir<ltr?rtl|id\"
  +\"|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown\"
  +\"|onmousemove|onmouseout|onmouseover|onmouseup|style|title\"
  +\"|valign<baseline?bottom?middle?top],\"
+\"th[abbr|align<center?char?justify?left?right|axis|bgcolor|char|charoff|class\"
  +\"|colspan|dir<ltr?rtl|headers|height|id|lang|nowrap<nowrap|onclick\"
  +\"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove\"
  +\"|onmouseout|onmouseover|onmouseup|rowspan|scope<col?colgroup?row?rowgroup\"
  +\"|style|title|valign<baseline?bottom?middle?top|width],\"
+\"thead[align<center?char?justify?left?right|char|charoff|class|dir<ltr?rtl|id\"
  +\"|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown\"
  +\"|onmousemove|onmouseout|onmouseover|onmouseup|style|title\"
  +\"|valign<baseline?bottom?middle?top],\"
+\"title[dir<ltr?rtl|lang],\"
+\"tr[abbr|align<center?char?justify?left?right|bgcolor|char|charoff|class\"
  +\"|rowspan|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress\"
  +\"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style\"
  +\"|title|valign<baseline?bottom?middle?top],\"
+\"tt[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup\"
  +\"|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style|title],\"
+\"u[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup\"
  +\"|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style|title],\"
+\"ul[class|compact<compact|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown\"
  +\"|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover\"
  +\"|onmouseup|style|title|type],\"
+\"var[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress\"
  +\"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style\"
  +\"|title]\""; }
?>
});
</script>
<?php
}
?>
</head>
<body>

<?php
//Get the date for the stats
$m = date("M");
$y = date("Y");
$my = "$m$y";
?>

<div class="menuheader">
<div class="menu">

<div class="menuitem">
	<table>
		<tr>
			<td><img src="data/image/menu/start.png" border="0" alt=""></td>
			<td><a href="?action=start"><?php echo $lang_kop1; ?></a></td>
		</tr>
	</table>
</div>

<div class="menuitem">
	<table>
		<tr>
			<td><img src="data/image/menu/pages.png" border="0" alt=""></td>
			<td><a href="?action=page"><?php echo $lang_kop2; ?></a></td>
		</tr>
	</table>
</div>

<div class="menuitem">
	<table>
		<tr>
			<td><img src="data/image/menu/modules.png" border="0" alt=""></td>
			<td><a href="?action=modules"><?php echo $lang_modules; ?></a></td>
		</tr>
	</table>
</div>

<div class="menuitem">
	<table>
		<tr>
			<td><img src="data/image/menu/options.png" border="0" alt=""></td>
			<td><a href="?action=options"><?php echo $lang_kop4; ?></a></td>
		</tr>
	</table>
</div>

<div class="menuitem">
	<table>
		<tr>
			<td><img src="data/image/menu/stats.png" border="0" alt=""></td>
			<td><a href="?statmonth=<?php echo $my; ?>"><?php echo $lang_kop15; ?></a></td>
		</tr>
	</table>
</div>

<div class="menuitem">
	<table>
		<tr>
			<td><img src="data/image/menu/logout.png" border="0" alt=""></td>
			<td><a href="?action=logout"><?php echo $lang_kop5; ?></a></td>
		</tr>
	</table>
</div>

</div>

<div class="cmssystem">pluck</div>

<div class="statusbox">
<?php include("data/inc/trashcan_applet.php"); ?>
<?php include("data/inc/update_applet.php"); ?>
</div>

</div>

<div class="text">
<p><span class="kop"><?php echo $titelkop; ?></span></p>