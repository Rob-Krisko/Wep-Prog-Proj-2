<?php
    // Start the session
    session_start();

    // Define an array of suspects
    $suspects = array(
        array(
            "name" => "Slickback",
            "description" => "This is the description for Suspect A.",
            "clues" => array(
                "Has Black Hair",
                "Something Shiny around their face",
            )
        ),
        array(
            "name" => "Revy",
            "description" => "This is the description for Suspect B.",
            "clues" => array(
                "Has long, dark hair",
                "Had some kind of tattoo",
            )
        ),
        array(
            "name" => "Sanji",
            "description" => "This is the description for Suspect C.",
            "clues" => array(
                "Has light colored hair",
                "Seemed to be well dressed",
            )
		),
		array(
			"name" => "Uruk",
			"description" => "This is the description for Suspect D.",
			"clues" => array(
				"Has short, dark hair",
				"Looks like they might be in school",
			)
		),
		array(
            "name" => "Sebastian",
            "description" => "This is the description for Suspect E.",
            "clues" => array(
                "Medium Length dark hair",
                "Was wearing gloves",
            )
		),
		array(
            "name" => "Zeke",
            "description" => "This is the description for Suspect F.",
            "clues" => array(
                "Has reddish looking hair",
                "Well dressed",
            )
		),
		array(
            "name" => "Sutcliff",
            "description" => "This is the description for Suspect G.",
            "clues" => array(
                "Has incredibly long hair",
                "Wears a nice pair of glasses",
            )
		),
        array(
            "name" => "Joop",
            "description" => "This is the description for Suspect H.",
            "clues" => array(
                "Has long silver hair",
                "Seemed to be wearing traditional Japanese Clothing",
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
