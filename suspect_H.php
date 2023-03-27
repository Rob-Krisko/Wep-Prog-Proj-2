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
$name = 'Joop';
$stmt = "During the time of the shot I was killing Uruk in poker. As soon as the shot went off I immediately got into defense mode, having a full day of battles you always stayed prepared, then ran straight to the second floor through the stairs around the bar. Once I got up the stairs I noticed Bazett and Sutcliff already making their way down to see the sweetest girl has lost her life. All over a book, I just really wish we knew who it was. ";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guess Who? - Suspect G</title>
    <link rel="stylesheet" type="text/css" href="interrogate.css">
</head>
<body>
    <div class="background-image">
    <img src="suspectH.png"> 
    </div>
    <div class="container">
        <div class="textbox">
            <p><?php echo $stmt; ?></p>
        </div>
        <div class="buttons">
            <form method="POST" action="process_guess.php">
                <input type="hidden" name="suspect" value="Joop">
                <button type="submit" name="guess" value="Joop" class="btn">Guess this suspect</button>
            </form>
            <form method="POST">
                <button type="submit" name="back" class="btn">Choose another suspect</button>
                <button type="submit" name="reset" class="btn">Reset game</button>
            </form>
        </div>
    </div>
</body>
</html>
