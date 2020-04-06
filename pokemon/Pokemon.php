<?php 
/**
 * 
 */
abstract class Pokemon
{

	public $db_id;
	public $name;
	public $energyType;
	public $hitpoints;
	public $health;
	public $attacks;
	public $weakness;
	public $resistance;
	
	
	public function __construct($id, $pokemonName, $energyTypeObject, $hitPoints, $attackArray, $weaknessObject, $resistanceObject) {
		$this->db_id = $id;
		$this->name = $this->setName($pokemonName);
		$this->energyType = $energyTypeObject;
		$this->hitpoints = $hitPoints;
		$this->health = $this->hitpoints;
		$this->attacks = $attackArray;
		$this->weakness = $weaknessObject;
		$this->resistance = $resistanceObject;
	}

	private function setName($pokemonName) {
		$this->name = $pokemonName;
		return $this->name;
	}

	public function getName() {
		return $this->name;
	}

	public function __toString() {
		return json_encode($this);
	}

	public function getPopulation() {
		echo "joejoe";
	}

	static function Hello() {
		return "Hello allemaal";
	}
}

?>