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

	// $new_pokemon = new Pokemon(
	// 	$pokemonName, 
	// 	$energyTypeObject, 
	// 	$hitPoints, 
	// 	$attackArray, 
	// 	$weaknessObject, 
	// 	$resistanceObject
	// );

	$pokedex = [];

	$pokedex['pikachu'] = new Pokemon(
		'Pikachu', 
		$energyTypes['lightning'], 
		50, 
		['Pika Punch' => new Attack('Pika Punch', 20), 'Electric Ring' => new Attack('Electric Ring', 50)], 
		new Weakness($energyTypes['fire'], 1.5), 
		new Resistance($energyTypes['fighting'], 20)
	);

	$pokedex['charmeleon']  = new Pokemon(
		'Charmeleon', 
		$energyTypes['fire'], 
		60, 
		['Head Butt' => new Attack('Head Butt', 10), 'Flare' => new Attack('Flare', 30)], 
		new Weakness($energyTypes['water'], 2), 
		new Resistance($energyTypes['lightning'], 10)
	);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Index</title>
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
	</head>
	<body>
		<div class="container mt-5">
			<div class="row">
				<div class="col-md-6">
					<?php $pokedex['pikachu']->attack($pokedex['charmeleon'], $pokedex['pikachu']->attacks['Electric Ring']); ?>
				</div>
				<div class="col-md-6">
					<?php $pokedex['charmeleon']->attack($pokedex['pikachu'], $pokedex['charmeleon']->attacks['Flare']); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table id="pokemon_table" class="display">
						<thead>
							<tr>
								<th>Name</th>
								<th>Energy Type</th>
								<th>HP (Max Health)</th>
								<th>Current Health</th>
								<th>Attack 1</th>
								<th>Damage</th>
								<th>Attack 2</th>
								<th>Damage</th>
								<th>Weakness</th>
								<th>Resistance</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($pokedex as $pokemon) {
								$array_keys = array_keys($pokemon->attacks); ?>
								<tr>
									<td><?=$pokemon->name;?></td>
									<td><?=$pokemon->energyType->name?></td>
									<td><?=$pokemon->hitpoints?></td>
									<td><?=$pokemon->health;?></td>
									<td><?=$pokemon->attacks[$array_keys[0]]->name?></td>
									<td><?=$pokemon->attacks[$array_keys[0]]->damage?></td>
									<td><?=$pokemon->attacks[$array_keys[1]]->name?></td>
									<td><?=$pokemon->attacks[$array_keys[1]]->damage?></td>
									<td><?=$pokemon->weakness->energyType->name?></td>
									<td><?=$pokemon->resistance->energyType->name?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$('#pokemon_table').DataTable( {
		    paging: false
		} );
	</script>
</html>