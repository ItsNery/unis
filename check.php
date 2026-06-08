<?php
$files = glob(__DIR__ . '/resources/views/partials/welcome/*.blade.php');
$files[] = __DIR__ . '/resources/views/welcome.blade.php';

foreach ($files as $file) {
    $content = file_get_contents($file);
    preg_match_all('/@if\b/', $content, $if_matches);
    preg_match_all('/@endif\b/', $content, $endif_matches);
    
    $if = count($if_matches[0]);
    $endif = count($endif_matches[0]);
    
    if ($if !== $endif) {
        echo basename($file) . ": if=$if endif=$endif\n";
    }
}
