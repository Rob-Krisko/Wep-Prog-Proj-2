<?php
session_start();

// Check if a guess was submitted
if (isset($_POST['guess'])) {
    // Get the selected suspect from the session
    $selectedSuspect = $_SESSION['selectedSuspect'];

    // Get the user's guess
    $guess = $_POST['guess'];

    // Get the difficulty level from the session or default to 'easy'
    $difficulty = isset($_SESSION['difficulty']) ? $_SESSION['difficulty'] : 'easy';

    // Set the maximum number of incorrect guesses based on the difficulty level
    if ($difficulty == 'easy') {
        $maxIncorrectGuesses = 6;
    } elseif ($difficulty == 'medium') {
        $maxIncorrectGuesses = 4;
    } else {
        $maxIncorrectGuesses = 3;
    }

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
            // Redirect to the incorrect guess page
            header("Location: incorrect_guess.php");
            exit;
        }
    }
} else {
    // Redirect back to the index page if no guess was submitted
    header("Location: index.php");
    exit;
}
