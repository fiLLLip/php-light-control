<?php

//////////////////////////////////////////
// PHP/Tellstick light controller		//
// Developed for Windows				//
// License:(CC BY-SA 3.0)				//
// Author: Filip Andre Larsen Tomren    //
//////////////////////////////////////////

class Tool {
	
	protected $tdtool_path = '"%ProgramFiles(x86)%\Telldus\tdtool.exe"';
	protected $allLights = '';
	
	function __construct()
	{
		exec($this->tdtool_path . ' --list', $arr);
		foreach ($arr as $key => $value){
			// Split into ID, name, status on tab
			$arr[$key] = preg_split("[\t]", $value);
		}
		$this->allLights = $arr;
	}
	
	public function listLights() 
	{
		// Return the allLights array created in construct
		// with other values
		$returnLights[] = array();
		
		// String used to describe dimming:
		$dimmedString = 'DIMMED:';
		
		// $i = 1;$i<(count($this->allLights)-1);$i++
		// First and last line of array is crap, hence the = 1 in init and - 1 after count
		for($i = 1;$i<(count($this->allLights)-1);$i++)
		{
			$lightValue = $this->allLights[$i][2];
			if(strpos($lightValue, $dimmedString) !== false){
				// Divide by 2.55 due to dim range from 1-255 but percent is 1-100.
				$lightValue = round(str_replace($dimmedString, '', $lightValue) / 2.55) . '%';
			}
			array_push($returnLights, array($this->allLights[$i][0], $this->allLights[$i][1], $lightValue));
		}
		return $returnLights;
	}
	
	public function turnOff($lightID)
	{
		exec($this->tdtool_path . ' --off ' . $lightID, $arr);
		if(strripos($arr[0], 'Success') !== false)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function turnOn($lightID)
	{
		exec($this->tdtool_path . ' --on ' . $lightID, $arr);
		if(strripos($arr[0], 'Success') !== false)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>