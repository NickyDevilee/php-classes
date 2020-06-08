<?php 
require 'datalayer.php';
require 'Energytype.php';

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

$id = $_GET['id'];

$data = getPokemonFromID($id);
// var_dump($data);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete pokemon</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form method="post" action="function.php?action=deletePokemon">

					<input readonly="true" type="hidden" name="id" value="<?=$id?>">

					<div class="form-group">
						<label for="name">Name:</label>
						<input readonly="true" type="text" class="form-control" id="name" name="name" value="<?=$data['name']?>">
					</div>

					<div class="form-group">
						<label for="energyType">Energy type:</label>
						<select disabled="true" id="energyType" class="form-control" name="energyType">
							<?php foreach ($energyTypes as $energytype) { ?>
								<option value="<?=$energytype->getName()?>" <?=($data['energyType'] == $energytype->getName() ? 'selected' : '')?>><?=$energytype->getName()?></option>
							<?php } ?>
						</select>
					</div>

					<div class="form-group">
						<label for="health">Max health:</label>
						<input readonly="true" type="text" class="form-control" id="health" name="health" value="<?=$data['health']?>">
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="attack1">Attack 1:</label>
								<input readonly="true" type="text" class="form-control" id="attack1" name="attack1" value="<?=$data['attack1']?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="attack1_damage">Damage attack 1:</label>
								<input readonly="true" type="text" class="form-control" id="attack1_damage" name="attack1_damage" value="<?=$data['attack1_damage']?>">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="attack2">Attack 2:</label>
								<input readonly="true" type="text" class="form-control" id="attack2" name="attack2" value="<?=$data['attack2']?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="attack2_damage">Damage attack 2:</label>
								<input readonly="true" type="text" class="form-control" id="attack2_damage" name="attack2_damage" value="<?=$data['attack2_damage']?>">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="weakness">Weakness:</label>
								<select disabled="true" id="weakness" class="form-control" name="weakness">
									<?php foreach ($energyTypes as $energytype) { ?>
										<option value="<?=$energytype->getName()?>" <?=($data['weakness'] == $energytype->getName() ? 'selected' : '')?>><?=$energytype->getName()?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="weakness_multiplier">Weakness multiplier:</label>
								<input readonly="true" type="text" class="form-control" id="weakness_multiplier" name="weakness_multiplier" value="<?=$data['weakness_multiplier']?>">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="resistance">Resistance:</label>
								<select disabled="true" id="resistance" class="form-control" name="resistance">
									<?php foreach ($energyTypes as $energytype) { ?>
										<option value="<?=$energytype->getName()?>" <?=($data['resistance'] == $energytype->getName() ? 'selected' : '')?>><?=$energytype->getName()?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="resistance_value">Resistance value:</label>
								<input readonly="true" type="text" class="form-control" id="resistance_value" name="resistance_value" value="<?=$data['resistance_value']?>">
							</div>
						</div>
					</div>

					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>