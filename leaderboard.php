<?php
// Start the session
session_start();

if (!isset($_SESSION['username'])) {
    // Redirect to the login page if the user is not logged in
    header('Location: login.html');
    exit();
}

// Read the scores from the scores.txt file
$scores = file("scores.txt", FILE_IGNORE_NEW_LINES);

// Initialize empty leaderboards for each difficulty level
$leaderboard_easy = array();
$leaderboard_medium = array();
$leaderboard_hard = array();

// Parse each line of the scores file and add the scores to the respective leaderboards
foreach ($scores as $score_line) {
    list($username, $difficulty, $guesses, $time_taken) = explode(",", $score_line);
    $entry = array("username" => $username, "time_taken" => $time_taken, "guesses" => $guesses);

    if ($difficulty == "easy") {
        $leaderboard_easy[] = $entry;
    } elseif ($difficulty == "medium") {
        $leaderboard_medium[] = $entry;
    } else {
        $leaderboard_hard[] = $entry;
    }
}


// Sort the leaderboards by time taken and then by number of guesses
$sort_function = function ($a, $b) {
    if ($a["guesses"] == $b["guesses"]) {
        return $a["time_taken"] - $b["time_taken"];
    }
    return $a["guesses"] - $b["guesses"];
};


usort($leaderboard_easy, $sort_function);
usort($leaderboard_medium, $sort_function);
usort($leaderboard_hard, $sort_function);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Leaderboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="leaderboard.css">
</head>
<body>
    <div class="container">
        <h1>Leaderboard</h1>

        <?php
        // Function to display a leaderboard table for a specific difficulty
        function display_leaderboard($leaderboard, $difficulty) {
            echo "<h2>" . ucfirst($difficulty) . "</h2>";
            echo "<table>";
            echo "<tr><th>Username</th><th>Time Taken</th><th>Guesses</th></tr>";

            foreach ($leaderboard as $entry) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($entry["username"]) . "</td>";
                echo "<td>" . htmlspecialchars($entry["time_taken"]) . " seconds</td>";
                echo "<td>" . htmlspecialchars($entry["guesses"]) . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        }

        // Display leaderboards for each difficulty level
        display_leaderboard($leaderboard_easy, "easy");
        display_leaderboard($leaderboard_medium, "medium");
        display_leaderboard($leaderboard_hard, "hard");
        ?>

        <div class="buttons">
            <a href="success_redirect.php" class="button">Back to Success Page</a>
        </div>

    </div>
</body>
</html>
