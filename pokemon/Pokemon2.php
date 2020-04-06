<?php 

/**
 * 
 */
class Pokemon2 extends Pokemon
{
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
				$target->health = 0;
				echo $target->name." is dood.<br>";
			} else {
				echo $target->name."'s remaining health: ".$target->health."<br><br><br>";
			}
		}
	}
}

 ?>