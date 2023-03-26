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
$name = 'Suspect G';
$clue1 = 'Has white hair';
$clue2 = 'Wears a vest';
$stmt = "I was in the room next to Bazett in the east wing getting supplies ready for the morning so I could sleep in a bit. As soon as the shot went off I bolted through my door to see Bazett already 20 ft out of her room heading toward the location of the shot. By the time we got downstairs in the center wing the shooter was gone. However, I think I saw a smaller person flash around the corner of the west wing entrance. At the time I figured it was someone coming to look, like us, but now I realize they were running the opposite way of the foyer and it is almost like they had a happy gleam to them. I can't believe I helped lead my friend upon her deathbed…";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guess Who? - Suspect G</title>
    <link rel="stylesheet" type="text/css" href="interrogate.css">
</head>
<body>
    <div class="background-image">
    <img src="./images/Suspect G.png"> 
    </div>
    <div class="container">
        <div class="textbox">
            <p><?php echo $clue1; ?></p>
            <p><?php echo $clue2; ?></p>
            <p><?php echo $stmt; ?></p>
        </div>
        <div class="buttons">
            <form method="POST" action="process_guess.php">
                <input type="hidden" name="suspect" value="Suspect G">
                <button type="submit" name="guess" value="Suspect G" class="btn">Guess this suspect</button>
            </form>
            <form method="POST">
                <button type="submit" name="back" class="btn">Choose another suspect</button>
                <button type="submit" name="reset" class="btn">Reset game</button>
            </form>
        </div>
    </div>
</body>
</html>
