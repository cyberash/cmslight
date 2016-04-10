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

//---------------
//VARIABLES
//---------------

//GETS
$action = $_GET['action'];
$statmonth = $_GET['statmonth'];
$editpage = $_GET['editpage'];
$deletepage = $_GET['deletepage'];
$deleteimage = $_GET['deleteimage'];
$editmeta = $_GET['editmeta'];
$pageup = $_GET['pageup'];
$pagedown = $_GET['pagedown'];
$deletealbum = $_GET['deletealbum'];
$deleteimagealbum = $_GET['deleteimagealbum'];
$editimagealbum = $_GET['editimagealbum'];
$editalbum = $_GET['editalbum'];
$album = $_GET['album'];
$imageup = $_GET['imageup'];
$imagedown = $_GET['imagedown'];
$deleteblog = $_GET['deleteblog'];
$editblog = $_GET['editblog'];
$blog_deletepost = $_GET['blog_deletepost'];
$blog_editpost = $_GET['blog_editpost'];
$blog_editreactions = $_GET['blog_editreactions'];
$cat = $_GET['cat'];
$blogpost = $_GET['blogpost'];
$blog_deletereaction = $_GET['blog_deletereaction'];
$trash_viewitem = $_GET['trash_viewitem'];
$trash_restoreitem = $_GET['trash_restoreitem'];
$trash_deleteitem = $_GET['trash_deleteitem'];
//POSTS
$kop = $_POST['kop'];
$tekst = $_POST['tekst'];
$back = $_POST['back']; 
$txt = $_POST['txt'];
$type = $_POST['type'];
$copyr = $_POST['copyr'];
$sleutel = $_POST['sleutel'];
$pass = $_POST['pass'];
$passoud = $_POST['passoud'];
$cont = $_POST['cont'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$chosen_lang = $_POST['chosen_lang'];
$email = $_POST['email'];
$email2 = $_POST['email2'];
$contactform = $_POST['contactform'];
$hidepage = $_POST['hidepage'];
$album_name = $_POST['album_name'];
$quality = $_POST['quality'];
//Some variables for general use
$cont1 = $_POST['cont1'];
$cont2 = $_POST['cont2'];
$cont3 = $_POST['cont3'];
$cont4 = $_POST['cont4'];
$cont5 = $_POST['cont5'];


//---------------
//FUNCTIONS
//---------------

//Function: redirect
//------------
function redirect($direction1,$direction2,$time,$direction3=NULL,$direction4=NULL) {
$direction2 = urlencode($direction2);
if (($direction3) && ($direction4)) {
$direction3 = urlencode($direction3);
$direction4 = urlencode($direction4); 
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"$time; URL=?$direction1=$direction2&amp;$direction3=$direction4\">"; }

else {
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"$time; URL=?$direction1=$direction2\">"; } 
}

//Function: define menudiv
//------------
function showmenudiv($title,$text,$image,$url,$blank) {
echo "<div class=\"menudiv\" style=\"margin: 10px;\">
	<table>
		<tr>
			<td>
				<img src=\"data/image/$image\" border=\"0\" alt=\"\">
			</td>
			<td>
				<span style=\"font-size: 17pt;\"><a href=\"$url\"";
			   if ($blank == "true") {
			   echo " target=\"_blank\""; }				
				echo ">$title</a></span><br>
				$text
			</td>
		</tr>
	</table>
</div>"; }


//Function: read out the albums to show checkboxes
//------------
function read_albumsinpages($dir) {
   $path = opendir($dir);
   while (false !== ($file = readdir($path))) {
       if(($file !== ".") and ($file !== "..")) {
           if(is_file($dir."/".$file))
               $files[]=$file;
           else
               $dirs[]=$file;           
       }
   }
   if($dirs) {
   natcasesort($dirs);
   foreach ($dirs as $dir) {
		//Include Translation data
		include ("data/settings/langpref.php");
		include ("data/inc/lang/en.php");
		include ("data/inc/lang/$langpref");
		//Some variables		
		$editpage = $_GET['editpage'];
		$action = $_GET['action'];
		//Check if we need to include the existing page
		if ($editpage) {
		include("data/content/$editpage");
		}
		
		echo "<input type=\"checkbox\" name=\"insertedalbums[]\" value=\"$dir\"";
		//Check if the checkbox should be checked...
		//...not needed when we are creating a new page...
		if ($action == "newpage") {
		echo ""; }
		//...but is needed when album has previously been included
		elseif ($incalbum[$dir] == "yes") {
		echo "checked"; }
		
		echo "> $lang_albums17 $dir<br>"; }
   }
   closedir($path);
}

//Function: read out the blog categories to show checkboxes
//------------
function read_bloginpages($dir) {
	$path = opendir($dir);
	while (false !== ($file = readdir($path))) {
       if(($file !== ".") and ($file !== "..")) {
           if(is_file($dir."/".$file))
               $files[]=$file;
           else
               $dirs[]=$file;           
       }
   }
   if($dirs) {
   natcasesort($dirs);
   foreach ($dirs as $dir) {
		//Include Translation data
		include ("data/settings/langpref.php");
		include ("data/inc/lang/en.php");
		include ("data/inc/lang/$langpref");
		//Some variables		
		$editpage = $_GET['editpage'];
		$action = $_GET['action'];
		//Check if we need to include the existing page
		if ($editpage) {
		include("data/content/$editpage");
		}
		
		echo "<input type=\"checkbox\" name=\"insertedblogs[]\" value=\"$dir\"";
		//Check if the checkbox should be checked...
		//...not needed when we are creating a new page...
		if ($action == "newpage") {
		echo ""; }
		//...but is needed when blog has previously been included
		elseif ($incblog[$dir] == "yes") {
		echo "checked"; }
		
		echo "> $lang_blog13 $dir<br>"; }
   }
   closedir($path);
}


//Function: read out the pages
//------------
function read_pages($dir) {
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
           include "data/content/$file"; 
            //Include Translation data
				include ("data/settings/langpref.php");
				include ("data/inc/lang/en.php");
				include ("data/inc/lang/$langpref");
echo "<div class=\"menudiv\" style=\"margin: 20px;\">
<table>
	<tr>
		<td>
			<img src=\"data/image/page.png\" border=\"0\" alt=\"\">
		</td>
		<td style=\"width: 350px;\">
			<span style=\"font-size: 17pt;\">$title</span>
		</td>
		<td>
		<a href=\"?editpage=$file\"><img src=\"data/image/edit.png\" border=\"0\" title=\"$lang_page3\"></a>		
		</td>
		<td>
		<a href=\"?editmeta=$file\"><img src=\"data/image/siteinformation.png\" border=\"0\" title=\"$lang_meta1\" alt=\"$lang_meta1\"></a>		
		</td>
		<td>
		<a href=\"?pageup=$file\"><img src=\"data/image/up.png\" border=\"0\" title=\"$lang_updown1\" alt=\"$lang_updown1\"></a>		
		</td>
		<td>
		<a href=\"?pagedown=$file\"><img src=\"data/image/down.png\" border=\"0\" title=\"$lang_updown1\" alt=\"$lang_updown1\"></a>		
		</td>
		<td>
		<a href=\"?deletepage=$file\"><img src=\"data/image/delete.png\" border=\"0\" title=\"$lang_trash1\" alt=\"$lang_trash1\"></a>		
		</td>
	</tr>
</table>
</div>"; }
   }
   closedir($path);
}


//Function: read out the images to let them include in pages
//------------
function read_imagesinpages($dir) {
   $path = opendir($dir);
   while (false !== ($file = readdir($path))) {
       if(($file !== ".") and ($file !== "..") and ($file !== "kop1.php")) {
           if(is_file($dir."/".$file))
               $files[]=$file;
           else
               $dirs[]=$dir."/".$file;           
       }
   }
   if($files) {
       natcasesort($files);
       foreach ($files as $file) {
      //Include Translation data
		include ("data/settings/langpref.php");
		include ("data/inc/lang/en.php");
		include ("data/inc/lang/$langpref");
      echo "<div class=\"menudiv\" style=\"width: 200px; margin: 2px;\">
					<table>
						<tr>
							<td>
								<img src=\"data/image/image_small.png\" border=\"0\" alt=\"\">
							</td>
							<td style=\"font-size: 14px;\">
								<span style=\"font-size: 16px;\"><a href=\"images/$file\" target=\"_blank\"\">$file</a></span><br>
								<a href=\"#\" onclick=\"tinyMCE.execCommand('mceInsertContent',false,'<img src=images/$file alt=>');return false;\">$lang_page7</a>
							</td>
						</tr>
					</table>
				</div>"; }
   }
   closedir($path);
}

//Function: read out the pages to let them be included in pages as link
//------------
function read_pagesinpages($dir) {
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
           include "data/content/$file"; 
            //Include Translation data
				include ("data/settings/langpref.php");
				include ("data/inc/lang/en.php");
				include ("data/inc/lang/$langpref");
				echo "<div class=\"menudiv\" style=\"width: 200px; margin: 2px;\">
							<table>
								<tr>
									<td>
										<img src=\"data/image/page_small.png\" border=\"0\" alt=\"\">
									</td>
									<td style=\"font-size: 14px;\">
										<span style=\"font-size: 16px; color: gray\">$title</span><br>
										<a href=\"#\" onclick=\"tinyMCE.execCommand('mceInsertContent',false,'<a href=index.php?file=$file>$title</a>');return false;\">$lang_page9</a>
									</td>
								</tr>
							</table>
						</div>";  }
   }
   closedir($path);
}


//Function: readout the images
//------------
function read_images($dir) {
   $path = opendir($dir);
   while (false !== ($file = readdir($path))) {
       if(($file !== ".") and ($file !== "..")) {
           if(is_file($dir."/".$file))
               $files[]=$file;
           else
               $dirs[]=$dir."/".$file;           
       }
   }
   if (!$files) {
	//Include Translation data
	include ("data/settings/langpref.php");
	include ("data/inc/lang/en.php");
	include ("data/inc/lang/$langpref");
	echo "<span class=\"kop4\">$lang_albums14</span>"; }
	
   if($files) {
       natcasesort($files);
       foreach ($files as $file) {
       //Include Translation data
		include ("data/settings/langpref.php");
		include ("data/inc/lang/en.php");
		include ("data/inc/lang/$langpref");
				echo "<div class=\"menudiv\" style=\"margin: 15px;\">
							<table>
								<tr>
									<td>
										<img src=\"data/image/image.png\" border=\"0\" alt=\"\">
									</td>
									<td style=\"width: 350px\">
										<span style=\"font-size: 17pt;\">$file</span>
									</td>
									<td>
										<a href=\"images/$file\" target=\"_blank\"\"><img src=\"data/image/view.png\" border=\"0\" alt=\"\"></a>									
									</td>
									<td>
										<a href=\"?deleteimage=$file\"><img src=\"data/image/delete.png\" border=\"0\" title=\"$lang_trash1\" alt=\"$lang_trash1\"></a>		
									</td>
								</tr>
							</table>
						</div>"; }
   }
   closedir($path);
}


//Function: readout albums
//------------
function read_albums($dir) {
   $path = opendir($dir);
   while (false !== ($file = readdir($path))) {
       if(($file !== ".") and ($file !== "..")) {
           if(is_file($dir."/".$file))
               $files[]=$file;
           else
               $dirs[]=$file;           
       }
   }
   if (!$dirs) {
	//Include Translation data
	include ("data/settings/langpref.php");
	include ("data/inc/lang/en.php");
	include ("data/inc/lang/$langpref");
	echo "<span class=\"kop4\">$lang_albums14</span>"; }
	
   if($dirs) {
   natcasesort($dirs);
   foreach ($dirs as $dir) {
		//Include Translation data
		include ("data/settings/langpref.php");
		include ("data/inc/lang/en.php");
		include ("data/inc/lang/$langpref");
		echo "<div class=\"menudiv\" style=\"margin: 20px;\">
			<table>
				<tr>
					<td>
						<img src=\"data/image/albums.png\" border=\"0\" alt=\"\">
					</td>
					<td style=\"width: 350px;\">
						<span style=\"font-size: 17pt;\">$dir</span>
					</td>
					<td>
					<a href=\"?editalbum=$dir\"><img src=\"data/image/edit.png\" border=\"0\" title=\"$lang_albums6\" alt=\"$lang_albums6\"></a>		
					</td>
					<td>
					<a href=\"?deletealbum=$dir\"><img src=\"data/image/delete_from_trash.png\" border=\"0\" title=\"$lang_albums5\" alt=\"$lang_albums5\"></a>		
					</td>
				</tr>
			</table>
			</div>"; }
   }
   closedir($path);
}


//Function: readout album-images
//------------
function read_albumimages($dir) {
   $path = opendir($dir);
   while (false !== ($file = readdir($path))) {
       if(($file !== ".") and ($file !== "..")) {
           if(is_file($dir."/".$file))
               $files[]=$file;
           else
               $dirs[]=$file;           
       }
   }
	if (!$files) {
	//Include Translation data
	include ("data/settings/langpref.php");
	include ("data/inc/lang/en.php");
	include ("data/inc/lang/$langpref");
	echo "<span class=\"kop4\">$lang_albums14</span>"; }

   if($files) {
	natcasesort($files);

   foreach ($files as $file) { 
	//Include Translation data
	include ("data/settings/langpref.php");
	include ("data/inc/lang/en.php");
	include ("data/inc/lang/$langpref");
   list($fdirname, $ext) = explode(".", $file);
				if (($ext == "jpg") || ($ext == "JPG")) {
            $editalbum = $_GET['editalbum'];
            include ("data/albums/$editalbum/$fdirname.php");

				echo "<div class=\"menudiv\" style=\"margin: 10px;\">
							<table>
							<tr>
								<td>
									<a href=\"data/inc/albums_getimage.php?image=$editalbum/$fdirname.jpg\" target=\"_blank\"><img src=\"data/inc/albums_getimage.php?image=$editalbum/thumb/$fdirname.jpg\" title=\"$name\" alt=\"$name\" border=\"0\"></a>
								</td>
								<td style=\"width: 500px;\">
									<span style=\"font-size: 17pt;\">$name</span><br>
									<i>$info</i>
								</td>
								<td>
								<a href=\"?editimagealbum=$fdirname&album=$editalbum\"><img src=\"data/image/edit.png\" border=\"0\" title=\"$lang_albums6\" alt=\"$lang_albums6\"></a>		
								</td>
								<td>
								<a href=\"?imageup=$fdirname&album=$editalbum\"><img src=\"data/image/up.png\" border=\"0\" title=\"$lang_updown5\" alt=\"$lang_updown5\"></a>		
								</td>
								<td>
								<a href=\"?imagedown=$fdirname&album=$editalbum\"><img src=\"data/image/down.png\" border=\"0\" title=\"$lang_updown5\" alt=\"$lang_updown5\"></a>		
								</td>
								<td>
								<a href=\"?deleteimagealbum=$fdirname&album=$editalbum\"><img src=\"data/image/delete_from_trash.png\" border=\"0\" title=\"$lang_kop13\" alt=\"$lang_kop13\"></a>		
								</td>
								</tr>
							</table>
						</div>";
           }
        }
   }
   closedir($path);
}

//Function: readout blog categories
//------------
function read_blog_catg($dir) {
   $path = opendir($dir);
   while (false !== ($file = readdir($path))) {
       if(($file !== ".") and ($file !== "..")) {
           if(is_file($dir."/".$file))
               $files[]=$file;
           else
               $dirs[]=$file;           
       }
   }
   if (!$dirs) {
	//Include Translation data
	include ("data/settings/langpref.php");
	include ("data/inc/lang/en.php");
	include ("data/inc/lang/$langpref");
	echo "<span class=\"kop4\">$lang_albums14</span>"; }
	
   if($dirs) {
   natcasesort($dirs);
   foreach ($dirs as $dir) {
		//Include Translation data
		include ("data/settings/langpref.php");
		include ("data/inc/lang/en.php");
		include ("data/inc/lang/$langpref");
		echo "<div class=\"menudiv\" style=\"margin: 20px;\">
			<table>
				<tr>
					<td>
						<img src=\"data/image/blog.png\" border=\"0\" alt=\"\">
					</td>
					<td style=\"width: 350px;\">
						<span style=\"font-size: 17pt;\">$dir</span>
					</td>
					<td>
					<a href=\"?editblog=$dir\"><img src=\"data/image/edit.png\" border=\"0\" title=\"$lang_blog7\" alt=\"$lang_blog7\"></a>		
					</td>
					<td>
					<a href=\"?deleteblog=$dir\"><img src=\"data/image/delete_from_trash.png\" border=\"0\" title=\"$lang_blog6\" alt=\"$lang_blog6\"></a>		
					</td>
				</tr>
			</table>
			</div>"; }
   }
   closedir($path);
}


//Function: readout blogposts
//------------
function read_blog_posts($dir) {
   $path = opendir($dir);
   while (false !== ($file = readdir($path))) {
       if(($file !== ".") and ($file !== "..")) {
           if(is_file($dir."/".$file))
               $files[]=$file;
           else
               $dirs[]=$file;           
       }
   }
	if (!$files) {
	//Include Translation data
	include ("data/settings/langpref.php");
	include ("data/inc/lang/en.php");
	include ("data/inc/lang/$langpref");
	echo "<span class=\"kop4\">$lang_albums14</span>"; }

   if($files) {
	natcasesort($files);
	$files = array_reverse($files);

   foreach ($files as $file) {
	//Include Translation data
	include("data/settings/langpref.php");
	include("data/inc/lang/en.php");
	include("data/inc/lang/$langpref");
	//Include the post-information
	$editblog = $_GET['editblog'];	
	include("data/blog/$editblog/posts/$file");

echo "<div class=\"menudiv\" style=\"margin: 10px;\">
		<table>
			<tr>
				<td>
				<img src=\"data/image/blog.png\" alt=\"\" border=\"0\">
				</td>
				<td style=\"width: 500px;\">
				<span style=\"font-size: 17pt;\">$title</span>
				</td>
				<td>
				<a href=\"?blog_editpost=$file&cat=$editblog\"><img src=\"data/image/edit.png\" border=\"0\" title=\"$lang_blog11\" alt=\"$lang_blog11\"></a>		
				</td>
				<td>
				<a href=\"?blog_editreactions=$file&cat=$editblog\"><img src=\"data/image/reactions.png\" border=\"0\" title=\"$lang_blog19\" alt=\"$lang_blog19\"></a>		
				</td>
				<td>
				<a href=\"?blog_deletepost=$file&cat=$editblog\"><img src=\"data/image/delete_from_trash.png\" border=\"0\" title=\"$lang_blog12\" alt=\"$lang_blog12\"></a>		
				</td>
				</tr>
				<tr>
				<td></td>
				<td><span style=\"font-size: 12px; font-style: italic;\">$postdate</span></td>				
				</tr>
		</table>
</div>";
        }
   }
   closedir($path);
}

//Function: readout reactions on a blogpost
//------------
function read_blog_reactions($dir) {
   $path = opendir($dir);
   while (false !== ($file = readdir($path))) {
       if(($file !== ".") and ($file !== "..")) {
           if(is_file($dir."/".$file))
               $files[]=$file;
           else
               $dirs[]=$dir."/".$file;    
       }
   }
   
	if (!$files) {
	//Include Translation data
	include ("data/settings/langpref.php");
	include ("data/inc/lang/en.php");
	include ("data/inc/lang/$langpref");
	echo "<span class=\"kop4\">$lang_albums14</span>"; }
	
   if($files) {

   natcasesort($files);
	$files = array_reverse($files);
   
   foreach ($files as $file) {
			  $blog_editreactions = $_GET['blog_editreactions'];
			  $cat = $_GET['cat'];
			  list($reactiondir, $extension) = explode(".", $blog_editreactions);
			  
			  //Include the reaction information
			  include("data/blog/$cat/reactions/$reactiondir/$file");
			  //Change html enters in real ones
			  $message = str_replace("<br />", "\n", $message);
			  
           //Include Translation data
			  include ("data/settings/langpref.php");
			  include ("data/inc/lang/en.php");
			  include ("data/inc/lang/$langpref");
			  
			  echo "<div class=\"menudiv\" style=\"margin: 10px;\">
			  <table>
			  <tr>
			  		<td>
			  			<img src=\"data/image/reactions.png\" alt=\"\" border=\"0\">
			  		</td>
			  		<td style=\"width: 600px;\">
			  			<form method=\"post\" action=\"\">
			  			<b>$lang_install17</b><br>
			  			<input name=\"cont1\" type=\"text\" value=\"$title\"><br><br>
			  			
			  			<textarea name=\"cont2\" rows=\"5\" cols=\"65\">$message</textarea><br><br>
			  			
			  			<input name=\"cont3\" type=\"hidden\" value=\"$name\">
			  			<input name=\"cont4\" type=\"hidden\" value=\"$postdate\">
			  			<input name=\"cont5\" type=\"hidden\" value=\"$file\">
			  			<input type=\"submit\" name=\"Submit\" value=\"$lang_install13\">
			  			</form>
			  		</td>
			  		<td>
			  			<a href=\"?blog_deletereaction=$file&cat=$cat&blogpost=$reactiondir\"><img src=\"data/image/delete_from_trash.png\" border=\"0\" title=\"$lang_blog21\" alt=\"$lang_blog21\"></a>
			  		</td>
			  </tr>
			  </table>
			  </div>";			  
			  }
   }
   closedir($path);
}

//Function: read out the pages in the trashcan
//------------
function read_pages_trashcan($dir) {
   $path = opendir($dir);
   while (false !== ($file = readdir($path))) {
       if(($file !== ".") and ($file !== "..")) {
           if(is_file($dir."/".$file))
               $files[]=$file;
           else
               $dirs[]=$dir."/".$file;    
       }
   }
   if (!$files) {
	//Include Translation data
	include ("data/settings/langpref.php");
	include ("data/inc/lang/en.php");
	include ("data/inc/lang/$langpref");
	echo "<span class=\"kop4\">$lang_albums14</span>"; }
   if($files) {
       natcasesort($files);
       foreach ($files as $file) {
           include "data/trash/pages/$file"; 
            //Include Translation data
				include ("data/settings/langpref.php");
				include ("data/inc/lang/en.php");
				include ("data/inc/lang/$langpref");
echo "<div class=\"menudiv\" style=\"margin: 20px;\">
<table>
	<tr>
		<td>
			<img src=\"data/image/page.png\" border=\"0\" alt=\"\">
		</td>
		<td style=\"width: 350px;\">
			<span style=\"font-size: 17pt;\">$title</span>
		</td>
		<td>
		<a href=\"?trash_viewitem=$file&cat=page\"><img src=\"data/image/view.png\" border=\"0\" alt=\"$lang_trash7\" title=\"$lang_trash7\"></a>		
		</td>
		<td>
		<a href=\"?trash_restoreitem=$file&cat=page\"><img src=\"data/image/restore.png\" border=\"0\" title=\"$lang_trash10\" alt=\"$lang_trash10\"></a>		
		</td>
		<td>
		<a href=\"?trash_deleteitem=$file&cat=page\"><img src=\"data/image/delete_from_trash.png\" border=\"0\" title=\"$lang_trash8\" alt=\"$lang_trash8\"></a>		
		</td>
	</tr>
</table>
</div>"; }
   }
   closedir($path);
}

//Function: read out the images in the trashcan
//------------
function read_images_trashcan($dir) {
   $path = opendir($dir);
   while (false !== ($file = readdir($path))) {
       if(($file !== ".") and ($file !== "..")) {
           if(is_file($dir."/".$file))
               $files[]=$file;
           else
               $dirs[]=$dir."/".$file;    
       }
   }
   if (!$files) {
	//Include Translation data
	include ("data/settings/langpref.php");
	include ("data/inc/lang/en.php");
	include ("data/inc/lang/$langpref");
	echo "<span class=\"kop4\">$lang_albums14</span>"; }
   if($files) {
       natcasesort($files);
       foreach ($files as $file) {
            //Include Translation data
				include ("data/settings/langpref.php");
				include ("data/inc/lang/en.php");
				include ("data/inc/lang/$langpref");
echo "<div class=\"menudiv\" style=\"margin: 20px;\">
<table>
	<tr>
		<td>
			<img src=\"data/image/image.png\" border=\"0\" alt=\"\">
		</td>
		<td style=\"width: 350px;\">
			<span style=\"font-size: 17pt;\">$file</span>
		</td>
		<td>
		<a href=\"data/trash/images/$file\" target=\"_blank\"><img src=\"data/image/view.png\" border=\"0\" alt=\"$lang_trash7\" title=\"$lang_trash7\"></a>		
		</td>
		<td>
		<a href=\"?trash_restoreitem=$file&cat=image\"><img src=\"data/image/restore.png\" border=\"0\" title=\"$lang_trash10\" alt=\"$lang_trash10\"></a>		
		</td>
		<td>
		<a href=\"?trash_deleteitem=$file&cat=image\"><img src=\"data/image/delete_from_trash.png\" border=\"0\" title=\"$lang_trash8\" alt=\"$lang_trash8\"></a>		
		</td>
	</tr>
</table>
</div>"; }
   }
   closedir($path);
}
?>