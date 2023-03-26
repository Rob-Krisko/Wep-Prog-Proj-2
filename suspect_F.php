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
$name = 'Suspect F';
$clue1 = 'Has blonde hair';
$clue2 = 'Has a beard';
$stmt = "It was coming to the end of the night and I was really tired from the battle earlier. Me and Sanji had gotten into a tiff earlier in the night about who should be in charge of holding the book. Knowing how short of a temper he had, I just said I trusted Sutcliff's friend, he should too, and he should get some rest to save myself some hassle later.  Around 12:00 I woke up from some nightmares and got out of bed to get some water. That is when I heard the gunshot and just remembered immediately preparing for more fighting. I saw Sutcliff running behind me and immediately felt calmer.";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guess Who? - Suspect F</title>
    <link rel="stylesheet" type="text/css" href="interrogate.css">
</head>
<body>
    <div class="background-image">
    <img src="./images/Suspect F.png"> 
    </div>
    <div class="container">
        <div class="textbox">
            <p><?php echo $clue1; ?></p>
            <p><?php echo $clue2; ?></p>
            <p><?php echo $stmt; ?></p>
        </div>
        <div class="buttons">
            <form method="POST" action="process_guess.php">
                <input type="hidden" name="suspect" value="Suspect F">
                <button type="submit" name="guess" value="Suspect F" class="btn">Guess this suspect</button>
            </form>
            <form method="POST">
                <button type="submit" name="back" class="btn">Choose another suspect</button>
                <button type="submit" name="reset" class="btn">Reset game</button>
            </form>
        </div>
    </div>
</body>
</html>
