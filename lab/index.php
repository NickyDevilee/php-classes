<?php 
	require 'Superheroes.php';

	$spiderman =  new Superhero('Spider-Man', 'Male', 'Spiderfriends', 'With great power comes great responsibility!');

	$thor = new Avenger('Thor', 'Male', 'For Asgard!');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Index</title>
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<?php print_r('<pre>'. $spiderman . '</pre>'); ?>
			<h2><?php $spiderman->sayOneliner(); ?></h2>
			<hr>
			<h2><?php $thor->sayOneliner(); ?></h2>
			<?php print_r('<pre>' . $thor . '</pre>'); ?>
		</div>
	</body>
</html>