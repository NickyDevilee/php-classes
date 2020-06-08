<?php 

/**
 * 
 */
class Energytype
{

	private $name;
	
	
	public function __construct($energyTypeName) {
		$this->name = $energyTypeName;
	}

	public function getName() {
		return $this->name;
	}
}

?>