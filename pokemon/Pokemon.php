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

	// $pickachu->attack($charmeleon, $pikachu->attack[1]);

	public function attack($target, $attack) {
		echo $target->name."'s remaining health: ".$target->health."<br>";

		echo 'Pokemon '.$this->name.' doet '.$attack->name.' en levert '.$attack->damage.' damage aan '.$target->name.'<br>';

		$target->health = $target->health - $attack->damage;

		echo $target->name."'s remaining health: ".$target->health."<br><br><br>";
    }

    // echo "pokemon pikachu doet pika punch en levert 50 damage aan charmelon";
}

?>