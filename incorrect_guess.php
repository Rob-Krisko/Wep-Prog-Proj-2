<?php
session_start();

// Get the difficulty level from the session
$difficulty = $_SESSION['difficulty'];

// Set the maximum number of incorrect guesses based on the difficulty level
$maxIncorrectGuesses = 0;
if ($difficulty == 'easy') {
    $maxIncorrectGuesses = 6;
} elseif ($difficulty == 'medium') {
    $maxIncorrectGuesses = 4;
} elseif ($difficulty == 'hard') {
    $maxIncorrectGuesses = 3;
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

// Display the remaining number of guesses
$remainingGuesses = $maxIncorrectGuesses - $_SESSION['incorrectGuesses'];
echo "<p>Incorrect guess. You have $remainingGuesses remaining.</p>";

echo '<form action="index.php"><button type="submit">Try Again</button></form>';
?>
