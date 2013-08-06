<?php

/**
 * PHP Light Control
 *
 * Controls Tellstick lighting with a smooth and familiar interface.
 *
 * Uses jQuery Mobile for design and user interface
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

//////////////////////////////////////////
// PHP/Tellstick light controller		//
// Developed for Windows/Linux			//
// License:(CC BY-SA 3.0)				//
// Author: Filip Andre Larsen Tomren    //
//////////////////////////////////////////

require './autoload.php';

$tools = new Tool;

$lights = $tools->listLights();

if (isset($_GET['tool']) && isset($_GET['id']) && isset($_GET['method'])) {
	$method = $_GET['method'];
	die($tools->$method($_GET['id']));
}
?>

<!DOCTYPE html> 
<html>

<head>
	<meta charset="utf-8"><meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-touch-fullscreen" content="yes" />
	<title>PHP Light Manager</title>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
    <link type="text/css" href="css/jquery.mobile.toast.css" rel="stylesheet" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.mobile.toast.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
    <style>
        .lighton{
            background-color: #fffca3;
        }
    </style>
</head> 

<body> 

<div data-role="page">

	<div data-role="header" data-position="fixed">
		<h1>PHP Light Manager</h1>
	</div><!-- /header -->

	<div data-role="content">
        <ul data-role="listview">
            <?php
                for($i = 1;$i<(count($lights));$i++)
                {
                    echo'<li><a id="';
                    echo $lights[$i][0];
                    echo '" class="light';
                    if($lights[$i][2] == 'ON'){
                        echo ' lighton';
                    }
                    echo '" href="#">';
                    echo $lights[$i][1];
                    echo '</a></li>';
                }
            ?>
        </ul>
	</div><!-- /content -->
	
	<div data-role="footer" data-position="fixed">
		<h4>A brennheIT Production</h4>
	</div><!-- /footer -->
    <div id="toast" data-role="toast">content</div>
	
</div><!-- /page -->

</body>
</html>
