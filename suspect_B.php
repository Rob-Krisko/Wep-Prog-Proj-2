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
$name = 'Suspect B';
$clue1 = 'Has blonde hair';
$clue2 = 'Wears a hat';
$stmt = "Around the time the shot went off I was in the bar finishing my bottle with Uruk and Joop near. He went to go find Slickback and I decided to head to the foyer just in case there was more than just a single shot coming, you know. That's when I came across this poor young girl, everyone was there except for Slickback, Uruk, and Sanji. ";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guess Who? - Suspect B</title>
    <link rel="stylesheet" type="text/css" href="interrogate.css">
</head>
<body>
    <div class="background-image">
    <img src="./images/Suspect B.png"> 
    </div>
    <div class="container">
        <div class="textbox">
            <p><?php echo $clue1; ?></p>
            <p><?php echo $clue2; ?></p>
            <p><?php echo $stmt; ?></p>
        </div>
        <div class="buttons">
            <form method="POST" action="process_guess.php">
                <input type="hidden" name="suspect" value="Suspect B">
                <button type="submit" name="guess" value="Suspect B" class="btn">Guess this suspect</button>
            </form>
            <form method="POST">
                <button type="submit" name="back" class="btn">Choose another suspect</button>
                <button type="submit" name="reset" class="btn">Reset game</button>
            </form>
        </div>
    </div>
</body>
</html>
