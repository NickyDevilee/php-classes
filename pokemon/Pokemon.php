<?php
/**
 * abstract gemaakt omdat de class niet meer gebruikt word.
 */
abstract class Pokemon
{

	private $db_id;
	private $name;
	public $energyType;
	public $hitpoints;
	public $health;
	public $attacks;
	public $weakness;
	public $resistance;
	private static $population = array();

	public function __construct($id, $pokemonName, $energyTypeObject, $hitPoints, $attackArray, $weaknessObject, $resistanceObject) {
		$this->db_id = $this->setDb_id($id);
		$this->name = $this->setName($pokemonName);
		$this->energyType = $energyTypeObject;
		$this->hitpoints = $hitPoints;
		$this->health = $this->hitpoints;
		$this->attacks = $attackArray;
		$this->weakness = $weaknessObject;
		$this->resistance = $resistanceObject;
		self::$population[$id] = 1;
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

	private function setDb_id($id) {
		$this->db_id = $id;
		return $this->db_id;
	}

	public function getDb_id() {
		return $this->db_id;
	}

	public function attack($target, $attack) {

		if ($target->health <= 0) {
			$target->health = 0;
			echo "<br>";
			echo $target->name."'s remaining health: ".$target->health.", use revive.<br>";
		} else {
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

			if ($target->health <= 0) {
				$target->die();
				echo $target->name." is dood.<br>";
			} else {
				echo $target->name."'s remaining health: ".$target->health."<br><br><br>";
			}
		}
	}

	public function __toString() {
		return json_encode($this);
	}

	public function die() {
		$this->health = 0;
		unset(self::$population[$this->db_id]);
	}

	public function getPopulation() {
		return count(self::$population);
	}

	// static function aangemaakt, deze kan aangeroepen worden zonder dat er een object van deze class bestaat.
	static function Hello() {
		return "Hello allemaal";
	}
}

?>