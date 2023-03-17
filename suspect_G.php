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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guess Who? - <?php echo $name; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h1, h2 {
            text-align: center;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .btn {
            font-size: 20px;
            padding: 10px 20px;
            margin: 10px;
            border: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
    <h1>Guess Who? - <?php echo $name; ?></h1>
    <div class="container">
        <p><?php echo $clue1; ?></p>
        <p><?php echo $clue2; ?></p>
        <form method="POST" action="process_guess.php">
            <input type="hidden" name="suspect" value="<?php echo $name; ?>">
            <button type="submit" name="guess" value="<?php echo $name; ?>" class="btn">Guess this suspect</button>
        </form>
        <form method="POST">
            <button type="submit" name="back" class="btn">Choose another suspect</button>
            <button type="submit" name="reset" class="btn">Reset game</button>
        </form>
    </div>
</body>
</html>
