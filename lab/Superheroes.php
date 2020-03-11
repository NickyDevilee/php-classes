<?php 

class Superhero
{
	
	public $name;
	public $gender;
	public $team;
	public $oneliner;

	
	public function __construct($name, $gender, $team, $oneliner) {
		$this->name = $name;
		$this->gender = $gender;
		$this->team = $team;
		$this->oneliner = $oneliner;
	}

	public function __toString() {
		return json_encode($this);
	}

	public function sayOneliner() {
		echo $this->oneliner;
	}
}

class Avenger extends Superhero {

	public $team = 'Avengers';


	public function __construct($name, $gender, $oneliner) {
		parent::__construct($name, $gender, $this->team, $oneliner);
	}
}
?>