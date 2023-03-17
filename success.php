<!DOCTYPE html>
<html>
<head>
	<title>Guess Who? - Success!</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			padding: 20px;
		}

		h1, h2 {
			text-align: center;
		}

		.container {
			display: flex;
			flex-direction: column;
			align-items: center;
		}

		.btn {
			font-size: 20px;
			padding: 10px 20px;
			margin: 10px;
			border: none;
			background-color: #4CAF50;
			color: white;
			border-radius: 5px;
			cursor: pointer;
		}

		.btn:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
	<h1>Guess Who? - Success!</h1>
	<div class="container">
		<h2>Congratulations, you guessed correctly!</h2>
		<form method="POST" action="reset.php">
			<button type="submit" class="btn">Reset game</button>
		</form>
	</div>
</body>
</html>
