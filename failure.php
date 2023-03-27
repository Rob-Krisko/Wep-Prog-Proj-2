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
				echo "<div class='text-box'><p>All of the suspects you guessed were wrong. :( $selectedSuspectName is now on the loose with the book and we still haven't avenged Sutcliff's friend! I don't know how we are ever going to get him now!</p></div>";
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
