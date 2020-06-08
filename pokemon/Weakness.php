<?php 

/**
 * 
 */
class Weakness
{

	private $energyType;
	private $multiplier;
	
	
	public function __construct($energy, $multiplierNumber) {
		$this->energyType = $energy;
		$this->multiplier = $multiplierNumber;
	}

	public function getEnergyType() {
		return $this->energyType;
	}

	public function getMultiplier() {
		return $this->multiplier;
	}
}

?>