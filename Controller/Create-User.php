<?php
    require_once (__DIR__ . "/../View/Header.php");
    require_once(__DIR__ . "/../Model/Config.php");
    require_once (__DIR__ . "/../View/Footer.php");
    
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    
    $salt = "$5$" . "rounds=5000$" . uniqid(mt_rand(), true) . "$";
    
    $hashedPassword = crypt($password, $salt);
    
   $query = $_SESSION["connection"]->query("SELECT username FROM users WHERE BINARY username = '$username'"); 
  
    if($query) {
        if($query->num_rows == 0) {
           $query2 = $_SESSION["connection"]->query("INSERT INTO users SET "
            . "email = '$email',"
            . "username = '$username',"
            . "password = '$hashedPassword',"
            . "salt = '$salt'");
           echo "Successfully created user: $username";
       }
       else {
           echo "Username already exists";
       }
   }
    else {
        echo "<p>" . $_SESSION["connection"]->error . "</p>";
    }