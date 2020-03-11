<?php 
	require 'Pokemon.php';
	require 'Energytype.php';
	require 'Weakness.php';
	require 'Attack.php';
	require 'Resistance.php';

	$energyTypes = [
		'lightning' => new EnergyType("Lightning"),
		'fire' => new EnergyType("Fire"),
		'fighting' => new EnergyType("Fighting"),
		'water' => new EnergyType("Water"),
		'nature' => new EnergyType("Nature"),
		'psychic' => new EnergyType("Psychic"),
	];

	var_dump($energyTypes);

	// $new_pokemon = new Pokemon(
	// 	$pokemonName, 
	// 	$energyTypeObject, 
	// 	$hitPoints, 
	// 	$attackArray, 
	// 	$weaknessObject, 
	// 	$resistanceObject
	// );

	$pikachu = new Pokemon(
		'Pikachu', 
		$energyTypes['lightning'], 
		50, 
		[new Attack('Pika Punch', 20), new Attack('Electric Ring', 50)], 
		new Weakness($energyTypes['fire'], 1.5), 
		new Resistance($energyTypes['fighting'], 20)
	);

	$charmeleon  = new Pokemon(
		'Charmeleon', 
		$energyTypes['fire'], 
		60, 
		[new Attack('Head Butt', 10), new Attack('Flare', 30)], 
		new Weakness($energyTypes['water'], 2), 
		new Resistance($energyTypes['lightning'], 10)
	);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Index</title>
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<?php var_dump($pikachu); ?>
				</div>
				<div class="col-md-6">
					<?php var_dump($charmeleon); ?>
				</div>
			</div>
		</div>
	</body>
</html>