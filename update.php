<?php
//Global variables
$step = $_GET['step'];

echo "<h3>Pluck update</h3>";

if($step == "") {

echo "<p>Welcome to the pluck upgrading script. This script will help you upgrade your pluck to the newest version,
<b>4.5</b>.</p>

<p>This step will perform some checks that will verify that you uploaded the new files alright.</p>";

echo "<p>We checked your installation, and ";
if (file_exists("data/title.dat")) {
echo "it appears that your files are all intact and your system is ready to be upgraded. Please note that
the upgrade will only work with version 4.3 or newer.</p><a href=\"?step=2\"><b>Proceed...</b></a>"; }
elseif (!file_exists("data/title.dat")) {
echo "it appears some files are missing. You can try to perform the upgrade, but probably you will lose (some) data.
Please also note that the upgrade will only work with version 4.3 or newer.</p><a href=\"?step=2\"><b>Proceed...</b></a>"; }

}

if($step == "2") {
//First define the function
//---------------------------
function check_writable($file) {
//Include Translation data
include ("data/inc/lang/langpref.php");
include ("data/inc/lang/en.php");
include ("data/inc/lang/$langpref");
if (is_writable($file)) {
	echo "<tr><td>/$file &nbsp;"; 
	echo "<td><img src=\"data/image/true.gif\" width=\"15\" height=\"15\" alt=\"true\"></td></tr>";
	}
	else {
	echo "<tr><td>/$file &nbsp;"; 
	echo "<td><img src=\"data/image/false.gif\" width=\"15\" height=\"15\" alt=\"false\"></td></tr>"; 
	}
}

echo "<p>Now, make sure all following files are writable. Refresh the page if you want to update the status.
Proceed if all files have the right permissions.</p><table>";

check_writable("images");
check_writable("data/albums");
check_writable("data/blog");
check_writable("data/content");
check_writable("data/settings");
check_writable("data/stats");
check_writable("data/trash");
check_writable("data/inc/themes");
check_writable("data/inc/themes/default");
check_writable("data/inc/themes/green");
check_writable("data/inc/themes/oldstyle");
check_writable("data/settings/install.dat");
check_writable("data/settings/langpref.php");
check_writable("data/settings/themepref.php");

echo "</table><a href=\"?step=3\"><b>Proceed...</b></a>";
include ("data/inc/footer.php");
}

elseif($step == "3") {

echo "Rearranging files for compatibility with pluck 4.5...<br>";

copy("data/title.dat", "data/settings/title.dat");

unlink("data/settings/install.dat");
copy("data/install.dat", "data/settings/install.dat");

copy("data/options.php", "data/settings/options.php");

copy("data/pass.php", "data/settings/pass.php");

unlink("data/settings/langpref.php");
copy("data/inc/lang/langpref.php", "data/settings/langpref.php");

unlink("data/settings/themepref.php");
copy("data/inc/themes/themepref.php", "data/settings/themepref.php");

mkdir ("data/trash/pages", 0777);
mkdir ("data/trash/images", 0777);
chmod ("data/trash/pages", 0777);
chmod ("data/trash/images", 0777);
mkdir ("data/settings/modules", 0777);
chmod ("data/settings/modules", 0777);
unlink ("images/delete_me");
unlink ("data/content/delete_me");
unlink ("data/albums/delete_me");
unlink ("data/blog/delete_me");
unlink ("data/trash/delete_me");

echo "Done! Don't forget to <b>delete this file (update.php)</b>. Then, you can <a href=\"login.php\">login</a>.";
}
?>