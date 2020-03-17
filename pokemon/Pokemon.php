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

	public function attack($target, $attack) {

		$totaldamage = '';

		if ($target->weakness->energyType->name == $this->energyType->name) {
			$totaldamage = $attack->damage * $target->weakness->multiplier;
		} else {
			$totaldamage = $attack->damage;
			if ($target->resistance->energyType->name == $this->energyType->name) {
				$totaldamage = $attack->damage - $target->resistance->value;
			}
		}

		echo $target->name."'s remaining health: ".$target->health."<br>";

		echo 'Pokemon '.$this->name.' doet '.$attack->name.' en levert '.$totaldamage.' damage aan '.$target->name.'<br>';

		$target->health = $target->health - $totaldamage;

		echo $target->name."'s remaining health: ".$target->health."<br><br><br>";
	}

	public function getPopulation() {
		echo "joejoe";
	}
}

?>