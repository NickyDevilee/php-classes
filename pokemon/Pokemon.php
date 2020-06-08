<?php

class Pokemon
{
	public function __toString() {
		return json_encode($this);
	}

	private $db_id;
	private $name;
	private $energyType;
	private $hitpoints;
	private $health;
	private $attacks;
	private $weakness;
	private $resistance;
	// private static $population = array();

	public function __construct($id, $pokemonName, $energyTypeObject, $hitPoints, $attackArray, $weaknessObject, $resistanceObject) {
		$this->db_id = $id;
		$this->name = $pokemonName;
		$this->energyType = $energyTypeObject;
		$this->hitpoints = $hitPoints;
		$this->health = $this->hitpoints;
		$this->attacks = $attackArray;
		$this->weakness = $weaknessObject;
		$this->resistance = $resistanceObject;
		// self::$population[$id] = 1;
	}

	public function getDb_id() {
		return $this->db_id;
	}

	public function getName() {
		return $this->name;
	}

	public function getEnergyType() {
		return $this->energyType;
	}

	public function getHitpoints() {
		return $this->hitpoints;
	}

	public function getHealth() {
		return $this->health;
	}

	public function setHealth($value) {
		$this->health = $value;
	}

	public function getAttacks(){
        return $this->attacks;
    }

	public function getAttack($i){
        return $this->attacks[$i];
    }

	public function getWeakness() {
		return $this->weakness;
	}

	public function getResistance() {
		return $this->resistance;
	}

	public function attack($target, $attack) {
		$msg = '';

		if ($target->getHealth() <= 0) {
			$target->setHealth(0);
			$msg .= "<br>";
			$msg .= $target->getName()."'s remaining health: ".$target->getHealth().", use revive.<br>";
		} else {
			$totaldamage = '';

			if ($target->getWeakness()->getEnergyType()->getName() == $this->energyType->getName()) {
				$totaldamage = $attack->getDamage() * $target->getWeakness()->getMultiplier();
			} else {
				$totaldamage = $attack->getDamage();
				if ($target->getResistance()->getEnergyType()->getName() == $this->energyType->getName()) {
					$totaldamage = $attack->getDamage() - $target->getResistance()->getValue();
				}
			}

			$msg .= $target->getName()."'s remaining health: ".$target->getHealth()."<br>";

			$msg .= 'Pokemon '.$this->name.' doet '.$attack->getName().' en levert '.$totaldamage.' damage aan '.$target->getName().'<br>';

			$target->setHealth($target->getHealth() - $totaldamage);

			if ($target->getHealth() <= 0) {
				$msg .= $target->getName()." is dood.<br>";
			} else {
				$msg .= $target->getName()."'s remaining health: ".$target->getHealth()."<br><br><br>";
			}
		}

		return $msg;
	}

	// public function die() {
	// 	$this->health = 0;
	// 	unset(self::$population[$this->db_id]);
	// }

	// public function getPopulation() {
	// 	return count(self::$population);
	// }

	// static function aangemaakt, deze kan aangeroepen worden zonder dat er een object van deze class bestaat.
	static function Hello() {
		return "Hello allemaal";
	}
}

?>