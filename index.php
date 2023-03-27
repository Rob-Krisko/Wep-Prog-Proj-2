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
        <p class="typewriter1">Detective: Good morning detective. Thank you for joing us today. This is one intense case we have on our hands. Here is what we know so far... 
          At 1:17am we got a distressed call at the station from Bazett stating she was in bed when she heard gunshots from the foyer. Bazett claims Sutcliff and herself ran together
          to look at the commotion. There Sutcliff and herself ran rogether to look at the commotion. There Sutcliff's friend that had helped the team was dead with the book missing from 
          her satchel. Upon our arrival the crime scene has the young trainee lying on her bacl, feet facing the stairs, with a gunshot wound to the left temple.<?php echo $clues[0]; ?>.</p>
        <p class="typewriter2">It was one shot perfectly placed, the shooter must be very skilled. On the top floor, near the west stairwell railings we found a shell casing. We are 
          still interviewing our suspects. Feel free to talk to them yourself for more clues as to what may have happened here and where that book is! Let me know what you find, detective. <?php echo $clues[1]; ?>, but I cant be certain.</p>
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
