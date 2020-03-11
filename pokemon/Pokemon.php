<?php 

/**
 * 
 */
class Pokemon
{

	public $name;
	public $energyType;
	public $hitpoints;
	public $health;
	public $attacks;
	public $weakness;
	public $resistance;
	
	
	public function __construct($pokemonName, $energyTypeObject, $hitPoints, $attackArray, $weaknessObject, $resistanceObject) {
		$this->name = $pokemonName;
		$this->energyType = $energyTypeObject;
		$this->hitpoints = $hitPoints;
		$this->health = $this->hitpoints;
		$this->attacks = $attackArray;
		$this->weakness = $weaknessObject;
		$this->resistance = $resistanceObject;
	}

	public function __toString() {
		return json_encode($this);
	}
}

?>