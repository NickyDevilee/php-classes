<?php 

/**
 * 
 */
class Resistance
{

	public $energyType;
	public $value;
	
	
	public function __construct($energy, $reseistanceValue) {
		$this->energyType = $energy;
		$this->value = $reseistanceValue;
	}
}

?>