<?php
session_start();

if (!isset($_SESSION['username'])) {
  // Redirect to the login page if the user is not logged in
  header('Location: login.html');
  exit();
}

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

$stmt = "The detective surveyed the gruesome murder scene, their eyes darting over the broken glass and blood-stained carpet. A muffled sob caught their attention as they approached the trembling witness, eager to learn what happened. The witness managed to choke out their statement, revealing that the killer " . $clues[0] . ". They continued, their voice barely a whisper, 'and the suspect... the suspect " . $clues[1] . ".' The detective nodded, grateful for the lead. They knew that this information would be crucial in identifying the cold-blooded killer.";
$stmt_lines = explode("\n", wordwrap($stmt, 140, "\n"));
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
      <img src="image/Siesta.png" class="clue-image" alt="siesta">
      <div class="clues-text">
        <p>
          <?php foreach ($stmt_lines as $index => $line): ?>
          <span class="line" style="animation-delay: <?php echo $index * 2; ?>s;"><?php echo $line; ?></span><br>
          <?php endforeach; ?>
        </p>
      </div>
    </div>
    <form method="POST">
      <label for="suspect">Select a suspect:</label>
      <select name="suspect" id="suspect">
        <option value="A">Slickback</option>
        <option value="B">Revy</option>
        <option value="C">Sanji</option>
        <option value="D">Uruk</option>
        <option value="E">Sebastian</option>
        <option value="F">Zeke</option>
        <option value="G">Sutcliff</option>
        <option value="H">Joop</option>
      </select>
      <br>
      <button type="submit" class="btn">Interrogate</button>
    </form>
  </div>

</body>
</html>
