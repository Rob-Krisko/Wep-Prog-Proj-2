<?php
session_start();

if (!isset($_SESSION['selectedSuspect'])) {
    // Generate a random suspect if one hasn't been selected
    require 'generate_suspect.php';
}

// Check if a suspect has been selected
if (isset($_POST['suspect'])) {
    $selectedSuspect = $_POST['suspect'];

    switch ($selectedSuspect) {
        case 'A':
            header("Location: suspect_A.php");
            break;
        case 'B':
            header("Location: suspect_B.php");
            break;
        case 'C':
            header("Location: suspect_C.php");
            break;
        case 'D':
            header("Location: suspect_D.php");
            break;
        case 'E':
            header("Location: suspect_E.php");
            break;
        case 'F':
            header("Location: suspect_F.php");
            break;
        case 'G':
            header("Location: suspect_G.php");
            break;
        case 'H':
            header("Location: suspect_H.php");
            break;
        default:
            // Invalid suspect selected, redirect back to the clue page
            header("Location: index.php");
            break;
    }
    exit;
}

// Get the clues for the selected suspect
$clues = $_SESSION['selectedSuspect']['clues'];

?>

<!DOCTYPE html>
<html>
<head>
  <title>Guess Who?</title>
  <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
  <div class="container">
    <div class="clues-container">
      <img src="Siesta.png" class="clue-image" alt="siesta">
      <div class="clues-text">
        <p class="typewriter1">It's so weird. It all happened so fast! I didnt see much, but im pretty sure the person <?php echo $clues[0]; ?>.</p>
        <p class="typewriter2">Oh, and I also am fairly confident that the person <?php echo $clues[1]; ?>, but I cant be certain.</p>
      </div>
    </div>
    <form method="POST">
      <label for="suspect">Select a suspect:</label>
      <select name="suspect" id="suspect">
        <option value="A">Suspect A</option>
        <option value="B">Suspect B</option>
        <option value="C">Suspect C</option>
        <option value="D">Suspect D</option>
        <option value="E">Suspect E</option>
        <option value="F">Suspect F</option>
        <option value="G">Suspect G</option>
        <option value="H">Suspect H</option>
      </select>
      <br>
      <button type="submit" class="btn">Interrogate</button>
    </form>
  </div>

</body>
</html>
