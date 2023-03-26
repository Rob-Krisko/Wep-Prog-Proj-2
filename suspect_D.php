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
$name = 'Suspect D';
$clue1 = 'Has brown hair';
$clue2 = 'Wears a tie';
$stmt = "I was sitting at the bar in the center wing next to where we were playing poker, Joop and I decided to keep the game going. My first initial thought was that Slickback was on another episode again, so I sat back to finish my drink and wait it out. However, I heard one of the newcomers yell out another name. At that point I went to check on Slickback and yelled for him to wake up through the door. He tends to have women over and I didnt want to risk seeing that mess. Then went straight to the foyer and took a look around the scene. I noticed a blonde chunk of hair wrapped around the buckle of the satchel. Terrible thing, that young too, no reason for her to die. ";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guess Who? - Suspect D</title>
    <link rel="stylesheet" type="text/css" href="interrogate.css">
</head>
<body>
    <div class="background-image">
    <img src="./images/Suspect D.png"> 
    </div>
    <div class="container">
        <div class="textbox">
            <p><?php echo $clue1; ?></p>
            <p><?php echo $clue2; ?></p>
            <p><?php echo $stmt; ?></p>
        </div>
        <div class="buttons">
            <form method="POST" action="process_guess.php">
                <input type="hidden" name="suspect" value="Suspect D">
                <button type="submit" name="guess" value="Suspect D" class="btn">Guess this suspect</button>
            </form>
            <form method="POST">
                <button type="submit" name="back" class="btn">Choose another suspect</button>
                <button type="submit" name="reset" class="btn">Reset game</button>
            </form>
        </div>
    </div>
</body>
</html>
