<!DOCTYPE html>
<html>
<head>
    <title>Credits</title>
    <link rel="stylesheet" type="text/css" href="credits.css">
    <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet"> 
</head>
<body>
    <div class="background-image"></div>
    <div class="container">
        <div class="textbox">
            <?php
                $credits_text = "Main Coder And Logic\nRob Krisko\nStoryboarding and Editor\nTabitha Scott\nCharacter Design\nJason Tran\nDebugging and Testing\nJulius Mitchell";
                $credits_lines = explode("\n", $credits_text);
            ?>
            <ul>
                <?php foreach ($credits_lines as $index => $line): ?>
                    <li style="animation-delay: <?php echo $index * 2; ?>s; font-size: <?php echo ($index % 2 == 0) ? '48px' : '24px'; ?>; font-weight: <?php echo ($index % 2 == 0) ? 'bold' : 'normal'; ?>;"><?php echo $line; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
		<form method="POST" action="reset.php">
			<button type="submit" class="btn">Play Again?</button>
		</form>
    </div>
</body>
</html>
