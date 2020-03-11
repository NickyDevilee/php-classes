<?php 

/**
 * 
 */
class Weakness
{

	public $energyType;
	public $multiplier;
	
	
	public function __construct($energy, $multiplierNumber) {
		$this->energyType = $energy;
		$this->multiplier = $multiplierNumber;
	}
}

?>