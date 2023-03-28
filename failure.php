<!DOCTYPE html>
<html>
<head>
	<title>Guess Who? - Incorrect Guess</title>
	<link rel="stylesheet" type="text/css" href="fail.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Creepster">
</head>
<body>
	<div class="background">
		<h1>Guess Who? - Incorrect Guess</h1>
		<div class="container">
			<?php
				// Start the session and retrieve the selected suspect's name
				session_start();
				$selectedSuspect = $_SESSION['selectedSuspect'];
				$selectedSuspectName = $selectedSuspect['name'];
				
				// Display the selected suspect name on the page
				echo "<div class='text-box'><p>The correct suspect was: $selectedSuspectName</p></div>";
			?>
			<div class="buttons">
				<form method="POST" action="reset.php">
					<button type="submit" class="btn">Play Again</button>
				</form>
				<a href="credits.php" class="btn credits-btn">Credits</a>
			</div>
		</div>
	</div>
</body>
</html>
