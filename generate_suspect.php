<?php
    // Start the session
    session_start();

    // Define an array of suspects
    $suspects = array(
        array(
            "name" => "Suspect A",
            "description" => "This is the description for Suspect A.",
            "clues" => array(
                "Has Black Hair",
                "Wears Glasses",
            )
        ),
        array(
            "name" => "Suspect B",
            "description" => "This is the description for Suspect B.",
            "clues" => array(
                "Has blonde Hair",
                "Wears a hat",
            )
        ),
        array(
            "name" => "Suspect C",
            "description" => "This is the description for Suspect C.",
            "clues" => array(
                "Has Red Hair",
                "Has a beard",
            )
		),
		array(
			"name" => "Suspect D",
			"description" => "This is the description for Suspect D.",
			"clues" => array(
				"Has brown hair",
				"Wears a tie",
			)
		),
		array(
            "name" => "Suspect E",
            "description" => "This is the description for Suspect E.",
            "clues" => array(
                "Has Red Hair",
                "Has a cane",
            )
		),
		array(
            "name" => "Suspect F",
            "description" => "This is the description for Suspect F.",
            "clues" => array(
                "Has blonde Hair",
                "Has a beard",
            )
		),
		array(
            "name" => "Suspect G",
            "description" => "This is the description for Suspect G.",
            "clues" => array(
                "Has White Hair",
                "Wears a vest",
            )
		),
        array(
            "name" => "Suspect H",
            "description" => "This is the description for Suspect H.",
            "clues" => array(
                "Wears a Mask",
                "Has a Sword",
            )
		),
    );

    // Get the difficulty level from the GET parameters or default to 'easy'
    $difficulty = isset($_GET['difficulty']) ? $_GET['difficulty'] : 'easy';

    // Set the maximum number of guesses based on the difficulty level
    if ($difficulty == 'easy') {
        $maxGuesses = 5;
    } elseif ($difficulty == 'medium') {
        $maxGuesses = 3;
    } else {
        $maxGuesses = 1;
    }

    // Store the difficulty level in the session
    $_SESSION['difficulty'] = $difficulty;

    // Select a random suspect from the array
    $selectedSuspect = $suspects[rand(0, count($suspects) - 1)];

    // Store the selected suspect in the session
    $_SESSION['selectedSuspect'] = $selectedSuspect;

    // Reset the number of incorrect guesses
    $_SESSION['incorrectGuesses'] = 0;

    // Redirect to the index page to start the game with the selected difficulty level
    header("Location: index.php");
    exit;
?>
