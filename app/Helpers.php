<?php
function formatFileSize($size, $precision = 2)
{
    // Ensure $size is numeric and greater than 0
    if (!is_numeric($size) || $size <= 0) {
        return 'Invalid Size';
    }

    $base = log($size, 1024);
    $suffixes = array('B', 'KB', 'MB', 'GB', 'TB');

    return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
}
