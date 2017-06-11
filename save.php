<?php
	$coords = $_POST['coords']; 
	$file = 'test.js';
	// Write the contents back to the file
	//$string=implode(',',$coords);
	file_put_contents($file,"coords=");
	file_put_contents($file, $coords, FILE_APPEND | LOCK_EX);
	//file_put_contents($file, json_encode($coords));
?>
