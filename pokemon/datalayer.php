<?php 

function openDatabaseConnection() {
	$servername = "localhost";
	$username = "root";
	$password = "mysql";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=pokemons", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	}
	catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}

function getAllLists() {
	$conn = openDatabaseConnection();
	$query = $conn->prepare("SELECT * FROM `lists`");

	if ($query->execute()) {
		$result = $query->fetchAll();
		$conn = null;
		return $result;
	} else {
		$message = "Oeps! Er is iets fout gegaan, probeer het opnieuw.";
		echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
	}
}

function getItemsFromListID($listID) {
	$conn = openDatabaseConnection();
	$query = $conn->prepare("SELECT * FROM `todo-items` WHERE `list` = :listID");

	if ($query->execute()) {
		$result = $query->fetchAll();
		$conn = null;
		return $result;
	} else {
		$message = "Oeps! Er is iets fout gegaan, probeer het opnieuw.";
		echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
	}
}

function insert_pokemon($data) {
	$conn = openDatabaseConnection();
	$query = $conn->prepare("INSERT INTO `pokemons` (name, energyType, health, attack1, attack1_damage, attack2, attack2_damage, weakness, weakness_multiplier, resistance, resistance_value) VALUES ('".implode("','", $data)."')");
	
	if ($query->execute()) {
		$message = "Pokemon ".$data['name']." succesvol toegevoegd!";
		echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
		$conn = null;
	} else {
		$message = "Oeps! Er is iets fout gegaan, probeer het opnieuw.";
		echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
	}
}

function createAllPokemons() {
	$conn = openDatabaseConnection();
	$query = $conn->prepare("SELECT * FROM `pokemons`");

	if ($query->execute()) {
		$result = $query->fetchAll();
		$conn = null;
		$pokedex = [];
		
		if (!empty($result)) {
			foreach ($result as $pokemon) {

				$pokedex[''.strtolower($pokemon['name']).''] = new Pokemon(
					$pokemon['id'],
					''.$pokemon['name'].'', 
					new EnergyType("".$pokemon['energyType'].""), 
					$pokemon['health'], 
					[''.$pokemon['attack1'].'' => new Attack(''.$pokemon['attack1'].'', $pokemon['attack1_damage']), ''.$pokemon['attack2'].'' => new Attack(''.$pokemon['attack2'].'', $pokemon['attack2_damage'])], 
					new Weakness(new EnergyType("".$pokemon['weakness'].""), $pokemon['weakness_multiplier']), 
					new Resistance(new EnergyType("".$pokemon['resistance'].""), $pokemon['resistance_value'])
				);

			}
			return $pokedex;
		}

	} else {
		$message = "Oeps! Er is iets fout gegaan, probeer het opnieuw.";
		echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
	}
}

// id
// name
// energyType
// health
// attack1
// attack1_damage
// attack2
// attack2_damage
// weakness
// weakness_multiplier
// resistance
// resistance_value

 ?>

