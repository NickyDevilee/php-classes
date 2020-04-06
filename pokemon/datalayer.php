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

// alle pokemons worden direct vanuit de db aangemaakt
function createAllPokemons() {
	$conn = openDatabaseConnection();
	$query = $conn->prepare("SELECT * FROM `pokemons`");

	if ($query->execute()) {
		$result = $query->fetchAll();
		$conn = null;
		$pokedex = [];
		
		if (!empty($result)) {
			foreach ($result as $pokemon) {

				$pokedex[''.strtolower($pokemon['name']).''] = new Pokemon2(
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

function getPokemonFromID($id) {
	$conn = openDatabaseConnection();
	$query = $conn->prepare("SELECT * FROM `pokemons` WHERE `id` = :id");

	if ($query->execute([':id' => $id])) {
		$result = $query->fetch();
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

function updatePokemon($data) {
	$conn = openDatabaseConnection();
	$query = $conn->prepare("UPDATE `pokemons` SET name = :name, energyType = :energyType, health = :health, attack1 = :attack1, attack1_damage = :attack1_damage, attack2 = :attack2, attack2_damage = :attack2_damage, weakness = :weakness, weakness_multiplier = :weakness_multiplier, resistance = :resistance, resistance_value = :resistance_value WHERE id = :id");

	if ($query->execute([':name' => $data['name'], ':energyType' => $data['energyType'], ':health' => $data['health'], ':attack1' => $data['attack1'], ':attack1_damage' => $data['attack1_damage'], ':attack2' => $data['attack2'], ':attack2_damage' => $data['attack2_damage'], ':weakness' => $data['weakness'], ':weakness_multiplier' => $data['weakness_multiplier'], ':resistance' => $data['resistance'], ':resistance_value' => $data['resistance_value'], ':id' => $data['id']])) {
		$message = "Pokemon ".$data['name']." succesvol aangepast!";
		echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
		$conn = null;
	} else {
		$message = "Oeps! Er is iets fout gegaan, probeer het opnieuw.";
		echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
	}
}

function deletePokemon($data) {
	$conn = openDatabaseConnection();
	$query = $conn->prepare("DELETE FROM `pokemons` WHERE id = :id");

	if ($query->execute([':id' => $data['id']])) {
		$message = "Succesvol verwijderd!";
		echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
		$conn = null;
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