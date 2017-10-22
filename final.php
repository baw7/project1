<?php

$file = 'http://web.njit.edu/~baw7/project1/index.php?page=table&filename=yourfilename';
$data = csv_to_array($file,array('header_row'=>true));
echo '<pre>'.print_r($data,true).'</pre>';

?>

