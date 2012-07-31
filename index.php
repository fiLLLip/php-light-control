<?php

//////////////////////////////////////////
// PHP/Tellstick light controller		//
// Developed for Windows				//
// License:(CC BY-SA 3.0)				//
// Author: Filip Andre Larsen Tomren    //
//////////////////////////////////////////

require './autoload.php';

$tools = new Tool;

$lights = $tools->listLights();
?>

<!DOCTYPE html> 
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Single page template</title> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.js"></script>
	<style>
		div { word-wrap: break-word; }
	</style>
</head> 

<body> 

<div data-role="page">

	<div data-role="header">
		<h1>PHP Light Manager</h1>
	</div><!-- /header -->

	<div data-role="content">	
<?php
for($i = 1;$i<(count($lights)-1);$i++)
{
	echo '
		<div style="width:98%;height:40px;" id="' . $lights[$i][0] . '">
			<div style="width:80%;float:left;">' . $lights[$i][1] . '</div>
			<div style="width:20%;float:left;">
			<select name="flip-' . $lights[$i][0] . '" id="flip-' . $lights[$i][0] . '" data-role="slider" data-mini="true">
				<option value="off">Off</option>
				<option value="on">On</option>
			</select>';
	if($lights[$i][2] == 'OFF'){
		echo '';
	}			
	elseif($lights[$i][2] == 'ON'){
		echo '
		<script type="text/javascript">
			$(\'#flip-' . $lights[$i][0] . '\').val(\'on\').slider(\'refresh\');
			$(\'#flip-' . $lights[$i][0] . '\').slider(\'disable\');
		</script>';
	}
	//DEBUG:echo $lights[$i][2];
	echo ' </div>
		</div>';
}?>
	</div><!-- /content -->
	
	<div data-role="footer">
		<h4>Footer content</h4>
	</div><!-- /footer -->
	
</div><!-- /page -->

</body>
</html>
