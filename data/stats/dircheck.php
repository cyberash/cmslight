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

function dir_exists($dir_name = false, $path = './') {
    if(!$dir_name) return false;
   
    if(is_dir($path.$dir_name)) return true;
   
    $tree = glob($path.'*', GLOB_ONLYDIR);
    if($tree && count($tree)>0) {
        foreach($tree as $dir)
            if(dir_exists($dir_name, $dir.'/'))
                return true;
    }
   
    return false;
}
?>