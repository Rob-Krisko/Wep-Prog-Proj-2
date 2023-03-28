<?php
session_start();

if (!isset($_SESSION['score_submitted']) || !$_SESSION['score_submitted']) {
    // Calculate the elapsed time
    $elapsed_time = time() - $_SESSION['startTime'];

    // Get user and game-related data
    $username = $_SESSION['username'];
    $difficulty = $_SESSION['difficulty'];
    $used_guesses = $_SESSION['incorrectGuesses'] + 1;

    // Save the user's score to the text file
    $score_entry = $username . ',' . $difficulty . ',' . $used_guesses . ',' . $elapsed_time . PHP_EOL;
    file_put_contents('scores.txt', $score_entry, FILE_APPEND);

    // Set the score_submitted session variable to true
    $_SESSION['score_submitted'] = true;

    // Set the elapsed_time and used_guesses session variables
    $_SESSION['elapsed_time'] = $elapsed_time;
    $_SESSION['used_guesses'] = $used_guesses;
} else {
    // Retrieve the elapsed time and used guesses from the session
    $elapsed_time = $_SESSION['elapsed_time'];
    $used_guesses = $_SESSION['used_guesses'];
}

// Prepare the user's score message
$score_message = "You solved the game in {$elapsed_time} seconds with {$used_guesses} guesses!";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Guess Who? - Success!</title>
	<link rel="stylesheet" href="win.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Creepster">
</head>
<body>
	<div class="container">
		<h2>Congratulations, you guessed correctly!</h2>
		<p class="message">You have won the game!</p>
		<p class="score"><?php echo $score_message; ?></p>
		<div class="buttons">
			<form method="POST" action="reset.php">
				<button type="submit" class="btn">Play Again?</button>
			</form>
			<form method="POST" action="credits.php">
				<button type="submit" class="btn">Credits</button>
			</form>
			<a href="leaderboard.php" class="btn">Leaderboard</a>
		</div>
	</div>
</body>
</html>
