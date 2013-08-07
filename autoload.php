<?php

/**
 * PHP Light Control
 *
 * Controls Tellstick lighting with a smooth and familiar interface.
 *
 * This file contains a common autoloader script for PHP.
 *
 * Copyright 2013 fiLLLip
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

function __autoload($class_name) 
{
	$filename = './classes/' . strtolower($class_name) . '.php';
	try{
		include $filename;
	} catch (Exception $e) {
		echo 'Unable to load ' . $class_name . '. Error: ' . $e->getMessage() . '<br />';
	}
}

?>