<?php 

/**
 * 
 */
class Attack
{

	private $name;
	private $damage;
	
	
	public function __construct($attackName, $damageNumber) {
		$this->name = $attackName;
		$this->damage = $damageNumber;
	}

	public function getName() {
		return $this->name;
	}

	public function getDamage() {
		return $this->damage;
	}
}

?>