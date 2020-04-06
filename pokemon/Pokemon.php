<?php 
/**
 * abstract gemaakt omdat de class niet meer gebruikt word.
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

	// functie kan private omdat deze alleen binnen de class gebruikt word en niet erbbuiten.
	// setter gemaakt
	private function setName($pokemonName) {
		$this->name = $pokemonName;
		return $this->name;
	}

	// getter gemaakt
	public function getName() {
		return $this->name;
	}

	public function __toString() {
		return json_encode($this);
	}

	public function getPopulation() {
		echo "joejoe";
	}

	// static function aangemaakt, deze kan aangeroepen worden zonder dat er een object van deze class bestaat.
	static function Hello() {
		return "Hello allemaal";
	}
}

?>