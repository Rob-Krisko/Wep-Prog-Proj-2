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
$name = 'Slickback';
$stmt = "Ha! What was I doing?! Mannn, I was so drunk from poker I went to my nice ass room with my big bed and ladies in the center wing and passed out. I didn't even know what happened 'till Sebastian's worried ass woke me up sayin' a shot went off, which meant cops were comin'. He is my butler and knows all the ins and outs. Go talk to him and figure this out! I got things to do. And it's A Pimp Named Slickback too, get it right!";
$stmt_lines = explode("\n", wordwrap($stmt, 150, "\n"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guess Who? - Suspect A</title>
    <link rel="stylesheet" type="text/css" href="interrogate.css">
</head>
<body>
    <div class="background-image">
     <img src="images/Suspect A.png"> 
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
                <input type="hidden" name="suspect" value="Slickback">
                <button type="submit" name="guess" value="Slickback" class="btn">Guess this suspect</button>
            </form>
            <form method="POST">
                <button type="submit" name="back" class="btn">Choose another suspect</button>
                <button type="submit" name="reset" class="btn">Reset game</button>
            </form>
        </div>
    </div>
</body>
</html>
