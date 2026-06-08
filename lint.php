<?php
$files = glob(__DIR__ . '/storage/framework/views/*.php');
foreach ($files as $file) {
    exec('php -l ' . escapeshellarg($file) . ' 2>&1', $output, $return_var);
    if ($return_var !== 0) {
        echo "Error in: $file\n";
        echo implode("\n", $output) . "\n\n";
    }
}
