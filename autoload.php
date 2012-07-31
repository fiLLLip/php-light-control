<?php

//////////////////////////////////////////
// PHP/Tellstick light controller		//
// Developed for Windows				//
// License:(CC BY-SA 3.0)				//
// Author: Filip Andre Larsen Tomren    //
//////////////////////////////////////////

function __autoload($class_name) 
{
	$filename = './classes/' . $class_name . '.php';
	try{
		include $filename;
	} catch (Exception $e) {
		echo 'Unable to load ' . $class_name . '. Error: ' . $e->getMessage() . '<br />';
	}
}

?>