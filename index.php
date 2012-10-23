<?php

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
	$tools->$method($_GET['id']);
	die();
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
	<title>Single page template</title> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
	<style>
		div {
			word-wrap: break-word;
			vertical-align: middle;
		}
	</style>
</head> 

<body> 

<div data-role="page">

	<div data-role="header">
		<h1>PHP Light Manager</h1>
	</div><!-- /header -->

	<div data-role="content">	
<?php
for($i = 1;$i<(count($lights));$i++)
{
	echo '
		<div style="width:98%;height:40px;" id="' . $lights[$i][0] . '">
			<div style="width:70%;float:left;height:40px;line-height:40px;">' . $lights[$i][1] . '</div>
			<div style="width:30%;float:left;height:40px">
				<input type="checkbox" data-mini="true" id="check' . $lights[$i][0] . '"';
	if($lights[$i][2] == 'ON'){
		echo ' checked="checked"';
	}
	
	echo ' /><label for="check' . $lights[$i][0] . '">&nbsp;</label>';
	//DEBUG:echo $lights[$i][2];
	echo ' 
			</div>
		</div>
	';
}?>

	</div><!-- /content -->
	
	<div data-role="footer">
		<h4>Footer content</h4>
	</div><!-- /footer -->
	
</div><!-- /page -->

</body>
</html>
