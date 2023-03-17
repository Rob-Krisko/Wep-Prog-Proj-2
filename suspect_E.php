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
$name = 'Suspect E';
$clue1 = 'Has red hair';
$clue2 = 'Has a cane';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guess Who? - Suspect E</title>
    <link rel="stylesheet" type="text/css" href="interrogate.css">
</head>
<body>
    <div class="background-image"></div>
    <div class="container">
        <div class="textbox">
            <p><?php echo $clue1; ?></p>
            <p><?php echo $clue2; ?></p>
        </div>
        <div class="buttons">
            <form method="POST" action="process_guess.php">
                <input type="hidden" name="suspect" value="Suspect E">
                <button type="submit" name="guess" value="Suspect E" class="btn">Guess this suspect</button>
            </form>
            <form method="POST">
                <button type="submit" name="back" class="btn">Choose another suspect</button>
                <button type="submit" name="reset" class="btn">Reset game</button>
            </form>
        </div>
    </div>
</body>
</html>
