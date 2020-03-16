<?php 

/**
 * 
 */
class Resistance
{

	public $energyType;
	public $value;
	
	
	public function __construct($energyObj, $resistanceValue) {
		$this->energyType = $energyObj;
		$this->value = $resistanceValue;
	}
}

?>