<?php
    // Start the session
    session_start();

    if (!isset($_SESSION['username'])) {
        // Redirect to the login page if the user is not logged in
        header('Location: login.html');
        exit();
    }

    // Define an array of suspects
    $suspects = array(
        array(
            "name" => "Slickback",
            "description" => "This is the description for Suspect A.",
            "clues" => array(
                "had black hair",
                "had something shiny around their face",
            )
        ),
        array(
            "name" => "Revy",
            "description" => "This is the description for Suspect B.",
            "clues" => array(
                "had long, dark hair",
                "had some kind of tattoo",
            )
        ),
        array(
            "name" => "Sanji",
            "description" => "This is the description for Suspect C.",
            "clues" => array(
                "had light colored hair",
                "reeked of smoke",
            )
		),
	array(
		"name" => "Uruk",
		"description" => "This is the description for Suspect D.",
		"clues" => array(
			"had short, dark hair",
			"dressed like they just left school",
		)
	),
		array(
            "name" => "Sebastian",
            "description" => "This is the description for Suspect E.",
            "clues" => array(
                "had medium Length dark hair",
                "was wearing gloves",
            )
		),
		array(
            "name" => "Zeke",
            "description" => "This is the description for Suspect F.",
            "clues" => array(
                "had reddish looking hair",
                "had piercing red eyes",
            )
		),
		array(
            "name" => "Sutcliff",
            "description" => "This is the description for Suspect G.",
            "clues" => array(
                "had incredibly long hair",
                "was wearing a pair of glasses",
            )
		),
        array(
            "name" => "Joop",
            "description" => "This is the description for Suspect H.",
            "clues" => array(
                "had long silver hair",
                "seemed to be wearing traditional Japanese Clothing",
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

    $_SESSION['startTime'] = time();

    // Redirect to the index page to start the game with the selected difficulty level
    header("Location: index.php");
    exit;
?>
