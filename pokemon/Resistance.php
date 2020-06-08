<?php 

/**
 * 
 */
class Resistance
{

	private $energyType;
	private $value;
	
	
	public function __construct($energyObj, $resistanceValue) {
		$this->energyType = $energyObj;
		$this->value = $resistanceValue;
	}

	public function getEnergyType() {
		return $this->energyType;
	}

	public function getValue() {
		return $this->value;
	}
}

?>