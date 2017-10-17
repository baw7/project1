<?php
ini_set('auto_detect_line_endings',TRUE);
$handle = fopen('/path/to/file','r');
while ( ($data = fgetcsv($handle) ) !== FALSE ) {
//process
}
ini_set('auto_detect_line_endings',FALSE);
?>
