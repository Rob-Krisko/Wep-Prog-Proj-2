<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check if the username already exists
    $user_data = file_get_contents('users.txt');
    $users = explode(PHP_EOL, $user_data);

    foreach ($users as $user) {
        $user_info = explode(',', $user);
        if ($user_info[0] == $username) {
            die('Username already exists.');
        }
    }

    // Save the user to the text file
    $new_user = $username . ',' . password_hash($password, PASSWORD_DEFAULT) . PHP_EOL;
    file_put_contents('users.txt', $new_user, FILE_APPEND);

    echo "User registered successfully!";
    header("refresh:2;url=login.html");
}
