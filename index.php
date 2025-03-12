<?php
$assetsDir = 'assets/';
$files = [];
if (is_dir($assetsDir)) {
    if ($dh = opendir($assetsDir)) {
        while (($file = readdir($dh)) !== false) {
            // Skip hidden files and directories
            if ($file != "." && $file != ".." && !is_dir($assetsDir . $file)) {
                $files[] = $file;
            }
        }
        closedir($dh);
    }
}
if (!empty($files)) {
    $randomFile = $files[array_rand($files)];
    $ext = strtolower(pathinfo($randomFile, PATHINFO_EXTENSION));
    
    if (in_array($ext, ['mp4', 'webm', 'ogg'])) {
        echo '<video width="640" controls autoplay>';
        echo '<source src="' . $assetsDir . $randomFile . '" type="video/' . $ext . '">';
        echo 'Your browser does not support the video tag.';
        echo '</video>';
    } else {
        echo '<img src="' . $assetsDir . $randomFile . '" alt="Random Asset" width="640">';
    }
} else {
    echo 'No assets found.';
}
?>
