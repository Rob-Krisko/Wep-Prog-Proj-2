<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Read the user data from the text file
    $user_data = file_get_contents('users.txt');
    $users = explode(PHP_EOL, $user_data);

    // Check if the user exists and the password matches
    $user_found = false;
    foreach ($users as $user) {
        if (empty($user)) {
            continue;
        }
        $user_info = explode(',', $user);
        if ($user_info[0] == $username && password_verify($password, $user_info[1])) {
            $user_found = true;
            break;
        }
    }

    if ($user_found) {
        // Log in the user by saving their username to the session
        $_SESSION['username'] = $username;

        // Redirect to the story
        header('Location: story.html');
        exit();
    } else {
        echo "Invalid username or password.";
        echo "<br>";
        echo '<a href="login.html">Try Again</a>';
    }
}
?>
