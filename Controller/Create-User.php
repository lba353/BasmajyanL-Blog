<?php
    //Requires the header, config, and footer files.
    require_once (__DIR__ . "/../View/Header.php");
    require_once (__DIR__ . "/../Model/Config.php");
    require_once (__DIR__ . "/../View/Footer.php");
    
    //Sets the email, username, and password variables.
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    
    //Sets the salt which is used for the password.
    $salt = "$5$" . "rounds=5000$" . uniqid(mt_rand(), true) . "$";
    
    //Sets the hashed password which scrambles the password.
    $hashedPassword = crypt($password, $salt);
    
    //Gets the username from the users table where the username is the same as the variable username.
    $query = $_SESSION["connection"]->query("SELECT username FROM users WHERE BINARY username = '$username'"); 
  
    //Makes a new user or does not allow if you are already registered.
    if($query) {
        if($query->num_rows == 0) {
           $query2 = $_SESSION["connection"]->query("INSERT INTO users SET "
            . "email = '$email',"
            . "username = '$username',"
            . "password = '$hashedPassword',"
            . "salt = '$salt'");
           header("Location: " . $path . "index.php");
           echo "Successfully created user: $username";
       }
       else {
           header("Location: " . $path . "index.php");
           echo "Username already exists";
       }
   }
    else {
        header("Location: " . $path . "index.php");
        echo "<p>" . $_SESSION["connection"]->error . "</p>";
    }