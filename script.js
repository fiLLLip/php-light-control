//////////////////////////////////////////
// PHP/Tellstick light controller		//
// Developed for Windows/Linux			//
// License:(CC BY-SA 3.0)				//
// Author: Filip Andre Larsen Tomren    //
//////////////////////////////////////////

$(document).ready(function() {
	$("input[type='checkbox']").bind( "change", function(event, ui) {
		if ($(this).attr('checked') == 'checked') {
			$(this).load('index.php?tool&method=turnOn&id=' + $(this).attr('id').replace('check', ''));
			// alert('on'); //Debug only
		}
		else {
			$(this).load('index.php?tool&method=turnOff&id=' + $(this).attr('id').replace('check', ''));
			// alert('off'); //Debug only
		}
	});
});