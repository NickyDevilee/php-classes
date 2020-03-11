<?php 

/**
 * 
 */
class Attack
{

	public $name;
	public $damage;
	
	
	public function __construct($attackName, $damageNumber) {
		$this->name = $attackName;
		$this->damage = $damageNumber;
	}
}

?>