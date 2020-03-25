<?php
function scan_dir($dir) {
    $ignored = array('.', '..', '.svn', '.htaccess');
    $files = array();    
    foreach (scandir($dir) as $file) {
        if (in_array($file, $ignored)) continue;
        $files[$file] = filemtime($dir . '/' . $file);
    }

    arsort($files);
    $files = array_keys($files);

    return ($files) ? $files : false;
}

echo '<pre>'.print_r(scan_dir('/var/www/html/cache/'),true).'</pre>';
