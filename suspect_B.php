<?php
session_start();

// Check if the user wants to go back and choose another suspect
if (isset($_POST['back'])) {
    // Redirect to the index page
    header("Location: index.php");
    exit;
}

// Check if the user wants to reset the game
if (isset($_POST['reset'])) {
    // Redirect to the reset page
    header("Location: reset.php");
    exit;
}

// Get the suspect's information
$name = 'Revy';
$stmt = "Around the time the shot went off I was in the bar finishing my bottle with Uruk and Joop near. He went to go find Slickback and I decided to head to the foyer just in case there was more than just a single shot coming, you know. That's when I came across this poor young girl, everyone was there except for Slickback, Uruk, and Sanji. ";
$stmt_lines = explode("\n", wordwrap($stmt, 150, "\n"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guess Who? - Suspect B</title>
    <link rel="stylesheet" type="text/css" href="interrogate.css">
</head>
<body>
    <div class="background-image">
    <img src="images/Suspect B.png"> 
    </div>
    <div class="container">
        <div class="textbox">
            <p>
                <?php foreach ($stmt_lines as $index => $line): ?>
                    <span class="line" style="animation-delay: <?php echo $index * 2; ?>s;"><?php echo $line; ?></span><br>
                <?php endforeach; ?>
            </p>
        </div>
        <div class="buttons">
            <form method="POST" action="process_guess.php">
                <input type="hidden" name="suspect" value="Revy">
                <button type="submit" name="guess" value="Revy" class="btn">Guess this suspect</button>
            </form>
            <form method="POST">
                <button type="submit" name="back" class="btn">Choose another suspect</button>
                <button type="submit" name="reset" class="btn">Reset game</button>
            </form>
        </div>
    </div>
</body>
</html>
