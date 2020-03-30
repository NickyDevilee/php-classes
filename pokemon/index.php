<?php 
	require 'datalayer.php';
	require 'Pokemon.php';
	require 'Energytype.php';
	require 'Weakness.php';
	require 'Attack.php';
	require 'Resistance.php';

	$energyTypes = [
		'electric' => new EnergyType("Electric"),
		'fire' => new EnergyType("Fire"),
		'fighting' => new EnergyType("Fighting"),
		'water' => new EnergyType("Water"),
		'psychic' => new EnergyType("Psychic"),
		'normal' => new EnergyType("Normal"),
		'grass' => new EnergyType("Grass"),
		'ice' => new EnergyType("Ice"),
		'poison' => new EnergyType("Poison"),
		'ground' => new EnergyType("Ground"),
		'flying' => new EnergyType("Flying"),
		'bug' => new EnergyType("Bug"),
		'rock' => new EnergyType("Rock"),
		'ghost' => new EnergyType("Ghost"),
		'dragon' => new EnergyType("Dragon"),
		'dark' => new EnergyType("Dark"),
		'steel' => new EnergyType("Steel"),
		'fairy' => new EnergyType("Fairy"),
	];

	// $new_pokemon = new Pokemon(
	// 	$pokemonName, 
	// 	$energyTypeObject, 
	// 	$hitPoints, 
	// 	$attackArray, 
	// 	$weaknessObject, 
	// 	$resistanceObject
	// );

	$all_pokemons = createAllPokemons();

	$pokedex = createAllPokemons();

	var_dump($pokedex);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Index</title>
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
		<style type="text/css">
			.modal-dialog {
				max-width: 60rem;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pokemonModal"><i class="fa fa-plus" aria-hidden="true"></i> - insert pokemon</button>
		</div>

		<div class="container mt-5">
			<div class="row">
				<div class="col-md-6">
					<?php 
						while ($pokedex['charmeleon']->health != 0) {
							$pokedex['pikachu']->attack($pokedex['charmeleon'], $pokedex['pikachu']->attacks['Electric Ring']);
						}
					 ?>
				</div>
				<div class="col-md-6">
					<?php 
						while ($pokedex['ed']->health != 0) {
							$pokedex['charmeleon']->attack($pokedex['ed'], $pokedex['charmeleon']->attacks['Flare']);
						}
					 ?>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">

					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="All-tab" data-toggle="tab" href="#All" role="tab" aria-controls="All" aria-selected="true">All Pokemons</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="alive-tab" data-toggle="tab" href="#alive" role="tab" aria-controls="alive" aria-selected="false">Alive Pokemons</a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="All" role="tabpanel" aria-labelledby="All-tab">
							<table id="all_pokemon_table" class="display">
								<thead>
									<tr>
										<th>Name</th>
										<th>Energy Type</th>
										<th>HP (Max Health)</th>
										<th>Attack 1</th>
										<th>Damage</th>
										<th>Attack 2</th>
										<th>Damage</th>
										<th>Weakness</th>
										<th>Resistance</th>
										<th>DB ID</th>
										<th>Edit</th>
										<th>Remove</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($all_pokemons as $pokemon) {
										$array_keys = array_keys($pokemon->attacks); ?>
										<tr>
											<td><?=$pokemon->name;?></td>
											<td><?=$pokemon->energyType->name?></td>
											<td><?=$pokemon->hitpoints?></td>
											<td><?=$pokemon->attacks[$array_keys[0]]->name?></td>
											<td><?=$pokemon->attacks[$array_keys[0]]->damage?></td>
											<td><?=$pokemon->attacks[$array_keys[1]]->name?></td>
											<td><?=$pokemon->attacks[$array_keys[1]]->damage?></td>
											<td><?=$pokemon->weakness->energyType->name?></td>
											<td><?=$pokemon->resistance->energyType->name?></td>
											<td><?=$pokemon->db_id;?></td>
											<td><a href="edit.php?id=<?=$pokemon->db_id;?>" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
											<td><a href="delete.php?id=<?=$pokemon->db_id;?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="tab-pane fade" id="alive" role="tabpanel" aria-labelledby="alive-tab">
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
										<th>DB ID</th>
										<th>Edit</th>
										<th>Remove</th>
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
											<td><?=$pokemon->db_id;?></td>
											<td><a href="edit.php?id=<?=$pokemon->db_id;?>" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
											<td><a href="delete.php?id=<?=$pokemon->db_id;?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>	
				</div>
			</div>
		</div>

<div class="modal fade" id="pokemonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Insert Pokemon</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<form method="post" action="function.php?action=insert_pokemon">

					<div class="form-group">
						<label for="name">Name:</label>
						<input type="text" class="form-control" id="name" name="name">
					</div>

					<div class="form-group">
						<label for="energyType">Energy type:</label>
						<select id="energyType" class="form-control" name="energyType">
							<?php foreach ($energyTypes as $energytype) { ?>
								<option value="<?=$energytype->name?>"><?=$energytype->name?></option>
							<?php } ?>
						</select>
					</div>

					<div class="form-group">
						<label for="health">Max health:</label>
						<input type="text" class="form-control" id="health" name="health">
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="attack1">Attack 1:</label>
								<input type="text" class="form-control" id="attack1" name="attack1">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="attack1_damage">Damage attack 1:</label>
								<input type="text" class="form-control" id="attack1_damage" name="attack1_damage">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="attack2">Attack 2:</label>
								<input type="text" class="form-control" id="attack2" name="attack2">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="attack2_damage">Damage attack 2:</label>
								<input type="text" class="form-control" id="attack2_damage" name="attack2_damage">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="weakness">Weakness:</label>
								<select id="weakness" class="form-control" name="weakness">
									<?php foreach ($energyTypes as $energytype) { ?>
										<option value="<?=$energytype->name?>"><?=$energytype->name?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="weakness_multiplier">Weakness multiplier:</label>
								<input type="text" class="form-control" id="weakness_multiplier" name="weakness_multiplier">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="resistance">Resistance:</label>
								<select id="resistance" class="form-control" name="resistance">
									<?php foreach ($energyTypes as $energytype) { ?>
										<option value="<?=$energytype->name?>"><?=$energytype->name?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="resistance_value">Resistance value:</label>
								<input type="text" class="form-control" id="resistance_value" name="resistance_value">
							</div>
						</div>
					</div>

					<button type="submit" class="btn btn-primary">Submit</button>
				</form>

			</div>
		</div>
	</div>
</div>

	</body>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$('#pokemon_table, #all_pokemon_table').DataTable( {
			paging: false
		} );
	</script>
</html>