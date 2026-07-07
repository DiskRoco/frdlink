<?php

$path = "./frdbase/";

function getallfrds() {
    global $path;
    $response = [];
    if ($dh = opendir($path)) {
        while (($file = readdir($dh)) !== false) {
            if ($file != '.' && $file != '..' && $file != 'favicon') {
                $rawinfo = file_get_contents($path.$file);
                $rawinfo = json_decode($rawinfo, true);
                $response[] = $rawinfo;
            } 
        }
        closedir($dh);
    }
    
    return $response;
}

