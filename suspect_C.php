<?php
session_start();

// Check if the user guessed the suspect
if (isset($_POST['guess']) && $_POST['guess'] == $_SESSION['chosen_suspect']['name']) {
    // The user guessed correctly, redirect to the success page
    header("Location: success.php");
    exit;
}

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
$name = 'Sanji';
$stmt = "I was out on the back patio trying to have a nice smoke since the night was finally ending. When the gunshot went off I decided to run around through the west courtyard to check to see if the shooter ran out of the front. No one ever came out the front and I didn't see anyone so that is when I decided to go into the foyer to check things out more. I knew something bad would happen if we stayed with these villains. That is why I tried so hard to get the book when arguing with Bazett, of course. "
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guess Who? - Suspect C</title>
    <link rel="stylesheet" type="text/css" href="interrogate.css">
</head>
<body>
    <div class="background-image">
    <img src="Suspect C.png"> 
    </div>
    <div class="container">
        <div class="textbox">
            <p><?php echo $stmt; ?></p>
        </div>
        <div class="buttons">
            <form method="POST" action="process_guess.php">
                <input type="hidden" name="suspect" value="Sanji">
                <button type="submit" name="guess" value="Sanji" class="btn">Guess this suspect</button>
            </form>
            <form method="POST">
                <button type="submit" name="back" class="btn">Choose another suspect</button>
                <button type="submit" name="reset" class="btn">Reset game</button>
            </form>
        </div>
    </div>
</body>
</html></body>
</html>
