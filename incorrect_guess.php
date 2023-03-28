<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Redirect to the login page if the user is not logged in
    header('Location: login.html');
    exit();
}

// Get the difficulty level from the session
$difficulty = $_SESSION['difficulty'];

// Set the maximum number of incorrect guesses based on the difficulty level
$maxIncorrectGuesses = 0;
if ($difficulty == 'easy') {
    $maxIncorrectGuesses = 5;
} elseif ($difficulty == 'medium') {
    $maxIncorrectGuesses = 3;
} elseif ($difficulty == 'hard') {
    $maxIncorrectGuesses = 1;
}

// Check if a guess was submitted
if (isset($_POST['guess'])) {
    // Get the selected suspect from the session
    $selectedSuspect = $_SESSION['selectedSuspect'];

    // Get the user's guess
    $guess = $_POST['guess'];

    // Check if the guess is correct
    if ($guess == $selectedSuspect['name']) {
        // Redirect to the success page
        header("Location: success.php");
        exit;
    } else {
        // Increment the number of incorrect guesses
        if (!isset($_SESSION['incorrectGuesses'])) {
            $_SESSION['incorrectGuesses'] = 1;
        } else {
            $_SESSION['incorrectGuesses']++;
        }

        // Check if the number of incorrect guesses has reached the maximum allowed
        if ($_SESSION['incorrectGuesses'] >= $maxIncorrectGuesses) {
            // Redirect to the failure page
            header("Location: failure.php");
            exit;
        } else {
            // Redirect back to the guess page
            header("Location: index.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guess Who?</title>
    <link rel="stylesheet" type="text/css" href="incorrect.css">
</head>
<body>
    <div class="container">
        <h1>Guess Who?</h1>
        <?php
        // Display the remaining number of guesses
        $remainingGuesses = $maxIncorrectGuesses - $_SESSION['incorrectGuesses'];
        echo "<p class='message'>Incorrect guess. You have $remainingGuesses remaining.</p>";
        ?>
        <form action="index.php" method="POST">
            <input type="submit" value="Try Again" class="btn">
        </form>
    </div>
</body>
</html>
